<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pasien</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 40px;
        }

        /* Styling untuk ilustrasi gambar pasien */
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
    <h1 class="text-tittle">Edit Pasien</h1>

    <!-- Menampilkan pesan sukses jika ada -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form Edit Pasien dengan dua kolom: kiri form, kanan gambar -->
    <form action="{{ route('admin.patients.update', $pasien->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- HTTP method override to PUT for updating -->

        <div class="row">
            <!-- Form Kolom Kiri -->
            <div class="col-md-6 form-wrapper">
                <div class="form-group">
                    <label for="nama">Nama Pasien</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $pasien->nama) }}" required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="ruangan_pasien">Ruangan Pasien</label>
                    <input type="text" class="form-control @error('ruangan_pasien') is-invalid @enderror" id="ruangan_pasien" name="ruangan_pasien" value="{{ old('ruangan_pasien', $pasien->ruangan_pasien) }}" required>
                    @error('ruangan_pasien')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $pasien->tanggal_lahir) }}" required>
                    @error('tanggal_lahir')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3" required>{{ old('alamat', $pasien->alamat) }}</textarea>
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="foto_pasien">Foto Pasien</label>
                    <input type="file" class="form-control @error('foto_pasien') is-invalid @enderror" id="foto_pasien" name="foto_pasien">
                    @error('foto_pasien')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tanggal Dibuat (created_at) -->
                <div class="form-group">
                    <label for="created_at">Tanggal Dibuat</label>
                    <input type="datetime-local" class="form-control @error('created_at') is-invalid @enderror" id="created_at" name="created_at" value="{{ old('created_at', $pasien->created_at->format('Y-m-d\TH:i')) }}" required>
                    @error('created_at')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('admin.patients.index') }}" class="btn btn-danger ml-2">Batal</a>
                </div>
            </div>

            <!-- Gambar Ilustrasi Kolom Kanan -->
            <div class="col-md-6">
                <img style="width: 500px;" src="{{ asset('images/perawat.png') }}" alt="Ilustrasi Pasien" />
            </div>
        </div>
    </form>
</div>
<br><br>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
