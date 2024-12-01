<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pasien</title>
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

        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .card {
            width: 18rem;
        }

        .card img {
            width: 100%;
            height: auto;
        }

        .card-body {
            text-align: center;
        }

        .text-tittle {
            font-size: 34px;
            margin-bottom: 20px;
            color: green;
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

    <div class="content-wrapper">
        <h1 class="text-tittle">Daftar Pasien</h1>
        <a href="{{ route('admin.patients.create') }}" class="btn btn-primary mb-3">Tambah Pasien</a>

        <!-- Card container -->
        <div class="card-container">
            @foreach($pasiens as $pasien) <!-- Ganti $patients menjadi $pasiens -->
                <div style="width: 250px; align-items: center; justify-content: center; display: flex;" class="card">
                    <img style="width: 177px; height: 236px; object-fit: cover;" 
                         src="{{ $pasien->foto_pasien ? asset('storage/'.$pasien->foto_pasien) : asset('storage/foto_pasien/default.jpg') }}" 
                         alt="Foto Pasien">
                    <div style="width: 250px;" class="card-body">
                        <h5 class="card-title">{{ $pasien->nama }}</h5> <!-- Ganti $patient menjadi $pasien -->
                        <p class="card-text">
                            <strong>ID Pasien:</strong> {{ $pasien->id }} <br>
                            <strong>Ruangan Pasien:</strong> {{ $pasien->ruangan_pasien }} <br>
                            <strong>Tanggal Lahir:</strong> 
                            @if($pasien->tanggal_lahir)
                                {{ \Carbon\Carbon::parse($pasien->tanggal_lahir)->format('d-m-Y') }}
                            @else
                                N/A
                            @endif
                        </p>
                        <a href="{{ route('admin.patients.edit', $pasien->id) }}" class="btn btn-warning btn-sm">Edit</a> <!-- Ganti $patient menjadi $pasien -->
                        <form action="{{ route('admin.patients.destroy', $pasien->id) }}" method="POST" style="display:inline;"> <!-- Ganti $patient menjadi $pasien -->
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pasien ini?')">Hapus</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
