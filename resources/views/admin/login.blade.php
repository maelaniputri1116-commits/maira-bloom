
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Login - MAIRA BLOOM</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Poppins:wght@400;500;600&display=swap"
          rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            background: #f7f2e9;
            font-family: 'Poppins', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-card {
            width: 100%;
            max-width: 430px;
            background: white;
            padding: 45px 38px;
            border-radius: 18px;
            box-shadow: 0 10px 40px rgba(70,61,61,.08);
        }

        .brand {
            font-family: 'Playfair Display', serif;
            color: #463d3d;
            font-size: 34px;
            text-align: center;
        }

        .subtitle {
            color: #a88b8b;
            letter-spacing: 3px;
            font-size: 11px;
            text-align: center;
        }

        .form-control {
            padding: 12px;
            border-radius: 8px;
        }

        .btn-login {
            background: #463d3d;
            color: white;
            border: none;
            border-radius: 30px;
            padding: 13px;
            width: 100%;
        }

        .btn-login:hover {
            background: #a8b8a0;
            color: #463d3d;
        }
    </style>
</head>

<body>

<div class="login-card">

    <h1 class="brand">MAIRA BLOOM</h1>

    <p class="subtitle mb-4">ADMINISTRATOR PANEL</p>

    <h5 class="text-center mb-2">Welcome Back</h5>

    <p class="text-center text-muted small mb-4">
        Login untuk mengelola toko bunga MAIRA BLOOM.
    </p>

    @if(session('error'))
        <div class="alert alert-warning">
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('admin.login.submit') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Email Address</label>

            <input type="email"
                   name="email"
                   class="form-control"
                   placeholder="admin@mairabloom.com"
                   value="{{ old('email') }}"
                   required>
        </div>

        <div class="mb-4">
            <label class="form-label">Password</label>

            <input type="password"
                   name="password"
                   class="form-control"
                   placeholder="Masukkan password"
                   required>
        </div>

        <button type="submit" class="btn-login">
            Login as Admin
        </button>
    </form>

    <div class="text-center mt-4">
        <a href="{{ route('home') }}"
           class="text-decoration-none text-muted small">
            ← Back to Website
        </a>
    </div>

</div>

</body>
</html>
