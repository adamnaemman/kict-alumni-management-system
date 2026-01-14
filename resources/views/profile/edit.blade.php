@extends('layouts.master')

@section('content')
    <style>
        /* Hide footer and prevent scrolling */
        footer {
            display: none !important;
        }

        body {
            overflow: hidden !important;
        }

        /* Make main container full width */
        main.container,
        main {
            padding: 0 !important;
            margin: 0 !important;
            max-width: 100% !important;
        }

        /* Edit Profile page styling */
        .profile-page {
            background: linear-gradient(180deg, #3d8b7a 0%, #4a9a8a 60%, #b89c4d 100%);
            height: calc(100vh - 60px);
            padding: 30px 50px;
            display: flex;
            gap: 30px;
            overflow: auto;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            flex-shrink: 0;
        }

        /* Greeting Pill */
        .greeting-pill {
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 50px;
            padding: 15px 30px;
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .greeting-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #e4a835;
        }

        .greeting-text {
            font-family: 'Poppins', sans-serif;
            font-size: 22px;
            font-weight: 700;
            color: #2d2d2d;
        }

        /* Sidebar Navigation */
        .sidebar-nav {
            background: linear-gradient(180deg, #4a9a8a 0%, #5aa898 100%);
            border-radius: 12px;
            padding: 15px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .sidebar-btn {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 15px;
            border-radius: 8px;
            background: transparent;
            color: white;
            font-size: 15px;
            font-weight: 500;
            border: none;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
            margin-bottom: 5px;
        }

        .sidebar-btn:hover {
            background-color: rgba(255, 255, 255, 0.15);
        }

        .sidebar-btn.active {
            background-color: #e4a835;
            color: white;
        }

        .sidebar-btn svg {
            width: 22px;
            height: 22px;
        }

        /* Action Buttons */
        .action-buttons-container {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .action-button {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .action-button-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .action-button-icon.save {
            background-color: #4a9a8a;
            color: white;
        }

        .action-button-icon.cancel {
            background-color: white;
            color: #ef4444;
        }

        .action-button-icon svg {
            width: 28px;
            height: 28px;
        }

        .action-button span {
            color: white;
            font-size: 13px;
            font-weight: 600;
        }

        /* Main Content */
        .main-content {
            flex: 1;
        }

        /* Content Card */
        .content-card {
            background: linear-gradient(135deg, rgba(74, 154, 138, 0.6) 0%, rgba(90, 168, 152, 0.6) 100%);
            border-radius: 16px;
            padding: 30px 40px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .section-title {
            font-family: 'Poppins', sans-serif;
            font-size: 28px;
            font-weight: 700;
            color: white;
            margin-bottom: 25px;
        }

        /* Form Grid */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px 30px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-label {
            color: white;
            font-size: 20px;
            font-weight: 600;
        }

        .form-input {
            background-color: rgba(74, 138, 126, 0.8);
            border: none;
            border-radius: 8px;
            padding: 12px 16px;
            color: white;
            font-size: 20px;
        }

        .form-input::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .form-input:focus {
            outline: 2px solid #e4a835;
            background-color: rgba(74, 138, 126, 0.95);
        }

        .form-select {
            background-color: rgba(74, 138, 126, 0.8);
            border: none;
            border-radius: 8px;
            padding: 12px 16px;
            color: white;
            font-size: 20px;
            cursor: pointer;
        }

        .form-select option {
            background-color: #4a9a8a;
            color: white;
        }

        /* Responsive */
        @media (max-width: 900px) {
            .profile-page {
                flex-direction: column;
                padding: 20px;
            }

            .sidebar {
                width: 100%;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        <div class="profile-page">
            <!-- Sidebar -->
            <div class="sidebar">
                <div class="greeting-pill">
                    <div class="greeting-avatar"></div>
                    <span class="greeting-text">Edit Profile</span>
                </div>

                <div class="sidebar-nav">
                    <button type="button" class="sidebar-btn active" onclick="showSection('personal')">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Personal Information
                    </button>
                    <button type="button" class="sidebar-btn" onclick="showSection('academic')">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 14l9-5-9-5-9 5 9 5z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                        </svg>
                        Academic Information
                    </button>
                    <button type="button" class="sidebar-btn" onclick="showSection('professional')">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        Professional Details
                    </button>
                    <a href="{{ route('dashboard') }}" class="sidebar-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                        </svg>
                        Back to Dashboard
                    </a>
                </div>

                <!-- Save/Cancel Buttons -->
                <div class="action-buttons-container">
                    <button type="submit" class="action-button">
                        <div class="action-button-icon save">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                            </svg>
                        </div>
                        <span>Save</span>
                    </button>
                    <a href="{{ route('profile.show') }}" class="action-button">
                        <div class="action-button-icon cancel">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </div>
                        <span>Cancel</span>
                    </a>
                </div>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <!-- Personal Information Section -->
                <div id="section-personal" class="content-section">
                    <div class="content-card">
                        <h2 class="section-title">Personal Information</h2>
                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label">Full name</label>
                                <input type="text" name="name" class="form-input" value="{{ old('name', $user->name) }}"
                                    required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-input" value="{{ old('email', $user->email) }}"
                                    required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Phone Number</label>
                                <input type="text" name="phone_number" class="form-input"
                                    value="{{ old('phone_number', $user->phone_number) }}" placeholder="e.g. 01234567890">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Gender</label>
                                <select name="gender" class="form-select">
                                    <option value="">Select Gender</option>
                                    <option value="Male" {{ old('gender', $user->gender) == 'Male' ? 'selected' : '' }}>Male
                                    </option>
                                    <option value="Female" {{ old('gender', $user->gender) == 'Female' ? 'selected' : '' }}>
                                        Female</option>
                                    <option value="Others" {{ old('gender', $user->gender) == 'Others' ? 'selected' : '' }}>
                                        Others</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Birthdate</label>
                                <input type="date" name="birthdate" class="form-input"
                                    value="{{ old('birthdate', $user->birthdate ? $user->birthdate->format('Y-m-d') : '') }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Race</label>
                                <select name="race" class="form-select">
                                    <option value="">Select Race</option>
                                    <option value="Malay" {{ old('race', $user->race) == 'Malay' ? 'selected' : '' }}>Malay
                                    </option>
                                    <option value="Chinese" {{ old('race', $user->race) == 'Chinese' ? 'selected' : '' }}>
                                        Chinese</option>
                                    <option value="Indian" {{ old('race', $user->race) == 'Indian' ? 'selected' : '' }}>Indian
                                    </option>
                                    <option value="Bumiputera Sabah" {{ old('race', $user->race) == 'Bumiputera Sabah' ? 'selected' : '' }}>Bumiputera Sabah</option>
                                    <option value="Bumiputera Sarawak" {{ old('race', $user->race) == 'Bumiputera Sarawak' ? 'selected' : '' }}>Bumiputera Sarawak</option>
                                    <option value="Others" {{ old('race', $user->race) == 'Others' ? 'selected' : '' }}>Others
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Current Address</label>
                                <input type="text" name="address" class="form-input"
                                    value="{{ old('address', $user->address) }}"
                                    placeholder="e.g. Mahallah Maryam, IIUM Gombak">
                            </div>
                            <div class="form-group">
                                <label class="form-label">State</label>
                                <select name="state" class="form-select">
                                    <option value="">Select State</option>
                                    <option value="Johor" {{ old('state', $user->state) == 'Johor' ? 'selected' : '' }}>Johor
                                    </option>
                                    <option value="Kedah" {{ old('state', $user->state) == 'Kedah' ? 'selected' : '' }}>Kedah
                                    </option>
                                    <option value="Kelantan" {{ old('state', $user->state) == 'Kelantan' ? 'selected' : '' }}>
                                        Kelantan</option>
                                    <option value="Melaka" {{ old('state', $user->state) == 'Melaka' ? 'selected' : '' }}>
                                        Melaka</option>
                                    <option value="Negeri Sembilan" {{ old('state', $user->state) == 'Negeri Sembilan' ? 'selected' : '' }}>Negeri Sembilan</option>
                                    <option value="Pahang" {{ old('state', $user->state) == 'Pahang' ? 'selected' : '' }}>
                                        Pahang</option>
                                    <option value="Perak" {{ old('state', $user->state) == 'Perak' ? 'selected' : '' }}>Perak
                                    </option>
                                    <option value="Perlis" {{ old('state', $user->state) == 'Perlis' ? 'selected' : '' }}>
                                        Perlis</option>
                                    <option value="Pulau Pinang" {{ old('state', $user->state) == 'Pulau Pinang' ? 'selected' : '' }}>Pulau Pinang</option>
                                    <option value="Sabah" {{ old('state', $user->state) == 'Sabah' ? 'selected' : '' }}>Sabah
                                    </option>
                                    <option value="Sarawak" {{ old('state', $user->state) == 'Sarawak' ? 'selected' : '' }}>
                                        Sarawak</option>
                                    <option value="Selangor" {{ old('state', $user->state) == 'Selangor' ? 'selected' : '' }}>
                                        Selangor</option>
                                    <option value="Terengganu" {{ old('state', $user->state) == 'Terengganu' ? 'selected' : '' }}>Terengganu</option>
                                    <option value="Kuala Lumpur" {{ old('state', $user->state) == 'Kuala Lumpur' ? 'selected' : '' }}>Kuala Lumpur</option>
                                    <option value="Labuan" {{ old('state', $user->state) == 'Labuan' ? 'selected' : '' }}>
                                        Labuan</option>
                                    <option value="Putrajaya" {{ old('state', $user->state) == 'Putrajaya' ? 'selected' : '' }}>Putrajaya</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Postcode</label>
                                <input type="text" name="postcode" class="form-input"
                                    value="{{ old('postcode', $user->postcode) }}" placeholder="e.g. 53100">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Academic Information Section -->
                <div id="section-academic" class="content-section" style="display: none;">
                    <div class="content-card">
                        <h2 class="section-title">Academic Information</h2>
                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label">Matric Number</label>
                                <input type="text" name="student_id" class="form-input"
                                    value="{{ old('student_id', $user->student_id) }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Program</label>
                                <input type="text" name="program" class="form-input"
                                    value="{{ old('program', $user->program) }}" placeholder="e.g. BIT">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Graduation Year</label>
                                <input type="text" name="graduation_year" class="form-input"
                                    value="{{ old('graduation_year', $user->graduation_year) }}" placeholder="e.g. 2023">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Professional Details Section -->
                <div id="section-professional" class="content-section" style="display: none;">
                    <div class="content-card">
                        <h2 class="section-title">Professional Details</h2>
                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label">Current Position</label>
                                <input type="text" name="current_position" class="form-input"
                                    value="{{ old('current_position', $user->current_position) }}"
                                    placeholder="e.g. Software Engineer">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Current Company</label>
                                <input type="text" name="current_company" class="form-input"
                                    value="{{ old('current_company', $user->current_company) }}" placeholder="e.g. Google">
                            </div>
                            <div class="form-group">
                                <label class="form-label">LinkedIn URL</label>
                                <input type="url" name="linkedin_url" class="form-input"
                                    value="{{ old('linkedin_url', $user->linkedin_url) }}"
                                    placeholder="e.g. https://linkedin.com/in/yourname">
                            </div>
                            <div class="form-group" style="grid-column: span 2;">
                                <label class="form-label">Bio</label>
                                <textarea name="bio" class="form-input" rows="3"
                                    placeholder="Tell us about yourself...">{{ old('bio', $user->bio) }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        function showSection(section) {
            // Hide all sections
            document.querySelectorAll('.content-section').forEach(s => s.style.display = 'none');
            // Show selected section
            document.getElementById('section-' + section).style.display = 'block';
            // Update active button
            document.querySelectorAll('.sidebar-btn').forEach(btn => btn.classList.remove('active'));
            event.target.closest('.sidebar-btn').classList.add('active');
        }
    </script>
@endsection