<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Registrasi Pasien</title>
    <link rel="stylesheet" href="stylesheet.css" />
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to bottom right, #4facfe, #00f2fe);
            color: #333;
        }

        header {
            text-align: center;
            margin: 2em auto;
            color: white;
        }

        header h1 {
            font-size: 2.5em;
            font-weight: bold;
        }

        header p {
            font-size: 1.1em;
            margin-top: 0.5em;
        }

        main {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2em;
        }

        form {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            padding: 2em;
        }

        fieldset {
            border: none;
            margin-bottom: 1.5em;
        }

        label {
            display: flex;
            flex-direction: column;
            font-size: 1em;
            margin-bottom: 1em;
        }

        label span {
            font-weight: 600;
            margin-bottom: 0.5em;
        }

        input, textarea, select {
            padding: 0.8em;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 1em;
            background: #f9f9f9;
        }

        textarea {
            resize: none;
        }

        input[type="file"] {
            background: #f9f9f9;
            border: none;
        }

        button {
            background: linear-gradient(to right, #4facfe, #00f2fe);
            color: white;
            border: none;
            padding: 0.8em 1em;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.2em;
            text-align: center;
            transition: all 0.3s;
        }

        button:hover {
            opacity: 0.9;
            transform: scale(1.05);
        }

        .terms {
            font-size: 0.9em;
            margin-bottom: 1.5em;
        }

        .terms a {
            color: #4facfe;
            text-decoration: none;
            font-weight: bold;
        }

        .terms a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <header>
        <h1>Formulir Registrasi Pasien</h1>
        <p>Lengkapi formulir di bawah ini untuk registrasi Anda</p>
    </header>
    <main>
        <form method="POST" action="save_to_db.php" enctype="multipart/form-data">
            <fieldset>
                <label for="nama">
                    <span>Nama Lengkap</span>
                    <input id="nama" name="nama" type="text" required />
                </label>
                <label for="alamat">
                    <span>Alamat</span>
                    <input id="alamat" name="alamat" type="text" required />
                </label>
                <label for="umur">
                    <span>Umur</span>
                    <input id="umur" name="umur" type="number" required />
                </label>
                <label for="jenisKelamin">
                    <span>Jenis Kelamin</span>
                    <select id="jenisKelamin" name="jenisKelamin" required>
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </label>
            </fieldset>
            <fieldset>
                <label for="bio">
                    <span>Keluhan Anda</span>
                    <textarea id="bio" name="bio" rows="4" placeholder="Tuliskan keluhan Anda..." required></textarea>
                </label>
                <label for="fotoKtp">
                    <span>Unggah Foto Identitas</span>
                    <input id="fotoKtp" type="file" name="file" required />
                </label>
                <label for="referrer">
                    <span>Metode Pembayaran</span>
                    <select id="referrer" name="referrer" required>
                        <option value="">(Pilih Salah Satu)</option>
                        <option value="Tunai">Tunai</option>
                        <option value="Transfer Bank">Transfer Bank</option>
                        <option value="E Wallet">E Wallet</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </label>
            </fieldset>
            <div class="terms">
                <label for="setujuAturan">
                    <input id="setujuAturan" type="checkbox" required name="setujuAturan" />
                    <a>Saya menyetujui aturan yang berlaku</a>
                </label>
            </div>
            <button type="submit">Daftar</button>
        </form>
    </main>
</body>
</html>