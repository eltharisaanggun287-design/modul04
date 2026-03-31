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
    @forelse ($books as $book)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>
                <img src="{{ asset('storage/' . $book->gambar) }}" width="50">
            </td>
            <td>{{ $book->judul }}</td>
            <td>{{ $book->penulis }}</td>
            <td>{{ $book->tahun }}</td>
            <td>{{ $book->stok }}</td>
            <td>{{ $book->category->name ?? 'Tanpa Kategori' }}</td>
            <td>
                <!-- Tombol Aksi (Edit/Hapus) -->
                <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="8" class="text-center">Belum ada data buku.</td>
        </tr>
    @endforelse
</tbody>
        </table>
    </div>
</div>
</body>
</html>