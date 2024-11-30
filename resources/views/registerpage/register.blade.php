<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >
    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        /* Styling untuk dropdown */
        /* Style untuk wrapper select */
.custom-select-wrapper {
    position: relative;
    display: flex;
    align-items: center;
    border-radius: 5px;
    width: 100%;
    height: 40px;
    margin-bottom: 20px;
}

.role-select {
    border: none;
    outline: none;
    background: transparent;
    font-family: 'Poppins', sans-serif;
    font-size: 1rem;
    color: #979797;
    width: 100%;
    padding: 0 40px 0 10px; 
    appearance: none; 
    cursor: pointer;
}

.select-arrow {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 0.8rem;
    color: #aaa;
    pointer-events: none; 
}
/* Style untuk p dan a agar sejajar */
.login-link p {
    display: inline-block; /* Membuat teks inline */
    font-size: 14px; /* Sesuaikan ukuran font */
    margin: 10px 0 0; /* Tambahkan margin atas */
    color: #000; /* Warna teks hitam */
}

/* Style untuk link */
.login-link a.link {
    color: #3CB371; /* Warna hijau */
    text-decoration: none; /* Hilangkan garis bawah */
    font-weight: bold; /* Teks lebih tebal */
    margin-left: 5px; /* Jarak ke teks sebelumnya */
    transition: color 0.3s ease;
}

/* Hover effect untuk link */
.login-link a.link:hover {
    color: #2E8B57; /* Warna hijau lebih gelap saat hover */
}



    </style>
</head>
<body>
    <img class="wave" src="{{ asset('images/wave.png') }}" alt="Wave">
    <div class="container">
        <div class="img">
            <img src="{{ asset('images/bg.svg') }}" alt="Background">
        </div>
        <div class="login-content" style="margin-left: 150px">
            <form method="POST" action="{{ route('create') }}">
                @csrf
                <img src="{{ asset('images/avatar.svg') }}" alt="Avatar">
                <h2 class="title">Register</h2>

                <!-- Pesan Error -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Pesan Sukses -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Form Inputs -->
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5 class="teksinput">Name</h5>
                        <input type="text" name="name" class="input" value="{{ old('name') }}" required>
                    </div>
                </div>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="div">
                        <h5 class="teksinput">Email</h5>
                        <input type="email" name="email" class="input" value="{{ old('email') }}" required>
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5 class="teksinput">Password</h5>
                        <input type="password" name="password" class="input" required>
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5 >Confirm Password</h5>
                        <input type="password" name="password_confirmation" class="input" required>
                    </div>
                </div>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user-tag"></i>
                    </div>
                    <div class="div">
                        <div class="custom-select-wrapper">
                            <select name="role" class="input role-select" required>
                                <option value="" disabled selected hidden>Pilih Role</option>
                                <option value="admin">Admin</option>
                                <option value="perawat">Perawat</option>
                            </select>
                            <i class="fas fa-chevron-down select-arrow"></i>
                        </div>
                    </div>
                </div>
                <div class="login-link">
                    <input type="submit" class="btn" value="Register">
                    <p>Sudah punya akun?</p>
                    <p><a href="{{ route('login') }}" class="link">Login</a></p>
                </div>
                
                
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>







{{-- <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h3 class="text-center">Register</h3>

            <!-- Menampilkan Pesan Error -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Menampilkan Pesan Sukses -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Form Registrasi -->
            <form method="POST" action="{{ route('create') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required>
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select name="role" class="form-control" required>
                        <option value="admin">Admin</option>
                        <option value="perawat">Perawat</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary w-100">Register</button>
            </form>
            <div class="text-center mt-3">
                <p>Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
            </div>
        </div>
    </div>
</div> --}}
</body>
</html>
