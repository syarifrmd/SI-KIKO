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

        .text-tittle {
            font-size: 34px;
            margin-bottom: 20px;
            color: #28a745;
        }

        /* Card styling */
        .card {
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
    <!-- Content -->
    <div class="content-wrapper">
        <h1 style="margin-left: 30px" class="text-tittle">Daftar Pasien</h1>
        <a style="margin-left: 30px;" href="{{ route('admin.patients.create') }}" class="btn btn-primary mb-3">Tambah Pasien</a>
        <div class="container" style="margin-top: 40px">
            <div class="row">
                @foreach($pasiens as $pasien)
                    <div class="col-md-3 mb-4 d-flex align-items-stretch">
                        <div class="card">
                            <img src="{{ $pasien->foto_pasien ? asset('storage/'.$pasien->foto_pasien) : asset('storage/foto_pasien/default.jpg') }}" alt="Foto Pasien">
                            <div class="card-body">
                                <h5 class="card-title">{{ $pasien->nama }}</h5>
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
                                <a href="{{ route('admin.patients.edit', $pasien->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.patients.destroy', $pasien->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pasien ini?')">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>