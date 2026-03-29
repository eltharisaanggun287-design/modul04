<!DOCTYPE html>
<html>
<head>
    <title>Edit Buku</title>

    <!-- Bootstrap CDN -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container mt-5">
    <div class="card shadow p-4 mx-auto" style="max-width: 450px">
        <h4>Edit Kategori</h4>
        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label>Nama Kategori</label>
                <input type="text" name="nama_kategori" value="{{ $category->nama_kategori }}" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Update</button>
            <a href="{{ route('categories.index') }}" class="btn btn-link w-100 mt-2">Batal</a>
        </form>
    </div>
</div>