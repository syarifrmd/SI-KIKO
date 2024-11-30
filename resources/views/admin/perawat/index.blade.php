<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Perawat</title>
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
            margin-left: 250px;
            padding: 20px;
            background-color: #f8f9fa;
        }

        .navbar {
            margin-left: 250px;
        }

        .text-tittle {
            font-size: 34px;
            margin-bottom: 20px;
            color: #28a745; /* Warna hijau yang lebih terang */
        }

        /* Card styling */
        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-between;
        }

        .card {
            width: 18rem;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px 10px 0 0;
        }

        .card-body {
            text-align: center;
            padding: 20px;
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
            color: #343a40;
        }

        .card-text {
            font-size: 1rem;
            color: #6c757d;
        }

        .btn-primary, .btn-warning, .btn-danger {
            font-size: 0.875rem;
            padding: 8px 12px;
        }

        /* Styling for buttons */
        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-primary:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
        }

        .btn-warning:hover {
            background-color: #e0a800;
            border-color: #d39e00;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
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
        <h1 class="text-tittle">Daftar Perawat</h1>
        <a href="{{ route('admin.perawat.create') }}" class="btn btn-primary mb-3">Tambah Perawat</a>
        <br><br>
        <!-- Card container -->
        <div class="card-container">
            @foreach($perawats as $perawat)
                <div style="align-items: center; justify-content: center; display: flex;" class="card " class="card">
                    <img style="width: 177px; height: 236px; object-fit: cover; " src="{{ $perawat->foto_perawat ? asset('storage/'.$perawat->foto_perawat) : asset('storage/foto_perawat/default.jpg') }}" alt="Foto Perawat">
                    <div class="card-body">
                        <h5 class="card-title">{{ $perawat->name }}</h5>
                        <p class="card-text">
                            <strong>NIP:</strong> {{ $perawat->nip }} <br>
                            <strong>Tanggal Masuk:</strong> 
                            @if($perawat->tanggal_masuk)
                                {{ \Carbon\Carbon::parse($perawat->tanggal_masuk)->format('d-m-Y') }}
                            @else
                                N/A
                            @endif
                        </p>
                        <a href="{{ route('admin.perawat.edit', $perawat->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.perawat.destroy', $perawat->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this perawat?')">Delete</button>
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
