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
    <div class="content-wrapper">
        <!-- Navbar atas -->
        <nav style="width: 300px; float: right;" class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <span class="navbar-text">
                    <strong>{{ auth()->user()->name }}</strong>
                </span>
                <div class="ml-auto">
                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="container-fluid">
            <h1 class="mb-4">Dashboard Admin</h1>
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

            <!-- Rekam Medis -->
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
