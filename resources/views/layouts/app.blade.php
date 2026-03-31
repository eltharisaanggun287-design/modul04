<!DOCTYPE html>
<html>
<head>
    <title>Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm mb-4">
    <div class="container d-flex justify-content-between align-items-center">
        <a class="navbar-brand" href="{{ url('/home') }}">Perpustakaan</a>

        <!-- MASUKKAN CODING INI -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger btn-sm">Logout</button>
        </form>
        
    </div>
</nav>

<!-- Bagian ini untuk menampilkan isi dari home.blade.php -->
<div class="container">
    @yield('content')
</div>