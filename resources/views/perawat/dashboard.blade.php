<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Pasien</title>
    <link rel="stylesheet" href="https://cdn.lineicons.com/4.0/lineicons.css"  />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"  integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<style>
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

        .card-header {
            background-color: #34495e;
            color: #ffffff;
            border-radius: 10px 10px 0 0;
        }

        .card-body {
            background-color: #ecf0f1;
            border-radius: 0 0 10px 10px;
        }

        .card-title {
            font-size: 30px;
            font-weight: bold;
            color: #2c3e50;
        }

        .card-text {
            color: #7f8c8d;
        }

        /* Custom logout button */
        .btn-logout {
            background-color: #e74c3c;
            color: white;
            border-radius: 5px;
            padding: 8px 15px;
        }

        .btn-logout:hover {
            background-color: #c0392b;
        }

        .navbar-text strong {
            color: #2c3e50;
        }
</style>
</head>
<body>
    <div class="wrapper"> 
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
        <!--MAIN-->
    <div class="container d-flex align-items-start mt-5">
    <!-- Profile Card -->
    <div class="card" style="width: 30rem;">
        <img src="{{ auth()->user()->foto_perawat }}" class="card-img-top" alt="Profile Image">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="{{asset('js/navbar.js')}}" type="text/javascript" ></script>
</body>

</html>