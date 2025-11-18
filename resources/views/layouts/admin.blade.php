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

        <div class="sidebar-menu">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="#">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-users"></i>
                        <span>Students</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-book-open"></i>
                        <span>Courses</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-chalkboard-teacher"></i>
                        <span>Tutors</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-chart-bar"></i>
                        <span>Grades</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-calendar-alt"></i>
                        <span>Schedule</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-cog"></i>
                        <span>Settings</span>
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
                <div class="input-group me-3">
                    <input type="text" class="form-control search-box" placeholder="Search...">
                    <span class="input-group-text bg-transparent border-0">
                        <i class="fas fa-search"></i>
                    </span>
                </div>
                <div class="dropdown">
                    <a class="dropdown-toggle d-flex align-items-center text-decoration-none" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-profile me-2">
                            <img src="https://ui-avatars.com/api/?name=Admin+User&background=6C63FF&color=fff" alt="User">
                        </div>
                        <span>Admin User</span>
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
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="fas fa-book-open mr-2"></i> Materi Pemrograman C</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($modules as $module)
                            <div class="col-md-6 col-lg-3 mb-4">
                                <div class="course-card" onclick="navigateTo('{{ $module->id }}')">

                                    <!-- Gambar default -->
                                    <div class="course-icon">
                                        <i class="fas fa-book"></i>
                                    </div>

                                    <div class="course-content">
                                        <h6>{{ $module->title }}</h6>

                                        <p class="mb-2">{{ $module->materi_count }} Materi</p>


                                        @php
                                        $progress = $module->progress_percentage ?? 0;

                                        if ($progress == 0) {
                                        $status = 'Belum dimulai';
                                        } elseif ($progress == 100) {
                                        $status = 'Selesai';
                                        } else {
                                        $status = 'Sedang berjalan';
                                        }
                                        @endphp

                                        <div class="progress mb-2">
                                            <div class="progress-bar bg-success" style="width: {{ $progress }}%"></div>
                                        </div>

                                        <small class="text-muted">{{ $status }}</small>

                                    </div>

                                    <div class="course-badge beginner">Pemula</div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>

                <!-- My Courses Table -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">My Courses</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Course name</th>
                                        <th>Start</th>
                                        <th>Rate</th>
                                        <th> Level</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <strong>Web Design</strong>
                                            <div class="text-muted small">10 lessons</div>
                                        </td>
                                        <td>May 12</td>
                                        <td>
                                            <span class="text-warning">
                                                <i class="fas fa-star"></i> 4.8
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge badge-level badge-elementary">Elementary</span>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Development Basics</strong>
                                            <div class="text-muted small">8 lessons</div>
                                        </td>
                                        <td>May 14</td>
                                        <td>
                                            <span class="text-warning">
                                                <i class="fas fa-star"></i> 4.4
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge badge-level badge-intermediate">Intermediate</span>
                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Data with Python</strong>
                                            <div class="text-muted small">5 lessons</div>
                                        </td>
                                        <td>May 17</td>
                                        <td>
                                            <span class="text-warning">
                                                <i class="fas fa-star"></i> 4.6
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge badge-level badge-intermediate">Intermediate</span>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>HTML Basics</strong>
                                            <div class="text-muted small">12 lessons</div>
                                        </td>
                                        <td>May 26</td>
                                        <td>
                                            <span class="text-warning">
                                                <i class="fas fa-star"></i> 4.7
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge badge-level badge-elementary">Elementary</span>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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
                                    <small class="stat-label text-muted">Courses</small>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="stat-item">
                                    <h6 class="stat-number mb-1">24</h6>
                                    <small class="stat-label text-muted">Completed</small>
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
                <!-- Homework Progress -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Homework Progress</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="d-flex justify-content-between mb-1">
                                <span>CSS Styling</span>
                                <span>50%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-info" style="width: 50%"></div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="d-flex justify-content-between mb-1">
                                <span>Programming Basics</span>
                                <span>65%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-success" style="width: 65%"></div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="d-flex justify-content-between mb-1">
                                <span>Java Programming</span>
                                <span>25%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" style="width: 25%"></div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="d-flex justify-content-between mb-1">
                                <span>Data Structures</span>
                                <span>40%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-primary" style="width: 40%"></div>
                            </div>
                        </div>
                        <div class="mb-0">
                            <div class="d-flex justify-content-between mb-1">
                                <span>Web Development</span>
                                <span>75%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-danger" style="width: 75%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Calendar Widget -->
                <div class="card">
                    <div class="card-body">
                        <div class="calendar-header">
                            <h6 class="mb-0">June 2023</h6>
                            <div>
                                <button class="btn btn-sm btn-outline-secondary me-1"><i class="fas fa-chevron-left"></i></button>
                                <button class="btn btn-sm btn-outline-secondary"><i class="fas fa-chevron-right"></i></button>
                            </div>
                        </div>
                        <div class="calendar-days">
                            <div class="fw-bold text-muted small">S</div>
                            <div class="fw-bold text-muted small">M</div>
                            <div class="fw-bold text-muted small">T</div>
                            <div class="fw-bold text-muted small">W</div>
                            <div class="fw-bold text-muted small">T</div>
                            <div class="fw-bold text-muted small">F</div>
                            <div class="fw-bold text-muted small">S</div>
                        </div>
                        <div class="calendar-days">
                            <div class="calendar-date empty"></div>
                            <div class="calendar-date empty"></div>
                            <div class="calendar-date empty"></div>
                            <div class="calendar-date">1</div>
                            <div class="calendar-date">2</div>
                            <div class="calendar-date">3</div>
                            <div class="calendar-date">4</div>
                        </div>
                        <div class="calendar-days">
                            <div class="calendar-date">5</div>
                            <div class="calendar-date">6</div>
                            <div class="calendar-date">7</div>
                            <div class="calendar-date">8</div>
                            <div class="calendar-date">9</div>
                            <div class="calendar-date">10</div>
                            <div class="calendar-date">11</div>
                        </div>
                        <div class="calendar-days">
                            <div class="calendar-date">12</div>
                            <div class="calendar-date">13</div>
                            <div class="calendar-date">14</div>
                            <div class="calendar-date">15</div>
                            <div class="calendar-date">16</div>
                            <div class="calendar-date">17</div>
                            <div class="calendar-date">18</div>
                        </div>
                        <div class="calendar-days">
                            <div class="calendar-date">19</div>
                            <div class="calendar-date">20</div>
                            <div class="calendar-date active">21</div>
                            <div class="calendar-date">22</div>
                            <div class="calendar-date">23</div>
                            <div class="calendar-date">24</div>
                            <div class="calendar-date">25</div>
                        </div>
                        <div class="calendar-days">
                            <div class="calendar-date">26</div>
                            <div class="calendar-date">27</div>
                            <div class="calendar-date">28</div>
                            <div class="calendar-date">29</div>
                            <div class="calendar-date">30</div>
                            <div class="calendar-date empty"></div>
                            <div class="calendar-date empty"></div>
                        </div>
                    </div>
                </div>

                <!-- User Profile Card -->

            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function navigateTo(courseSlug) {
            // Simulate navigation - in real implementation, this would redirect to the course page
            console.log(`Navigating to course: ${courseSlug}`);

            // Show loading state
            const card = event.currentTarget;
            card.style.opacity = '0.7';

            // In real application, you would use:
            // window.location.href = `/courses/${courseSlug}`;
            // or for SPA: router.push(`/courses/${courseSlug}`);

            // For demo purposes, show alert
            setTimeout(() => {
                const courseTitles = {
                    'pengenalan-dasar': 'Pengenalan Pemrograman Dasar',
                    'variabel-tipedata': 'Variabel & Tipe Data',
                    'struktur-kontrol': 'Struktur Kontrol',
                    'fungsi-prosedur': 'Fungsi & Prosedur',
                    'array-string': 'Array & String',
                    'pointer-memory': 'Pointer & Memory Management',
                    'struktur-data': 'Struktur Data',
                    'file-handling': 'File Handling'
                };

                alert(`Membuka materi: ${courseTitles[courseSlug]}`);
                card.style.opacity = '1';
            }, 500);
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