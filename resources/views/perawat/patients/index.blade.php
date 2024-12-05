<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pasien</title>
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
    <!-- Content -->
    <div class="content-wrapper">
        <h1 style="margin-left: 30px" class="text-tittle">Daftar Pasien</h1>
        <!-- <a style="margin-left: 30px;" href="{{ route('admin.patients.create') }}" class="btn btn-primary mb-3">Tambah Pasien</a> -->
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
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/navbar.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
