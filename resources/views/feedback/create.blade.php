@extends('layouts.master')

@section('content')
    <style>
        /* Make main container full width */
        main.container,
        main {
            padding: 0 !important;
            margin: 0 !important;
            max-width: 100% !important;
        }

        /* Full page background with blur */
        .feedback-page {
            position: relative;
            background: url('{{ asset('images/campus-bg-3.jpg') }}') no-repeat center center fixed;
            background-size: cover;
            min-height: calc(100vh - 85px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
            overflow: hidden;
        }

        .feedback-page::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(8px);
            z-index: 1;
        }

        /* Feedback Card */
        .feedback-card {
            position: relative;
            z-index: 2;
            background-color: #5a9a8a;
            width: 100%;
            max-width: 650px;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            text-align: center;
            color: white;
        }

        .iium-logo-large {
            width: 220px;
            margin: 0 auto 30px;
        }

        .feedback-title {
            font-family: 'Poppins', sans-serif;
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 25px;
        }

        /* Star Rating */
        .star-rating {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 25px;
        }

        .star {
            cursor: pointer;
            width: 45px;
            height: 45px;
            color: #ddd;
            transition: color 0.2s;
        }

        .star.selected,
        .star:hover,
        .star:hover~.star {
            color: #e4a835;
        }

        /* Reverse order for CSS hover trick if needed, but we'll use JS for simplicity */
        .star-rating {
            flex-direction: row-reverse;
        }

        .star:hover,
        .star:hover~.star {
            color: #e4a835 !important;
        }

        .star.active,
        .star.active~.star {
            color: #e4a835 !important;
        }

        /* Textarea */
        .feedback-textarea {
            width: 100%;
            height: 200px;
            background: white;
            border: none;
            border-radius: 8px;
            padding: 20px;
            color: #2d2d2d;
            font-size: 16px;
            margin-bottom: 30px;
            resize: none;
        }

        .feedback-textarea:focus {
            outline: 3px solid #e4a835;
        }

        /* Submit Button */
        .submit-btn {
            background-color: #e4a835;
            color: #2d2d2d;
            border: none;
            padding: 12px 50px;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 700;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .submit-btn:hover {
            background-color: #d49a2a;
        }

        /* Hide the footer on this page to match Figma */
        footer {
            display: none !important;
        }
    </style>

    <div class="feedback-page">
        <div class="feedback-card">
            <img src="{{ asset('images/iium-logo-2.png') }}" alt="IIUM Logo" class="iium-logo-large">

            <h1 class="feedback-title">Rate your experience</h1>

            <form action="{{ route('feedback.store') }}" method="POST" id="feedback-form">
                @csrf
                <input type="hidden" name="rating" id="rating-value" value="0">

                <div class="star-rating">
                    <svg data-rating="5" class="star" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                        </path>
                    </svg>
                    <svg data-rating="4" class="star" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                        </path>
                    </svg>
                    <svg data-rating="3" class="star" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                        </path>
                    </svg>
                    <svg data-rating="2" class="star" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                        </path>
                    </svg>
                    <svg data-rating="1" class="star" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                        </path>
                    </svg>
                </div>

                <textarea name="message" class="feedback-textarea" placeholder="Type your experience here..."
                    required></textarea>

                <button type="submit" class="submit-btn" id="submit-button">Submit</button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const stars = document.querySelectorAll('.star');
            const ratingInput = document.getElementById('rating-value');
            const form = document.getElementById('feedback-form');

            stars.forEach(star => {
                star.addEventListener('click', function () {
                    const rating = this.getAttribute('data-rating');
                    ratingInput.value = rating;

                    // Clear active class from all stars
                    stars.forEach(s => s.classList.remove('active'));

                    // Add active class to clicked star and all "previous" stars (which are actually later in DOM due to row-reverse)
                    this.classList.add('active');
                });
            });

            form.addEventListener('submit', function (e) {
                if (ratingInput.value == '0') {
                    e.preventDefault();
                    alert('Please select a rating before submitting.');
                }
            });
        });
    </script>
@endsection