<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Pasien;
use App\Models\RekamMedis;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Menampilkan dashboard admin dengan jumlah pasien dan rekam medis
    public function index()
    {
        $patientsToday = Pasien::whereDate('created_at', today())->count();
        $patientsThisMonth = Pasien::whereMonth('created_at', now()->month)->count();
        $patientsThisYear = Pasien::whereYear('created_at', now()->year)->count();

        $recordsToday = RekamMedis::whereDate('created_at', today())->count();
        $recordsThisMonth = RekamMedis::whereMonth('created_at', now()->month)->count();
        $recordsThisYear = RekamMedis::whereYear('created_at', now()->year)->count();

        return view('admin.dashboard', compact(
            'patientsToday', 'patientsThisMonth', 'patientsThisYear',
            'recordsToday', 'recordsThisMonth', 'recordsThisYear'
        ));
    }

    // Menampilkan daftar perawat
    // Menampilkan daftar perawat
    public function managePerawat()
    {
        $perawats = User::where('role', 'perawat')->get();
        return view('admin.perawat.index', compact('perawats'));
    }

    // Menampilkan form untuk membuat perawat
    public function createPerawat()
    {
        return view('admin.perawat.create');
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

    // Mengedit data perawat
    public function editPerawat(User $perawat)
    {
        return view('admin.perawat.edit', compact('perawat'));
    }

    // Memperbarui data perawat
    public function updatePerawat(Request $request, User $perawat)
    {
    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email|unique:users,email,' . $perawat->id,
        'nip' => 'required|unique:users,nip,' . $perawat->id,
        'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        'tanggal_masuk' => 'required|date',
        'password' => 'nullable|min:6',
        'foto_perawat' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('foto_perawat')) {
        if ($perawat->foto_perawat) {
            Storage::delete('public/' . $perawat->foto_perawat);
        }
        $fotoPerawatPath = $request->file('foto_perawat')->store('foto_perawat', 'public');
    } else {
        $fotoPerawatPath = $perawat->foto_perawat;
    }

    $perawat->update([
        'name' => $request->name,
        'email' => $request->email,
        'nip' => $request->nip,
        'jenis_kelamin' => $request->jenis_kelamin,
        'tanggal_masuk' => $request->tanggal_masuk,
        'password' => $request->password ? bcrypt($request->password) : $perawat->password,
        'foto_perawat' => $fotoPerawatPath,
    ]);

    return redirect()->route('admin.perawat.index')->with('success', 'Perawat berhasil diperbarui!');
}

    // Menghapus data perawat
    public function destroyPerawat(User $perawat)
    {
        if ($perawat->foto_perawat) {
            Storage::delete('public/' . $perawat->foto_perawat);
        }
        $perawat->delete();
        return redirect()->route('admin.perawat.index')->with('success', 'Perawat berhasil dihapus!');
    }


    // Menampilkan daftar pasien
    public function ManagePatients() // Rename this function to avoid conflict with the `index()` function
    {
        $pasiens = Pasien::all(); // Mengambil semua data pasien
        return view('admin.patients.index', compact('pasiens'));
    }

    // Menampilkan form untuk menambah pasien
    public function createPatient()
    {
        return view('admin.patients.create');
    }

   // Menyimpan data pasien
public function storePatient(Request $request)
{
    // Validasi input dari form
    $request->validate([
        'nama' => 'required|string|max:255',
        'alamat' => 'required|string',
        'tanggal_lahir' => 'required|date',
        'ruangan_pasien' => 'required|string',
        'foto_pasien' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // validasi foto (optional)
    ]);

    // Menyimpan data pasien ke dalam tabel
    $fotoPasienPath = null;
    if ($request->hasFile('foto_pasien')) {
        // Jika ada foto yang diupload
        $fotoPasienPath = $request->file('foto_pasien')->store('foto_pasien', 'public');
    }

    Pasien::create([
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'tanggal_lahir' => $request->tanggal_lahir,
        'ruangan_pasien' => $request->ruangan_pasien,
        'foto_pasien' => $fotoPasienPath, // Menyimpan path foto
    ]);

    // Redirect ke halaman daftar pasien setelah data disimpan
    return redirect()->route('admin.patients.index')->with('success', 'Pasien berhasil ditambahkan!');
}


// Menampilkan form untuk mengedit data pasien
public function editPatient($id)
{
    $pasien = Pasien::findOrFail($id);
    return view('admin.patients.edit', compact('pasien'));
}

// Memperbarui data pasien
public function updatePatient(Request $request, $id)
{
    // Validasi input pasien
    $request->validate([
        'nama' => 'required|string|max:255',
        'alamat' => 'required|string',
        'tanggal_lahir' => 'required|date',
        'ruangan_pasien' => 'required|string',
        'foto_pasien' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'created_at' => 'required|date',
    ]);

    // Mengambil data pasien berdasarkan ID
    $pasien = Pasien::findOrFail($id);

    // Menyimpan foto pasien jika ada
    if ($request->hasFile('foto_pasien')) {
        // Hapus foto lama jika ada
        if ($pasien->foto_pasien) {
            Storage::delete('public/' . $pasien->foto_pasien);
        }

        // Simpan foto baru
        $fotoPasienPath = $request->file('foto_pasien')->store('foto_pasien', 'public');
    } else {
        // Jika tidak ada foto baru, gunakan foto lama
        $fotoPasienPath = $pasien->foto_pasien;
    }

    // Memperbarui data pasien
    $pasien->update([
        'nama' => $request->nama,
        'alamat' => $request->alamat,
        'tanggal_lahir' => $request->tanggal_lahir,
        'ruangan_pasien' => $request->ruangan_pasien,
        'created_at' => $request->created_at, // Update the created_at field
        'foto_pasien' => $fotoPasienPath, // Simpan foto yang baru atau lama
    ]);

    return redirect()->route('admin.patients.index')->with('success', 'Pasien berhasil diperbarui!');
}

    // Menghapus data pasien
    public function destroyPatient($id)
    {
        // Mengambil data pasien berdasarkan ID
        $pasien = Pasien::findOrFail($id);

        // Menghapus data pasien
        $pasien->delete();

        // Redirect ke halaman daftar pasien setelah data dihapus
        return redirect()->route('admin.patients.index')->with('success', 'Pasien berhasil dihapus!');
    }

    // Menampilkan daftar rekam medis
    public function manageMedicalRecords()
    {
        $medicalRecords = RekamMedis::with('pasien', 'user', 'perawat')->get();
        return view('admin.medical_records.index', compact('medicalRecords'));
    }

    // Menampilkan form untuk menambah rekam medis
    public function createMedicalRecord()
    {
        $pasiens = Pasien::all(); 
        $users = User::where('role', 'perawat')->get(); 

        return view('admin.medical_records.create', compact('pasiens', 'users'));
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
        ]);

        return redirect()->route('admin.medical_records.index')->with('success', 'Rekam medis berhasil ditambahkan.');
    }

    // Mengedit data rekam medis
    public function editMedicalRecord(RekamMedis $rekamMedis)
    {
        $pasiens = Pasien::all();
        $users = User::where('role', 'perawat')->get();

        return view('admin.medical_records.edit', compact('rekamMedis', 'pasiens', 'users'));
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

        return redirect()->route('admin.medical_records.index')->with('success', 'Rekam medis berhasil diperbarui.');
    }

    // Menghapus data rekam medis
    public function destroyMedicalRecord(RekamMedis $rekamMedis)
    {
        $rekamMedis->delete();
        return redirect()->route('admin.medical_records.index')->with('success', 'Rekam medis berhasil dihapus.');
    }

}
