<!-- resources/views/admin/medical_records/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Rekam Medis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        /* Custom styling for the sidebar */
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            background-color: #2c3e50;
            padding-top: 30px;
            box-shadow: 2px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar .nav-link {
            color: #ecf0f1;
            padding: 12px 15px;
            font-size: 16px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .sidebar .nav-link:hover {
            background-color: #1abc9c;
            color: white;
        }

        /* Custom style for content */
        .content-wrapper {
            margin-left: 120px;
            padding: 20px;
            background-color: #f8f9fa;
        }

        .text-title {
            font-size: 34px;
            margin-bottom: 20px;
            color: #28a745; /* Warna hijau terang */
        }

        .table-wrapper {
            margin-top: 30px;
        }

        .table {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .table th {
            background-color: #28a745;
            color: white;
        }

        .btn-primary, .btn-warning, .btn-danger {
            font-size: 0.875rem;
            padding: 8px 12px;
        }
    </style>
</head>
<body>
        <!--navbar-->
        <div class="sidebar">
        <h3 class="text-white text-center mb-4">Pegawai Dashboard</h3>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('perawat.dashboard') }}">
                    <i class="fas fa-user-md"></i> Profile
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#multi" role="button" aria-expanded="false" aria-controls="multi">Input Data</a>
                <ul class="collapes multi-collapse" id="multi">
                    <a class="nav-link" href="{{ route('perawat.patients.create') }}">
                        <i class="fas fa-procedures"></i> Pasien
                    </a>
                    <a class="nav-link" href="{{ route('perawat.medical_records.index') }}">
                        <i class ="fas fa-notes-medical"></i> Rekam Medis
                    </a>
                </ul>
            </li>
            <li class  ="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#multi-two" role="button" aria-expanded="false" aria-controls="multi-two">Rekap Data</a>
                <ul class="collapes multi-collapse" id="multi-two">
                    <a class="nav-link" href="{{ route('perawat.patients.index') }}">
                        <i class="fas fa-procedures"></i> Data Pasien
                    </a>
                    <a class="nav-link" href= >
                        <i class ="fas fa-notes-medical"></i> Data Rekam Medis
                    </a>
                </ul>
            </li>
        </ul>
    </div>

    <!-- Content Wrapper -->
    <div class="content-wrapper ">
        <!-- Navbar atas -->
        <nav style="width: 300px; float: right;" class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <span class="navbar-text">
                    <strong>{{ auth()->user()->name }}</strong>
                </span>
                <div class="ml-auto">
                    <div class="btn-group">
                        <!-- Dropdown button -->
                        <button type="button"  class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i> Admin
                        </button>
                        <div class="dropdown-menu">
                            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="dropdown-item btn-logout">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <br><br>
    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <h1 class="text-title">Daftar Rekam Medis</h1>
        <a href="{{ route('perawat.medical_records.create') }}" class="btn btn-primary mb-3">Tambah Rekam Medis</a>

        <!-- Tabel Rekam Medis -->
        <div class="table-wrapper">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pasien</th>
                        <th>Nama Perawat/Dokter</th>
                        <th>Diagnosis</th>
                        <th>Tindakan</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($medicalRecords as $rekamMedis)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $rekamMedis->pasien->nama }}</td>
                            <td>{{ $rekamMedis->user->name }}</td>
                            <td>{{ $rekamMedis->diagnosis }}</td>
                            <td>{{ $rekamMedis->tindakan }}</td>
                            <td>{{ \Carbon\Carbon::parse($rekamMedis->tanggal)->format('d-m-Y') }}</td>
                            <td>
                                <a href="{{ route('perawat.medical_records.edit', $rekamMedis->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('perawat.medical_records.destroy', $rekamMedis->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus rekam medis ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>