<header>
    <div class="logo"><img src="{{ asset('1.png') }}" alt=""></div>
    <div class="menu">
        <a href="{{ route('home') }}" class="{{ Request::is('/') ? 'active' : '' }}">Home</a>
        <a href="/tentang-kami" class="{{ Request::is('tentang-kami') ? 'active' : '' }}">Tentang Kami</a>
        <a href="/kontak" class="{{ Request::is('kontak') ? 'active' : '' }}">Kontak</a>
        <a href="{{ route('addKos') }}" class="{{ Request::is('tambah-kos') ? 'active' : '' }}">Tambah Kos</a>
    </div>
</header>