@extends('layouts.main')

@section('container')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>

<div class="">
    <h1>Edit Kos</h1>
    <br>

    <!-- Menampilkan pesan sukses -->
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('updateKos', $kos->id) }}">
        @csrf    
        @method('PUT')

        <div class="form-group">
            <label for="name">Nama Kos:</label>
            <input type="text" name="name" id="name" value="{{ $kos->name }}" required>
        </div>

        <div class="form-group">
            <label for="location">Lokasi Daerah Yogyakarta:</label>
            <select name="location" id="location" required>
                <option value="">Pilih Lokasi</option>
                <option value="Kota Yogyakarta" {{ $kos->location == 'Kota Yogyakarta' ? 'selected' : '' }}>Kota Yogyakarta</option>
                <option value="Sleman" {{ $kos->location == 'Sleman' ? 'selected' : '' }}>Sleman</option>
                <option value="Bantul" {{ $kos->location == 'Bantul' ? 'selected' : '' }}>Bantul</option>
                <option value="Gunungkidul" {{ $kos->location == 'Gunungkidul' ? 'selected' : '' }}>Gunungkidul</option>
                <option value="Kulon Progo" {{ $kos->location == 'Kulon Progo' ? 'selected' : '' }}>Kulon Progo</option>
            </select>
        </div>

        <div class="form-group">
            <label for="typekost">Tipe Kost:</label>
            <select name="typekost" id="typekost" required>
                <option value="">Pilih Tipe Kost</option>
                <option value="ekslusif" {{ $kos->typekost == 'ekslusif' ? 'selected' : '' }}>Ekslusif</option>
                <option value="putra" {{ $kos->typekost == 'putra' ? 'selected' : '' }}>Putra</option>
                <option value="putri" {{ $kos->typekost == 'putri' ? 'selected' : '' }}>Putri</option>
                <option value="pasutri" {{ $kos->typekost == 'pasutri' ? 'selected' : '' }}>Pasutri</option>
            </select>
        </div>

        <div class="form-group">
            <label for="price">Harga (Rp):</label>
            <input type="number" name="price" id="price" value="{{ $kos->price }}" required>
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
            <input type="url" name="link" id="link" value="{{ $kos->link }}" required>
        </div>

        <button type="submit">Update Kos</button>
    </form>
</div>
@endsection