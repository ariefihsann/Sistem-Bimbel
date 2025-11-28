<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bimbel Master - Dashboard</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #6C63FF;
            --secondary: #4A5568;
            --success: #38B2AC;
            --info: #4299E1;
            --warning: #ED8936;
            --danger: #F56565;
            --light: #F7FAFC;
            --dark: #2D3748;
            --sidebar-bg: #2D3748;
            --sidebar-text: #CBD5E0;
            --sidebar-active: #6C63FF;
            --lavender: #B794F4;
            --light-orange: #FBD38D;
            --light-blue: #90CDF4;
            --light-green: #9AE6B4;
        }

        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #F5F7FB;
            color: var(--dark);
        }

        /* Sidebar Styles */
        .sidebar {
            width: 250px;
            background: var(--sidebar-bg);
            color: var(--sidebar-text);
            height: 100vh;
            position: fixed;
            transition: all 0.3s;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar-header {
            padding: 20px;
            border-bottom: 1px solid #4A5568;
        }

        .sidebar-header h3 {
            color: white;
            font-weight: 700;
            margin: 0;
        }

        .sidebar-header p {
            color: var(--sidebar-text);
            font-size: 0.85rem;
            margin: 0;
        }

        .sidebar-menu {
            padding: 15px 0;
        }

        .nav-item {
            margin-bottom: 5px;
        }

        .nav-link {
            color: var(--sidebar-text);
            padding: 12px 20px;
            border-radius: 0;
            transition: all 0.2s;
            display: flex;
            align-items: center;
        }

        .nav-link:hover,
        .nav-link.active {
            background-color: rgba(108, 99, 255, 0.1);
            color: white;
            border-left: 4px solid var(--sidebar-active);
        }

        .nav-link i {
            margin-right: 10px;
            font-size: 1.1rem;
            width: 20px;
            text-align: center;
        }

        /* Main Content */
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }

        /* Top Navbar */
        .top-navbar {
            background: white;
            border-radius: 10px;
            padding: 15px 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 25px;
        }

        .search-box {
            background: var(--light);
            border-radius: 20px;
            border: none;
            padding: 8px 15px;
            width: 300px;
        }

        .user-profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        /* Cards */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s, box-shadow 0.3s;
            margin-bottom: 20px;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background: white;
            border-bottom: 1px solid #E2E8F0;
            border-radius: 12px 12px 0 0 !important;
            padding: 15px 20px;
            font-weight: 600;
        }

        /* New Courses Cards */
        .course-card {
            border-radius: 12px;
            overflow: hidden;
            color: white;
            height: 140px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 20px;
        }

        .course-card.math {
            background: linear-gradient(135deg, var(--lavender) 0%, #805AD5 100%);
        }

        .course-card.science {
            background: linear-gradient(135deg, var(--light-blue) 0%, #3182CE 100%);
        }

        .course-card.english {
            background: linear-gradient(135deg, var(--light-green) 0%, #38A169 100%);
        }

        .course-card.programming {
            background: linear-gradient(135deg, var(--light-orange) 0%, #DD6B20 100%);
        }

        .course-icon {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        /* Progress Bars */
        .progress {
            height: 8px;
            border-radius: 4px;
            background-color: #E2E8F0;
        }

        .progress-bar {
            border-radius: 4px;
        }

        /* Table */
        .table th {
            border-top: none;
            font-weight: 600;
            color: var(--secondary);
            font-size: 0.9rem;
        }

        .table td {
            vertical-align: middle;
        }

        .badge-level {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .badge-elementary {
            background-color: rgba(56, 178, 172, 0.1);
            color: var(--success);
        }

        .badge-intermediate {
            background-color: rgba(237, 137, 54, 0.1);
            color: var(--warning);
        }

        .badge-advanced {
            background-color: rgba(245, 101, 101, 0.1);
            color: var(--danger);
        }

        /* Calendar */
        .calendar-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .calendar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .calendar-days {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
            text-align: center;
            margin-bottom: 10px;
        }

        .calendar-date {
            padding: 8px;
            border-radius: 8px;
            cursor: pointer;
        }

        .calendar-date.active {
            background-color: var(--primary);
            color: white;
        }

        .calendar-date:hover:not(.empty) {
            background-color: rgba(108, 99, 255, 0.1);
        }

        /* User Profile Card */
        .profile-card {
            text-align: center;
            padding: 20px;
        }

        .profile-card img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
            border: 3px solid var(--primary);
        }

        .course-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-left: 4px solid #007bff;
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .course-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
            border-left-width: 6px;
        }

        .course-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            font-size: 1.5rem;
            color: white;
        }

        .basic-course {
            border-left-color: #28a745;
        }

        .basic-course .course-icon {
            background: #28a745;
        }

        .variable-course {
            border-left-color: #17a2b8;
        }

        .variable-course .course-icon {
            background: #17a2b8;
        }

        .control-course {
            border-left-color: #ffc107;
        }

        .control-course .course-icon {
            background: #ffc107;
        }

        .function-course {
            border-left-color: #6f42c1;
        }

        .function-course .course-icon {
            background: #6f42c1;
        }

        .array-course {
            border-left-color: #e83e8c;
        }

        .array-course .course-icon {
            background: #e83e8c;
        }

        .pointer-course {
            border-left-color: #fd7e14;
        }

        .pointer-course .course-icon {
            background: #fd7e14;
        }

        .structure-course {
            border-left-color: #20c997;
        }

        .structure-course .course-icon {
            background: #20c997;
        }

        .file-course {
            border-left-color: #6c757d;
        }

        .file-course .course-icon {
            background: #6c757d;
        }

        .course-content {
            flex: 1;
        }

        .course-content h6 {
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 8px;
            font-size: 0.95rem;
            line-height: 1.3;
        }

        .course-content p {
            color: #6c757d;
            font-size: 0.85rem;
            margin-bottom: 10px;
        }

        .progress {
            height: 6px;
            border-radius: 3px;
            background-color: #e9ecef;
        }

        .course-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 0.7rem;
            font-weight: 600;
            color: white;
        }

        .course-badge.beginner {
            background: #28a745;
        }

        .course-badge.intermediate {
            background: #ffc107;
            color: #212529;
        }

        .course-badge.advanced {
            background: #dc3545;
        }

        .text-muted {
            font-size: 0.75rem;
        }

        .card-header {
            background: white;
            border-bottom: 1px solid #dee2e6;
            padding: 15px 20px;
        }

        .card-header h5 {
            color: #495057;
            font-weight: 600;
        }

        .card-header i {
            color: #007bff;
        }

        .profile-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            background: #ffffff;
            /* Background putih solid */
            overflow: hidden;
            transition: all 0.3s ease;
            border: 1px solid #e9ecef;
            /* Border subtle */
        }

        .profile-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.12);
            border-color: #dee2e6;
        }

        .profile-image-container {
            position: relative;
            display: inline-block;
        }

        .profile-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 4px solid #fff;
            box-shadow: 0 3px 10px rgba(108, 99, 255, 0.2);
            transition: all 0.3s ease;
        }

        .profile-card:hover .profile-img {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(108, 99, 255, 0.3);
        }

        .online-status {
            position: absolute;
            bottom: 8px;
            right: 8px;
            width: 16px;
            height: 16px;
            background: #38c172;
            border: 3px solid #fff;
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(56, 193, 114, 0.7);
            }

            70% {
                box-shadow: 0 0 0 10px rgba(56, 193, 114, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(56, 193, 114, 0);
            }
        }

        .profile-name {
            font-weight: 700;
            color: #2d3748;
            font-size: 1.25rem;
            margin-bottom: 0.25rem;
        }

        .profile-role {
            font-size: 0.9rem;
            color: #6c757d !important;
        }

        .profile-role i {
            color: #6c63ff;
        }

        .profile-stats {
            border-top: 1px solid #e9ecef;
            border-bottom: 1px solid #e9ecef;
            padding: 1rem 0;
            margin: 0 -1.5rem;
        }

        .stat-item {
            padding: 0.5rem;
        }

        .stat-number {
            font-weight: 700;
            color: #6c63ff;
            font-size: 1.1rem;
            margin-bottom: 0.25rem;
        }

        .stat-label {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .progress-container {
            background: #f8f9fa;
            padding: 1rem;
            border-radius: 10px;
            margin: 0 -0.5rem;
        }

        .progress {
            background-color: #e9ecef;
            border-radius: 10px;
            overflow: hidden;
        }

        .bg-gradient-primary {
            background: linear-gradient(45deg, #6c63ff, #3182ce) !important;
        }

        .profile-actions {
            display: flex;
            gap: 0.5rem;
            justify-content: center;
        }

        .btn {
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.8rem;
            padding: 0.375rem 1rem;
            transition: all 0.3s ease;
        }

        .btn-outline-primary {
            border-color: #6c63ff;
            color: #6c63ff;
        }

        .btn-outline-primary:hover {
            background: #6c63ff;
            border-color: #6c63ff;
            transform: translateY(-2px);
        }

        .btn-primary {
            background: linear-gradient(45deg, #6c63ff, #3182ce);
            border: none;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(108, 99, 255, 0.3);
        }


        .page-title {
            color: #3c8dbc;
            font-weight: 600;
            margin-bottom: 25px;
            border-bottom: 2px solid #3c8dbc;
            padding-bottom: 10px;
        }

        .course-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
            padding: 25px;
            margin-bottom: 25px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            cursor: pointer;
            height: 100%;
            display: flex;
            flex-direction: column;
            border-left: 4px solid #3c8dbc;
        }

        .course-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        .course-icon {
            width: 70px;
            height: 70px;
            border-radius: 8px;
            background: linear-gradient(135deg, #3c8dbc, #367fa9);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            color: white;
            font-size: 28px;
        }

        .course-content {
            flex: 1;
        }

        .course-content h6 {
            font-weight: 600;
            margin-bottom: 12px;
            color: #3c8dbc;
            font-size: 18px;
            line-height: 1.4;
        }

        .course-content p {
            color: #666;
            font-size: 14px;
            margin-bottom: 18px;
        }

        .progress {
            height: 8px;
            background-color: #f4f4f4;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        .progress-bar {
            border-radius: 4px;
            background: linear-gradient(to right, #00a65a, #3c8dbc);
        }

        .course-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #3c8dbc;
            color: white;
            padding: 5px 12px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
        }

        .text-muted {
            font-size: 13px;
            color: #999 !important;
        }

        .card-footer {
            background-color: #f9f9f9;
            border-top: 1px solid #eee;
            padding: 12px 20px;
            margin-top: 15px;
            border-radius: 0 0 8px 8px;
        }

        .info-box {
            background: white;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12);
            padding: 15px;
            margin-bottom: 20px;
        }

        .info-box-icon {
            width: 60px;
            height: 60px;
            border-radius: 8px;
            background: #3c8dbc;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
        }

        .info-box-content {
            padding-left: 15px;
        }

        .info-box-text {
            font-size: 14px;
            color: #666;
        }

        .info-box-number {
            font-size: 24px;
            font-weight: 600;
            color: #3c8dbc;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .profile-card {
                margin-bottom: 1.5rem;
            }

            .profile-actions {
                flex-direction: column;
            }

            .profile-actions .btn {
                width: 100%;
                margin-bottom: 0.5rem;
            }
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .course-card {
                margin-bottom: 15px;
            }

            .col-md-6 {
                margin-bottom: 15px;
            }
        }

        /* Animation for click effect */
        .course-card:active {
            transform: scale(0.98);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
            }

            .sidebar-header h3,
            .nav-link span {
                display: none;
            }

            .main-content {
                margin-left: 70px;
            }

            .nav-link {
                justify-content: center;
            }

            .nav-link i {
                margin-right: 0;
            }

            /* Fix avatar size */
            .table-avatar {
                width: 42px;
                height: 42px;
                border-radius: 50%;
                object-fit: cover;
            }

            /* Center semua kolom tertentu */
            #usersTable td,
            #usersTable th {
                vertical-align: middle !important;
            }

            /* Fix kolom ID agar kecil & rapi */
            #usersTable th:nth-child(1),
            #usersTable td:nth-child(1) {
                width: 60px;
                text-align: center;
            }

            /* Fix kolom Avatar */
            #usersTable th:nth-child(2),
            #usersTable td:nth-child(2) {
                width: 90px;
                text-align: center;
            }

            /* Fix kolom Role */
            #usersTable th:nth-child(5),
            #usersTable td:nth-child(5) {
                width: 100px;
                text-align: center;
            }

            /* Fix kolom Actions */
            #usersTable th:nth-child(8),
            #usersTable td:nth-child(8) {
                width: 130px;
                text-align: center;
                white-space: nowrap;
            }
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h3>Bimbel Master</h3>
            <p>Learning Management</p>
        </div>

        <div class="sidebar-menu mt-3">
            <ul class="nav flex-column">

                {{-- Dashboard --}}
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}"
                        href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                {{-- Data Users --}}
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('admin/users*') ? 'active' : '' }}"
                        href="{{ route('admin.users.index') }}">
                        <i class="fas fa-users"></i>
                        <span>Users</span>
                    </a>
                </li>
            </ul>
        </div>

    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navbar -->
        <div class="top-navbar d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Dashboard</h4>
            <div class="d-flex align-items-center">
                <div class="dropdown">
                    <a class="dropdown-toggle d-flex align-items-center text-decoration-none" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-profile me-2">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=6C63FF&color=fff" alt="User">

                        </div>
                        <span>{{ Auth::user()->name }}</span>

                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i> Profile</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i> Settings</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt me-2"></i> Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>

                    </ul>
                </div>
            </div>
        </div>

        <!-- Content Row -->
        <div class="row">
            <!-- Left Column -->
            <div class="col-lg-8">
                <!-- New Courses -->
                <div class="row">
                    @foreach ($modules as $module)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="course-card" onclick="navigateTo('{{ $module->id }}')">
                            <!-- Ikon -->
                            <div class="course-icon">
                                <i class="fas fa-laptop-code"></i>
                            </div>

                            <div class="course-content">
                                <h6>{{ $module->title }}</h6>

                                <!-- Progress x/y -->
                                <p class="mb-2">{{ $module->completed_text }} problems completed</p>

                                <!-- Progress bar -->
                                <div class="progress-bar bg-success"
                                    style="width: {{ intval($module->progress_percentage ?? 0) }}%;">
                                </div>


                                <!-- Status -->
                                <small class="text-muted">{{ $module->status_text }}</small>
                            </div>

                            <div class="card-footer">
                                <small class="text-muted">
                                    <i class="fas fa-user-graduate mr-1"></i> Belajar dengan penuh semangat!
                                </small>
                            </div>

                            <div class="course-badge beginner">Pemula</div>
                        </div>
                    </div>
                    @endforeach
                </div>


                <!-- My Courses Table -->

            </div>

            <!-- Right Column -->
            <div class="col-lg-4">
                <div class="card profile-card">
                    <div class="card-body text-center p-4">
                        <!-- Profile Image -->
                        <div class="profile-image-container mb-3">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=6C63FF&color=fff&size=128&bold=true"
                                alt="{{ auth()->user()->name }}"
                                class="profile-img">
                            <div class="online-status"></div>
                        </div>

                        <!-- User Info -->
                        <h5 class="profile-name mb-1">{{ auth()->user()->name }}</h5>
                        <p class="profile-role text-muted mb-3">
                            <i class="fas fa-graduation-cap me-1"></i>Grade 10 Student
                        </p>

                        <!-- Stats -->
                        <div class="profile-stats row text-center">
                            <div class="col-4">
                                <div class="stat-item">
                                    <h6 class="stat-number mb-1">12</h6>
                                    <small class="stat-label text-muted">Modul</small>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="stat-item">
                                    <h6 class="stat-number mb-1">24</h6>
                                    <small class="stat-label text-muted">Materi Completed</small>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="stat-item">
                                    <h6 class="stat-number mb-1">85%</h6>
                                    <small class="stat-label text-muted">Progress</small>
                                </div>
                            </div>
                        </div>

                        <!-- Progress Bar -->
                        <div class="progress-container mt-3">
                            <div class="d-flex justify-content-between mb-1">
                                <small class="text-muted">Overall Progress</small>
                                <small class="text-muted">85%</small>
                            </div>
                            <div class="progress" style="height: 6px;">
                                <div class="progress-bar bg-gradient-primary" style="width: 85%"></div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="profile-actions mt-4">
                            <button class="btn btn-sm btn-outline-primary me-2">
                                <i class="fas fa-eye me-1"></i>View Profile
                            </button>
                            <button class="btn btn-sm btn-primary">
                                <i class="fas fa-cog me-1"></i>Settings
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function navigateTo(id) {
            window.location.href = "{{ url('/modul') }}/" + id + "/materi";
        }



        // Add keyboard accessibility
        document.querySelectorAll('.course-card').forEach(card => {
            card.addEventListener('keypress', function(e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    this.click();
                }
            });

            card.setAttribute('tabindex', '0');
            card.setAttribute('role', 'button');
        });
    </script>
</body>

</html>