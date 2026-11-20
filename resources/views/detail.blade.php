
@extends('layouts.app')

@section('title', $produk->nama_produk . ' - MAIRA BLOOM')

@section('content')

@php
    $gambarProduk = [
        'Rose Graduation' => 'rose-graduation.jpg',
        'Pink Blossom' => 'pink-blossom.webp',
        'Sweet Romance' => 'sweet-romance.webp',
        'White Elegance' => 'white-elegance.jpg',
        'Pastel Dream' => 'pastel-dream.jpg',
    ];

    $foto = $produk->foto
        ? asset('storage/' . $produk->foto)
        : asset('images/' . ($gambarProduk[$produk->nama_produk] ?? 'hero-bouquet.webp'));

    $nomorWhatsApp = '6281234567890';

    $pesanWhatsApp = 'Halo MAIRA BLOOM, saya tertarik dengan produk '
        . $produk->nama_produk
        . '. Apakah produk ini masih tersedia?';

    $linkWhatsApp = 'https://wa.me/' . $nomorWhatsApp
        . '?text=' . urlencode($pesanWhatsApp);
@endphp

<style>
    .detail-section {
        padding: 55px 0 75px;
    }

    .detail-main-image {
        width: 100%;
        height: 540px;
        object-fit: cover;
        border-radius: 14px;
        background: #f7f2e9;
    }

    .detail-category {
        color: #ad8189;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-size: 12px;
    }

    .detail-title {
        font-size: 43px;
        line-height: 1.2;
        margin: 15px 0;
    }

    .detail-price {
        font: 600 29px 'Playfair Display', serif;
        margin: 20px 0;
    }

    .detail-description {
        color: #817575;
        line-height: 2;
        font-size: 14px;
    }

    .detail-info {
        background: #f7f2e9;
        padding: 20px;
        border-radius: 12px;
        margin: 25px 0;
    }

    .detail-info-item {
        display: flex;
        justify-content: space-between;
        padding: 10px 0;
        border-bottom: 1px solid #e9dfd6;
        font-size: 13px;
    }

    .detail-info-item:last-child {
        border-bottom: 0;
    }

    .btn-whatsapp {
        display: block;
        background: #463d3d;
        color: white;
        padding: 14px;
        border-radius: 30px;
        text-decoration: none;
        text-align: center;
        transition: .3s;
    }

    .btn-whatsapp:hover {
        background: #a8b8a0;
        color: #463d3d;
    }

    .recommend-image {
        width: 100%;
        height: 230px;
        object-fit: cover;
        border-radius: 10px;
    }

    .recommend-card {
        color: #463d3d;
        text-decoration: none;
    }

    .recommend-card:hover {
        color: #ad8189;
    }

    @media(max-width:767px) {
        .detail-main-image {
            height: 390px;
        }

        .detail-title {
            font-size: 34px;
        }
    }
</style>

<section class="detail-section">
    <div class="container">

        <!-- BREADCRUMB -->
        <div class="small text-muted mb-4">
            <a href="{{ route('home') }}" class="text-decoration-none text-muted">
                Home
            </a>

            <i class="bi bi-chevron-right mx-2"></i>

            <a href="{{ route('collection') }}" class="text-decoration-none text-muted">
                Collection
            </a>

            <i class="bi bi-chevron-right mx-2"></i>

            <span>{{ $produk->nama_produk }}</span>
        </div>

        <!-- PRODUCT DETAIL -->
        <div class="row g-5 align-items-start">

            <div class="col-lg-6">
                <img src="{{ $foto }}"
                     alt="{{ $produk->nama_produk }}"
                     class="detail-main-image">
            </div>

            <div class="col-lg-6">

                <div class="detail-category">
                    {{ $produk->kategori->nama_kategori ?? 'Flower Collection' }}
                </div>

                <h1 class="section-title detail-title">
                    {{ $produk->nama_produk }}
                </h1>

                <div class="detail-price">
                    Rp {{ number_format($produk->harga, 0, ',', '.') }}
                </div>

                <p class="detail-description">
                    {{ $produk->deskripsi }}
                </p>

                <div class="detail-info">

                    <div class="detail-info-item">
                        <span class="text-muted">Kategori</span>
                        <strong>
                            {{ $produk->kategori->nama_kategori ?? '-' }}
                        </strong>
                    </div>

                    <div class="detail-info-item">
                        <span class="text-muted">Warna Bunga</span>
                        <strong>{{ $produk->warna_bunga ?? '-' }}</strong>
                    </div>

                    <div class="detail-info-item">
                        <span class="text-muted">Occasion</span>
                        <strong>{{ $produk->occasion ?? '-' }}</strong>
                    </div>

                    <div class="detail-info-item">
                        <span class="text-muted">Ketersediaan</span>

                        @if($produk->stok > 0)
                            <strong class="text-success">
                                Tersedia ({{ $produk->stok }})
                            </strong>
                        @else
                            <strong class="text-danger">
                                Stok Habis
                            </strong>
                        @endif
                    </div>

                </div>

                @if($produk->stok > 0)
                    <a href="{{ $linkWhatsApp }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="btn-whatsapp">
                        <i class="bi bi-whatsapp me-2"></i>
                        Order via WhatsApp
                    </a>
                @else
                    <button class="btn btn-secondary rounded-pill w-100 py-3" disabled>
                        Produk Sedang Habis
                    </button>
                @endif

                <div class="small text-muted mt-3 text-center">
                    <i class="bi bi-heart me-1"></i>
                    Made with love by MAIRA BLOOM.
                </div>

            </div>

        </div>

    </div>
</section>

<!-- RECOMMENDATIONS -->
@if($rekomendasi->count() > 0)

<section class="py-5" style="background:#faf8f6;">
    <div class="container">

        <div class="text-center mb-4">
            <div class="section-subtitle">You May Also Like</div>

            <h2 class="section-title mt-2">
                More Beautiful Flowers
            </h2>
        </div>

        <div class="row g-4">

            @foreach($rekomendasi as $item)

                @php
                    $fotoRekomendasi = $item->foto
                        ? asset('storage/' . $item->foto)
                        : asset('images/' . ($gambarProduk[$item->nama_produk] ?? 'hero-bouquet.webp'));
                @endphp

                <div class="col-6 col-md-4">

                    <a href="{{ route('product.detail', $item->id) }}"
                       class="recommend-card">

                        <img src="{{ $fotoRekomendasi }}"
                             alt="{{ $item->nama_produk }}"
                             class="recommend-image">

                        <div class="mt-3">
                            <div class="small text-muted">
                                {{ $item->kategori->nama_kategori ?? 'Flower Collection' }}
                            </div>

                            <h5 class="section-title mt-1">
                                {{ $item->nama_produk }}
                            </h5>

                            <div class="fw-semibold">
                                Rp {{ number_format($item->harga, 0, ',', '.') }}
                            </div>
                        </div>

                    </a>

                </div>

            @endforeach

        </div>
    </div>
</section>

@endif

@endsection
