@extends('layouts.master')

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow-md">
        <h1 class="text-2xl font-bold text-iium-green mb-6 border-b pb-2">Give Feedback</h1>

        <p class="mb-4 text-gray-600">We value your feedback. Please let us know what you think about the system or if you
            have any suggestions for improvement.</p>

        <form action="{{ route('feedback.store') }}" method="POST">
            @csrf

            <div class="mb-6">
                <label class="block text-gray-700 font-bold mb-2">Your Feedback</label>
                <textarea name="message" class="w-full border rounded p-2" rows="5" placeholder="Type your feedback here..."
                    required></textarea>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-iium-green text-white font-bold py-2 px-6 rounded hover:bg-green-800">
                    Submit Feedback
                </button>
                <a href="{{ route('dashboard') }}" class="text-gray-600 hover:underline">Cancel</a>
            </div>
        </form>
    </div>
@endsection