<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MAIRA BLOOM | Florist & Flower Studio')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --pink: #E8C6CD;
            --ivory: #F7F2E9;
            --sage: #A8B8A0;
            --dark: #463D3D;
            --white: #fff;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'DM Sans', sans-serif;
            color: var(--dark);
            background: var(--white);
        }

        h1, h2, h3, h4, .serif {
            font-family: 'Playfair Display', serif;
        }

        .navbar {
            background: rgba(255,255,255,.97);
            padding: 12px 0;
            border-bottom: 1px solid #eee5e2;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            font-family: 'Playfair Display', serif;
            font-size: 25px;
            font-weight: 600;
            color: var(--dark);
        }

        .navbar-brand img {
            width: 62px;
            height: 62px;
            object-fit: contain;
        }

        .navbar-brand:hover {
            color: var(--dark);
        }

        .navbar .nav-link {
            color: var(--dark);
            margin: 0 12px;
            font-size: 15px;
            transition: .3s;
        }

        .navbar .nav-link:hover {
            color: #bd8290;
        }

        .admin-login {
            border: 1px solid var(--dark);
            border-radius: 30px;
            padding: 10px 20px !important;
            color: var(--dark) !important;
        }

        .admin-login:hover {
            background: var(--dark);
            color: white !important;
        }

        .section-padding {
            padding: 75px 0;
        }

        .section-title {
            font-size: 42px;
            margin-bottom: 15px;
        }

        .btn-pink {
            background: var(--pink);
            color: var(--dark);
            border: none;
            border-radius: 30px;
            padding: 13px 28px;
            text-decoration: none;
            display: inline-block;
            transition: .3s;
        }

        .btn-pink:hover {
            background: #d9adb8;
            color: var(--dark);
        }

        .product-card {
            border: none;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 18px rgba(0,0,0,.07);
            transition: .3s;
            height: 100%;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .product-card img {
            width: 100%;
            height: 280px;
            object-fit: cover;
        }

        footer {
            background: var(--dark);
            color: white;
            padding: 45px 0 20px;
            margin-top: 60px;
        }

        footer a {
            color: var(--pink);
            text-decoration: none;
        }

        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 20px;
            }

            .navbar-brand img {
                width: 48px;
                height: 48px;
            }

            .navbar .nav-link {
                margin: 5px 0;
            }

            .section-title {
                font-size: 32px;
            }

            .product-card img {
                height: 220px;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">

            <a class="navbar-brand" href="{{ route('home') }}">
                <img
                    src="{{ asset('images/Maira Bloom Floral App Logo.png') }}"
                    alt="Logo MAIRA BLOOM"
                >
                <span>MAIRA <span style="color:#C88F9D;">BLOOM</span></span>
            </a>

            <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#mainNavbar"
                    aria-controls="mainNavbar"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav ms-auto align-items-lg-center">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('collection') }}">Collection</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}#about">About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}#contact">Contact</a>
                    </li>

                    <li class="nav-item ms-lg-2">
                        <a class="nav-link admin-login" href="{{ url('/admin/login') }}">
                            ♙ Admin Login
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <!-- PAGE CONTENT -->
    <main>
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer>
        <div class="container">
            <div class="row gy-4">

                <div class="col-md-5">
                    <h3 class="serif mb-3">MAIRA BLOOM</h3>
                    <p class="text-white-50">
                        Flowers Made With Meaning.
                        Menghadirkan rangkaian bunga penuh makna
                        untuk setiap momen istimewa.
                    </p>
                </div>

                <div class="col-md-3">
                    <h5 class="mb-3">Quick Links</h5>
                    <p><a href="{{ route('home') }}">Home</a></p>
                    <p><a href="{{ route('collection') }}">Collection</a></p>
                    <p><a href="{{ route('home') }}#about">About Us</a></p>
                </div>

                <div class="col-md-4">
                    <h5 class="mb-3">Our Studio</h5>
                    <p class="text-white-50">
                        MAIRA BLOOM — Florist & Flower Studio
                    </p>
                    <p class="text-white-50">
                        Flowers Made With Meaning.
                    </p>
                </div>

            </div>

            <hr class="border-secondary mt-4">

            <div class="text-center text-white-50 small">
                &copy; {{ date('Y') }} MAIRA BLOOM.
                All Rights Reserved.
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')

</body>
</html>
