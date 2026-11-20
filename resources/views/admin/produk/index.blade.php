
@extends('layouts.admin')

@section('title', 'Kelola Produk - MAIRA BLOOM')
@section('breadcrumb', 'Kelola Produk')

@section('content')

@php
    $gambarDefault = [
        'Rose Graduation' => 'rose-graduation.jpg',
        'Pink Blossom' => 'pink-blossom.webp',
        'Sweet Romance' => 'sweet-romance.webp',
        'White Elegance' => 'white-elegance.jpg',
        'Pastel Dream' => 'pastel-dream.jpg',
    ];
@endphp

<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
    <div>
        <div class="page-heading">Kelola Produk</div>
        <div class="page-subtitle">Atur katalog, harga, stok, dan foto produk bunga.</div>
    </div>

    <a href="{{ route('admin.produk.create') }}" class="btn-maira">
        <i class="bi bi-plus-lg me-1"></i> Tambah Produk
    </a>
</div>

<div class="row g-3 mb-4">
    <div class="col-sm-6 col-lg-4">
        <div class="stat-card">
            <div class="text-muted small">Total Produk</div>
            <div class="stat-number">{{ $produks->total() }}</div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-4">
        <div class="stat-card">
            <div class="text-muted small">Kategori Tersedia</div>
            <div class="stat-number">{{ $kategoris->count() }}</div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-4">
        <div class="stat-card">
            <div class="text-muted small">Produk Stok Menipis</div>
            <div class="stat-number">
                {{ \App\Models\Produk::where('stok', '<=', 5)->count() }}
            </div>
        </div>
    </div>
</div>

<div class="admin-panel">

    <form method="GET" action="{{ route('admin.produk.index') }}"
          class="row g-2 mb-4">

        <div class="col-md-6">
            <input type="text" name="search" class="form-control"
                   placeholder="Cari nama produk..."
                   value="{{ request('search') }}">
        </div>

        <div class="col-md-4">
            <select name="kategori" class="form-select">
                <option value="">Semua Kategori</option>
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}"
                        {{ request('kategori') == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-2 d-flex gap-2">
            <button class="btn-maira flex-fill">
                <i class="bi bi-search"></i> Cari
            </button>
            <a href="{{ route('admin.produk.index') }}"
               class="btn btn-soft" title="Reset">
                <i class="bi bi-arrow-counterclockwise"></i>
            </a>
        </div>
    </form>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0">Daftar Produk</h5>
        <span class="small text-muted">{{ $produks->total() }} data</span>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Status</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($produks as $produk)
                    @php
                        $foto = $produk->foto
                            ? asset('storage/' . $produk->foto)
                            : asset('images/' . ($gambarDefault[$produk->nama_produk] ?? 'hero-bouquet.webp'));
                    @endphp

                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <img src="{{ $foto }}" class="product-thumb"
                                     alt="{{ $produk->nama_produk }}">

                                <div>
                                    <div class="fw-semibold">{{ $produk->nama_produk }}</div>
                                    <div class="text-muted small">
                                        {{ $produk->warna_bunga ?? 'Warna tidak diatur' }}
                                    </div>
                                </div>
                            </div>
                        </td>

                        <td>{{ $produk->kategori->nama_kategori ?? '-' }}</td>

                        <td class="fw-semibold">
                            Rp {{ number_format($produk->harga, 0, ',', '.') }}
                        </td>

                        <td>
                            @if($produk->stok <= 5)
                                <span class="badge text-bg-warning">{{ $produk->stok }} tersisa</span>
                            @else
                                <span class="badge text-bg-success">{{ $produk->stok }}</span>
                            @endif
                        </td>

                        <td>
                            @if($produk->stok > 0)
                                <span class="text-success small">● Tersedia</span>
                            @else
                                <span class="text-danger small">● Habis</span>
                            @endif
                        </td>

                        <td class="text-end">
                            <a href="{{ route('admin.produk.edit', $produk->id) }}"
                               class="btn btn-sm btn-soft" title="Edit">
                                <i class="bi bi-pencil-square"></i>
                            </a>

                            <form action="{{ route('admin.produk.destroy', $produk->id) }}"
                                  method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-sm btn-outline-danger" title="Hapus">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">
                            <i class="bi bi-flower1 fs-2 d-block mb-2"></i>
                            Produk belum ditemukan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $produks->links() }}
    </div>

</div>

@endsection
