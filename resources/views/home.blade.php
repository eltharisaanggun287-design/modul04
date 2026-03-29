@extends('layouts.app')
@section('content')
<div class="text-center p-5 bg-white shadow rounded border mb-5">
    <h1 class="display-4 fw-bold text-primary">Sistem Informasi Perpustakaan</h1>
    <p class="text-muted">Kelola data buku dan kategori dengan mudah secara real-time.</p>
    <a href="/books" class="btn btn-primary btn-lg px-5 shadow">Lihat Data Buku</a>
</div>

<div class="row g-4 text-center">
    <div class="col-md-6">
        <div class="card p-4 border-0 shadow-sm rounded-4">
            <i class="bi bi-book fs-1 text-primary mb-3"></i>
            <h5>Data Buku</h5>
            <a href="/books" class="btn btn-primary mt-2">Masuk</a>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card p-4 border-0 shadow-sm rounded-4">
            <i class="bi bi-tags fs-1 text-warning mb-3"></i>
            <h5>Kategori Buku</h5>
            <a href="/categories" class="btn btn-primary mt-2">Masuk</a>
        </div>
    </div>
</div>
@endsection