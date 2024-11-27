<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Rekam Medis</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Styles -->
    <style>
        .welcome-section {
            background-color: #32a852;
            color: white;
            padding: 60px 0;
        }
        .welcome-section h1 {
            font-size: 3rem;
            font-weight: bold;
        }
        .card {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            transition: transform 0.2s;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .btn-primary {
            background-color: #32a852;
            border: none;
        }
        .btn-primary:hover {
            background-color: #289a46;
        }
    </style>
</head>
<body>

<!-- Header -->
<header class="bg-white py-3 shadow-sm">
    <div class="container d-flex justify-content-between align-items-center">
        <div>
            <h5 class="mb-0">Sistem Manajemen Rekam Medis</h5>
            <small>RS KIKO | Manajemen Administrasi dan Rekam Medis</small>
        </div>
        <div>
            <a href="#" class="btn btn-primary">Hubungi Kami</a>
        </div>
    </div>
</header>

<!-- Welcome Section -->
<section class="welcome-section text-center">
    <div class="container">
        <h1>Selamat Datang di Sistem Manajemen Rekam Medis</h1>
        <p class="mt-4">
            Aplikasi ini dirancang untuk membantu administrasi rumah sakit dalam mengelola data pasien,
            rekam medis, dan aktivitas operasional. Mudahkan pekerjaan Anda dengan sistem terintegrasi kami.
        </p>
    </div>
</section>

<!-- Features Section -->
<section class="py-5">
    <div class="container">
        <div class="row text-center mb-4">
            <h2 class="fw-bold">Apa yang Bisa Dilakukan Aplikasi Ini?</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card p-4 text-center">
                    <div class="mb-3">
                        <i class="bi bi-person-plus-fill fs-1 text-primary"></i>
                    </div>
                    <h5>Mengelola Data Pasien</h5>
                    <p>Administrasi dapat mencatat, memperbarui, dan menghapus data pasien dengan mudah.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-4 text-center">
                    <div class="mb-3">
                        <i class="bi bi-file-medical-fill fs-1 text-primary"></i>
                    </div>
                    <h5>Input Rekam Medis</h5>
                    <p>Perawat dapat menambahkan data rekam medis pasien berdasarkan kunjungan mereka.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-4 text-center">
                    <div class="mb-3">
                        <i class="bi bi-bar-chart-fill fs-1 text-primary"></i>
                    </div>
                    <h5>Dashboard Statistik</h5>
                    <p>Dashboard memberikan data statistik jumlah pasien dan rekam medis secara real-time.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Login Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row text-center mb-4">
            <h2 class="fw-bold">Masuk ke Sistem</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card p-4 text-center">
                    <div class="mb-3">
                        <i class="bi bi-person-fill fs-1 text-primary"></i>
                    </div>
                    <h5>Login Admin</h5>
                    <p>Masuk sebagai admin untuk mengelola data dan memantau sistem.</p>
                    <a href="/login" class="btn btn-primary">Login Admin</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-4 text-center">
                    <div class="mb-3">
                        <i class="bi bi-person-badge-fill fs-1 text-primary"></i>
                    </div>
                    <h5>Login Perawat</h5>
                    <p>Masuk sebagai perawat untuk mencatat data pasien dan rekam medis.</p>
                    <a href="/login" class="btn btn-primary">Login Perawat</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-white py-3 text-center">
    <p class="mb-0">© 2024 RS KIKO. All Rights Reserved.</p>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</body>
</html>
