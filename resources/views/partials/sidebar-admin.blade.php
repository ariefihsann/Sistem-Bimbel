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

        {{-- Users --}}
        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/users*') ? 'active' : '' }}"
                href="{{ route('admin.users.index') }}">
                <i class="fas fa-users"></i>
                <span>Users</span>
            </a>
        </li>

    </ul>
</div>
