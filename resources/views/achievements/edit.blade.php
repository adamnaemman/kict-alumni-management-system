@extends('layouts.master')

@section('content')
    <!-- Import Poppins Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;0,800;1,700&display=swap"
        rel="stylesheet">

    <style>
        /* Hide footer */
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

        /* Full-screen gradient background */
        .achievement-page {
            background: linear-gradient(180deg, #3d8b7a 0%, #4a9a8a 60%, #b89c4d 100%);
            min-height: calc(100vh - 85px);
            padding: 40px 50px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            overflow: auto;
        }

        /* Page Header */
        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            max-width: 600px;
            margin-bottom: 20px;
        }

        .page-title {
            font-family: 'Poppins', sans-serif;
            font-size: 32px;
            font-weight: 700;
            color: white;
            margin: 0;
        }

        /* Modal-style card */
        .form-card {
            background: rgba(90, 168, 152, 0.95);
            border-radius: 20px;
            padding: 30px 40px;
            max-width: 600px;
            width: 100%;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
        }



        /* Action buttons (Save/Cancel) */
        .action-buttons {
            display: flex;
            gap: 12px;
        }

        .action-btn {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 5px;
            cursor: pointer;
            text-decoration: none;
            border: none;
            background: none;
            transition: transform 0.2s;
        }

        .action-btn:hover {
            transform: scale(1.05);
        }

        .action-btn-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .action-btn-icon.save {
            background-color: #4a9a8a;
        }

        .action-btn-icon.save svg {
            stroke: white;
        }

        .action-btn-icon.cancel {
            background-color: white;
        }

        .action-btn-icon.cancel svg {
            stroke: #ef4444;
        }

        .action-btn-icon svg {
            width: 28px;
            height: 28px;
        }

        .action-btn-text {
            font-family: 'Poppins', sans-serif;
            font-size: 13px;
            color: white;
            font-weight: 600;
        }

        /* Form groups */
        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            font-weight: 600;
            color: white;
            display: block;
            margin-bottom: 8px;
        }

        .form-input,
        .form-textarea,
        .form-select {
            width: 100%;
            background: rgba(255, 255, 255, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.4);
            border-radius: 8px;
            padding: 12px 16px;
            font-family: 'Poppins', sans-serif;
            font-size: 15px;
            color: white;
            transition: all 0.2s;
        }

        .form-input::placeholder,
        .form-textarea::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .form-input:focus,
        .form-textarea:focus,
        .form-select:focus {
            outline: none;
            background: rgba(255, 255, 255, 0.4);
            border-color: rgba(255, 255, 255, 0.6);
        }

        .form-textarea {
            resize: vertical;
            min-height: 80px;
        }

        /* Date and Category row */
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        /* File upload areas */
        .file-upload-area {
            background: rgba(255, 255, 255, 0.2);
            border: 2px dashed rgba(255, 255, 255, 0.5);
            border-radius: 8px;
            padding: 30px 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.2s;
            position: relative;
        }

        .file-upload-area:hover {
            background: rgba(255, 255, 255, 0.3);
            border-color: rgba(255, 255, 255, 0.7);
        }

        .file-upload-area input[type="file"] {
            position: absolute;
            opacity: 0;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            cursor: pointer;
        }

        .upload-text {
            font-family: 'Poppins', sans-serif;
            color: rgba(255, 255, 255, 0.9);
            font-size: 14px;
            pointer-events: none;
        }

        .file-formats {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.7);
            margin-top: 5px;
        }

        .current-file {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.9);
            margin-top: 8px;
            font-weight: 600;
        }

        /* Date input styling */
        .form-input[type="date"] {
            /* Removed custom calendar icon to prevent duplication with browser's native icon */
        }

        /* Select dropdown */
        .form-select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='white'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 18px;
            padding-right: 40px;
            color: white;
        }

        .form-select option {
            background: #3d8b7a;
            color: white;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .achievement-page {
                padding: 20px;
            }

            .form-card {
                padding: 30px 20px;
            }

            .action-buttons {
                position: static;
                justify-content: center;
                margin-bottom: 20px;
            }

            .form-row {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <div class="achievement-page">
        <!-- Page Header with Title and Action Buttons -->
        <div class="page-header">
            <h1 class="page-title">Edit Achievement</h1>
            <div class="action-buttons">
                <button type="submit" form="editForm" class="action-btn">
                    <div class="action-btn-icon save">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                        </svg>
                    </div>
                    <span class="action-btn-text">Save</span>
                </button>
                <a href="{{ route('achievements.index') }}" class="action-btn">
                    <div class="action-btn-icon cancel">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </div>
                    <span class="action-btn-text">Cancel</span>
                </a>
            </div>
        </div>

        <!-- Form Card -->
        <div class="form-card">
            <!-- Form -->
            <form id="editForm" action="{{ route('achievements.update', $achievement->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Achievement Title -->
                <div class="form-group">
                    <label class="form-label">Achievements Title</label>
                    <input type="text" name="title" class="form-input" placeholder="e.g Dean's list"
                        value="{{ old('title', $achievement->title) }}" required>
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-textarea"
                        placeholder="Brief">{{ old('description', $achievement->description) }}</textarea>
                </div>

                <!-- Achievement Date and Category Row -->
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Achievement date</label>
                        <input type="date" name="event_date" class="form-input"
                            value="{{ old('event_date', $achievement->event_date) }}">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Category</label>
                        <select name="category" class="form-select">
                            <option value="">Academic</option>
                            <option value="Academic" {{ old('category', $achievement->category) == 'Academic' ? 'selected' : '' }}>Academic</option>
                            <option value="Professional" {{ old('category', $achievement->category) == 'Professional' ? 'selected' : '' }}>Professional</option>
                            <option value="Community Service" {{ old('category', $achievement->category) == 'Community Service' ? 'selected' : '' }}>Community Service</option>
                            <option value="Sports" {{ old('category', $achievement->category) == 'Sports' ? 'selected' : '' }}>Sports</option>
                            <option value="Arts & Culture" {{ old('category', $achievement->category) == 'Arts & Culture' ? 'selected' : '' }}>Arts & Culture</option>
                            <option value="Other" {{ old('category', $achievement->category) == 'Other' ? 'selected' : '' }}>
                                Other</option>
                        </select>
                    </div>
                </div>

                <!-- Achievement Proof (Image) -->
                <div class="form-group">
                    <label class="form-label">Achievement Proof</label>
                    <div class="file-upload-area">
                        <p class="upload-text">Click to upload file</p>
                        <p class="file-formats">JPG, PNG, GIF (Max 5MB)</p>
                        @if($achievement->image_path)
                            <p class="current-file">Current: {{ basename($achievement->image_path) }}</p>
                        @endif
                        <input type="file" name="image" accept="image/*">
                    </div>
                </div>

                <!-- Achievement Proof (Document) -->
                <div class="form-group">
                    <label class="form-label">Achievement Proof</label>
                    <div class="file-upload-area">
                        <p class="upload-text">Choose file</p>
                        <p class="file-formats">PDF (Max 10MB)</p>
                        @if($achievement->file_path)
                            <p class="current-file">Current: {{ basename($achievement->file_path) }}</p>
                        @endif
                        <input type="file" name="file" accept=".pdf">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection