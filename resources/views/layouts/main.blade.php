<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styl.css">
</head>

<body>
    <!-- Navbar -->
    <header>
        <div class="logo"><img src="{{ asset('1.png') }}" alt=""></div>
        <div class="menu">
            <a href="{{ route('home') }}" class="{{ Request::is('/') ? 'active' : '' }}">Home</a>
            <a href="/tentang-kami" class="{{ Request::is('tentang-kami') ? 'active' : '' }}">Tentang Kami</a>
            <a href="/kontak" class="{{ Request::is('kontak') ? 'active' : '' }}">Kontak</a>
            <a href="{{ route('addKos') }}" class="{{ Request::is('tambah-kos') ? 'active' : '' }}">Tambah Kos</a>
        </div>
    </header>
    

    <div class="container mt-4">
        @yield('container')
    </div>

    <footer>&copy; 2025 Kostanku - Semua Hak Dilindungi</footer>
</body>

</html>