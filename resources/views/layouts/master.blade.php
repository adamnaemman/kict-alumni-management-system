<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KICT Alumni Management System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 font-sans antialiased text-gray-900">
    <!-- Navigation Bar -->
    <nav class="bg-white text-gray-900 shadow-md">
        <div class="container mx-auto flex justify-between items-center px-4 py-3">
            <!-- Logo -->
            <a href="{{ route('dashboard') }}" class="flex items-center">
                <img src="{{ asset('images/iium-logo.png') }}" alt="IIUM Logo" class="h-14 object-contain">
            </a>

            <!-- Navigation Links -->
            <div class="flex items-center gap-6">
                @auth
                    @if(auth()->user()->role !== 'admin')
                        <a href="{{ route('dashboard') }}"
                            class="hover:text-gray-500 transition font-medium text-gray-900">Dashboard</a>
                        <a href="{{ route('profile.show') }}"
                            class="hover:text-gray-500 transition font-medium text-gray-900">Profile</a>
                        <a href="{{ route('achievements.index') }}"
                            class="hover:text-gray-500 transition font-medium text-gray-900">Achievements</a>
                    @endif
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('admin.alumni') }}"
                            class="hover:text-gray-500 transition font-medium text-gray-900">Manage Alumni</a>
                    @endif
                    <a href="{{ route('feedback.create') }}"
                        class="hover:text-gray-500 transition font-medium text-gray-900">Feedback</a>
                    <form action="{{ route('logout') }}" method="POST" class="inline ml-2">
                        @csrf
                        <button type="submit"
                            style="background-color: #ef4444; color: white; padding: 6px 20px; border-radius: 8px; font-weight: 600; font-size: 14px;">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                        class="hover:text-gray-500 transition font-medium text-gray-900">Login</a>
                    <a href="{{ route('register') }}"
                        class="hover:text-gray-500 transition font-medium text-gray-900">Register</a>
                @endauth
            </div>
        </div>
        <!-- Green accent line -->
        <div class="h-1 bg-emerald-600"></div>
    </nav>

    <main class="container mx-auto mt-8 p-4">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="bg-emerald-700 text-white text-center p-4 mt-8 fixed bottom-0 w-full">
        <p>&copy; {{ date('Y') }} IIUM KICT Alumni. All rights reserved.</p>
    </footer>
</body>

</html>