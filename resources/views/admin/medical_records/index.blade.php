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
            background-color: #343a40;
            padding-top: 20px;
        }

        .sidebar .nav-link {
            color: #ddd;
            padding: 10px 15px;
        }

        .sidebar .nav-link:hover {
            background-color: #007bff;
            color: white;
        }

        /* Custom style for content */
        .content-wrapper {
            margin-left: 250px;
            padding: 20px;
        }

        .navbar {
            margin-left: 250px;
        }

        .table-wrapper {
            margin-top: 30px;
        }

        .text-title {
            font-size: 34px;
            margin-bottom: 20px;
            color: green;
        }

        .action-btns button {
            margin-right: 5px;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <h3 class="text-white text-center mb-4">Admin Dashboard</h3>
        </a>
    
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.perawat.index') }}">
                    <i class="fas fa-user-md"></i> Data Perawat
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.patients.index') }}">
                    <i class="fas fa-procedures"></i> Data Pasien
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.medical_records.index') }}">
                    <i class="fas fa-notes-medical"></i> Data Rekam Medis
                </a>
            </li>
        </ul>
    </div>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <h1 class="text-title">Daftar Rekam Medis</h1>
        <a href="{{ route('admin.medical_records.create') }}" class="btn btn-primary mb-3">Tambah Rekam Medis</a>

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
                            <td class="action-btns">
                                <a href="{{ route('admin.medical_records.edit', $rekamMedis->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.medical_records.destroy', $rekamMedis->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus rekam medis ini?')">Delete</button>
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
