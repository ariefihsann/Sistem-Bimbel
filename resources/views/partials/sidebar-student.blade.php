<div class="sidebar-menu mt-3">
    <ul class="nav flex-column">

        {{-- Dashboard --}}
        <li class="nav-item">
            <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}"
                href="{{ route('dashboard') }}">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>
        </li>

        {{-- Modul Pembelajaran --}}
        <li class="nav-item">
            <a class="nav-link {{ request()->is('modul*') ? 'active' : '' }}"
                href="{{ url('/modul/1/materi') }}">
                <i class="fas fa-book-open"></i>
                <span>Modul Belajar</span>
            </a>
        </li>

        {{-- Progress Belajar --}}
        <li class="nav-item">
            <a class="nav-link {{ request()->is('progress*') ? 'active' : '' }}"
                href="#">
                <i class="fas fa-chart-line"></i>
                <span>Progress</span>
            </a>
        </li>

        {{-- Akun Saya --}}
        <li class="nav-item">
            <a class="nav-link {{ request()->is('profile') ? 'active' : '' }}"
                href="{{ route('profile.edit') }}">
                <i class="fas fa-user"></i>
                <span>Profil Saya</span>
            </a>
        </li>

    </ul>
</div>