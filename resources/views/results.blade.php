<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pencarian Kos</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background-color: #F8F9FA;
            color: #333;
            font-family: 'Arial', sans-serif;
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

        header .logo img {
            height: auto;
            width: 12%;
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

        .kos-item {
            border-bottom: 1px solid #ccc;
            padding: 1rem 0;
        }

        .kos-item:last-child {
            border-bottom: none;
        }

        .kos-item h3 {
            color: #007BFF;
            margin-bottom: 0.5rem;
        }

        .kos-item p {
            margin: 0.3rem 0;
        }

        a {
            color: #28A745;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        header .menu a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            font-size: 1rem;
            padding: 8px 12px;
            border-radius: 5px;
        }

        .btn-back {
            display: inline-block;
            margin-top: 1rem;
            padding: 0.8rem 1.5rem;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            font-size: 1rem;
        }

        .btn-back:hover {
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
        <div class="logo"><img src="{{asset("1.png")}}" alt=""></div>
        <div class="menu">
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('about') }}">Tentang Kami</a>
            <a href="{{ route('contact') }}">Kontak</a>
            <a href="{{ route('addKos') }}">Tambah Kos</a>
        </div>
    </header>

    <div class="container">
        <p>Hasil Pencarian Kost</p>
        @if($results->isEmpty())
            <p>Tidak ada kos yang sesuai dengan pencarian Anda.</p>
        @else
            @foreach($results as $kos)
                <div class="kos-item">
                    <h3>{{ $kos->name }}</h3>
                    <p>Alamat: {{ $kos->address }}</p>
                    <p>Tipe Kost: {{ $kos->typekost }}</p>
                    <p>Harga: Rp{{ number_format($kos->price, 0, ',', '.') }}</p>
                    <p>Fasilitas: {{ $kos->facilities }}</p>
                    <a href="{{ $kos->link }}" target="_blank">Lihat Rute di Google Maps</a>
                </div>
            @endforeach
        @endif

        <a href="{{ route('home') }}" class="btn-back">Kembali ke Survey</a>
    </div>

    <footer>
        &copy; 2025 Kostanku - Semua Hak Dilindungi
    </footer>
</body>

</html>

<script>
    const results = @json($results);
    console.log(results);
</script>
