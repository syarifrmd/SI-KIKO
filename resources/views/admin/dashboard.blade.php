<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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

    <!-- Sidebar -->
    <div class="sidebar">
        <h3 class="text-white text-center mb-4">Admin Dashboard</h3>
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
        <!-- Main Content -->
        <div class="container-fluid">
            <h1 class="mb-4" style="font-size: 36px; font-weight: 600; color: #34495e;">Dashboard Admin</h1>

            <!-- Pasien Overview -->
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            Pasien Hari Ini
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $patientsToday }}</h5>
                            <p class="card-text">Jumlah pasien yang terdaftar hari ini.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-success text-white">
                            Pasien Bulan Ini
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $patientsThisMonth }}</h5>
                            <p class="card-text">Jumlah pasien yang terdaftar bulan ini.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-info text-white">
                            Pasien Tahun Ini
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $patientsThisYear }}</h5>
                            <p class="card-text">Jumlah pasien yang terdaftar tahun ini.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Rekam Medis Overview -->
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            Rekam Medis Hari Ini
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $recordsToday }}</h5>
                            <p class="card-text">Jumlah rekam medis yang dicatat hari ini.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-success text-white">
                            Rekam Medis Bulan Ini
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $recordsThisMonth }}</h5>
                            <p class="card-text">Jumlah rekam medis yang dicatat bulan ini.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-info text-white">
                            Rekam Medis Tahun Ini
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $recordsThisYear }}</h5>
                            <p class="card-text">Jumlah rekam medis yang dicatat tahun ini.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>

</body>
</html>
