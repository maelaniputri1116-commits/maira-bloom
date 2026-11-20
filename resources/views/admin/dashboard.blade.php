@extends('layouts.admin')

@section('title', 'Dashboard - MAIRA BLOOM')
@section('breadcrumb', 'Dashboard')

@section('content')

<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <div class="page-heading">Dashboard Overview</div>
        <div class="page-subtitle">
            Selamat datang kembali, {{ auth()->user()->name }}. Berikut ringkasan toko kamu.
        </div>
    </div>

    <a href="{{ route('admin.produk.create') }}" class="btn-maira">
        <i class="bi bi-plus-lg me-1"></i> Tambah Produk
    </a>
</div>

<div class="row g-3 mb-4">

    <div class="col-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between">
                <span class="text-muted small">Total Produk</span>
                <div class="stat-icon"><i class="bi bi-flower1"></i></div>
            </div>
            <div class="stat-number">{{ $totalProduk }}</div>
            <div class="text-muted small">Produk terdaftar</div>
        </div>
    </div>

    <div class="col-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between">
                <span class="text-muted small">Kategori</span>
                <div class="stat-icon"><i class="bi bi-tags"></i></div>
            </div>
            <div class="stat-number">{{ $totalKategori }}</div>
            <div class="text-muted small">Kategori bunga</div>
        </div>
    </div>

    <div class="col-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between">
                <span class="text-muted small">Total Stok</span>
                <div class="stat-icon"><i class="bi bi-box-seam"></i></div>
            </div>
            <div class="stat-number">{{ $totalStok }}</div>
            <div class="text-muted small">Unit tersedia</div>
        </div>
    </div>

    <div class="col-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between">
                <span class="text-muted small">Stok Menipis</span>
                <div class="stat-icon"><i class="bi bi-exclamation-circle"></i></div>
            </div>
            <div class="stat-number">{{ $stokMenipis }}</div>
            <div class="text-muted small">Produk dengan stok maksimal 5</div>
        </div>
    </div>

</div>

<div class="row g-4">

    <div class="col-lg-8">
        <div class="admin-panel h-100">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h5 class="mb-1">Produk Terbaru</h5>
                    <div class="page-subtitle">Lima produk terakhir yang ditambahkan</div>
                </div>

                <a href="{{ route('admin.produk.index') }}"
                   class="text-decoration-none small" style="color:#a16f78;">
                    Lihat semua <i class="bi bi-arrow-right"></i>
                </a>
            </div>

            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($produkTerbaru as $produk)
                            <tr>
                                <td class="fw-semibold">{{ $produk->nama_produk }}</td>
                                <td>{{ $produk->kategori->nama_kategori ?? '-' }}</td>
                                <td>Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                                <td>
                                    @if($produk->stok <= 5)
                                        <span class="badge text-bg-warning">{{ $produk->stok }}</span>
                                    @else
                                        <span class="badge text-bg-success">{{ $produk->stok }}</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="text-center text-muted">Belum ada produk.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="admin-panel h-100">
            <h5 class="mb-1">Quick Actions</h5>
            <p class="page-subtitle mb-4">Akses pengelolaan toko dengan cepat.</p>

            <a href="{{ route('admin.produk.create') }}"
               class="btn-maira w-100 text-center mb-3">
                <i class="bi bi-plus-circle me-2"></i>Tambah Produk Baru
            </a>

            <a href="{{ route('admin.produk.index') }}"
               class="btn btn-soft w-100 py-2 mb-3">
                <i class="bi bi-box-seam me-2"></i>Kelola Semua Produk
            </a>

            <a href="{{ route('admin.kategori.index') }}"
               class="btn btn-soft w-100 py-2">
                <i class="bi bi-tags me-2"></i>Kelola Kategori
            </a>

            <div class="rounded-3 p-3 mt-4" style="background:#f7f2e9;">
                <div class="fw-semibold mb-1">
                    <i class="bi bi-flower2 me-2"></i>MAIRA BLOOM
                </div>
                <div class="small text-muted">
                    Flowers Made With Meaning.
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
