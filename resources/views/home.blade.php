
@extends('layouts.app')

@section('title', 'MAIRA BLOOM - Flowers Made With Meaning')

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
    /* HERO SECTION */
    .hero-section {
        min-height: 570px;
        display: flex;
        align-items: center;
        position: relative;
        background:
            linear-gradient(
                90deg,
                rgba(55, 39, 39, .42) 0%,
                rgba(55, 39, 39, .20) 48%,
                rgba(55, 39, 39, .02) 100%
            ),
            url('{{ asset('images/Welcome.png') }}') center 48% / cover no-repeat;
        color: white;
    }

    .hero-content {
        max-width: 650px;
        padding: 100px 0;
        position: relative;
        z-index: 2;
    }

    .hero-label {
        font-size: 12px;
        letter-spacing: 4px;
        text-transform: uppercase;
        margin-bottom: 25px;
    }

    .hero-title {
        font-family: 'Playfair Display', serif;
        font-size: clamp(45px, 6vw, 76px);
        line-height: 1.12;
        font-weight: 500;
        margin-bottom: 25px;
    }

    .hero-description {
        max-width: 500px;
        font-size: 15px;
        line-height: 1.9;
        color: #fff8f5;
    }

    .btn-hero {
        display: inline-flex;
        align-items: center;
        gap: 15px;
        background: #e8c6cd;
        color: #463d3d;
        text-decoration: none;
        padding: 16px 30px;
        border-radius: 40px;
        margin-top: 27px;
        font-size: 13px;
        font-weight: 600;
        transition: .3s;
    }

    .btn-hero:hover {
        background: white;
        color: #463d3d;
        transform: translateY(-3px);
    }

    .hero-dots {
        position: absolute;
        bottom: 30px;
        left: max(calc((100% - 1290px) / 2), 5%);
        display: flex;
        gap: 12px;
    }

    .hero-dots span {
        width: 11px;
        height: 11px;
        border: 1px solid white;
        border-radius: 50%;
    }

    .hero-dots span:first-child {
        background: #e8c6cd;
        border-color: #e8c6cd;
    }

    /* GENERAL SECTION */
    .home-section {
        padding: 80px 0;
    }

    .section-subtitle {
        color: #ad8189;
        font-size: 12px;
        letter-spacing: 3px;
        text-transform: uppercase;
    }

    .section-title {
        font-family: 'Playfair Display', serif;
        color: #463d3d;
    }

    /* CATEGORY */
    .category-card {
        display: block;
        height: 100%;
        text-align: center;
        padding: 30px 15px;
        border: 1px solid #eee5e1;
        border-radius: 12px;
        background: #fff;
        text-decoration: none;
        color: #463d3d;
        transition: .3s;
    }

    .category-card:hover {
        background: #f7f2e9;
        transform: translateY(-5px);
        color: #ad8189;
        border-color: #e8c6cd;
    }

    .category-card i {
        display: block;
        font-size: 30px;
        margin-bottom: 15px;
        color: #b98790;
    }

    /* PRODUCT */
    .product-card {
        height: 100%;
        overflow: hidden;
        border: 1px solid #f0e9e5;
        border-radius: 12px;
        background: white;
        transition: .3s;
    }

    .product-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 30px rgba(70, 61, 61, .09);
    }

    .product-image {
        width: 100%;
        height: 285px;
        object-fit: cover;
        display: block;
    }

    .product-info {
        padding: 20px;
    }

    .product-category {
        color: #ad8189;
        font-size: 11px;
        letter-spacing: 1.5px;
        text-transform: uppercase;
    }

    .product-name {
        font-family: 'Playfair Display', serif;
        font-size: 21px;
        margin: 9px 0;
        color: #463d3d;
    }

    .product-price {
        font-size: 14px;
        font-weight: 700;
        color: #463d3d;
    }

    .product-detail-btn {
        display: block;
        border: 1px solid #463d3d;
        color: #463d3d;
        padding: 9px;
        border-radius: 30px;
        text-align: center;
        text-decoration: none;
        font-size: 12px;
        margin-top: 17px;
        transition: .3s;
    }

    .product-detail-btn:hover {
        background: #463d3d;
        color: white;
    }

    /* ABOUT */
    .about-section {
        background: #f7f2e9;
        padding: 85px 0;
    }

    .about-image {
        width: 100%;
        height: 430px;
        object-fit: cover;
        border-radius: 12px;
    }

    .about-description {
        color: #817575;
        line-height: 2;
        font-size: 14px;
    }

    .btn-dark-custom {
        display: inline-block;
        background: #463d3d;
        color: white;
        padding: 13px 27px;
        border-radius: 30px;
        text-decoration: none;
        font-size: 13px;
        transition: .3s;
    }

    .btn-dark-custom:hover {
        background: #ad8189;
        color: white;
    }

    /* CONTACT */
    .contact-section {
        padding: 85px 0;
        background: #fff;
    }

    @media(max-width: 768px) {
        .hero-section {
            min-height: 570px;
            background-position: 58% center;
        }

        .hero-content {
            padding: 75px 12px;
        }

        .hero-title {
            font-size: 45px;
        }

        .hero-description {
            max-width: 350px;
            font-size: 13px;
        }

        .hero-label {
            font-size: 10px;
            letter-spacing: 2px;
        }

        .product-image {
            height: 210px;
        }

        .about-image {
            height: 300px;
        }
    }
</style>

<!-- HERO BANNER -->
<section class="hero-section">
    <div class="container">
        <div class="hero-content">

            <div class="hero-label">
                MAIRA BLOOM · FLORIST & FLOWER STUDIO
            </div>

            <h1 class="hero-title">
                Every Flower<br>
                Tells A Story.
            </h1>

            <p class="hero-description">
                Temukan rangkaian bunga yang dirancang dengan penuh makna
                untuk setiap momen spesial dalam hidupmu.
            </p>

            <a href="{{ route('collection') }}" class="btn-hero">
                EXPLORE COLLECTION
                <i class="bi bi-arrow-right"></i>
            </a>

        </div>
    </div>

    <div class="hero-dots">
        <span></span>
        <span></span>
        <span></span>
    </div>
</section>

<!-- CATEGORY SECTION -->
<section class="home-section">
    <div class="container">

        <div class="text-center mb-5">
            <div class="section-subtitle">Find Your Flowers</div>

            <h2 class="section-title mt-2">
                Shop By Category
            </h2>

            <p class="text-muted small">
                Pilih rangkaian bunga sesuai momen spesialmu.
            </p>
        </div>

        <div class="row g-3">

            @foreach($kategoris as $kategori)
                <div class="col-6 col-md-4 col-lg">

                    <a href="{{ route('collection', ['kategori' => $kategori->id]) }}"
                       class="category-card">

                        <i class="bi bi-flower1"></i>

                        <div class="fw-semibold">
                            {{ $kategori->nama_kategori }}
                        </div>

                        <div class="small text-muted mt-2">
                            {{ $kategori->produks_count }} Products
                        </div>

                    </a>

                </div>
            @endforeach

        </div>
    </div>
</section>

<!-- FEATURED COLLECTION -->
<section class="home-section" style="background:#faf8f6;">
    <div class="container">

        <div class="d-flex flex-wrap justify-content-between align-items-end mb-5">

            <div>
                <div class="section-subtitle">Our Selection</div>

                <h2 class="section-title mt-2 mb-2">
                    Featured Flowers
                </h2>

                <p class="text-muted small mb-0">
                    Rangkaian bunga pilihan untuk setiap cerita.
                </p>
            </div>

            <a href="{{ route('collection') }}"
               class="text-decoration-none small"
               style="color:#ad8189;">
                View All Collection
                <i class="bi bi-arrow-right ms-1"></i>
            </a>

        </div>

        <div class="row g-4">

            @forelse($produks as $produk)

                @php
                    $foto = $produk->foto
                        ? asset('storage/' . $produk->foto)
                        : asset('images/' . ($gambarProduk[$produk->nama_produk] ?? 'Welcome.png'));
                @endphp

                <div class="col-6 col-md-4 col-lg-3">

                    <div class="product-card">

                        <a href="{{ route('product.detail', $produk->id) }}">
                            <img
                                src="{{ $foto }}"
                                alt="{{ $produk->nama_produk }}"
                                class="product-image">
                        </a>

                        <div class="product-info">

                            <div class="product-category">
                                {{ $produk->kategori->nama_kategori ?? 'Flower Collection' }}
                            </div>

                            <h5 class="product-name">
                                {{ $produk->nama_produk }}
                            </h5>

                            <div class="product-price">
                                Rp {{ number_format($produk->harga, 0, ',', '.') }}
                            </div>

                            <a href="{{ route('product.detail', $produk->id) }}"
                               class="product-detail-btn">
                                VIEW DETAILS
                            </a>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12 text-center py-5">
                    <i class="bi bi-flower1 display-4"></i>
                    <p class="text-muted mt-3">
                        Belum ada produk unggulan.
                    </p>
                </div>

            @endforelse

        </div>
    </div>
</section>

<!-- ABOUT SECTION -->
<section class="about-section" id="about">
    <div class="container">

        <div class="row align-items-center g-5">

            <div class="col-lg-6">
                <img
                    src="{{ asset('images/Welcome.png') }}"
                    alt="MAIRA BLOOM Flower Studio"
                    class="about-image">
            </div>

            <div class="col-lg-6">

                <div class="section-subtitle">
                    Our Story
                </div>

                <h2 class="section-title display-5 mt-3 mb-4">
                    Flowers Made<br>
                    With Meaning.
                </h2>

                <p class="about-description">
                    MAIRA BLOOM hadir untuk menghadirkan rangkaian bunga
                    yang bukan hanya indah dipandang, tetapi juga memiliki
                    cerita dan makna di setiap momennya.
                </p>

                <p class="about-description">
                    Dari perayaan kelulusan hingga hari istimewa bersama
                    orang tersayang, setiap rangkaian dibuat dengan
                    perhatian dan sentuhan penuh makna.
                </p>

                <a href="{{ route('collection') }}"
                   class="btn-dark-custom mt-3">
                    Discover Our Collection
                    <i class="bi bi-arrow-right ms-2"></i>
                </a>

            </div>

        </div>
    </div>
</section>

<!-- CONTACT SECTION -->
<section class="contact-section text-center" id="contact">
    <div class="container">

        <div class="section-subtitle">
            Get In Touch
        </div>

        <h2 class="section-title mt-3">
            Let's Make Something Beautiful
        </h2>

        <p class="text-muted mt-3">
            Temukan buket yang tepat untuk momen spesialmu.
        </p>

        <a href="{{ route('collection') }}"
           class="btn-dark-custom mt-3">
            Explore Our Collection
            <i class="bi bi-arrow-right ms-2"></i>
        </a>

    </div>
</section>

@endsection
