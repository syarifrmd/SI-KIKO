<!-- resources/views/admin/medical_records/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Rekam Medis</title>
    <link rel="stylesheet" href="https://cdn.lineicons.com/4.0/lineicons.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
        <!-- Sidebar -->
        <div class="sidebar">
            <h3 class="text-white text-center mb-4">Rumah Sakit KIKO</h3>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('perawat.dashboard') }}">
                        <i class="fas fa-user-md"></i> Profile
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#multi" role="button" aria-expanded="false" aria-controls="multi">Input Data</a>
                    <ul class="collapse multi-collapse" id="multi">
                        <li><a class="nav-link" href="{{ route('perawat.patients.create') }}">
                            <i class="fas fa-procedures"></i> Pasien</a></li>
                        <li><a class="nav-link" href="{{ route('perawat.medical_records.create') }}">
                            <i class ="fas fa-notes-medical"></i> Rekam Medis</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#multi-two" role="button" aria-expanded="false" aria-controls="multi-two">Rekap Data</a>
                    <ul class="collapse multi-collapse" id="multi-two">
                        <li><a class="nav-link" href="{{ route('perawat.patients.index') }}">
                            <i class="bi bi-clipboard-data-fill"></i> Data Pasien</a></li>
                        <li><a class="nav-link" href="{{ route('perawat.medical_records.index') }}">
                            <i class="bi bi-clipboard2-pulse-fill"></i> Data Rekam Medis</a>
                            </li>
                </li>
            </ul>
        </div>
    <!-- Content Wrapper -->
    <div class="content-wrapper ">
    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <h1 class="text-title">Daftar Rekam Medis</h1>
        <!-- <a href="{{ route('perawat.medical_records.create') }}" class="btn btn-primary mb-3">Tambah Rekam Medis</a> -->

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

                        
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/navbar.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
