<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Pasien</title>
    <link rel="stylesheet" href="https://cdn.lineicons.com/4.0/lineicons.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        /* Sidebar styling */
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

        .content-wrapper {
            margin-left: 250px;
            padding: 20px;
        }

        .navbar {
            margin-left: 250px;
            background-color: #ffffff;
            padding: 10px 20px;
        }

        .navbar .navbar-text {
            font-size: 18px;
            color: #34495e;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-logout {
            background-color: #e74c3c;
            color: white;
            border-radius: 5px;
            padding: 8px 15px;
        }

        .btn-logout:hover {
            background-color: #c0392b;
        }
    </style>
</head>

<body>
    <div class="wrapper">
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
        <div class="content-wrapper">
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
                            <i class="fas fa-user"></i> 
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
            <!-- Profile and Contact Details -->
            <div class="container d-flex align-items-start mt-5">
    <!-- Profile Card -->
    <div class="card" style="width: 30rem;">
        <img src="{{ auth()->user()->foto_perawat ? asset('storage/' . auth()->user()->foto_perawat) : asset('storage/foto_perawat/default.jpg') }}" class="card-img-top" alt="Profile Image">
        <div class="card-body text-center">
            <h5 class="card-title">{{ auth()->user()->name }}</h5>
            <p class="card-text">{{ auth()->user()->nip }}</p>
        </div>
    </div>

    <!-- Contact Details -->
    <div class="ms-4">
        <h5>Contact Information</h5>
        <p><strong>Telepon:</strong> {{ auth()->user()->telepon_perawat }}</p>
        <p><strong>Alamat:</strong> {{ auth()->user()->alamat }}</p>
        <p><strong>Email:</strong> <a href="mailto:{{ auth()->user()->email }}">{{ auth()->user()->email }}</a></p>
        <p><strong>Tanggal Lahir:</strong> {{ auth()->user()->tanggal_lahir }}</p>
        <p><strong>Gender:</strong> {{ auth()->user()->jenis_kelamin }}</p>
    </div>
</div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/navbar.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
