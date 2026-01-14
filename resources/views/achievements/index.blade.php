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

        /* Achievements page styling */
        .achievements-page {
            background: linear-gradient(180deg, #3d8b7a 0%, #4a9a8a 60%, #b89c4d 100%);
            height: calc(100vh - 85px);
            padding: 30px 50px;
            overflow: auto;
        }

        /* Header Row */
        .header-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        /* Title Pill */
        .title-pill {
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 50px;
            padding: 15px 35px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .title-text {
            font-family: 'Poppins', sans-serif;
            font-size: 26px;
            font-weight: 700;
            color: #2d2d2d;
        }

        /* Add Button */
        .add-btn {
            background-color: #e4a835;
            color: white;
            padding: 12px 25px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.15);
            transition: all 0.2s;
        }

        .add-btn:hover {
            background-color: #d09a2d;
            transform: translateY(-2px);
        }

        /* Table Card */
        .table-card {
            background: linear-gradient(135deg, rgba(74, 154, 138, 0.8) 0%, rgba(90, 168, 152, 0.8) 100%);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        /* Table */
        .achievements-table {
            width: 100%;
            border-collapse: collapse;
        }

        .achievements-table thead {
            background-color: rgba(13, 61, 61, 0.9);
        }

        .achievements-table th {
            color: white;
            font-size: 16px;
            font-weight: 600;
            text-transform: uppercase;
            padding: 18px 20px;
            text-align: left;
        }

        .achievements-table tbody tr {
            background-color: rgba(90, 168, 152, 0.6);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .achievements-table tbody tr:hover {
            background-color: rgba(90, 168, 152, 0.8);
        }

        .achievements-table td {
            padding: 18px 20px;
            color: white;
            vertical-align: middle;
        }

        .achievement-title {
            font-size: 18px;
            font-weight: 700;
            color: white;
        }

        .achievement-desc {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.85);
            margin-top: 5px;
            line-height: 1.4;
        }

        .date-cell {
            display: flex;
            align-items: center;
            gap: 8px;
            color: white;
            font-size: 15px;
        }

        .date-cell svg {
            width: 18px;
            height: 18px;
        }

        /* Action Buttons */
        .action-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            border: 2px solid;
            background: transparent;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-view {
            border-color: #e4a835;
            color: #e4a835;
        }

        .btn-view:hover {
            background-color: #e4a835;
            color: white;
        }

        .btn-edit {
            border-color: #e4a835;
            color: #e4a835;
            background-color: white;
        }

        .btn-edit:hover {
            background-color: #e4a835;
            color: white;
        }

        .btn-delete {
            border-color: #ef4444;
            color: #ef4444;
            background-color: white;
        }

        .btn-delete:hover {
            background-color: #ef4444;
            color: white;
        }

        .action-btn svg {
            width: 16px;
            height: 16px;
        }

        .actions-cell {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
        }

        /* Empty State */
        .empty-state {
            padding: 60px;
            text-align: center;
            color: rgba(255, 255, 255, 0.8);
            font-size: 18px;
        }

        /* Back Link */
        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 25px;
            color: white;
            font-size: 16px;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .back-link svg {
            width: 20px;
            height: 20px;
        }

        /* Success Message */
        .success-message {
            background-color: rgba(34, 197, 94, 0.2);
            border: 1px solid rgba(34, 197, 94, 0.5);
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        /* Responsive */
        @media (max-width: 900px) {
            .achievements-page {
                padding: 20px;
            }

            .header-row {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }

            .achievements-table th,
            .achievements-table td {
                padding: 12px;
                font-size: 14px;
            }

            .actions-cell {
                flex-direction: column;
                gap: 5px;
            }
        }
    </style>

    <div class="achievements-page">
        <!-- Header -->
        <div class="header-row">
            <div class="title-pill">
                <span class="title-text">My Achievements</span>
            </div>
            <a href="{{ route('achievements.create') }}" class="add-btn">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="20"
                    height="20">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add New Achievements
            </a>
        </div>

        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <!-- Table Card -->
        <div class="table-card">
            @if($achievements->isEmpty())
                <div class="empty-state">
                    You haven't added any achievements yet.
                </div>
            @else
                <table class="achievements-table">
                    <thead>
                        <tr>
                            <th>Achievement</th>
                            <th>Date</th>
                            <th>Document</th>
                            <th style="text-align: right;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($achievements as $achievement)
                            <tr>
                                <td>
                                    <div class="achievement-title">{{ $achievement->title }}</div>
                                    @if($achievement->description)
                                        <div class="achievement-desc">{{ $achievement->description }}</div>
                                    @endif
                                </td>
                                <td>
                                    <div class="date-cell">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        {{ $achievement->event_date ? \Carbon\Carbon::parse($achievement->event_date)->format('d M Y') : '-' }}
                                    </div>
                                </td>
                                <td>
                                    @if($achievement->file_path)
                                        <a href="{{ asset('storage/' . $achievement->file_path) }}" target="_blank"
                                            class="action-btn btn-view">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                            View File
                                        </a>
                                    @else
                                        <span style="color: rgba(255,255,255,0.5);">No file</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="actions-cell">
                                        <a href="{{ route('achievements.edit', $achievement->id) }}" class="action-btn btn-edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                            Edit
                                        </a>
                                        <form action="{{ route('achievements.destroy', $achievement->id) }}" method="POST"
                                            style="display: inline;"
                                            onsubmit="return confirm('Are you sure you want to delete this achievement?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="action-btn btn-delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

        <!-- Back to Dashboard -->
        <a href="{{ route('dashboard') }}" class="back-link">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
            </svg>
            Back to Dashboard
        </a>
    </div>
@endsection