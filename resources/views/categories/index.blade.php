<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body class="bg-light">

<div class="bg-primary text-white p-3 shadow-sm mb-4">
    <div class="container h4 mb-0">Perpustakaan</div>
</div>

<div class="container">
    <div class="card shadow-sm border-0 p-4">
        <h2 class="fw-bold">Data Buku</h2>
        <p class="text-muted">Total Buku Tersedia: {{ $books->count() }}</p>

        <div class="d-flex justify-content-end mb-3">
            <a href="{{ url('/') }}" class="btn btn-outline-secondary me-2">Home</a>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary me-2">Data Category</a>
            <a href="{{ route('books.create') }}" class="btn btn-primary">+ Tambah Buku</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th width="50">No</th>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Tahun</th>
                    <th>Stok</th>
                    <th>Kategori</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($books as $key => $book)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>
                        @if($book->gambar)
                            <!-- PEMANGGILAN GAMBAR DISINI -->
                            <img src="{{ asset('images/books/'.$book->gambar) }}" width="60" class="rounded shadow-sm">
                        @else
                            <span class="text-muted">No Image</span>
                        @endif
                    </td>
                    <td class="text-start">{{ $book->judul }}</td>
                    <td>{{ $book->penulis }}</td>
                    <td>{{ $book->tahun }}</td>
                    <td><span class="badge bg-info text-dark">{{ $book->stok }}</span></td>
                    <td><span class="badge bg-success">{{ $book->category->nama_kategori }}</span></td>
                    <td>
                        <button class="btn btn-warning btn-sm">Edit</button>
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center text-muted py-4">Belum ada data buku.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

</body>
</html>