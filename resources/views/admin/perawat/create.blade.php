<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Perawat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 40px;
        }

        /* Styling untuk ilustrasi gambar perawat */
        .image-wrapper {
            text-align: center;
        }

        .image-wrapper img {
            max-width: 250px;
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-wrapper {
            display: flex;
            flex-direction: column;
        }

        /* Styling untuk form */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-control {
            height: 45px;
        }

        .btn {
            width: 150px;
        }

        .text-tittle {
            font-size: 34px;
            margin-bottom: 20px;
            color: green;
        }

        /* Adjustments for larger screens */
        @media (min-width: 768px) {
            .row {
                display: flex;
                align-items: center;
            }

            .form-wrapper {
                flex: 1;
                margin-right: 30px;
            }

            .image-wrapper {
                flex: 1;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h1 class="text-tittle">Tambah Perawat</h1>

    <!-- Menampilkan pesan sukses jika ada -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form tambah perawat dengan dua kolom: kiri form, kanan gambar -->
    <form action="{{ route('admin.perawat.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <!-- Form Kolom Kiri -->
            <div class="col-md-6 form-wrapper">
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nip">NIP</label>
                    <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip" value="{{ old('nip') }}" required>
                    @error('nip')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="form-control @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin" name="jenis_kelamin" required>
                        <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tanggal_masuk">Tanggal Masuk</label>
                    <input type="date" class="form-control @error('tanggal_masuk') is-invalid @enderror" id="tanggal_masuk" name="tanggal_masuk" value="{{ old('tanggal_masuk') }}" required>
                    @error('tanggal_masuk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="foto_perawat">Foto Perawat</label>
                    <input type="file" class="form-control @error('foto_perawat') is-invalid @enderror" id="foto_perawat" name="foto_perawat" required>
                    @error('foto_perawat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('admin.perawat.index') }}" class="btn btn-danger ml-2">Batal</a>
                </div>
            </div>

            <!-- Gambar Ilustrasi Kolom Kanan -->
            <div class="col-md-6">
                <img style="width: 500px;" src="{{ asset('images/perawat.png') }}" alt="Ilustrasi Perawat" />
            </div>
        </div>
    </form>
</div>
<br><br>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
