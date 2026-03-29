<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="bg-primary text-white p-3 shadow-sm mb-4">
    <div class="container fw-bold h4 mb-0">Perpustakaan</div>
</div>

<div class="container">
    <div class="card shadow-sm border-0 p-4">
        <h2 class="fw-bold">Data Buku</h2> <!-- Judul harus Data Buku -->
        <p class="text-muted">Total Buku: {{ $books->count() }}</p>

        <div class="d-flex justify-content-end mb-3">
            <a href="{{ url('/') }}" class="btn btn-outline-secondary me-2">Home</a>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary me-2">Data Category</a>
            <a href="{{ route('books.create') }}" class="btn btn-primary">+ Tambah Buku</a>
        </div>

        <table class="table table-bordered align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $key => $book)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>
                        @if($book->gambar)
                            <!-- PEMANGGILAN GAMBAR YANG BENAR -->
                            <img src="{{ asset('images/books/' . $book->gambar) }}" width="70" class="rounded shadow-sm">
                        @else
                            <span class="text-muted">No Image</span>
                        @endif
                    </td>
                    <td class="text-start fw-bold">{{ $book->judul }}</td>
                    <td>{{ $book->penulis }}</td>
                    <td><span class="badge bg-success">{{ $book->category->nama_kategori }}</span></td>
                    <td>
                        <button class="btn btn-warning btn-sm">Edit</button>
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>