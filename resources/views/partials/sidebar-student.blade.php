<div class="sidebar-menu mt-3">
    <ul class="nav flex-column">

        {{-- Dashboard --}}
        <li class="nav-item">
            <a class="nav-link {{ request()->is('dashboard') || request()->is('admin/dashboard') ? 'active' : '' }}"
                href="{{ Auth::user()->role_id == 1 ? route('admin.dashboard') : route('dashboard') }}">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>
        </li>

        {{-- Modul Belajar --}}
        <li class="nav-item">
            <a class="nav-link {{ request()->is('modul*') ? 'active' : '' }}"
                href="{{ url('/modul/1/materi') }}">
                <i class="fas fa-book-open"></i>
                <span>Modul Belajar</span>
            </a>
        </li>

        {{-- Progress (optional) --}}
        <li class="nav-item">
            <a class="nav-link {{ request()->is('progress*') ? 'active' : '' }}"
                href="#">
                <i class="fas fa-chart-line"></i>
                <span>Progress</span>
            </a>
        </li>

        {{-- Admin ONLY: Users --}}
        @if(Auth::user()->role_id == 1)
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/users*') ? 'active' : '' }}"
                href="{{ route('admin.users.index') }}">
                <i class="fas fa-users"></i>
                <span>Users</span>
            </a>
        </li>
        @endif

        {{-- Profil --}}
        <li class="nav-item">
            <a class="nav-link {{ request()->is('profile') ? 'active' : '' }}"
                href="{{ route('profile.edit') }}">
                <i class="fas fa-user"></i>
                <span>Profil Saya</span>
            </a>
        </li>

    </ul>
</div>
