
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'MAIRA BLOOM - Flowers Made With Meaning')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
          rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap"
          rel="stylesheet">

    <style>
        :root {
            --pink: #E8C6CD;
            --ivory: #F7F2E9;
            --sage: #A8B8A0;
            --charcoal: #463D3D;
            --muted: #817575;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            color: var(--charcoal);
            background: #fff;
            margin: 0;
        }

        h1, h2, h3, h4, h5 {
            font-family: 'Playfair Display', serif;
        }

        /* NAVBAR */
        .main-navbar {
            background: #fff;
            padding: 17px 0;
            border-bottom: 1px solid #f0e9e5;
        }

        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-size: 27px;
            font-weight: 600;
            color: var(--charcoal) !important;
            letter-spacing: 1px;
        }

        .navbar-brand span {
            color: #bd8995;
        }

        .navbar-nav .nav-link {
            color: var(--charcoal);
            font-size: 14px;
            margin: 0 10px;
            transition: .3s;
        }

        .navbar-nav .nav-link:hover {
            color: #bd8995;
        }

        .admin-link {
            border: 1px solid var(--charcoal);
            border-radius: 30px;
            padding: 8px 18px !important;
            margin-left: 12px;
        }

        .admin-link:hover {
            background: var(--charcoal);
            color: #fff !important;
        }

        /* GENERAL */
        .section-title {
            font-family: 'Playfair Display', serif;
            color: var(--charcoal);
        }

        .btn-dark-custom {
            background: var(--charcoal);
            color: #fff;
            border: none;
            border-radius: 30px;
            padding: 11px 25px;
            text-decoration: none;
            display: inline-block;
            transition: .3s;
        }

        .btn-dark-custom:hover {
            background: var(--sage);
            color: var(--charcoal);
        }

        /* FOOTER */
        .main-footer {
            background: var(--charcoal);
            color: #fff;
            padding: 55px 0 20px;
            margin-top: 30px;
        }

        .footer-brand {
            font-family: 'Playfair Display', serif;
            font-size: 29px;
            color: var(--pink);
        }

        .main-footer p {
            color: #d7ceca;
            font-size: 14px;
            line-height: 1.8;
        }

        .main-footer a {
            color: #e8deda;
            text-decoration: none;
            display: block;
            margin-bottom: 10px;
            font-size: 14px;
        }

        .main-footer a:hover {
            color: var(--pink);
        }

        .footer-bottom {
            border-top: 1px solid #665b59;
            margin-top: 30px;
            padding-top: 20px;
            text-align: center;
            color: #d7ceca;
            font-size: 13px;
        }

        @media (max-width: 991px) {
            .navbar-nav {
                padding-top: 15px;
            }

            .navbar-nav .nav-link {
                margin: 7px 0;
            }

            .admin-link {
                display: inline-block;
                width: fit-content;
                margin-left: 0;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg main-navbar sticky-top">
        <div class="container">

            <a class="navbar-brand" href="{{ route('home') }}">
                MAIRA <span>BLOOM</span>
            </a>

            <button class="navbar-toggler"
                    type="button"
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
                        <a class="nav-link" href="{{ route('home') }}">
                            Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('collection') }}">
                            Collection
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}#about">
                            About
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}#contact">
                            Contact
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link admin-link"
                           href="{{ route('admin.login') }}">
                            <i class="bi bi-person-lock me-1"></i>
                            Admin Login
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
    <footer class="main-footer">
        <div class="container">

            <div class="row g-4">

                <div class="col-lg-5 col-md-6">

                    <h3 class="footer-brand">
                        MAIRA BLOOM
                    </h3>

                    <p class="mt-3">
                        Flowers Made With Meaning.
                        Every flower tells a story and every bouquet
                        carries a special meaning.
                    </p>

                </div>

                <div class="col-lg-3 col-md-6">

                    <h6 class="mb-3">Quick Links</h6>

                    <a href="{{ route('home') }}">Home</a>

                    <a href="{{ route('collection') }}">Our Collection</a>

                    <a href="{{ route('admin.login') }}">Admin Login</a>

                </div>

                <div class="col-lg-4">

                    <h6 class="mb-3">Our Studio</h6>

                    <p>
                        PT Mekar Asri Nusantara
                        <br>
                        MAIRA BLOOM Florist & Flower Studio
                    </p>

                    <p>
                        <i class="bi bi-flower1 me-2"></i>
                        Flowers Made With Meaning.
                    </p>

                </div>

            </div>

            <div class="footer-bottom">
                &copy; {{ date('Y') }} MAIRA BLOOM.
                All Rights Reserved.
            </div>

        </div>
    </footer>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')

</body>
</html>
