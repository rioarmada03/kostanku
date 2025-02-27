<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styl.css">
</head>

<body>
    <!-- Navbar -->
    @include('partials.navbar')


    <div class="container mt-4">
        @yield('container')
    </div>

    <footer>&copy; 2025 Kostanku - Semua Hak Dilindungi</footer>
</body>

</html>