<div class="top-navbar d-flex justify-content-between align-items-center">
    <h4 class="mb-0">@yield('title', 'Admin Panel')</h4>

    <div class="dropdown">
        <a class="dropdown-toggle d-flex align-items-center text-decoration-none"
            href="#" id="userDropdown" data-bs-toggle="dropdown">

            <img class="rounded-circle me-2"
                width="40"
                src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}">
            <span>{{ Auth::user()->name }}</span>
        </a>

        <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Profile</a></li>
            <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Settings</a></li>

            <li>
                <hr class="dropdown-divider">
            </li>

            <li>
                <a class="dropdown-item"
                    href="#"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt me-2"></i>Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">@csrf</form>
            </li>
        </ul>
    </div>
</div>