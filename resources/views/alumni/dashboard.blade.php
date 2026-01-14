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

        /* Make main container full width */
        main.container,
        main {
            padding: 0 !important;
            margin: 0 !important;
            max-width: 100% !important;
        }

        /* Dashboard page styling */
        .dashboard-page {
            background: linear-gradient(180deg, #3d8b7a 0%, #4a9a8a 60%, #b89c4d 100%);
            height: calc(100vh - 85px);
            padding: 30px 50px;
            overflow: auto;
        }

        /* Welcome text */
        .welcome-text {
            font-family: 'Poppins', sans-serif;
            font-size: 32px;
            font-weight: 700;
            color: white;
            margin-bottom: 25px;
            font-style: italic;
        }

        /* Stats cards row */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: linear-gradient(135deg, #c9a227 0%, #e4b82e 50%, #d4a520 100%);
            border-radius: 12px;
            padding: 20px 25px;
            color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.15);
        }

        .stat-label {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .stat-value {
            font-size: 48px;
            font-weight: 700;
        }

        /* Content sections row */
        .content-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
        }

        .content-card {
            background: linear-gradient(135deg, #c9a227 0%, #e4b82e 50%, #d4a520 100%);
            border-radius: 16px;
            padding: 25px 30px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .content-title {
            font-family: 'Poppins', sans-serif;
            font-size: 22px;
            font-weight: 700;
            color: white;
            margin-bottom: 20px;
        }

        .item-card {
            background: white;
            border-radius: 10px;
            padding: 15px 20px;
            margin-bottom: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .item-card:last-child {
            margin-bottom: 0;
        }

        .item-info .item-title {
            font-weight: 700;
            color: #2d2d2d;
            font-size: 16px;
        }

        .item-info .item-date {
            color: #666;
            font-size: 13px;
        }

        .status-badge {
            padding: 6px 16px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 700;
        }

        .status-approved {
            background-color: #22c55e;
            color: white;
        }

        .status-rejected {
            background-color: #ef4444;
            color: white;
        }

        .status-pending {
            background-color: #eab308;
            color: white;
        }

        .empty-message {
            color: rgba(255, 255, 255, 0.8);
            font-size: 15px;
        }

        /* Responsive */
        @media (max-width: 900px) {
            .dashboard-page {
                padding: 20px;
            }

            .stats-row {
                grid-template-columns: repeat(2, 1fr);
            }

            .content-row {
                grid-template-columns: 1fr;
            }

            .welcome-text {
                font-size: 24px;
            }
        }
    </style>

    <div class="dashboard-page">
        <!-- Welcome Section -->
        <h1 class="welcome-text">Welcome Back, {{ $user->name }}!</h1>

        <!-- Stats Cards -->
        <div class="stats-row">
            <div class="stat-card">
                <div class="stat-label">Total Achievements</div>
                <div class="stat-value">{{ $stats['total'] }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Approved</div>
                <div class="stat-value">{{ $stats['approved'] }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Pending Review</div>
                <div class="stat-value">{{ $stats['pending'] }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Feedback Sent</div>
                <div class="stat-value">{{ $stats['feedback'] }}</div>
            </div>
        </div>

        <!-- Content Sections -->
        <div class="content-row" style="grid-template-columns: 1fr;">
            <!-- My Achievements -->
            <div class="content-card">
                <h2 class="content-title">My Achievement</h2>
                @if($achievements->isEmpty())
                    <p class="empty-message">No achievements added yet.</p>
                @else
                    @foreach($achievements->take(5) as $achievement)
                        <div class="item-card">
                            <div class="item-info">
                                <div class="item-title">{{ $achievement->title }}</div>
                                <div class="item-date">Date :
                                    {{ $achievement->event_date ? \Carbon\Carbon::parse($achievement->event_date)->format('d M Y') : '-' }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection