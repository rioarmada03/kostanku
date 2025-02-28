@extends('layouts.main')

@section('container')
<link rel="stylesheet" href="css/style.css">
<div class="">
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

@endsection



