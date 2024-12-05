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
        $medicalRecords = RekamMedis::all();
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
            'perawat_id' => auth()->user()->id,
        ]);

        RekamMedis::create($request->only('pasien_id', 'user_id', 'diagnosis', 'tindakan', 'tanggal','perawat_id'));

        return redirect()->route('perawat.medical_records.index')->with('success', 'Rekam medis berhasil ditambahkan!');
    }

    // Mengedit data rekam medis
    public function editMedicalRecord($id)
    {
        $rekamMedis = RekamMedis::findOrFail($id);
        $pasiens = Pasien::all();
        $users = User::all();

        return view('perawat.medical_records.edit', compact('rekamMedis', 'pasiens', 'users'));
    }

    // Memperbarui data rekam medis
    public function updateMedicalRecord(Request $request, $id)
    {
        $rekamMedis = RekamMedis::findOrFail($id);
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'diagnosis' => 'required|string',
            'tindakan' => 'required|string',
        ]);

        $rekamMedis->update($request->only('user_id', 'diagnosis', 'tindakan'));

        return redirect()->route('perawat.medical_records.index')->with('success', 'Rekam medis berhasil diperbarui!');
    }

    // Menghapus data rekam medis
    public function destroyMedicalRecord($id)
    {
        $rekamMedis = RekamMedis::findOrFail($id);
        $rekamMedis->delete();

        return redirect()->route('perawat.medical_records.index')->with('success', 'Rekam medis berhasil dihapus!');
    }
}
