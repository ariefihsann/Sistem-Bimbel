<div class="sidebar">
    <div class="sidebar-header">
        <h3>Bimbel Master</h3>
        <p>Admin Panel</p>
    </div>

    <ul class="nav flex-column">

        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}"
                href="{{ route('admin.dashboard') }}">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/users*') ? 'active' : '' }}"
                href="{{ route('admin.users.index') }}">
                <i class="fas fa-users"></i>
                <span>Users</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/modules*') ? 'active' : '' }}"
                href="{{ route('admin.modules.index') }}">
                <i class="fas fa-book"></i>
                <span>Modules</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->is('admin/materi*') ? 'active' : '' }}"
                href="{{ route('admin.materi.index') }}">
                <i class="fas fa-file-alt"></i>
                <span>Materi</span>
            </a>
        </li>

    </ul>
</div>