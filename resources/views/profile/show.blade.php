@extends('layouts.master')

@section('content')
    <style>
        /* Hide footer and prevent scrolling on this page */
        footer {
            display: none !important;
        }

        body {
            overflow: hidden !important;
        }

        /* Make main container full width with green background */
        main.container,
        main {
            padding: 0 !important;
            margin: 0 !important;
            max-width: 100% !important;
            background: #3d8b7a !important;
        }

        /* Full page green gradient background with gold transition at bottom */
        .profile-page {
            background: linear-gradient(180deg, #3d8b7a 0%, #4a9a8a 60%, #b89c4d 100%) !important;
            height: calc(100vh - 60px);
            padding: 30px 50px;
            overflow: auto;
        }

        /* Greeting Section */
        .greeting-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .greeting-pill {
            background-color: #f5f0e6;
            padding: 15px 50px;
            border-radius: 50px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .greeting-avatar {
            width: 45px;
            height: 45px;
            background-color: #e8e0d0;
            border-radius: 50%;
        }

        .greeting-text {
            font-family: 'Poppins', sans-serif;
            font-size: 24px;
            font-weight: 600;
            color: #2d2d2d;
        }

        .action-buttons {
            display: flex;
            gap: 25px;
        }

        .action-btn {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 8px;
            text-decoration: none;
            color: #2d2d2d;
        }

        .action-btn-icon {
            width: 55px;
            height: 55px;
            background-color: #e4a835;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .action-btn-icon svg {
            width: 26px;
            height: 26px;
            color: #2d2d2d;
        }

        .action-btn span {
            font-size: 13px;
            font-weight: 500;
        }

        /* Main Content Area */
        .main-content {
            display: flex;
            gap: 25px;
        }

        /* Sidebar */
        .sidebar {
            width: 280px;
            flex-shrink: 0;
        }

        .sidebar-nav {
            display: flex;
            flex-direction: column;
            gap: 8px;
            background: linear-gradient(180deg, #4a9a8a 0%, #5aa898 100%);
            padding: 15px;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        .sidebar-btn {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 20px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            font-size: 15px;
            font-weight: 500;
            transition: all 0.2s;
            text-align: left;
            width: 100%;
            background: transparent;
            color: #2d2d2d;
        }

        .sidebar-btn:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .sidebar-btn.active {
            background-color: #e4a835;
            color: white;
        }

        .sidebar-btn svg {
            width: 24px;
            height: 24px;
        }

        .sidebar-divider {
            height: 1px;
            background-color: rgba(0, 0, 0, 0.15);
            margin: 12px 0;
        }

        .back-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 20px;
            color: #2d2d2d;
            text-decoration: none;
            font-size: 15px;
            font-weight: 500;
            border-radius: 8px;
            transition: all 0.2s;
        }

        .back-link:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        /* Content Card */
        .content-area {
            flex: 1;
        }

        .content-card {
            background: linear-gradient(180deg, #5aa898 0%, #4a9a8a 100%);
            border-radius: 20px;
            padding: 30px 35px;
            min-height: 450px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        .content-section {
            display: none;
        }

        .content-section.active {
            display: block;
        }

        .section-title {
            font-family: 'Poppins', sans-serif;
            font-size: 28px;
            font-weight: 700;
            color: white;
            margin-bottom: 25px;
        }

        .info-group {
            margin-bottom: 18px;
        }

        .info-label {
            font-weight: 600;
            color: white;
            font-size: 20px;
            margin-bottom: 3px;
        }

        .info-value {
            color: rgba(255, 255, 255, 0.9);
            font-size: 20px;
        }

        /* Professional Section */
        .achievement-item {
            background: rgba(255, 255, 255, 0.25);
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 10px;
        }

        .achievement-title {
            font-weight: 600;
            color: #0d3d3d;
        }

        .achievement-desc {
            font-size: 14px;
            color: #2d2d2d;
            margin-top: 5px;
        }

        .add-achievement-btn {
            background-color: #e4a835;
            color: #2d2d2d;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            display: inline-block;
            margin-top: 15px;
        }

        .add-achievement-btn:hover {
            background-color: #d49a2a;
        }

        /* Responsive */
        @media (max-width: 900px) {
            .profile-page {
                padding: 20px;
            }

            .main-content {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
            }

            .greeting-section {
                flex-direction: column;
                gap: 20px;
            }

            .greeting-pill {
                padding: 12px 30px;
            }

            .greeting-text {
                font-size: 20px;
            }
        }
    </style>

    <div class="profile-page">
        <!-- Greeting Section -->
        <div class="greeting-section">
            <div class="greeting-pill">
                <div class="greeting-avatar"></div>
                <span class="greeting-text">Hi {{ $user->name }}</span>
            </div>
            <div class="action-buttons">
                <a href="{{ route('profile.edit') }}" class="action-btn">
                    <div class="action-btn-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <span>Edit Profile</span>
                </a>
            </div>
        </div>

        <!-- Main Content with Sidebar -->
        <div class="main-content">
            <!-- Sidebar Navigation -->
            <div class="sidebar">
                <nav class="sidebar-nav">
                    <button onclick="showSection('personal')" id="btn-personal" class="sidebar-btn active">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Personal Information
                    </button>
                    <button onclick="showSection('academic')" id="btn-academic" class="sidebar-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 14l9-5-9-5-9 5 9 5z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                        </svg>
                        Academic Information
                    </button>
                    <button onclick="showSection('professional')" id="btn-professional" class="sidebar-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        Professional Details
                    </button>

                    <div class="sidebar-divider"></div>

                    <a href="{{ route('dashboard') }}" class="back-link">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            style="width: 24px; height: 24px;">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Back to Dashboard
                    </a>
                </nav>
            </div>

            <!-- Content Area -->
            <div class="content-area">
                <div class="content-card" style="background: linear-gradient(180deg, #5aa898 0%, #4a9a8a 100%) !important;">
                    <!-- Personal Information Section -->
                    <div id="section-personal" class="content-section active">
                        <h2 class="section-title">Personal Information</h2>

                        <div class="info-group">
                            <div class="info-label">Full name</div>
                            <div class="info-value">{{ $user->name }}</div>
                        </div>

                        <div class="info-group">
                            <div class="info-label">Email</div>
                            <div class="info-value">{{ $user->email }}</div>
                        </div>

                        <div class="info-group">
                            <div class="info-label">Phone Number</div>
                            <div class="info-value">{{ $user->phone_number ?? '-' }}</div>
                        </div>

                        <div class="info-group">
                            <div class="info-label">Gender</div>
                            <div class="info-value">{{ $user->gender ?? '-' }}</div>
                        </div>

                        <div class="info-group">
                            <div class="info-label">Birthdate</div>
                            <div class="info-value">{{ $user->birthdate ? $user->birthdate->format('d/m/Y') : '-' }}</div>
                        </div>

                        <div class="info-group">
                            <div class="info-label">Current Address</div>
                            <div class="info-value">{{ $user->address ?? '-' }}</div>
                        </div>

                        <div class="info-group">
                            <div class="info-label">Postcode</div>
                            <div class="info-value">{{ $user->postcode ?? '-' }}</div>
                        </div>

                        <div class="info-group">
                            <div class="info-label">State</div>
                            <div class="info-value">{{ $user->state ?? '-' }}</div>
                        </div>
                    </div>

                    <!-- Academic Information Section -->
                    <div id="section-academic" class="content-section">
                        <h2 class="section-title">Academic Information</h2>

                        <div class="info-group">
                            <div class="info-label">Matric Number</div>
                            <div class="info-value">{{ $user->student_id ?? '-' }}</div>
                        </div>

                        <div class="info-group">
                            <div class="info-label">Program</div>
                            <div class="info-value">{{ $user->program ?? '-' }}</div>
                        </div>

                        <div class="info-group">
                            <div class="info-label">Graduation Year</div>
                            <div class="info-value">{{ $user->graduation_year ?? '-' }}</div>
                        </div>

                        <div class="info-group">
                            <div class="info-label">Account Role</div>
                            <div class="info-value" style="text-transform: capitalize;">{{ $user->role }}</div>
                        </div>
                    </div>

                    <!-- Professional Details Section -->
                    <div id="section-professional" class="content-section">
                        <h2 class="section-title">Professional Details</h2>

                        <div class="info-group">
                            <div class="info-label">Current Position</div>
                            <div class="info-value">{{ $user->current_position ?? '-' }}</div>
                        </div>

                        <div class="info-group">
                            <div class="info-label">Current Company</div>
                            <div class="info-value">{{ $user->current_company ?? '-' }}</div>
                        </div>

                        <div class="info-group">
                            <div class="info-label">LinkedIn</div>
                            <div class="info-value">
                                @if($user->linkedin_url)
                                    <a href="{{ $user->linkedin_url }}" target="_blank"
                                        style="color: #0d3d3d; text-decoration: underline;">{{ $user->linkedin_url }}</a>
                                @else
                                    -
                                @endif
                            </div>
                        </div>

                        <div class="info-group">
                            <div class="info-label">Bio</div>
                            <div class="info-value">{{ $user->bio ?? '-' }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showSection(section) {
            // Hide all sections
            document.querySelectorAll('.content-section').forEach(el => el.classList.remove('active'));
            // Remove active class from all buttons
            document.querySelectorAll('.sidebar-btn').forEach(el => el.classList.remove('active'));

            // Show selected section
            document.getElementById('section-' + section).classList.add('active');
            // Add active class to selected button
            document.getElementById('btn-' + section).classList.add('active');
        }
    </script>
@endsection