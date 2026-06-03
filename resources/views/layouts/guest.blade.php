<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="no-js">
    <head>
        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Favicon-->
        <link rel="shortcut icon" href="{{ asset('assets/img/fav.png') }}">
        <!-- meta character set -->
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Karma Shop') }}</title>

        <!-- CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/linearicons.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/nouislider.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/ion.rangeSlider.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/ion.rangeSlider.skinFlat.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
        <style>
            html, body {
                min-height: 100%;
            }

            body {
                display: flex;
                flex-direction: column;
                min-height: 100vh;
                background-color: #f7f8fb;
            }

            .page-content {
                flex: 1;
                display: flex;
                flex-direction: column;
            }

            .footer-area {
                margin-top: auto;
            }

            .auth-section {
                padding: 140px 0 40px;
            }

            .auth-card {
                background: #ffffff;
                border-radius: 16px;
                box-shadow: 0 16px 40px rgba(0, 0, 0, 0.08);
                border: 1px solid #edf2f7;
                overflow: hidden;
                display: flex;
                flex-wrap: wrap;
            }

            .auth-card .row {
                display: flex;
                flex: 1 1 100%;
                min-height: 520px;
                margin: 0;
                align-items: stretch;
            }

            .auth-card .col-lg-5,
            .auth-card .col-lg-7 {
                display: flex;
                flex-direction: column;
                padding: 0;
            }

            .auth-left {
                background: linear-gradient(135deg, #ff6c00 0%, #ffba00 100%);
                padding: 50px 40px;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                text-align: center;
                min-height: 100%;
                height: 100%;
            }

            .auth-left h2 {
                color: #ffffff;
                font-weight: 800;
                font-size: 1.8rem;
                margin-bottom: 15px;
            }

            .auth-left p {
                color: rgba(255, 255, 255, 0.85);
                font-size: 0.95rem;
                line-height: 1.7;
                margin-bottom: 30px;
                max-width: 320px;
            }

            .auth-left .auth-switch-btn {
                border: 2px solid #fff;
                color: #fff;
                padding: 10px 30px;
                border-radius: 6px;
                font-weight: 600;
                text-transform: uppercase;
                font-size: 0.85rem;
                letter-spacing: 0.5px;
                transition: all 0.3s ease;
                text-decoration: none;
            }

            .auth-left .auth-switch-btn:hover {
                background: #fff;
                color: #ff6c00;
            }

            .auth-right {
                padding: 50px 40px;
                display: flex;
                flex-direction: column;
                justify-content: center;
            }

            .auth-right h3 {
                font-weight: 700;
                color: #1a202c;
                font-size: 1.6rem;
                margin-bottom: 6px;
            }

            .auth-right .auth-subtitle {
                color: #718096;
                font-size: 0.95rem;
                margin-bottom: 32px;
            }

            .auth-right .form-group {
                margin-bottom: 20px;
            }

            .auth-right .form-group label {
                font-weight: 600;
                color: #4a5568;
                font-size: 0.85rem;
                margin-bottom: 8px;
                display: block;
            }

            .auth-right .form-control {
                border: 1px solid #e2e8f0;
                border-radius: 10px;
                padding: 14px 16px;
                font-size: 0.95rem;
                width: 100%;
                transition: all 0.2s ease;
            }

            .auth-right .form-control:focus {
                border-color: #ff6c00;
                box-shadow: 0 0 0 3px rgba(255, 108, 0, 0.12);
                outline: none;
            }

            .auth-submit-btn {
                background: linear-gradient(90deg, #ff6c00 0%, #ffba00 100%);
                color: #fff;
                border: none;
                width: 100%;
                padding: 14px;
                border-radius: 10px;
                font-weight: 700;
                font-size: 0.95rem;
                text-transform: uppercase;
                letter-spacing: 0.5px;
                cursor: pointer;
                transition: all 0.3s ease;
                box-shadow: 0 6px 18px rgba(255, 108, 0, 0.18);
            }

            .auth-submit-btn:hover {
                transform: translateY(-1px);
                box-shadow: 0 8px 24px rgba(255, 108, 0, 0.25);
            }

            .auth-links {
                margin-top: 15px;
                text-align: center;
            }

            .auth-links a {
                color: #ff6c00;
                font-size: 0.9rem;
                font-weight: 600;
            }

            @media (max-width: 991px) {
                .auth-section {
                    padding: 100px 0 20px;
                }

                .auth-left {
                    min-height: auto;
                    padding: 35px 25px;
                }

                .auth-right {
                    padding: 35px 25px;
                }
            }
        </style>
    </head>
    <body>
        <!-- Start Header Area -->
        @include('layouts.header')
        <!-- End Header Area -->

        <!-- Page Content -->
        <main class="page-content">
            {{ $slot }}
        </main>

        <!-- Start Footer Area -->
        @include('layouts.footer')
        <!-- End Footer Area -->

        <!-- Scripts -->
        <script src="{{ asset('assets/js/vendor/jquery-2.2.4.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
            integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
        </script>
        <script src="{{ asset('assets/js/vendor/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>
        <script src="{{ asset('assets/js/nouislider.min.js') }}"></script>
        <script src="{{ asset('assets/js/countdown.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/js/main.js') }}"></script>
    </body>
</html>
