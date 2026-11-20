
@extends('layouts.app')

@section('title', 'Our Collection - MAIRA BLOOM')

@section('content')

@php
    $gambarProduk = [
        'Rose Graduation' => 'rose-graduation.jpg',
        'Pink Blossom' => 'pink-blossom.webp',
        'Sweet Romance' => 'sweet-romance.webp',
        'White Elegance' => 'white-elegance.jpg',
        'Pastel Dream' => 'pastel-dream.jpg',
    ];
@endphp

<style>
    .collection-hero {
        background: #f7f2e9;
        padding: 65px 0;
        text-align: center;
    }

    .collection-hero h1 {
        font-size: 48px;
    }

    .collection-content {
        padding: 55px 0 80px;
    }

    .filter-box {
        background: #fff;
        border: 1px solid #eee8e4;
        border-radius: 12px;
        padding: 22px;
        margin-bottom: 30px;
    }

    .collection-card {
        background: white;
        border: 1px solid #f0e9e5;
        border-radius: 12px;
        overflow: hidden;
        height: 100%;
        transition: .3s;
    }

    .collection-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 28px rgba(70,61,61,.09);
    }

    .collection-card img {
        width: 100%;
        height: 290px;
        object-fit: cover;
    }

    .collection-info {
        padding: 18px;
    }

    .collection-category {
        color: #ad8189;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .collection-name {
        font: 600 21px 'Playfair Display', serif;
        margin: 8px 0;
    }

    .collection-price {
        font-weight: 700;
        font-size: 14px;
    }

    .filter-title {
        font: 600 20px 'Playfair Display', serif;
    }

    .pagination {
        justify-content: center;
        margin-top: 35px;
    }

    .page-link {
        color: #463d3d;
        border-color: #eee8e4;
    }

    .active > .page-link {
        background: #463d3d;
        border-color: #463d3d;
    }
</style>

<!-- HEADER -->
<section class="collection-hero">
    <div class="container">
        <div class="section-subtitle">MAIRA BLOOM COLLECTION</div>

        <h1 class="section-title mt-3">
            Our Flower Collection
        </h1>

        <p class="text-muted mt-3 mb-0">
            Temukan rangkaian bunga untuk setiap cerita dan momen istimewa.
        </p>
    </div>
</section>

<!-- COLLECTION -->
<section class="collection-content">
    <div class="container">

        <!-- FILTER -->
        <div class="filter-box">

            <div class="filter-title mb-3">
                <i class="bi bi-sliders me-2"></i>
                Find Your Flowers
            </div>

            <form action="{{ route('collection') }}" method="GET">
                <div class="row g-3">

                    <div class="col-md-6">
                        <label class="form-label small fw-semibold">
                            Search Product
                        </label>

                        <input type="text"
                               name="search"
                               class="form-control"
                               placeholder="Cari nama buket..."
                               value="{{ request('search') }}">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label small fw-semibold">
                            Category
                        </label>

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

                    <div class="col-md-2 d-flex align-items-end gap-2">
                        <button type="submit" class="btn-dark-custom w-100 text-center">
                            <i class="bi bi-search me-1"></i> Search
                        </button>
                    </div>

                </div>
            </form>

        </div>

        <!-- PRODUCT LIST -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="section-title mb-1">All Flowers</h2>
                <div class="text-muted small">
                    Menampilkan {{ $produks->count() }} dari {{ $produks->total() }} produk
                </div>
            </div>
        </div>

        <div class="row g-4">

            @forelse($produks as $produk)

                @php
                    $foto = $produk->foto
                        ? asset('storage/' . $produk->foto)
                        : asset('images/' . ($gambarProduk[$produk->nama_produk] ?? 'hero-bouquet.webp'));
                @endphp

                <div class="col-6 col-md-4 col-lg-3">

                    <div class="collection-card">

                        <a href="{{ route('product.detail', $produk->id) }}">
                            <img src="{{ $foto }}"
                                 alt="{{ $produk->nama_produk }}">
                        </a>

                        <div class="collection-info">

                            <div class="collection-category">
                                {{ $produk->kategori->nama_kategori ?? 'Flower Collection' }}
                            </div>

                            <div class="collection-name">
                                {{ $produk->nama_produk }}
                            </div>

                            <div class="collection-price">
                                Rp {{ number_format($produk->harga, 0, ',', '.') }}
                            </div>

                            <div class="small text-muted mt-2">
                                @if($produk->stok > 0)
                                    <i class="bi bi-check-circle text-success"></i>
                                    Tersedia
                                @else
                                    <i class="bi bi-x-circle text-danger"></i>
                                    Stok habis
                                @endif
                            </div>

                            <a href="{{ route('product.detail', $produk->id) }}"
                               class="btn btn-outline-dark btn-sm rounded-pill w-100 mt-3">
                                View Details
                            </a>

                        </div>
                    </div>

                </div>

            @empty

                <div class="col-12 text-center py-5">
                    <i class="bi bi-flower1 display-4 text-muted"></i>

                    <h4 class="section-title mt-3">
                        Produk Tidak Ditemukan
                    </h4>

                    <p class="text-muted">
                        Coba gunakan kata kunci atau kategori yang berbeda.
                    </p>

                    <a href="{{ route('collection') }}" class="btn-dark-custom">
                        Lihat Semua Produk
                    </a>
                </div>

            @endforelse

        </div>

        <!-- PAGINATION -->
        <div>
            {{ $produks->links() }}
        </div>

    </div>
</section>

@endsection
