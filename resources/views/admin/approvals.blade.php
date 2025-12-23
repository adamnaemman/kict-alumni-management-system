@extends('layouts.master')

@section('content')
    <div class="max-w-6xl mx-auto">
        <h1 class="text-3xl font-bold text-iium-green mb-6">Admin Approvals</h1>

        <div class="bg-white p-6 rounded shadow-md">
            <h2 class="text-xl font-semibold mb-4 text-iium-gold">Pending Requests</h2>
            @if($requests->isEmpty())
                <p>No pending requests.</p>
            @else
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr>
                            <th class="border-b p-2">Alumni Name</th>
                            <th class="border-b p-2">Requested New Name</th>
                            <th class="border-b p-2">Proof</th>
                            <th class="border-b p-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($requests as $req)
                            <tr class="hover:bg-gray-50">
                                <td class="border-b p-2">{{ $req->user->name }}</td>
                                <td class="border-b p-2">{{ $req->new_full_name }}</td>
                                <td class="border-b p-2">
                                    <a href="#" class="text-blue-600 underline">View File ({{ basename($req->file_path) }})</a>
                                </td>
                                <td class="border-b p-2 flex gap-2 items-center">
                                    <a href="{{ route('admin.show', $req->id) }}"
                                        class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 text-sm">View</a>
                                    <form action="{{ route('admin.approve', $req->id) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700">Approve</button>
                                    </form>
                                    <form action="{{ route('admin.reject', $req->id) }}" method="POST"
                                        class="flex items-center gap-2">
                                        @csrf
                                        <input type="text" name="rejection_reason" placeholder="Reason..."
                                            class="border rounded px-2 py-1 text-sm">
                                        <button type="submit"
                                            class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Reject</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection