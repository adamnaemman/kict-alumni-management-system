@extends('layouts.master')

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow-md">
        <h1 class="text-2xl font-bold text-iium-green mb-6 border-b pb-2">Edit Achievement</h1>

        <form action="{{ route('achievements.update', $achievement->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Achievement Title</label>
                <input type="text" name="title" class="w-full border rounded p-2"
                    value="{{ old('title', $achievement->title) }}" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Description</label>
                <textarea name="description" class="w-full border rounded p-2"
                    rows="3">{{ old('description', $achievement->description) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Event Date</label>
                <input type="date" name="event_date" class="w-full border rounded p-2"
                    value="{{ old('event_date', $achievement->event_date) }}">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Event Image (Optional)</label>
                @if($achievement->image_path)
                    <div class="mb-2">
                        <p class="text-xs text-gray-500">Current Image:</p>
                        <img src="{{ asset('storage/' . $achievement->image_path) }}" class="h-20 w-auto rounded border">
                    </div>
                @endif
                <input type="file" name="image" class="w-full border rounded p-2" accept="image/*">
                <p class="text-xs text-gray-500 mt-1">JPG, PNG, GIF (Max 5MB)</p>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-bold mb-2">Supporting Document (PDF, Optional)</label>
                @if($achievement->file_path)
                    <div class="mb-2">
                        <p class="text-xs text-gray-500">Current File: <a
                                href="{{ asset('storage/' . $achievement->file_path) }}" target="_blank"
                                class="text-iium-green hover:underline">View</a></p>
                    </div>
                @endif
                <input type="file" name="file" class="w-full border rounded p-2" accept=".pdf">
                <p class="text-xs text-gray-500 mt-1">PDF Only (Max 10MB)</p>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-iium-green text-white font-bold py-2 px-6 rounded hover:bg-green-800">
                    Update
                </button>
                <a href="{{ route('achievements.index') }}" class="text-gray-600 hover:underline">Cancel</a>
            </div>
        </form>
    </div>
@endsection