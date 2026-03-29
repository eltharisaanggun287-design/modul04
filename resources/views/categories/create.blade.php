@extends('layouts.app')
@section('content')
<div class="bg-white p-4 shadow rounded col-md-8 mx-auto">
    <h4 class="fw-bold mb-4">Tambah Buku Baru</h4>
    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Gambar Buku</label>
            <input type="file" name="gambar" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Kategori</label>
            <select name="category_id" class="form-select">
                @foreach($categories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->nama_kategori }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Judul Buku</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3"><label>Penulis</label><input type="text" name="penulis" class="form-control"></div>
            <div class="col-md-3 mb-3"><label>Tahun</label><input type="number" name="tahun" class="form-control"></div>
            <div class="col-md-3 mb-3"><label>Stok</label><input type="number" name="stok" class="form-control"></div>
        </div>
        <button type="submit" class="btn btn-primary px-4 shadow">Simpan Data</button>
        <a href="/books" class="btn btn-light border ms-2">Batal</a>
    </form>
</div>
@endsection