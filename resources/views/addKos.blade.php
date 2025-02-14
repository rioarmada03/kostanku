<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kos</title>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #F8F9FA;
            color: #333;
        }

        /* Navbar */
        header {
            background-color: #007BFF;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        header .logo img{
            height: auto;
            width: 12%;
        }

        header .menu a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            font-size: 1rem;
            padding: 8px 12px;
            border-radius: 5px;
        }

        header .menu a:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        /* Container Form */
        .container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 1.5rem;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 10%;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        input,
        select {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
        }

        /* Checkbox Container */
        .checkbox-group {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .checkbox-group label {
            display: flex;
            align-items: center;
            flex: 1 1 calc(25% - 10px);
            /* 4 Kolom per baris */
        }

        input[type="checkbox"] {
            margin-right: 8px;
            width: auto;
        }

        button {
            background-color: #007BFF;
            color: #fff;
            padding: 0.8rem 1.5rem;
            font-size: 1rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        footer {
            text-align: center;
            margin-top: 2rem;
            padding: 1rem 0;
            background-color: #F8F9FA;
            font-size: 0.9rem;
            color: #666;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <header>
        <div class="logo"><img src="{{ asset("1.png")}}" alt=""></div>
        <div class="menu">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('about') }}">Tentang Kami</a>
            <a href="{{ route('contact') }}">Kontak</a>
            <a href="{{ route('addKos') }}">Tambah Kos</a>
        </div>
    </header>

    <div class="container">
        <h1>Tambah Kos</h1>
        <br>

        <!-- Menampilkan pesan sukses -->
        @if(session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif

        <form method="POST" action="{{ route('storeKos') }}">
            @csrf

            <div class="form-group">
                <label for="name">Nama Kos:</label>
                <input type="text" name="name" id="name" required>
            </div>

            <div class="form-group">
                <label for="location">Lokasi Daerah Yogyakarta:</label>
                <select name="location" id="location" required>
                    <option value="">Pilih Lokasi</option>
                    <option value="Kota Yogyakarta">Kota Yogyakarta</option>
                    <option value="Sleman">Sleman</option>
                    <option value="Bantul">Bantul</option>
                    <option value="Gunungkidul">Gunungkidul</option>
                    <option value="Kulon Progo">Kulon Progo</option>
                </select>
            </div>

            <div class="form-group">
                <label for="typekost">Tipe Kost:</label>
                <select name="typekost" id="typekost" required>
                    <option value="">Pilih Tipe Kost</option>
                    <option value="ekslusif">Ekslusif</option>
                    <option value="putra">Putra</option>
                    <option value="putri">Putri</option>
                    <option value="pasutri">Pasutri</option>
                </select>
            </div>

            <div class="form-group">
                <label for="price">Harga (Rp):</label>
                <input type="number" name="price" id="price" required>
            </div>

            <div class="form-group">
                <label>Fasilitas:</label>
                <div class="checkbox-group">
                    <label><input type="checkbox" name="facilities[]" value="AC"> AC</label>
                    <label><input type="checkbox" name="facilities[]" value="Kamar Mandi Dalam"> Kamar Mandi Dalam</label>
                    <label><input type="checkbox" name="facilities[]" value="Lemari Pakaian">Lemari Pakaian</label>
                    <label><input type="checkbox" name="facilities[]" value="Meja Rias">Meja Rias</label>
                    <label><input type="checkbox" name="facilities[]" value="Water Heater">Water Heater</label>
                    <label><input type="checkbox" name="facilities[]" value="Hewan Peliharaan">Hewan Peliharaan</label>
                    <label><input type="checkbox" name="facilities[]" value="Smart TV"> TV</label>
                    <label><input type="checkbox" name="facilities[]" value="Kasur"> Kasur</label>
                    <label><input type="checkbox" name="facilities[]" value="Meja Belajar">Meja Belajar</label>
                    <label><input type="checkbox" name="facilities[]" value="Shower">Shower</label>
                    <label><input type="checkbox" name="facilities[]" value="Cermin">Cermin</label>
                    <label><input type="checkbox" name="facilities[]" value="Jendela">Jendela</label>

                    <label><input type="checkbox" name="facilities[]" value="Wifi"> Wifi</label>
                    <label><input type="checkbox" name="facilities[]" value="Dapur Bersama"> Dapur Bersama</label>
                    <label><input type="checkbox" name="facilities[]" value="Parkir Motor"> Parkir Motor</label>
                    <label><input type="checkbox" name="facilities[]" value="Parkir Mobil"> Parkir Mobil</label>
                    <label><input type="checkbox" name="facilities[]" value="Kamar Mandi Bersama"> Kamar Mandi Bersama</label>
                    <label><input type="checkbox" name="facilities[]" value="Listrik"> Listrik</label>
                    <label><input type="checkbox" name="facilities[]" value="Air"> Air</label>
                    <label><input type="checkbox" name="facilities[]" value="Mesin Cuci"> Mesin Cuci</label>

                    <label><input type="checkbox" name="facilities[]" value="Bebas Sopan"> Bebas Sopan</label>
                    <label><input type="checkbox" name="facilities[]" value="Tidak Berisik"> Tidak Berisik</label>
                    <label><input type="checkbox" name="facilities[]" value="Akses 24 Jam"> Akses 24 Jam</label>
                    <label><input type="checkbox" name="facilities[]" value="Non 24 Jam"> Non 24 Jam</label>
                </div>
            </div>

            <div class="form-group">
                <label for="link">Link Google Maps:</label>
                <input type="url" name="link" id="link" required placeholder="Masukkan link Google Maps">
            </div>

            <button type="submit">Tambah Kos</button>
        </form>
    </div>

    <footer>&copy; 2025 Kostanku - Semua Hak Dilindungi</footer>

</body>

</html>