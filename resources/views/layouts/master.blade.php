<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KICT Alumni Management System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 font-sans antialiased text-gray-900">
    <nav class="bg-emerald-700 text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('dashboard') }}"
                class="text-xl font-bold flex items-center gap-2 hover:text-iium-gold transition">
                <span class="text-iium-gold">KICT</span> Alumni
            </a>
            <div class="flex items-center gap-4">
                @auth
                    <a href="{{ route('dashboard') }}" class="hover:text-iium-gold transition">Dashboard</a>
                    <a href="{{ route('profile.show') }}" class="hover:text-iium-gold transition">Profile</a>
                    <a href="{{ route('achievements.index') }}" class="hover:text-iium-gold transition">Achievements</a>
                    <a href="{{ route('feedback.create') }}" class="hover:text-iium-gold transition">Feedback</a>
                    <span class="mr-2">Hello, <a href="{{ route('profile.show') }}"
                            class="underline hover:text-iium-gold transition">{{ auth()->user()->name }}</a></span>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded transition text-sm font-semibold shadow-sm">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="mr-4 hover:text-iium-gold">Login</a>
                    <a href="{{ route('register') }}" class="hover:text-iium-gold">Register</a>
                @endauth
            </div>
        </div>
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