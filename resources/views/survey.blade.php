<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey Pencarian Kos</title>
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
            /* Warna abu-abu terang */
            color: #333;
        }

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
        select .facilities-checkboxes {
            width: 10%;
            padding: 0.8rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
        }

        input,
        select {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
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

        .checkbox-container {
            display: flex;
            flex-wrap: wrap;
            /* Supaya elemen pindah ke baris baru jika melebihi jumlah */
            gap: 10px;
            /* Jarak antar checkbox */
        }

        .checkbox-container div {
            flex: 1 1 calc(25% - 10px);
            /* Setiap checkbox menempati 25% lebar (4 per baris) */
            display: flex;
            align-items: center;
        }

        /* Styling untuk Checkbox dan Label */
        input[type="checkbox"] {
            margin: 0px;
            width: 10%;
            /* Jarak antara kotak checkbox dan label */
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
        <div class="logo"><img src="{{ asset('1.png') }}">
        </div>
        <div class="menu">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('about') }}">Tentang Kami</a>
            <a href="{{ route('contact') }}">Kontak</a>
            <a href="{{ route('addKos') }}">Tambah Kos</a>
        </div>
    </header>

    <div class="container">
        <form method="POST" action="{{ route('search') }}">
            @csrf

            <!-- Input Lokasi -->
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

            <!-- Input Type Kost -->
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


            <!-- Input Harga Maksimal -->
            <div class="form-group">
                <label for="price">Harga Maksimal:</label>
                <input type="number" name="price" id="price" placeholder="Masukkan harga maksimal (contoh: 1500000)" required>
            </div>


            <!-- Dropdown Kategori -->
            <div class="form-group">
                <label for="category">Kategori Fasilitas:</label>
                <select id="category" name="category" required>
                    <option value="">Pilih Kategori</option>
                    @foreach(array_keys($facilitiesByCategory) as $category)
                        <option value="{{ $category }}">{{ $category }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Checkbox Fasilitas -->
            <div class="form-group">
                <label for="facilities">Fasilitas:</label>
                <div id="facilities-checkboxes" class="checkbox-container">
                    <!-- Checkbox akan diperbarui berdasarkan kategori -->
                </div>
            </div>

            <!-- Tombol Submit -->
            <button type="submit">Cari Kos</button>
        </form>
    </div>

    <footer>&copy; 2025 Kostanku - Semua Hak Dilindungi</footer>

    <script>
        // Data fasilitas berdasarkan kategori
        const facilitiesByCategory = @json($facilitiesByCategory);

        // Menyimpan fasilitas yang dipilih untuk setiap kategori
        let selectedFacilities = {
            "Fasilitas Kamar": new Set(),
            "Fasilitas Umum": new Set(),
            "Lingkungan": new Set()
        };

        // Ambil elemen dropdown dan container checkbox
        const categoryDropdown = document.getElementById('category');
        const facilitiesContainer = document.getElementById('facilities-checkboxes');

        // Event listener saat kategori berubah
        categoryDropdown.addEventListener('change', function () {
            const selectedCategory = this.value;

            // Hapus semua checkbox sebelum mengganti kategori
            facilitiesContainer.innerHTML = '';

            // Jika kategori dipilih, tampilkan checkbox yang sesuai
            if (facilitiesByCategory[selectedCategory]) {
                facilitiesByCategory[selectedCategory].forEach(facility => {
                    const checkbox = document.createElement('input');
                    checkbox.type = 'checkbox';
                    checkbox.name = 'facilities[]';
                    checkbox.value = facility;
                    checkbox.id = facility;

                    // Set status checkbox sesuai dengan data sebelumnya
                    if (selectedFacilities[selectedCategory].has(facility)) {
                        checkbox.checked = true;
                    }

                    // Tambahkan event listener untuk menyimpan status checkbox
                    checkbox.addEventListener('change', function () {
                        if (this.checked) {
                            selectedFacilities[selectedCategory].add(this.value);
                        } else {
                            selectedFacilities[selectedCategory].delete(this.value);
                        }
                    });

                    // Buat label untuk checkbox
                    const label = document.createElement('label');
                    label.htmlFor = facility;
                    label.textContent = facility;

                    // Bungkus checkbox dan label dalam div
                    const div = document.createElement('div');
                    div.classList.add("checkbox-group");
                    div.appendChild(checkbox);
                    div.appendChild(label);

                    // Tambahkan ke container
                    facilitiesContainer.appendChild(div);
                });
            }
        });

    </script>
</body>

</html>