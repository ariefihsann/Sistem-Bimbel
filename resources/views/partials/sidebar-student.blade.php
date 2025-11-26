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

        {{-- Progress (optional) --}}



    </ul>
</div>
