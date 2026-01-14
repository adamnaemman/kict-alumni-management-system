<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - KICT Alumni Management System</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap"
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

        .register-bg {
            background-image: url('{{ asset('images/campus-bg-2.png') }}');
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

        .register-bg::before {
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

        .register-card {
            background-color: #4a9a8a;
            border: 5px solid #1a6b7c;
            border-radius: 30px;
            padding: 40px 50px;
            width: 100%;
            max-width: 480px;
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
            height: 90px;
            object-fit: contain;
        }

        .register-title {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 32px;
            color: #0d3d3d;
            text-align: center;
            margin-bottom: 20px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            line-height: 1.1;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-label {
            display: block;
            color: #0d3d3d;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            font-size: 15px;
            margin-bottom: 8px;
            text-align: center;
        }

        .form-input {
            width: 100%;
            padding: 12px 16px;
            font-size: 14px;
            border: none;
            border-radius: 8px;
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

        .btn {
            display: block;
            width: 100%;
            padding: 14px 20px;
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            font-weight: 600;
            text-align: center;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
            margin-top: 24px;
        }

        .btn-gold {
            background-color: #e4a835;
            color: #1a5a4a;
        }

        .btn-gold:hover {
            background-color: #d49a2a;
            box-shadow: 0 4px 12px rgba(228, 168, 53, 0.4);
        }

        .login-link {
            text-align: center;
            margin-top: 16px;
            font-size: 14px;
            color: #0d3d3d;
        }

        .login-link a {
            color: #0d3d3d;
            font-weight: 600;
            text-decoration: underline;
        }

        .login-link a:hover {
            color: #1a6b7c;
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

        /* Responsive scaling */
        @media (max-width: 768px) {
            .register-title {
                font-size: 26px;
            }

            .register-card {
                padding: 30px 35px;
                max-width: 420px;
            }

            .logo-container img {
                height: 75px;
            }
        }

        @media (max-width: 480px) {
            .register-title {
                font-size: 22px;
                letter-spacing: 1px;
                margin-bottom: 20px;
            }

            .register-card {
                padding: 25px 25px;
                border-radius: 20px;
                border-width: 4px;
            }

            .logo-container img {
                height: 65px;
            }

            .logo-container {
                margin-bottom: 15px;
            }

            .form-group {
                margin-bottom: 14px;
            }

            .form-input {
                padding: 10px 14px;
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
    <div class="register-bg">
        <div class="register-card">
            <!-- IIUM Logo -->
            <div class="logo-container">
                <img src="{{ asset('images/iium-logo.png') }}" alt="IIUM Logo">
            </div>

            <!-- Registration Title -->
            <h1 class="register-title">Alumni<br>Registration</h1>

            <!-- Registration Form -->
            <form action="{{ route('register') }}" method="POST">
                @csrf

                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="error-box">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <!-- Email Address -->
                <div class="form-group">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-input" placeholder="Email" required
                        value="{{ old('email') }}">
                </div>

                <!-- Matric No -->
                <div class="form-group">
                    <label class="form-label">Matric No</label>
                    <input type="text" name="student_id" class="form-input" placeholder="Student id" required
                        value="{{ old('student_id') }}">
                </div>

                <!-- Full Name -->
                <div class="form-group">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="name" class="form-input" placeholder="As Per NRIC" required
                        value="{{ old('name') }}">
                </div>

                <!-- Graduation Year -->
                <div class="form-group">
                    <label class="form-label">Graduation Year</label>
                    <input type="text" name="graduation_year" class="form-input" placeholder="MM/YY"
                        value="{{ old('graduation_year') }}">
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-input" placeholder="Enter password" required>
                </div>

                <!-- Confirm Password -->
                <div class="form-group">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-input"
                        placeholder="Confirm password" required>
                </div>

                <!-- Sign Up Button -->
                <button type="submit" class="btn btn-gold">
                    Sign Up
                </button>

                <!-- Login Link -->
                <p class="login-link">
                    Already have an account? <a href="{{ route('login') }}">Login here</a>
                </p>
            </form>
        </div>
    </div>
</body>

</html>