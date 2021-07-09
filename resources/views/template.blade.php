<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <title>Home</title>
</head>
<body>
    <div class="header">
        <header><h2>SMK INDONESIA</h2></header>
    </div>
    <div class="navbar">
        <ul>
        @guest
            <li><a href="{{ route('index') }}">Home</a></li>
            <li><a href="{{ route('home.siswa') }}">Data Siswa</a></li>
            <li><a href="{{ route('home.guru') }}">Data Guru</a></li>
            <li><a href="{{ route('home.nilai') }}">Data Nilai</a></li>
            <li><a href="#">Galeri</a></li>
        @endguest
        @auth
            <li><a href="{{ route('index') }}">Manajemen Admin</a></li>
            <li><a href="{{ route('student.index') }}">Manajemen Siswa</a></li>
            <li><a href="{{ route('teacher.index') }}">Manajemen Guru</a></li>
            <li><a href="{{ route('classroom.index') }}">Manajemen Kelas</a></li>
            <li><a href="{{ route('subject.index') }}">Manajemen Mapel</a></li>
            <li><a href="{{ route('major.index') }}">Manajemen Jurusan</a></li>
            <li><a href="{{ route('teaching.index') }}">Manajemen Mengajar</a></li>
            <li><a href="{{ route('grade.index') }}">Manajemen Nilai</a></li>
            <li>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </li>
        @endauth
        </ul>
    </div>
    <div class="sidebar">
        @auth
        <h1>Selamat datang, {{ auth()->user()->username }}</h1>
        @endauth
        @guest
        <h1>Login</h1>
        <div class="form">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <input class="input" type="text" name="username" placeholder="Username">
                <br>
                <input class="input" type="password" name="password" placeholder="Password">
                <br>
                <button class="btn" type="submit">Login</button>
            </form>
        </div>
        @endguest
        <div class="gambar">
            <img src="/img.png" width="200px">
        </div>
    </div>
    <div class="container">
        @yield('content')
    </div>
    <div class="footer">
        <footer>SMK INDONESIA</footer>
    </div>
</body>
</html>
