<header>
  <div class="logo"><img src="{{ asset('1.png') }}" alt=""></div>
  <div class="menu">
      <a href="{{ route('home') }}" class="{{ Request::is('/') ? 'active' : '' }}">Home</a>
      <a href="/tentang-kami" class="{{ Request::is('tentang-kami') ? 'active' : '' }}">Tentang Kami</a>
      <a href="/kontak" class="{{ Request::is('kontak') ? 'active' : '' }}">Kontak</a>
      <a href="{{ route('all') }}" class="{{ Request::is('semua-kos') ? 'active' : '' }}">Semua Kos</a>
      {{-- <a href="{{ route('addKos') }}" class="{{ Request::is('tambah-kos') ? 'active' : '' }}">Tambah Kos</a> --}}

      <ul class="navbar-nav mt-2">
          @auth
          <li class="nav-item dropdown" style="margin-top: -9px;">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Welcome {{ auth()->user()->name }}
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item text-dark {{ Request::is('tambah-kos') ? 'active' : '' }}" href="{{ route('addKos') }}"> Tambah Kos</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-dark {{ Request::is('kost') ? 'active' : '' }}" href="/kost"> Semua Kos</a></li>
                <li><a class="dropdown-item text-dark {{ Request::is('kost') ? 'active' : '' }}" href="#"> Dashboard</a></li>
                <li>
                  <form action="/logout" method="post">
                      @csrf
                      <button type="submit" class="dropdown-item text-dark"> Logout</button>
                  </form>
              </li>
              </ul>
            </li>
          @else
          <li class="nav-item" style="position: relative">
              <a class="{{  Str::startsWith( request()->path(), ['login', 'register'] )? 'active' : '' }}" href="/login">Admin?</a>
          </li>
          @endauth
      </ul>
  </div>
</header>