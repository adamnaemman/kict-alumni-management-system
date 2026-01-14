@extends('layouts.master')

@section('content')
    <style>
        /* Hide footer */
        footer {
            display: none !important;
        }

        body {
            overflow: hidden !important;
        }

        main.container,
        main {
            padding: 0 !important;
            margin: 0 !important;
            max-width: 100% !important;
        }

        .alumni-show-page {
            background: linear-gradient(180deg, #3d8b7a 0%, #4a9a8a 60%, #b89c4d 100%);
            min-height: calc(100vh - 85px);
            padding: 30px 50px;
            overflow: auto;
        }

        .back-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: white;
            font-size: 16px;
            text-decoration: none;
            margin-bottom: 20px;
        }

        .back-btn:hover {
            text-decoration: underline;
        }

        .back-btn svg {
            width: 20px;
            height: 20px;
        }

        .alumni-card {
            background: linear-gradient(135deg, rgba(74, 154, 138, 0.7) 0%, rgba(90, 168, 152, 0.7) 100%);
            border-radius: 16px;
            padding: 30px 40px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .alumni-name {
            font-family: 'Poppins', sans-serif;
            font-size: 28px;
            font-weight: 700;
            color: white;
            margin-bottom: 25px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .info-item {
            background-color: rgba(74, 138, 126, 0.6);
            padding: 15px 20px;
            border-radius: 10px;
        }

        .info-label {
            font-size: 13px;
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 5px;
        }

        .info-value {
            font-size: 16px;
            color: white;
            font-weight: 500;
        }

        .section-title {
            font-size: 22px;
            font-weight: 700;
            color: white;
            margin-top: 30px;
            margin-bottom: 15px;
        }

        .achievement-list {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .achievement-item {
            background-color: rgba(74, 138, 126, 0.6);
            padding: 15px 20px;
            border-radius: 10px;
        }

        .achievement-title {
            font-size: 16px;
            font-weight: 600;
            color: white;
        }

        .achievement-date {
            font-size: 13px;
            color: rgba(255, 255, 255, 0.7);
            margin-top: 5px;
        }

        @media (max-width: 768px) {
            .info-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="alumni-show-page">
        <a href="{{ route('admin.alumni') }}" class="back-btn">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
            </svg>
            Back to Alumni List
        </a>

        <div class="alumni-card">
            <h1 class="alumni-name">{{ strtoupper($alumnus->name) }}</h1>

            <div class="info-grid">
                <div class="info-item">
                    <div class="info-label">Email</div>
                    <div class="info-value">{{ $alumnus->email }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Student ID</div>
                    <div class="info-value">{{ $alumnus->student_id ?? '-' }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Phone Number</div>
                    <div class="info-value">{{ $alumnus->phone_number ?? '-' }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Gender</div>
                    <div class="info-value">{{ $alumnus->gender ?? '-' }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">State</div>
                    <div class="info-value">{{ $alumnus->state ?? '-' }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Race</div>
                    <div class="info-value">{{ $alumnus->race ?? '-' }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Program</div>
                    <div class="info-value">{{ $alumnus->program ?? '-' }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Graduation Year</div>
                    <div class="info-value">{{ $alumnus->graduation_year ?? '-' }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Current Position</div>
                    <div class="info-value">{{ $alumnus->current_position ?? '-' }}</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Current Company</div>
                    <div class="info-value">{{ $alumnus->current_company ?? '-' }}</div>
                </div>
            </div>

            @if($achievements->count() > 0)
                <h2 class="section-title">Achievements</h2>
                <div class="achievement-list">
                    @foreach($achievements as $achievement)
                        <div class="achievement-item">
                            <div class="achievement-title">{{ $achievement->title }}</div>
                            <div class="achievement-date">
                                {{ $achievement->event_date ? \Carbon\Carbon::parse($achievement->event_date)->format('d M Y') : '' }}
                                @if($achievement->category) • {{ $achievement->category }} @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection