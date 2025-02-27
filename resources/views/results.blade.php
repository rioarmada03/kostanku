@extends('layouts.main')

@section('container')
<link rel="stylesheet" href="css/style.css">
<div class="mb-5">
    <h1>Hasil Pencarian Kost</h1>
    @if($results->isEmpty())
        <p>Tidak ada kos yang sesuai dengan pencarian Anda.</p>
    @else
    <br>
        @foreach($results as $kos)
            <div class="kos-item">
                <h3>{{ $kos->name }}</h3>
                <p>Alamat: {{ $kos->address }}</p>
                <p>Tipe Kost: {{ $kos->typekost }}</p>
                <p>Harga: Rp{{ number_format($kos->price, 0, ',', '.') }}</p>
                <p>Fasilitas: {{ $kos->facilities }}</p>
                <a href="{{ $kos->link }}" target="_blank" style="text-decoration: none;">Lihat Rute di Google Maps</a>
            </div>
            <br>
        @endforeach
    @endif
    <br>
    <a href="{{ route('home') }}" class="button">Kembali ke Survey</a>
</div>

@endsection

<script>
    const results = @json($results);
    console.log(results);
</script>
