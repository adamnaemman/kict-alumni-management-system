@extends('layouts.master')

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-iium-green">Profile Update Request Details</h1>
            <a href="{{ route('admin.approvals') }}" class="text-gray-600 hover:underline">&larr; Back to Approvals</a>
        </div>

        <div class="bg-white p-6 rounded shadow-md">
            <div class="mb-6 border-b pb-4">
                <h2 class="text-xl font-semibold text-iium-gold mb-2">Request Information</h2>
                <p><strong>Requester:</strong> {{ $updateRequest->user->name }}</p>
                <p><strong>Submitted:</strong> {{ $updateRequest->created_at->format('d M Y, H:i') }}</p>
                <p><strong>Status:</strong>
                    <span class="px-2 py-1 rounded text-sm font-semibold 
                            @if($updateRequest->status === 'pending') bg-yellow-100 text-yellow-800
                            @elseif($updateRequest->status === 'approved') bg-green-100 text-green-800
                            @else bg-red-100 text-red-800 @endif">
                        {{ ucfirst($updateRequest->status) }}
                    </span>
                </p>
            </div>

            @if($updateRequest->profile_data)
                <h2 class="text-xl font-semibold text-iium-gold mb-4">Proposed Changes</h2>
                <table class="w-full border-collapse mb-6">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border p-3 text-left">Field</th>
                            <th class="border p-3 text-left">Current Value</th>
                            <th class="border p-3 text-left">Proposed Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $fields = [
                                'name' => 'Full Name',
                                'email' => 'Email',
                                'student_id' => 'Matric Number',
                                'graduation_year' => 'Graduation Year',
                                'program' => 'Program',
                                'current_position' => 'Current Position',
                                'current_company' => 'Current Company',
                                'phone_number' => 'Phone Number',
                                'linkedin_url' => 'LinkedIn URL',
                                'bio' => 'Bio',
                            ];
                            $profileData = $updateRequest->profile_data;
                            $user = $updateRequest->user;
                        @endphp
                        @foreach($fields as $key => $label)
                            @php
                                $current = $user->$key ?? '-';
                                $proposed = $profileData[$key] ?? '-';
                                $changed = $current != $proposed;
                            @endphp
                            <tr class="{{ $changed ? 'bg-yellow-50' : '' }}">
                                <td class="border p-3 font-semibold">{{ $label }}</td>
                                <td class="border p-3">{{ $current ?: '-' }}</td>
                                <td class="border p-3 {{ $changed ? 'font-bold text-blue-700' : '' }}">{{ $proposed ?: '-' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="mb-6">
                    <p><strong>Requested New Name:</strong> {{ $updateRequest->new_full_name }}</p>
                </div>
            @endif

            @if($updateRequest->status === 'pending')
                <div class="flex gap-4 mt-6">
                    <form action="{{ route('admin.approve', $updateRequest->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 font-bold">
                            Approve
                        </button>
                    </form>
                    <form action="{{ route('admin.reject', $updateRequest->id) }}" method="POST"
                        class="flex items-center gap-2">
                        @csrf
                        <input type="text" name="rejection_reason" placeholder="Rejection reason (optional)"
                            class="border rounded px-3 py-2 w-64">
                        <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700 font-bold">
                            Reject
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </div>
@endsection