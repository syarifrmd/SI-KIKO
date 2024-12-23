<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RekamMedis;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Tambahkan ini

class PerawatController extends Controller
{
    // Dashboard Perawat
    public function index()
    {
        return view('perawat.dashboard');
    }
    // Menampilkan daftar pasien
    public function ManagePatients() // Rename this function to avoid conflict with the `index()` function
    {
        $pasiens = Pasien::all(); // Mengambil semua data pasien
        return view('perawat.patients.index', compact('pasiens'));
    }

    // Menampilkan form untuk menambah pasien
    public function createPatient()
    {
        $pasiens = Pasien::all(); // Retrieve all pasien records
        return view('perawat.patients.create', compact('pasiens')); // Pass to view
    }

    // Menyimpan data pasien
    public function storePatient(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'ruangan_pasien' => 'required|string',
            'foto_pasien' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $fotoPasienPath = $request->hasFile('foto_pasien')
            ? $request->file('foto_pasien')->store('foto_pasien', 'public')
            : null;

        Pasien::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'ruangan_pasien' => $request->ruangan_pasien,
            'foto_pasien' => $fotoPasienPath,
        ]);

        return redirect()->route('perawat.patients.index')->with('success', 'Pasien berhasil ditambahkan!');
    }

    // Menampilkan form untuk mengedit data pasien
    public function editPatient($id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('perawat.patients.edit', compact('pasien'));
    }

    // Memperbarui data pasien
    public function updatePatient(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'ruangan_pasien' => 'required|string',
            'foto_pasien' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
              
        ]);

        $pasien = Pasien::findOrFail($id);

        if ($request->hasFile('foto_pasien')) {
            if ($pasien->foto_pasien) {
                Storage::delete('public/' . $pasien->foto_pasien); // Gunakan Storage di sini
            }
            $fotoPasienPath = $request->file('foto_pasien')->store('foto_pasien', 'public');
        } else {
            $fotoPasienPath = $pasien->foto_pasien;
        }

        $pasien->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'ruangan_pasien' => $request->ruangan_pasien,
            'foto_pasien' => $fotoPasienPath,
        ]);

        return redirect()->route('perawat.patients.index')->with('success', 'Pasien berhasil diperbarui!');
    }

    // Menghapus data pasien
    public function destroyPatient($id)
    {
        $pasien = Pasien::findOrFail($id);
        if ($pasien->foto_pasien) {
            Storage::delete('public/' . $pasien->foto_pasien); // Gunakan Storage di sini
        }
        $pasien->delete();

        return redirect()->route('perawat.patients.index')->with('success', 'Pasien berhasil dihapus!');
    }


    // Menampilkan daftar rekam medis
    public function manageMedicalRecords()
    {
        $medicalRecords = RekamMedis::with('pasien', 'user', 'perawat')->get();
        return view('perawat.medical_records.index', compact('medicalRecords'));
    }

    // Menampilkan form untuk menambah rekam medis
    public function createMedicalRecord()
    {
        $pasiens = Pasien::all(); 
        $users = User::where('role', 'perawat')->get(); 

        return view('perawat.medical_records.create', compact('pasiens', 'users'));
    }

    // Menyimpan data rekam medis
    public function storeMedicalRecord(Request $request)
    {
        $request->validate([
           'pasien_id' => 'required|exists:pasiens,id',
            'user_id' => 'required|exists:users,id',
            'diagnosis' => 'required|string',
            'tindakan' => 'required|string',
            'tanggal' => 'required|date',
        ]);

        RekamMedis::create([
            'pasien_id' => $request->pasien_id,
            'user_id' => $request->user_id,
            'diagnosis' => $request->diagnosis,
            'tindakan' => $request->tindakan,
            'tanggal' => $request->tanggal,
            'perawat_id' => $request->perawat_id, 
        ]);

        return redirect()->route('perawat.medical_records.index')->with('success', 'Rekam medis berhasil ditambahkan.');
    }

    // Mengedit data rekam medis
    public function editMedicalRecord(RekamMedis $rekamMedis)
    {
        $pasiens = Pasien::all();
        $users = User::where('role', 'perawat')->get();

        return view('perawat.medical_records.edit', compact('rekamMedis', 'pasiens', 'users'));
    }

    // Memperbarui data rekam medis
    public function updateMedicalRecord(Request $request, RekamMedis $rekamMedis)
    {
        $request->validate([
            'pasien_id' => 'required|exists:pasiens,id',
            'user_id' => 'required|exists:users,id',
            'diagnosis' => 'required|string',
            'tindakan' => 'required|string',
            'tanggal' => 'required|date',
        ]);

        $rekamMedis->update([
            'pasien_id' => $request->pasien_id,
            'user_id' => $request->user_id,
            'diagnosis' => $request->diagnosis,
            'tindakan' => $request->tindakan,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('perawat.medical_records.index')->with('success', 'Rekam medis berhasil diperbarui.');
    }

    // Menghapus data rekam medis
    public function destroyMedicalRecord(RekamMedis $rekamMedis)
    {
        $rekamMedis->delete();
        return redirect()->route('perawat.medical_records.index')->with('success', 'Rekam medis berhasil dihapus.');
    }

    // Menyimpan data perawat
    public function storePerawat(Request $request)
    {
    $request->validate([
        'name' => 'required|string|max:255',
        'nip' => 'required|unique:users,nip',
        'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        'tanggal_masuk' => 'required|date',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
        'foto_perawat' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $fotoPerawatPath = null;
    if ($request->hasFile('foto_perawat')) {
        $fotoPerawatPath = $request->file('foto_perawat')->store('foto_perawat', 'public');
    }

    User::create([
        'name' => $request->name,
        'nip' => $request->nip,
        'jenis_kelamin' => $request->jenis_kelamin,
        'tanggal_masuk' => $request->tanggal_masuk,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'foto_perawat' => $fotoPerawatPath,
        'role' => 'perawat',
    ]);

    return redirect()->route('admin.perawat.index')->with('success', 'Perawat berhasil ditambahkan!');
    }

    



}
