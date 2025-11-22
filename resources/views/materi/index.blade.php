<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Materi Modul - Platform Belajar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css">
    <style>
        :root {
            --primary: #3c8dbc;
            --secondary: #367fa9;
            --success: #00a65a;
            --info: #00c0ef;
            --warning: #f39c12;
            --danger: #dd4b39;
            --light: #f8f9fa;
            --dark: #343a40;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #ecf0f5;
            color: #333;
        }

        .module-header {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 30px 0;
            margin-bottom: 30px;
            border-radius: 0 0 10px 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .module-title {
            font-weight: 700;
            margin-bottom: 10px;
        }

        .module-subtitle {
            opacity: 0.9;
            font-size: 16px;
        }

        .breadcrumb {
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            padding: 8px 15px;
        }

        .breadcrumb-item a {
            color: white;
            text-decoration: none;
        }

        .breadcrumb-item.active {
            color: rgba(255, 255, 255, 0.8);
        }

        .materi-content {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
            padding: 25px;
            margin-bottom: 25px;
        }

        .materi-section {
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
        }

        .materi-section:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }

        .materi-title {
            color: var(--primary);
            font-weight: 600;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--primary);
        }

        .materi-subtitle {
            color: var(--secondary);
            font-weight: 600;
            margin: 20px 0 10px 0;
        }

        .materi-text {
            line-height: 1.7;
            color: #444;
            margin-bottom: 15px;
        }

        .code-example {
            background: #f8f9fa;
            border: 1px solid #e9ecef;
            border-radius: 6px;
            padding: 15px;
            margin: 15px 0;
            font-family: 'Courier New', monospace;
            font-size: 14px;
            line-height: 1.5;
        }

        .code-comment {
            color: #6c757d;
            font-style: italic;
        }

        .highlight {
            background: #fff3cd;
            padding: 2px 5px;
            border-radius: 3px;
        }

        .note-box {
            background: #e7f3ff;
            border-left: 4px solid var(--info);
            padding: 15px;
            margin: 15px 0;
            border-radius: 0 4px 4px 0;
        }

        .warning-box {
            background: #fff3cd;
            border-left: 4px solid var(--warning);
            padding: 15px;
            margin: 15px 0;
            border-radius: 0 4px 4px 0;
        }

        .progress-section {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
            padding: 20px;
            margin-bottom: 30px;
        }

        .progress-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .progress-bar {
            height: 10px;
            border-radius: 5px;
            background-color: #e9ecef;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(to right, var(--success), var(--info));
            border-radius: 5px;
            transition: width 0.5s ease;
        }

        .sidebar-modules {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
            padding: 20px;
            margin-bottom: 30px;
        }

        .sidebar-title {
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--primary);
        }

        .module-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .module-list-item {
            padding: 12px 15px;
            border-bottom: 1px solid #eee;
            transition: all 0.3s;
            cursor: pointer;
        }

        .module-list-item:hover {
            background-color: #f8f9fa;
            padding-left: 20px;
        }

        .module-list-item.active {
            background-color: #e3f2fd;
            border-left: 3px solid var(--primary);
        }

        .module-list-item a {
            color: #333;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .module-list-item a:hover {
            color: var(--primary);
        }

        .module-list-icon {
            margin-right: 10px;
            color: var(--primary);
            width: 20px;
            text-align: center;
        }

        .badge-completed {
            background-color: var(--success);
            color: white;
            padding: 3px 8px;
            border-radius: 10px;
            font-size: 12px;
            margin-left: auto;
        }

        .badge-progress {
            background-color: var(--warning);
            color: white;
            padding: 3px 8px;
            border-radius: 10px;
            font-size: 12px;
            margin-left: auto;
        }

        .materi-container {
            display: none;
        }

        .materi-container.active {
            display: block;
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .materi-row {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 6px 0;
            text-decoration: none;
            color: inherit;
        }

        .materi-title {
            flex: 1;
            /* Judul memanjang */
            font-size: 14px;
        }

        .module-list-icon {
            width: 20px;
            opacity: 0.8;
        }

        .materi-progress {
            font-size: 13px;
            color: green;
            font-weight: bold;
        }

        .module-list-item.active .materi-row .materi-title {
            font-weight: 600;
            color: #007bff;
        }


        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: #666;
        }

        .empty-state i {
            font-size: 48px;
            color: #ddd;
            margin-bottom: 15px;
        }

        @media (max-width: 768px) {
            .materi-content {
                padding: 15px;
            }
        }
    </style>
</head>

<body>
    <!-- Header Section -->
    <div class="module-header">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class=""></i> CodeC Master</a></li>

                </ol>
            </nav>
            <h1 class="module-title" id="module-title">Pemrograman Dasar dengan C</h1>
            <p class="module-subtitle" id="module-description">Belajar pemrograman dasar C dari dasar dengan soal-soal interaktif</p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <!-- Sidebar Modul -->
            <div class="col-lg-3">
                <div class="sidebar-modules">
                    <h4 class="sidebar-title">Daftar Materi</h4>
                    <ul class="module-list">

                        @php
                        $icons = [
                        'fas fa-book',
                        'fas fa-book-open',
                        'fas fa-file-alt',
                        'fas fa-book-reader',
                        ];
                        @endphp

                        @foreach ($materis as $index => $m)

                        @php
                        $done = \App\Models\MateriUser::where('user_id', auth()->id())
                        ->where('materi_id', $m->id)
                        ->exists();

                        $icon = $icons[$index % count($icons)];
                        @endphp

                        <li class="module-list-item {{ isset($materi) && $materi->id == $m->id ? 'active' : '' }}">
                            <a href="{{ route('materi.show', [$module->id, $m->id]) }}" class="materi-row">

                                <i class="module-list-icon {{ $icon }}"></i>

                                <span class="materi-title">{{ $m->judul }}</span>

                                <span class="materi-progress">
                                    {{ $done ? '✓' : '' }}
                                </span>

                            </a>
                        </li>

                        @endforeach

                    </ul>



                </div>

                <div class="progress-section">
                    <h5>Progress Modul</h5>

                    <div class="progress-info">
                        <span>{{ $progress }}%</span> Selesai
                        <span>{{ $completedCount }}/{{ $totalMateri }} Materi</span>
                    </div>

                    <div class="progress-bar">
                        <div class="progress-fill" style="width: {{ $progress }}%"></div>
                    </div>

                    <div class="d-flex justify-content-between mt-2">
                        <small>Materi Dikerjakan: {{ $completedCount }}</small>
                        <small>Materi Tersisa: {{ $totalMateri - $completedCount }}</small>
                    </div>

                </div>
            </div>

            <!-- Konten Materi -->
            <div class="col-lg-9">

                <!-- Container untuk Modul Pemrograman Dasar -->
                <div class="materi-container active" id="pemrograman-dasar">
                    <div class="materi-content">
                        <h2>{{ $activeMateri->judul }}</h2>

                        <div class="materi-content">
                            {!! $activeMateri->deskripsi !!}
                        </div>


                    </div>
                </div>

                <script>
                    function completeMateri(materiId) {
                        fetch(`/materi/${materiId}/complete`, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                                },
                            })
                            .then(res => res.json())
                            .then(data => {
                                if (data.success) {
                                    location.reload(); // refresh agar progress naik
                                }
                            });
                    }

                    // Data modul dengan informasi progress
                    const moduleData = {
                        'pemrograman-dasar': {
                            name: 'Pemrograman Dasar dengan C',
                            description: 'Belajar pemrograman dasar C dari dasar dengan soal-soal interaktif',
                            totalMateri: 93,
                            completed: 0
                        },
                        'variabel-tipedata': {
                            name: 'Variabel dan Tipe Data',
                            description: 'Memahami konsep variabel, tipe data, dan penggunaannya dalam C',
                            totalMateri: 15,
                            completed: 0
                        },
                        'operator-ekspresi': {
                            name: 'Operator dan Ekspresi',
                            description: 'Menguasai berbagai operator dan membangun ekspresi dalam C',
                            totalMateri: 20,
                            completed: 0
                        },
                        'struktur-kontrol': {
                            name: 'Struktur Kontrol',
                            description: 'Mengontrol alur program dengan percabangan dan perulangan',
                            totalMateri: 25,
                            completed: 0
                        },
                        'array-string': {
                            name: 'Array dan String',
                            description: 'Mengelola kumpulan data dengan array dan manipulasi string',
                            totalMateri: 18,
                            completed: 0
                        },
                        'fungsi-prosedur': {
                            name: 'Fungsi dan Prosedur',
                            description: 'Membuat kode modular dengan fungsi dan prosedur',
                            totalMateri: 15,
                            completed: 0
                        }
                    };

                    function updateProgress(moduleId) {
                        const module = moduleData[moduleId];
                        const progressPercent = Math.round((module.completed / module.totalMateri) * 100);

                        document.getElementById('progress-percent').textContent = `${progressPercent}%`;
                        document.getElementById('progress-count').textContent = `${module.completed}/${module.totalMateri} Materi`;
                        document.getElementById('progress-fill').style.width = `${progressPercent}%`;
                        document.getElementById('completed-count').textContent = module.completed;
                        document.getElementById('remaining-count').textContent = module.totalMateri - module.completed;
                    }

                    // Initialize with first module
                    document.addEventListener('DOMContentLoaded', function() {
                        showModule('pemrograman-dasar');
                    });
                </script>
</body>

</html>