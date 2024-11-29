<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Rekam Medis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styling */
        .container {
            margin-top: 40px;
        }
        .text-title {
            font-size: 34px;
            margin-bottom: 20px;
            color: green;
        }
    </style>
</head>
<body>

<div class="container">
    <h1 class="text-title">Tambah Rekam Medis</h1>

    <!-- Success message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Rekam Medis Form -->
    <form action="{{ route('admin.medical_records.store') }}" method="POST">
        @csrf

        <!-- Pasien Dropdown -->
        <div class="form-group">
            <label for="pasien_id">Pasien</label>
            <select class="form-control @error('pasien_id') is-invalid @enderror" id="pasien_id" name="pasien_id" required>
                <option value="" disabled selected>Pilih Pasien</option>
                @foreach($pasiens as $pasien)
                    <option value="{{ $pasien->id }}" {{ old('pasien_id') == $pasien->id ? 'selected' : '' }}>
                        {{ $pasien->nama }} ({{ $pasien->no_rm }})
                    </option>
                @endforeach
            </select>
            @error('pasien_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Perawat Dropdown -->
        <div class="form-group">
            <label for="user_id">Perawat</label>
            <select class="form-control @error('user_id') is-invalid @enderror" id="user_id" name="user_id" required>
                <option value="" disabled selected>Pilih Perawat</option>
                @foreach($users as $user)  <!-- Ensure you pass the users to the view -->
                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}  <!-- Use $user->name, not $user->name -->
                    </option>
                @endforeach
            </select>
            @error('user_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Diagnosis Input -->
        <div class="form-group">
            <label for="diagnosis">Diagnosis</label>
            <textarea class="form-control @error('diagnosis') is-invalid @enderror" id="diagnosis" name="diagnosis" rows="3" required>{{ old('diagnosis') }}</textarea>
            @error('diagnosis')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Tindakan Input -->
        <div class="form-group">
            <label for="tindakan">Tindakan</label>
            <textarea class="form-control @error('tindakan') is-invalid @enderror" id="tindakan" name="tindakan" rows="3" required>{{ old('tindakan') }}</textarea>
            @error('tindakan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Tanggal Input -->
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="{{ old('tanggal') }}" required>
            @error('tanggal')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Action Buttons -->
        <div class="d-flex">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.medical_records.index') }}" class="btn btn-danger ml-2">Batal</a>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
