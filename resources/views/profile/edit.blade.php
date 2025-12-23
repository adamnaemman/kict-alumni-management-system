@extends('layouts.master')

@section('content')
    <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow-md">
        <h1 class="text-3xl font-bold text-iium-green mb-6 border-b pb-2">Edit Profile</h1>

        <form action="{{ route('profile.update') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Basic Info -->
                <div class="col-span-1 md:col-span-2">
                    <h3 class="text-lg font-bold text-gray-700 mb-4 border-b pb-1">Basic Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label class="block text-gray-700">Full Name</label>
                            <input type="text" name="name" class="w-full border rounded p-2"
                                value="{{ old('name', $user->name) }}" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Email Address</label>
                            <input type="email" name="email" class="w-full border rounded p-2"
                                value="{{ old('email', $user->email) }}" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Matric Number</label>
                            <input type="text" name="student_id" class="w-full border rounded p-2"
                                value="{{ old('student_id', $user->student_id) }}">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Graduation Year</label>
                            <input type="text" name="graduation_year" class="w-full border rounded p-2"
                                value="{{ old('graduation_year', $user->graduation_year) }}" placeholder="e.g. 2023">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Program</label>
                            <input type="text" name="program" class="w-full border rounded p-2"
                                value="{{ old('program', $user->program) }}" placeholder="e.g. BIT">
                        </div>
                    </div>
                </div>

                <!-- Professional Info -->
                <div class="col-span-1 md:col-span-2">
                    <h3 class="text-lg font-bold text-gray-700 mb-4 border-b pb-1">Professional Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label class="block text-gray-700">Current Position</label>
                            <input type="text" name="current_position" class="w-full border rounded p-2"
                                value="{{ old('current_position', $user->current_position) }}"
                                placeholder="e.g. Software Engineer">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">Current Company</label>
                            <input type="text" name="current_company" class="w-full border rounded p-2"
                                value="{{ old('current_company', $user->current_company) }}" placeholder="e.g. Google">
                        </div>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="col-span-1 md:col-span-2">
                    <h3 class="text-lg font-bold text-gray-700 mb-4 border-b pb-1">Contact Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label class="block text-gray-700">Phone Number</label>
                            <input type="text" name="phone_number" class="w-full border rounded p-2"
                                value="{{ old('phone_number', $user->phone_number) }}">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700">LinkedIn URL</label>
                            <input type="url" name="linkedin_url" class="w-full border rounded p-2"
                                value="{{ old('linkedin_url', $user->linkedin_url) }}"
                                placeholder="https://linkedin.com/in/...">
                        </div>
                        <div class="mb-4 md:col-span-2">
                            <label class="block text-gray-700">Bio</label>
                            <textarea name="bio" class="w-full border rounded p-2"
                                rows="3">{{ old('bio', $user->bio) }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Security -->
                <div class="col-span-1 md:col-span-2">
                    <h3 class="text-lg font-bold text-gray-700 mb-4 border-b pb-1">Security (Optional)</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label class="block text-gray-700">New Password</label>
                            <input type="password" name="password" class="w-full border rounded p-2">
                        </div>
                        <div class="mb-6">
                            <label class="block text-gray-700">Confirm New Password</label>
                            <input type="password" name="password_confirmation" class="w-full border rounded p-2">
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-between mt-6">
                <button type="submit" class="bg-iium-green text-white font-bold py-2 px-6 rounded hover:bg-green-800">
                    Update Profile
                </button>
                <a href="{{ route('profile.show') }}" class="text-gray-600 hover:underline">Cancel</a>
            </div>
        </form>
    </div>
@endsection