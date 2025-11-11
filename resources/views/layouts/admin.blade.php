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
                        <li><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt me-2"></i> Logout</a></li>
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
                        <h5 class="mb-0">New Courses</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-3 mb-3">
                                <div class="course-card math">
                                    <div class="course-icon">
                                        <i class="fas fa-calculator"></i>
                                    </div>
                                    <div>
                                        <h6>Mathematics</h6>
                                        <p class="mb-0">12 lessons</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 mb-3">
                                <div class="course-card science">
                                    <div class="course-icon">
                                        <i class="fas fa-flask"></i>
                                    </div>
                                    <div>
                                        <h6>Science</h6>
                                        <p class="mb-0">15 lessons</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 mb-3">
                                <div class="course-card english">
                                    <div class="course-icon">
                                        <i class="fas fa-language"></i>
                                    </div>
                                    <div>
                                        <h6>English</h6>
                                        <p class="mb-0">8 lessons</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3 mb-3">
                                <div class="course-card programming">
                                    <div class="course-icon">
                                        <i class="fas fa-code"></i>
                                    </div>
                                    <div>
                                        <h6>Programming</h6>
                                        <p class="mb-0">10 lessons</p>
                                    </div>
                                </div>
                            </div>

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
                    <div class="card-body">
                        <img src="https://ui-avatars.com/api/?name=Student+Name&background=6C63FF&color=fff" alt="Student">
                        <h5>Student Name</h5>
                        <p class="text-muted">Grade 10 Student</p>
                        <div class="d-flex justify-content-between mt-4">
                            <div class="text-center">
                                <h6 class="mb-0">12</h6>
                                <small class="text-muted">Courses</small>
                            </div>
                            <div class="text-center">
                                <h6 class="mb-0">85%</h6>
                                <small class="text-muted">Avg. Score</small>
                            </div>
                            <div class="text-center">
                                <h6 class="mb-0">24</h6>
                                <small class="text-muted">Completed</small>
                            </div>
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
</body>

</html>