@extends('layouts.master')

@section('content')
    <div class="max-w-6xl mx-auto p-6">
        <!-- Header with User Greeting and Edit Button -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6 flex justify-between items-center">
            <div class="flex items-center gap-4">
                <div class="w-16 h-16 bg-emerald-700 rounded-full flex items-center justify-center text-white text-2xl font-bold">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Hi {{ explode(' ', $user->name)[0] }}!</h1>
                    <p class="text-gray-500 text-sm">{{ $user->email }}</p>
                </div>
            </div>
            <a href="{{ route('profile.edit') }}"
                class="bg-emerald-700 text-white px-6 py-2 rounded shadow hover:bg-emerald-800 transition duration-200 font-bold flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                </svg>
                Edit Profile
            </a>
        </div>

        <!-- Main Content with Sidebar -->
        <div class="flex gap-6">
            <!-- Sidebar Menu -->
            <div class="w-72 bg-gray-700 rounded-lg shadow-md p-4 h-fit">
                <nav class="space-y-2">
                    <button onclick="showSection('personal')" id="btn-personal"
                        class="sidebar-btn w-full text-left px-4 py-3 rounded-lg flex items-center gap-3 text-white hover:bg-emerald-600 transition active-tab">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                        </svg>
                        Personal Information
                    </button>
                    <button onclick="showSection('academic')" id="btn-academic"
                        class="sidebar-btn w-full text-left px-4 py-3 rounded-lg flex items-center gap-3 text-white hover:bg-emerald-600 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                        </svg>
                        Academic Information
                    </button>
                    <button onclick="showSection('professional')" id="btn-professional"
                        class="sidebar-btn w-full text-left px-4 py-3 rounded-lg flex items-center gap-3 text-white hover:bg-emerald-600 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
                            <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
                        </svg>
                        Professional Details
                    </button>
                </nav>
            </div>

            <!-- Content Area -->
            <div class="flex-1">
                <!-- Personal Information Section -->
                <div id="section-personal" class="content-section bg-white rounded-lg shadow-md p-6 border-l-4 border-emerald-600">
                    <h2 class="text-xl font-bold text-emerald-700 mb-6 pb-2 border-b">Personal Information</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-500 text-xs font-bold uppercase mb-1">Full Name</label>
                            <p class="text-lg font-semibold text-gray-800">{{ $user->name }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-gray-500 text-xs font-bold uppercase mb-1">Email</label>
                            <p class="text-gray-800">{{ $user->email }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-gray-500 text-xs font-bold uppercase mb-1">Phone Number</label>
                            <p class="text-gray-800">{{ $user->phone_number ?? '-' }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-gray-500 text-xs font-bold uppercase mb-1">LinkedIn URL</label>
                            @if($user->linkedin_url)
                                <a href="{{ $user->linkedin_url }}" target="_blank" class="text-blue-600 hover:underline break-all">{{ $user->linkedin_url }}</a>
                            @else
                                <p class="text-gray-500">-</p>
                            @endif
                        </div>
                        
                        <div class="md:col-span-2">
                            <label class="block text-gray-500 text-xs font-bold uppercase mb-1">Bio</label>
                            <p class="text-gray-700 whitespace-pre-wrap">{{ $user->bio ?? 'No bio added.' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Academic Information Section -->
                <div id="section-academic" class="content-section bg-white rounded-lg shadow-md p-6 border-l-4 border-blue-500 hidden">
                    <h2 class="text-xl font-bold text-blue-600 mb-6 pb-2 border-b">Academic Information</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-500 text-xs font-bold uppercase mb-1">Matric Number</label>
                            <p class="text-lg font-semibold text-gray-800">{{ $user->student_id ?? 'N/A' }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-gray-500 text-xs font-bold uppercase mb-1">Program</label>
                            <p class="text-gray-800">{{ $user->program ?? '-' }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-gray-500 text-xs font-bold uppercase mb-1">Graduation Year</label>
                            <p class="text-gray-800">{{ $user->graduation_year ?? '-' }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-gray-500 text-xs font-bold uppercase mb-1">Account Role</label>
                            <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800 capitalize">
                                {{ $user->role }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Professional Details Section -->
                <div id="section-professional" class="content-section bg-white rounded-lg shadow-md p-6 border-l-4 border-amber-500 hidden">
                    <h2 class="text-xl font-bold text-amber-600 mb-6 pb-2 border-b">Professional Details</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div>
                            <label class="block text-gray-500 text-xs font-bold uppercase mb-1">Current Position</label>
                            <p class="text-lg font-semibold text-gray-800">{{ $user->current_position ?? '-' }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-gray-500 text-xs font-bold uppercase mb-1">Current Company</label>
                            <p class="text-gray-800">{{ $user->current_company ?? '-' }}</p>
                        </div>
                    </div>

                    <!-- Achievements Section -->
                    <div class="border-t pt-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-bold text-gray-700">My Achievements</h3>
                            <a href="{{ route('achievements.create') }}" class="bg-amber-500 text-white px-4 py-2 rounded hover:bg-amber-600 transition text-sm font-bold">
                                + Add Achievement
                            </a>
                        </div>
                        
                        @if($achievements->isEmpty())
                            <div class="bg-gray-50 rounded-lg p-6 text-center text-gray-500">
                                <p>You haven't added any achievements yet.</p>
                            </div>
                        @else
                            <div class="space-y-4">
                                @foreach($achievements as $achievement)
                                    <div class="bg-gray-50 rounded-lg p-4 flex justify-between items-start hover:bg-gray-100 transition">
                                        <div>
                                            <h4 class="font-bold text-gray-800">{{ $achievement->title }}</h4>
                                            @if($achievement->description)
                                                <p class="text-sm text-gray-600 mt-1">{{ Str::limit($achievement->description, 100) }}</p>
                                            @endif
                                            <p class="text-xs text-gray-400 mt-2">
                                                {{ $achievement->event_date ? \Carbon\Carbon::parse($achievement->event_date)->format('d M Y') : '' }}
                                            </p>
                                        </div>
                                        <div class="flex gap-2">
                                            <a href="{{ route('achievements.edit', $achievement->id) }}" class="text-blue-600 hover:underline text-sm">Edit</a>
                                            <form action="{{ route('achievements.destroy', $achievement->id) }}" method="POST" onsubmit="return confirm('Delete this achievement?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:underline text-sm">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8 border-t pt-4">
            <a href="{{ route('dashboard') }}" class="text-emerald-700 hover:underline">&larr; Back to Dashboard</a>
        </div>
    </div>

    <style>
        .sidebar-btn.active-tab {
            background-color: #059669; /* emerald-600 */
        }
    </style>

    <script>
        function showSection(section) {
            // Hide all sections
            document.querySelectorAll('.content-section').forEach(el => el.classList.add('hidden'));
            // Remove active class from all buttons
            document.querySelectorAll('.sidebar-btn').forEach(el => el.classList.remove('active-tab'));
            
            // Show selected section
            document.getElementById('section-' + section).classList.remove('hidden');
            // Add active class to selected button
            document.getElementById('btn-' + section).classList.add('active-tab');
        }
    </script>
@endsection