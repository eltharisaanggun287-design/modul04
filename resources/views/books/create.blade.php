<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar-blue { background-color: #0d6efd; color: white; padding: 15px; font-weight: bold; font-size: 24px; }
        .card-container { background: white; padding: 30px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); margin-top: 20px; }
    </style>
</head>
<body class="bg-light">

<div class="navbar-blue shadow-sm">
    <div class="container">Perpustakaan</div>
</div>

<div class="container mt-4">
    <div class="card-container col-md-8 mx-auto border">
        <h2 class="mb-4 fw-bold">Tambah Buku</h2>
        
       <!-- Pastikan baris form-nya persis seperti ini -->
<form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label>Gambar Buku</label>
        <input type="file" name="gambar" class="form-control" required>
    </div>
    <!-- ... input lainnya ... -->
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
    </div>
</div>

</body>
</html>