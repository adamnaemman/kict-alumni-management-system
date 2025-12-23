@extends('layouts.master')

@section('content')
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold text-iium-green mb-6">Alumni Dashboard</h1>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
            <div class="bg-white p-4 rounded shadow border-l-4 border-blue-500">
                <div class="text-gray-500 text-sm font-bold">Total Achievements</div>
                <div class="text-2xl font-bold text-gray-800">{{ $stats['total'] }}</div>
            </div>
            <div class="bg-white p-4 rounded shadow border-l-4 border-green-500">
                <div class="text-gray-500 text-sm font-bold">Approved</div>
                <div class="text-2xl font-bold text-gray-800">{{ $stats['approved'] }}</div>
            </div>
            <div class="bg-white p-4 rounded shadow border-l-4 border-yellow-500">
                <div class="text-gray-500 text-sm font-bold">Pending Review</div>
                <div class="text-2xl font-bold text-gray-800">{{ $stats['pending'] }}</div>
            </div>
            <div class="bg-white p-4 rounded shadow border-l-4 border-purple-500">
                <div class="text-gray-500 text-sm font-bold">Feedback Sent</div>
                <div class="text-2xl font-bold text-gray-800">{{ $stats['feedback'] }}</div>
            </div>
        </div>

        <!-- Recent Achievements -->
        <div class="bg-white p-6 rounded shadow-md mb-8">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold text-iium-gold">My Achievements</h2>
                <a href="{{ route('achievements.create') }}"
                    class="text-sm bg-iium-green text-white px-3 py-1 rounded hover:bg-green-800">
                    + Add New
                </a>
            </div>

            @if($achievements->isEmpty())
                <p class="text-gray-500">No achievements added yet.</p>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="border-b p-3 text-sm font-bold text-gray-700">Achievement</th>
                                <th class="border-b p-3 text-sm font-bold text-gray-700">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($achievements->take(5) as $achievement)
                                <tr class="hover:bg-gray-50 border-b last:border-0">
                                    <td class="p-3">
                                        <div class="font-bold text-gray-800">{{ $achievement->title }}</div>
                                    </td>
                                    <td class="p-3 text-gray-700 text-sm">
                                        {{ $achievement->event_date ? \Carbon\Carbon::parse($achievement->event_date)->format('d M Y') : '-' }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if($achievements->count() > 5)
                    <div class="mt-4 text-center">
                        <a href="{{ route('achievements.index') }}" class="text-iium-green hover:underline text-sm font-bold">View
                            All</a>
                    </div>
                @endif
            @endif
        </div>

        <div class="bg-white p-6 rounded shadow-md">
            <h2 class="text-xl font-semibold mb-4 text-iium-gold">My Update Requests</h2>
            @if($requests->isEmpty())
                <p>No requests submitted yet.</p>
            @else
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr>
                            <th class="border-b p-2">Date</th>
                            <th class="border-b p-2">Requested Name</th>
                            <th class="border-b p-2">Status</th>
                            <th class="border-b p-2">Reason (if rejected)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($requests as $req)
                            <tr class="hover:bg-gray-50">
                                <td class="border-b p-2">{{ $req->created_at->format('d M Y') }}</td>
                                <td class="border-b p-2">{{ $req->new_full_name }}</td>
                                <td class="border-b p-2">
                                    <span class="px-2 py-1 rounded text-xs font-bold
                                                                                    @if($req->status == 'approved') bg-green-200 text-green-800
                                                                                    @elseif($req->status == 'rejected') bg-red-200 text-red-800
                                                                                    @else bg-yellow-200 text-yellow-800 @endif">
                                        {{ ucfirst($req->status) }}
                                    </span>
                                </td>
                                <td class="border-b p-2 text-red-600">{{ $req->rejection_reason }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection