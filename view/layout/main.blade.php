<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Penilaian Siswa</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    @include('partials.header')

    <div class="menu">
        <a href="/home" class="active">Home</a>
        @if (session('role') == 'admin')
            <a href="/guru/index">Guru</a>
            <a href="/kelas/index">Kelas</a>
            <a href="/siswa/index">Siswa</a>
            <a href="/mapel/index">Mapel</a>
            <a href="/mengajar/index">Mengajar</a>
        @else
            <a href="/nilai/index">Nilai</a>
        @endif
            <a href="/logout">Logout</a>
    </div>

    <div class="content">
        @yield('content')
    </div>

    @include('partials.footer')
</body>
    <script src="/js/script.js"></script>
</html>
