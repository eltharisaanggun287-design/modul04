<!DOCTYPE html>
<html>
<head>
    <title>Daftar Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
    <div class="container">
        <div class="d-flex justify-content-between mb-3">
            <h3>Daftar Koleksi Buku</h3>
            <a href="{{ route('books.create') }}" class="btn btn-primary"> + Tambah Buku Baru</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $b)
                <tr>
                    <td>{{ $b->judul }}</td>
                    <td>{{ $b->penulis }}</td>
                    <td>{{ $b->penerbit }}</td>
                    <td>{{ $b->tahun_terbit }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>