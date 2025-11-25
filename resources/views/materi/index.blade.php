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

        .materi-content {
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .materi-header {
            background: linear-gradient(135deg, #3c8dbc, #367fa9) !important;
        }

        .materi-title {
            font-weight: 700;
            font-size: 1.5rem;
        }

        .materi-body {
            min-height: 400px;
        }

        .materi-description {
            line-height: 1.7;
            font-size: 1rem;
            color: #333;
        }

        .materi-description h3 {
            color: #3c8dbc;
            margin-top: 1.5rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .materi-description p {
            margin-bottom: 1rem;
        }

        .materi-description code {
            background: #f8f9fa;
            padding: 2px 6px;
            border-radius: 4px;
            color: #e83e8c;
            font-family: 'Courier New', monospace;
        }

        .materi-description pre {
            background: #2d3748;
            color: #e2e8f0;
            padding: 1rem;
            border-radius: 6px;
            overflow-x: auto;
            margin: 1rem 0;
        }

        .materi-navigation .btn {
            padding: 12px 20px;
            border-radius: 8px;
            min-width: 200px;
            transition: all 0.3s ease;
        }

        .materi-navigation .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .quick-actions .btn {
            border-radius: 20px;
            padding: 6px 15px;
            font-size: 0.875rem;
        }

        .progress-section {
            border-left: 4px solid #3c8dbc;
        }

        .badge {
            font-size: 0.75rem;
            padding: 6px 10px;
        }

        @media (max-width: 768px) {
            .materi-navigation {
                flex-direction: column;
                gap: 15px;
            }

            .materi-navigation .btn {
                min-width: 100%;
                justify-content: center;
            }

            .materi-title {
                font-size: 1.25rem;
            }

            .quick-actions {
                flex-wrap: wrap;
            }
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

        <!-- Tombol Kembali -->
        <div class="container mt-3">
            <a href="{{ route('dashboard') }}" class="btn btn-success mb-3">
                ← Kembali ke Dashboard
            </a>
        </div>

        <!-- Header Modul -->
        <div class="container">

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#"><i class=""></i> CodeC Master</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $module->title ?? 'Modul' }}
                    </li>
                </ol>
            </nav>

            <!-- Judul Modul -->
            <h1 class="module-title" id="module-title">
                {{ $module->title ?? 'Pemrograman Dasar dengan C' }}
            </h1>

            <p class="module-subtitle" id="module-description">
                {{ $module->deskripsi ?? 'Belajar pemrograman dasar C dari dasar dengan soal-soal interaktif' }}
            </p>

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

                        <li class="module-list-item {{ $activeMateri->id == $m->id ? 'active' : '' }}">

                            <a href="{{ route('materi.show', ['moduleId' => $module->id, 'materiId' => $m->id]) }}">

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
                <div class="materi-content">
                    <div class="materi-header bg-primary text-white p-4 rounded-top">
                        <h2 class="materi-title mb-0">
                            {{ $activeMateri->judul ?? 'Belum ada materi' }}
                        </h2>
                    </div>

                    <div class="materi-body p-4 bg-white rounded-bottom">
                        <div class="materi-description">
                            <div class="materi-description">
                                {!! $activeMateri?->deskripsi ?? '<p class="text-muted">Belum ada materi di modul ini.</p>' !!}
                            </div>

                        </div>

                        <!-- Progress Bar -->
                        <div class="progress-section mt-4 p-3 bg-light rounded">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="text-muted">Progress Materi</span>
                                <span class="fw-bold text-primary">{{ $progress }}%</span>
                            </div>

                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar bg-primary" style="width: {{ $progress ?? 0 }}%"></div>

                            </div>

                            <small class="text-muted">
                                {{ $completedCount }} dari {{ $totalMateri }} materi selesai
                            </small>
                        </div>


                        <!-- Navigation -->
                        <div class=" materi-navigation d-flex justify-content-between align-items-center mt-4 pt-4 border-top">
                            @if ($previousMateri)
                            <a href="{{ route('materi.show', [$module->id, $previousMateri->id]) }}"
                                class="btn btn-outline-primary d-flex align-items-center">
                                <i class="fas fa-arrow-left me-2"></i>
                                <div class="text-start">
                                    <small class="d-block text-muted">Sebelumnya</small>
                                    <span class="fw-medium">{{ Str::limit($previousMateri->judul, 30) }}</span>
                                </div>
                            </a>
                            @else
                            <div></div>
                            @endif

                            @if ($nextMateri)
                            <a href="{{ route('materi.show', [$module->id, $nextMateri->id]) }}"
                                class="btn btn-primary d-flex align-items-center">
                                <div class="text-end">
                                    <small class="d-block text-white-50">Selanjutnya</small>
                                    <span class="fw-medium">{{ Str::limit($nextMateri->judul, 30) }}</span>
                                </div>
                                <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                            @else
                            <a href="{{ route('materi.index', $module->id) }}" class="btn btn-success">

                                <i class="fas fa-check me-2"></i>Selesaikan Modul
                            </a>
                            @endif
                        </div>

                        <!-- Quick Actions -->
                        <div class="quick-actions d-flex justify-content-center gap-3 mt-4">
                            <button class="btn btn-outline-secondary btn-sm">
                                <i class="fas fa-bookmark me-1"></i> Tandai
                            </button>
                            <button class="btn btn-outline-secondary btn-sm">
                                <i class="fas fa-question-circle me-1"></i> Tanya
                            </button>
                            <button class="btn btn-outline-secondary btn-sm">
                                <i class="fas fa-download me-1"></i> Unduh
                            </button>
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
                </script>
</body>

</html>