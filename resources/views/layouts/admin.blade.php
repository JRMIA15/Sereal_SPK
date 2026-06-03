@extends('layouts.master')

@section('content')
    <!-- CSS styles for admin page elements -->
    <style>
        .admin-card {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
            border: none;
            padding: 35px;
            margin-top: 35px;
            margin-bottom: 50px;
        }

        .admin-card-title {
            color: #1a202c;
            font-weight: 700;
            font-size: 1.5rem;
            margin-bottom: 25px;
            border-left: 4px solid #ff6c00; /* Matching Karma orange */
            padding-left: 12px;
        }

        .form-group label {
            font-weight: 600;
            color: #4a5568;
            margin-bottom: 8px;
            font-size: 0.9rem;
        }

        .form-control {
            border: 1px solid #cbd5e0;
            border-radius: 6px;
            padding: 12px 16px;
            font-size: 0.95rem;
            transition: all 0.2s ease;
            height: auto;
            color: #2d3748;
        }

        .form-control:focus {
            border-color: #ff6c00; /* Matching Karma orange */
            box-shadow: 0 0 0 3px rgba(255, 108, 0, 0.15);
            color: #2d3748;
        }

        .btn-teal {
            background-color: #ff6c00; /* Match Karma theme primary color */
            color: #ffffff !important;
            border: none;
            font-weight: 600;
            padding: 12px 28px;
            border-radius: 6px;
            transition: all 0.2s ease;
            text-transform: uppercase;
            font-size: 0.9rem;
            letter-spacing: 0.5px;
            box-shadow: 0 2px 4px rgba(255, 108, 0, 0.2);
            cursor: pointer;
        }

        .btn-teal:hover {
            background-color: #e05e00;
            box-shadow: 0 4px 12px rgba(255, 108, 0, 0.35);
            transform: translateY(-1px);
        }

        .btn-teal-outline {
            background-color: transparent;
            border: 2px solid #ff6c00; /* Match Karma theme primary color */
            color: #ff6c00 !important;
            font-weight: 600;
            padding: 10px 24px;
            border-radius: 6px;
            transition: all 0.2s ease;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            text-decoration: none !important;
        }

        .btn-teal-outline:hover {
            background-color: #ff6c00;
            color: #ffffff !important;
            transform: translateY(-1px);
        }

        .badge-benefit {
            background-color: #e6fffa;
            color: #0b9b8a;
            font-weight: 600;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 0.8rem;
            text-transform: uppercase;
            border: 1px solid #b2f5ea;
            display: inline-block;
        }

        .badge-cost {
            background-color: #fffaf0;
            color: #dd6b20;
            font-weight: 600;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 0.8rem;
            text-transform: uppercase;
            border: 1px solid #feebc8;
            display: inline-block;
        }

        .table-saw-wrapper {
            overflow-x: auto;
            border-radius: 8px;
            border: 1px solid #edf2f7;
        }

        .table-saw {
            width: 100%;
            margin-bottom: 0;
            background-color: transparent;
            border-collapse: collapse;
        }

        .table-saw th {
            background-color: #f7fafc;
            color: #4a5568;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 0.8px;
            border-bottom: 2px solid #edf2f7;
            padding: 18px 16px;
        }

        .table-saw td {
            padding: 16px;
            vertical-align: middle;
            border-bottom: 1px solid #edf2f7;
            color: #4a5568;
            font-size: 0.95rem;
        }

        .table-saw tr:last-child td {
            border-bottom: none;
        }

        .action-btn {
            font-size: 1.15rem;
            margin: 0 6px;
            transition: all 0.2s ease;
            display: inline-block;
        }

        .action-btn.edit {
            color: #3182ce;
        }

        .action-btn.edit:hover {
            color: #2b6cb0;
            transform: scale(1.1);
        }

        .action-btn.delete {
            color: #e53e3e;
            background: none;
            border: none;
            padding: 0;
            cursor: pointer;
        }

        .action-btn.delete:hover {
            color: #c53030;
            transform: scale(1.1);
        }
        
        .search-container {
            position: relative;
            max-width: 320px;
            width: 100%;
        }
        
        .search-container .form-control {
            padding-left: 40px;
            height: 42px;
            border-radius: 6px;
        }
        
        .search-container i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #a0aec0;
        }
    </style>

    <!-- Main Content Area -->
    <div class="container-fluid px-md-5" style="margin-top: 130px; margin-bottom: 50px;">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 20px;">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top: 20px;">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @yield('admin_content')
    </div>
@endsection
