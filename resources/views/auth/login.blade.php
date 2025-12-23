@extends('layouts.master')

@section('content')
    <div class="max-w-md mx-auto bg-white p-6 rounded shadow-md">
        <h2 class="text-2xl font-bold text-iium-green mb-4">Login</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700">Email Address</label>
                <input type="email" name="email" class="w-full border rounded p-2" required>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700">Password</label>
                <input type="password" name="password" class="w-full border rounded p-2" required>
            </div>
            <button type="submit" class="w-full bg-iium-green text-white font-bold py-2 px-4 rounded hover:bg-green-800">
                Login
            </button>
            <p class="mt-4 text-center text-sm text-gray-600">
                Don't have an account? <a href="{{ route('register') }}" class="text-iium-gold hover:underline">Register
                    here</a>
            </p>
        </form>
    </div>
@endsection