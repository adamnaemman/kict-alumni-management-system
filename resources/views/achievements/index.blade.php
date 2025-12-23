@extends('layouts.master')

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-iium-green">My Achievements</h1>
            <a href="{{ route('achievements.create') }}"
                class="bg-iium-green text-white px-4 py-2 rounded hover:bg-green-800 font-bold">
                + Add New
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded shadow-md overflow-hidden">
            @if($achievements->isEmpty())
                <div class="p-6 text-center text-gray-500">
                    You haven't added any achievements yet.
                </div>
            @else
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border-b p-4 font-bold text-gray-700">Achievement</th>
                            <th class="border-b p-4 font-bold text-gray-700">Date</th>
                            <th class="border-b p-4 font-bold text-gray-700">Document</th>
                            <th class="border-b p-4 font-bold text-gray-700 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($achievements as $achievement)
                            <tr class="hover:bg-gray-50 border-b last:border-0">
                                <td class="p-4">
                                    <div class="font-bold text-gray-800">{{ $achievement->title }}</div>
                                    @if($achievement->description)
                                        <div class="text-sm text-gray-600 mt-1">{{ $achievement->description }}</div>
                                    @endif
                                </td>
                                <td class="p-4 text-gray-700">
                                    {{ $achievement->event_date ? \Carbon\Carbon::parse($achievement->event_date)->format('d M Y') : '-' }}
                                </td>
                                <td class="p-4">
                                    @if($achievement->file_path)
                                        <a href="{{ asset('storage/' . $achievement->file_path) }}" target="_blank"
                                            class="text-iium-green hover:underline text-sm font-semibold">View File</a>
                                    @else
                                        <span class="text-gray-400 text-sm">None</span>
                                    @endif
                                </td>
                                <td class="p-4 text-right">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('achievements.edit', $achievement->id) }}"
                                            class="text-blue-600 hover:underline font-semibold text-sm">Edit</a>
                                        <form action="{{ route('achievements.destroy', $achievement->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-600 hover:underline font-semibold text-sm">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

        <div class="mt-8">
            <a href="{{ route('dashboard') }}" class="text-iium-green hover:underline">&larr; Back to Dashboard</a>
        </div>
    </div>
@endsection