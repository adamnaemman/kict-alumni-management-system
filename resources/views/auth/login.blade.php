<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - KICT Alumni Management System</title>
    <!-- Google Fonts for matching the Figma design -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&family=Inter:wght@400;500;600&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
        }

        .login-bg {
            background-image: url('{{ asset('images/campus-bg.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
        }

        .login-bg::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.35);
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
        }

        .login-card {
            background-color: #4a9a8a;
            border: 5px solid #1a6b7c;
            border-radius: 30px;
            padding: 40px 50px;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.4);
            position: relative;
            z-index: 1;
        }

        .logo-container {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .logo-container img {
            height: 100px;
            object-fit: contain;
        }

        .alumni-title {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 64px;
            color: #0d3d3d;
            text-align: center;
            margin-bottom: 30px;
            letter-spacing: 1px;
            line-height: 1;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-label {
            display: block;
            color: #1a1a1a;
            font-weight: 500;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .form-input {
            width: 100%;
            padding: 14px 18px;
            font-size: 15px;
            border: none;
            border-radius: 10px;
            background-color: #ffffff;
            color: #333;
            outline: none;
            transition: box-shadow 0.2s ease;
        }

        .form-input::placeholder {
            color: #9ca3af;
        }

        .form-input:focus {
            box-shadow: 0 0 0 3px rgba(26, 107, 124, 0.3);
        }

        .forgot-link {
            display: inline-block;
            color: #1a1a1a;
            font-size: 13px;
            font-weight: 500;
            text-decoration: underline;
            margin-bottom: 24px;
            transition: color 0.2s ease;
        }

        .forgot-link:hover {
            color: #333;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 14px 20px;
            font-size: 16px;
            font-weight: 600;
            text-align: center;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .btn-gold {
            background-color: #e4a835;
            color: #1a5a4a;
        }

        .btn-gold:hover {
            background-color: #d49a2a;
            box-shadow: 0 4px 12px rgba(228, 168, 53, 0.4);
        }

        .btn+.btn {
            margin-top: 12px;
        }

        .error-box {
            background-color: #fee2e2;
            border: 1px solid #f87171;
            color: #b91c1c;
            padding: 12px 16px;
            border-radius: 10px;
            margin-bottom: 16px;
            font-size: 14px;
        }

        /* Responsive scaling for different screen sizes */
        @media (max-width: 768px) {
            .alumni-title {
                font-size: 52px;
            }

            .login-card {
                padding: 30px 35px;
                max-width: 380px;
            }

            .logo-container img {
                height: 80px;
            }
        }

        @media (max-width: 480px) {
            .alumni-title {
                font-size: 40px;
                margin-bottom: 20px;
            }

            .login-card {
                padding: 25px 25px;
                border-radius: 20px;
                border-width: 4px;
            }

            .logo-container img {
                height: 70px;
            }

            .logo-container {
                margin-bottom: 15px;
            }

            .form-input {
                padding: 12px 14px;
                font-size: 14px;
            }

            .btn {
                padding: 12px 16px;
                font-size: 15px;
            }
        }
    </style>
</head>

<body>
    <div class="login-bg">
        <div class="login-card">
            <!-- IIUM Logo -->
            <div class="logo-container">
                <img src="{{ asset('images/iium-logo.png') }}" alt="IIUM Logo">
            </div>

            <!-- Alumni Title -->
            <h1 class="alumni-title">Alumni</h1>

            <!-- Login Form -->
            <form action="{{ route('login') }}" method="POST">
                @csrf

                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="error-box">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <!-- Alumni ID / Email Field -->
                <div class="form-group">
                    <label class="form-label">Alumni ID :</label>
                    <input type="email" name="email" class="form-input" placeholder="Enter Alumni ID" required
                        value="{{ old('email') }}">
                </div>

                <!-- Password Field -->
                <div class="form-group">
                    <label class="form-label">Password :</label>
                    <input type="password" name="password" class="form-input" placeholder="Enter Password" required>
                </div>

                <!-- Forgot Password Link -->
                <a href="#" class="forgot-link">Forgot Password</a>

                <!-- Create Account Button -->
                <a href="{{ route('register') }}" class="btn btn-gold">
                    Create Account
                </a>

                <!-- Login Button -->
                <button type="submit" class="btn btn-gold">
                    Login
                </button>
            </form>
        </div>
    </div>
</body>

</html>