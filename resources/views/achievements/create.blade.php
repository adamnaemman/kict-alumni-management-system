@extends('layouts.master')

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow-md">
        <h1 class="text-2xl font-bold text-iium-green mb-6 border-b pb-2">Add New Achievement</h1>

        <form action="{{ route('achievements.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Achievement Title</label>
                <input type="text" name="title" class="w-full border rounded p-2"
                    placeholder="e.g. Dean's List, Hackathon Winner" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Description</label>
                <textarea name="description" class="w-full border rounded p-2" rows="3"
                    placeholder="Brief details about the achievement..."></textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Event Date</label>
                <input type="date" name="event_date" class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Event Image (Optional)</label>
                <input type="file" name="image" class="w-full border rounded p-2" accept="image/*">
                <p class="text-xs text-gray-500 mt-1">JPG, PNG, GIF (Max 5MB)</p>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-bold mb-2">Supporting Document (PDF, Optional)</label>
                <input type="file" name="file" class="w-full border rounded p-2" accept=".pdf">
                <p class="text-xs text-gray-500 mt-1">PDF Only (Max 10MB)</p>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-iium-green text-white font-bold py-2 px-6 rounded hover:bg-green-800">
                    Save
                </button>
                <a href="{{ route('achievements.index') }}" class="text-gray-600 hover:underline">Cancel</a>
            </div>
    </div>
    </form>
    </div>
@endsection