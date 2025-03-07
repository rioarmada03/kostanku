@extends('layouts.main')

@section('container')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <div class="mb-5">
        <h1>Daftar Kost</h1>
        <br>
        <a href="{{ route('home') }}" class="button" style="text-decoration: none;">Cari Kos</a>
        @if($kos->isEmpty())
            <p>Tidak ada kos yang sesuai dengan pencarian Anda.</p>
        @else
        <br>
        <br>
            @foreach($kos as $kost)
                <div class="kos-item">
                    <h3>{{ $kost->name }}</h3>
                    <p>Alamat: {{ $kost->address }}</p>
                    <p>Tipe Kost: {{ $kost->typekost }}</p>
                    <p>Harga: Rp{{ number_format($kost->price, 0, ',', '.') }}</p>
                    <p>Fasilitas: {{ $kost->facilities }}</p>
                    <a href="{{ route('editKos', $kost->id) }}" class="btn btn-warning">Edit</a>

                    <form action="{{ route('destroyKos', $kost->id) }}" method="POST"style="display:inline;" >
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Hapus</button>
                    </form>
                    <p><a href="{{ $kost->link }}" target="_blank" style="text-decoration: none;" class="btn btn-primary mt-3">Lihat Rute di Google Maps</a></p>
                    
                </div>
                <hr>
                <br>
            @endforeach
        @endif
        <br>
        <a href="{{ route('home') }}" class="button" style="text-decoration: none;">Kembali ke Survey</a>
    </div>

    {{ $kos->links() }}
@endsection
