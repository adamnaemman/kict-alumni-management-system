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

        /* Page styling */
        .create-page {
            background: linear-gradient(180deg, #3d8b7a 0%, #4a9a8a 60%, #b89c4d 100%);
            min-height: calc(100vh - 85px);
            padding: 30px 50px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Header Row */
        .header-row {
            width: 100%;
            max-width: 800px;
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
            font-size: 24px;
            font-weight: 700;
            color: #2d2d2d;
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 15px;
        }

        .action-button {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 5px;
            cursor: pointer;
            text-decoration: none;
            border: none;
            background: none;
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

        /* Form Card */
        .form-card {
            background: linear-gradient(135deg, rgba(74, 154, 138, 0.7) 0%, rgba(90, 168, 152, 0.7) 100%);
            border-radius: 16px;
            padding: 35px 40px;
            width: 100%;
            max-width: 800px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        /* Form Elements */
        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            color: white;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .form-input {
            width: 100%;
            background-color: rgba(74, 138, 126, 0.8);
            border: none;
            border-radius: 8px;
            padding: 14px 18px;
            color: white;
            font-size: 16px;
            box-sizing: border-box;
        }

        .form-input::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .form-input:focus {
            outline: 2px solid #e4a835;
            background-color: rgba(74, 138, 126, 0.95);
        }

        .form-select {
            width: 100%;
            background-color: rgba(74, 138, 126, 0.8);
            border: none;
            border-radius: 8px;
            padding: 14px 18px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            box-sizing: border-box;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='white'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 20px;
        }

        .form-select option {
            background-color: #4a9a8a;
            color: white;
        }

        /* Two Column Grid */
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        /* Upload Area */
        .upload-area {
            border: 2px dashed rgba(255, 255, 255, 0.5);
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            cursor: pointer;
            transition: all 0.2s;
            background-color: rgba(74, 138, 126, 0.4);
        }

        .upload-area:hover {
            border-color: #e4a835;
            background-color: rgba(74, 138, 126, 0.6);
        }

        .upload-text {
            color: white;
            font-size: 16px;
            font-weight: 500;
        }

        .upload-subtext {
            color: rgba(255, 255, 255, 0.7);
            font-size: 14px;
            margin-top: 5px;
        }

        .file-input-wrapper {
            position: relative;
            background-color: rgba(74, 138, 126, 0.8);
            border-radius: 8px;
            padding: 14px 18px;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .file-input-wrapper input[type="file"] {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        .choose-file-btn {
            background-color: rgba(255, 255, 255, 0.3);
            color: white;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
        }

        .file-name {
            color: rgba(255, 255, 255, 0.7);
            font-size: 14px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .create-page {
                padding: 20px;
            }

            .header-row {
                flex-direction: column;
                gap: 15px;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .form-card {
                padding: 25px;
            }
        }
    </style>

    <form action="{{ route('achievements.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="create-page">
            <!-- Header -->
            <div class="header-row">
                <div class="title-pill">
                    <span class="title-text">Add New Achievement</span>
                </div>
                <div class="action-buttons">
                    <button type="submit" class="action-button">
                        <div class="action-button-icon save">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
                            </svg>
                        </div>
                        <span>Save</span>
                    </button>
                    <a href="{{ route('achievements.index') }}" class="action-button">
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

            <!-- Form Card -->
            <div class="form-card">
                <div class="form-group">
                    <label class="form-label">Achievements Title</label>
                    <input type="text" name="title" class="form-input" placeholder="e.g Dean's List" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Description</label>
                    <input type="text" name="description" class="form-input" placeholder="Brief">
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Achievement date</label>
                        <input type="date" name="event_date" class="form-input">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Category</label>
                        <select name="category" class="form-select">
                            <option value="">Select Category</option>
                            <option value="Academic">Academic</option>
                            <option value="Sports">Sports</option>
                            <option value="Leadership">Leadership</option>
                            <option value="Community Service">Community Service</option>
                            <option value="Professional">Professional</option>
                            <option value="Technical">Technical</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Achievement Proof</label>
                    <div class="upload-area" onclick="document.getElementById('image-upload').click()">
                        <div class="upload-text">Click to upload file</div>
                        <div class="upload-subtext">JPG, PNG, GIF (Max 5MB)</div>
                    </div>
                    <input type="file" id="image-upload" name="image" accept="image/*" style="display: none;">
                </div>

                <div class="form-group">
                    <label class="form-label">Achievement Proof</label>
                    <div class="file-input-wrapper">
                        <span class="choose-file-btn">Choose File</span>
                        <span class="file-name" id="file-name">No file chosen</span>
                        <input type="file" name="file" accept=".pdf,.jpg,.jpeg,.png,.gif" onchange="updateFileName(this)">
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script>
        function updateFileName(input) {
            const fileName = input.files[0] ? input.files[0].name : 'No file chosen';
            document.getElementById('file-name').textContent = fileName;
        }

        // Update image upload area text when file selected
        document.getElementById('image-upload').addEventListener('change', function () {
            const uploadArea = this.previousElementSibling;
            if (this.files[0]) {
                uploadArea.querySelector('.upload-text').textContent = this.files[0].name;
                uploadArea.querySelector('.upload-subtext').textContent = 'Click to change file';
            }
        });
    </script>
@endsection