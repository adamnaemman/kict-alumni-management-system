@extends('layouts.master')

@section('content')
    <!-- Import Poppins Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;0,800;1,700&display=swap"
        rel="stylesheet">

    <style>
        /* Hide footer and prevent scrolling */
        footer {
            display: none !important;
        }

        body {
            /* Remove overflow: hidden to allow scrolling through the alumni list */
        }

        /* Make main container full width */
        main.container,
        main {
            padding: 0 !important;
            margin: 0 !important;
            max-width: 100% !important;
        }

        /* Admin page styling */
        .admin-page {
            background: linear-gradient(180deg, #3d8b7a 0%, #4a9a8a 60%, #b89c4d 100%);
            min-height: calc(100vh - 85px);
            padding: 30px 50px;
            overflow: auto;
        }

        /* Top Cards Layout */
        .top-cards {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
            margin-bottom: 30px;
        }

        .stats-card,
        .report-card {
            background: linear-gradient(90deg, #4d9a8a 0%, #c4a13e 100%);
            border-radius: 20px;
            padding: 35px;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .stats-card {
            background: linear-gradient(90deg, #3d8b7a 0%, #d4a33e 100%);
        }

        .report-card {
            background: linear-gradient(90deg, #4a9a8a 0%, #b89c4d 100%);
        }

        .card-title {
            font-family: 'Poppins', sans-serif;
            font-size: 32px;
            font-weight: 700;
            color: white;
            margin-bottom: 20px;
        }

        .stats-content {
            display: flex;
            align-items: baseline;
            gap: 15px;
            margin-top: 20px;
        }

        .stats-number {
            font-size: 40px;
            font-weight: 800;
            color: white;
        }

        .stats-label {
            font-size: 28px;
            font-weight: 500;
            color: white;
        }

        .report-card {
            background-color: rgba(228, 168, 53, 0.2);
            /* Slightly more subtle gold */
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .section-title {
            font-family: 'Poppins', sans-serif;
            font-size: 32px;
            font-weight: 700;
            color: white;
            margin-bottom: 25px;
        }

        .report-controls {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .state-dropdown {
            width: 100%;
            background-color: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 8px;
            padding: 14px 20px;
            color: white;
            font-size: 18px;
            cursor: pointer;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='white'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 20px;
        }

        .state-dropdown option {
            background-color: #3d8b7a;
            color: white;
        }

        .generate-btn {
            background-color: #3d8b7a;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 14px 30px;
            font-size: 18px;
            font-weight: 700;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: all 0.2s;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .generate-btn:hover {
            background-color: #317264;
            transform: translateY(-1px);
        }

        /* List Alumni Section */
        .list-title {
            font-family: 'Poppins', sans-serif;
            font-size: 32px;
            font-weight: 700;
            color: white;
            margin-bottom: 25px;
            margin-top: 10px;
        }

        /* Alumni Table Styling */
        .alumni-table-card {
            background-color: transparent;
            border-radius: 12px;
            overflow: hidden;
            width: 100%;
        }

        .alumni-table {
            width: 100%;
            border-collapse: collapse;
            font-family: 'Poppins', sans-serif;
        }

        .alumni-table thead {
            background-color: #3d8b7a;
        }

        .alumni-table th {
            color: white;
            font-size: 18px;
            font-weight: 600;
            padding: 20px;
            text-align: left;
        }

        .alumni-table tbody tr:nth-child(odd) {
            background-color: #5aa898;
        }

        .alumni-table tbody tr:nth-child(even) {
            background-color: #4a9a8a;
        }

        .alumni-table td {
            padding: 18px 20px;
            color: white;
            font-size: 18px;
            font-weight: 500;
            vertical-align: middle;
        }

        .view-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 18px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            text-decoration: none;
            background-color: white;
            color: #d0a33e;
            transition: all 0.2s;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .view-btn:hover {
            background-color: #fcf6e8;
            transform: scale(1.05);
        }

        /* Search & Filter Bar Styling */
        .controls-container {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 25px;
            width: 100%;
        }

        .search-wrapper {
            position: relative;
            flex-grow: 1;
            min-width: 300px;
        }

        .search-input {
            width: 100%;
            background-color: white;
            border: none;
            border-radius: 12px;
            padding: 14px 20px 14px 45px;
            font-size: 16px;
            color: #333;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            font-family: 'Poppins', sans-serif;
        }

        .search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
            width: 20px;
            height: 20px;
        }

        .filter-select {
            background-color: white;
            border: none;
            border-radius: 12px;
            padding: 14px 45px 14px 20px;
            font-size: 16px;
            color: #333;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            font-family: 'Poppins', sans-serif;
            cursor: pointer;
            min-width: 150px;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%23666'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 18px;
        }

        .filter-btn {
            background-color: white;
            color: #333;
            border: none;
            border-radius: 12px;
            padding: 14px 25px;
            font-size: 16px;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: all 0.2s;
            font-family: 'Poppins', sans-serif;
        }

        .filter-btn:hover {
            background-color: #f8f9fa;
        }

        /* Responsive */
        @media (max-width: 1100px) {
            .top-cards {
                grid-template-columns: 1fr;
            }

            .controls-container {
                flex-direction: column;
                align-items: stretch;
            }

            .filter-select {
                width: 100%;
            }

            .alumni-table th,
            .alumni-table td {
                font-size: 14px;
                padding: 12px;
            }
        }
    </style>

    <div class="admin-page">
        <!-- Top Cards: Total Alumni and Report Generator -->
        <div class="top-cards">
            <!-- Total Alumni Card -->
            <div class="stats-card">
                <h2 class="card-title">Total Alumni</h2>
                <div class="stats-content">
                    <span class="stats-number">{{ $totalAlumni ?? 0 }}</span>
                    <span class="stats-label">Alumni</span>
                </div>
            </div>

            <!-- Report Generator Card -->
            <div class="report-card">
                <h2 class="section-title">Report Generator</h2>
                <form action="{{ route('admin.generate-report') }}" method="GET" class="report-controls">
                    <select name="state" class="state-dropdown">
                        <option value="">All States</option>
                        <option value="Johor">Johor</option>
                        <option value="Kedah">Kedah</option>
                        <option value="Kelantan">Kelantan</option>
                        <option value="Melaka">Melaka</option>
                        <option value="Negeri Sembilan">Negeri Sembilan</option>
                        <option value="Pahang">Pahang</option>
                        <option value="Perak">Perak</option>
                        <option value="Perlis">Perlis</option>
                        <option value="Pulau Pinang">Pulau Pinang</option>
                        <option value="Sabah">Sabah</option>
                        <option value="Sarawak">Sarawak</option>
                        <option value="Selangor">Selangor</option>
                        <option value="Terengganu">Terengganu</option>
                        <option value="Kuala Lumpur">Kuala Lumpur</option>
                        <option value="Labuan">Labuan</option>
                        <option value="Putrajaya">Putrajaya</option>
                    </select>
                    <button type="submit" class="generate-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        Generate Report
                    </button>
                </form>
            </div>
        </div>

        <!-- List Alumni Section Section Header and Search/Filter Bar -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h2 class="list-title" style="margin-bottom: 0;">List Alumni</h2>
        </div>

        <form action="{{ route('admin.alumni') }}" method="GET" class="controls-container">
            <!-- Search Bar -->
            <div class="search-wrapper">
                <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <input type="text" name="search" class="search-input" placeholder="Search by name or student ID..."
                    value="{{ request('search') }}">
            </div>

            <!-- Program Filter -->
            <select name="program_filter" class="filter-select">
                <option value="">All Programs</option>
                <option value="BCS" {{ request('program_filter') == 'BCS' ? 'selected' : '' }}>BCS</option>
                <option value="BIT" {{ request('program_filter') == 'BIT' ? 'selected' : '' }}>BIT</option>
            </select>

            <!-- State Filter -->
            <select name="state_filter" class="filter-select">
                <option value="">All States</option>
                <option value="Johor" {{ request('state_filter') == 'Johor' ? 'selected' : '' }}>Johor</option>
                <option value="Kedah" {{ request('state_filter') == 'Kedah' ? 'selected' : '' }}>Kedah</option>
                <option value="Kelantan" {{ request('state_filter') == 'Kelantan' ? 'selected' : '' }}>Kelantan</option>
                <option value="Melaka" {{ request('state_filter') == 'Melaka' ? 'selected' : '' }}>Melaka</option>
                <option value="Negeri Sembilan" {{ request('state_filter') == 'Negeri Sembilan' ? 'selected' : '' }}>Negeri
                    Sembilan</option>
                <option value="Pahang" {{ request('state_filter') == 'Pahang' ? 'selected' : '' }}>Pahang</option>
                <option value="Perak" {{ request('state_filter') == 'Perak' ? 'selected' : '' }}>Perak</option>
                <option value="Perlis" {{ request('state_filter') == 'Perlis' ? 'selected' : '' }}>Perlis</option>
                <option value="Pulau Pinang" {{ request('state_filter') == 'Pulau Pinang' ? 'selected' : '' }}>Pulau Pinang
                </option>
                <option value="Sabah" {{ request('state_filter') == 'Sabah' ? 'selected' : '' }}>Sabah</option>
                <option value="Sarawak" {{ request('state_filter') == 'Sarawak' ? 'selected' : '' }}>Sarawak</option>
                <option value="Selangor" {{ request('state_filter') == 'Selangor' ? 'selected' : '' }}>Selangor</option>
                <option value="Terengganu" {{ request('state_filter') == 'Terengganu' ? 'selected' : '' }}>Terengganu</option>
                <option value="Kuala Lumpur" {{ request('state_filter') == 'Kuala Lumpur' ? 'selected' : '' }}>Kuala Lumpur
                </option>
                <option value="Labuan" {{ request('state_filter') == 'Labuan' ? 'selected' : '' }}>Labuan</option>
                <option value="Putrajaya" {{ request('state_filter') == 'Putrajaya' ? 'selected' : '' }}>Putrajaya</option>
            </select>

            <!-- Sorting Dropdown -->
            <select name="sort" class="filter-select">
                <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>A to Z</option>
                <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Z to A</option>
            </select>

            <button type="submit" class="filter-btn">Filter</button>

            @if(request('search') || request('program_filter') || request('state_filter') || request('sort'))
                <a href="{{ route('admin.alumni') }}" class="filter-btn"
                    style="text-decoration: none; text-align: center; background-color: #f1f1f1;">Clear</a>
            @endif
        </form>

        <div class="alumni-table-card">
            @if($alumni->isEmpty())
                <div class="empty-state">
                    No alumni registered yet.
            @else
                    <table class="alumni-table">
                        <thead>
                            <tr>
                                <th>Name Alumni</th>
                                <th>Program</th>
                                <th>Graduate Years</th>
                                <th>State</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($alumni as $alumnus)
                                <tr class="alumni-row">
                                    <td>{{ strtoupper($alumnus->name) }}</td>
                                    <td>{{ $alumnus->program ?? '-' }}</td>
                                    <td>{{ $alumnus->graduation_year ?? '-' }}</td>
                                    <td>{{ $alumnus->state ?? '-' }}</td>
                                    <td style="text-align: right;">
                                        <a href="{{ route('admin.alumni.show', $alumnus->id) }}" class="view-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                                            </svg>
                                            View Alumni
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
@endsection