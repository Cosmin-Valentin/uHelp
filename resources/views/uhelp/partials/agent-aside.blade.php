<aside class="app-aside">
    <div class="aside-logo">
        <div class="logo">
            <a href="#" class="header-brand">
                <img src="{{ asset('logo.svg') }}" alt="logo">
            </a>
        </div>
    </div>
    <div class="aside-container">
        <div class="sidebar-user">
            <div class="user-pic">
                <img src="{{ asset($user->id . '.jpg') }}" alt="user avatar">
            </div>
            <div class="user-info">
                <h5>{{ $user->isAdmin ? 'Admin' : 'Agent' }}</h5>
                <span>{{ ucwords($user->name) }}</span>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li>
                <a href="{{ route('uhelp.index') }}" class="sidebar-menu-item {{ (request()->routeIs('uhelp.index') && !isset($status)) ? 'active' : '' }}">
                    <i class="fa fa-navicon"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('uhelp.create') }}" class="sidebar-menu-item {{ request()->routeIs('uhelp.create') ? 'active' : '' }}">
                    <i class="fa fa-pencil"></i>
                    <span>Create Ticket</span>
                </a>
            </li>
            <li class="{{ isset($status) ? 'is-expanded' : '' }}">
                <span class="sidebar-menu-item {{ (request()->routeIs('uhelp.index') && isset($status)) ? 'active' : '' }}">
                    <i class="fa fa-ticket"></i>
                    <span>Global Tickets</span>
                    <i class="fa fa-angle-right"></i>
                </span>
                <ul class="slide-menu">
                    <li>
                        <a class="slide-item {{ !isset($status) ? 'active' : '' }}" href="{{ route('uhelp.index') }}">Total Tickets</a>
                    </li>
                    <li>
                        <a class="slide-item {{ ($status ?? null) === 'recent' ? 'active' : '' }}" href="{{ route('uhelp.index', 'recent') }}">Recent Tickets</a>
                    </li>
                    <li>
                        <a class="slide-item {{ ($status ?? null) === 'active' ? 'active' : '' }}" href="{{ route('uhelp.index', 'active') }}">Active Tickets</a>
                    </li>
                    <li>
                        <a class="slide-item {{ ($status ?? null) === 'closed' ? 'active' : '' }}" href="{{ route('uhelp.index', 'closed') }}">Closed Tickets</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('uhelp.createCategory') }}" class="sidebar-menu-item {{ request()->routeIs('uhelp.createCategory') ? 'active' : '' }}">
                    <i class="fa fa-cubes"></i>
                    <span>Create Category</span>
                </a>
            </li>
            <li>
                <a href="{{ route('uhelp.showCustomer') }}" class="sidebar-menu-item {{ request()->routeIs('uhelp.showCustomer') ? 'active' : '' }}">
                    <i class="fa fa-users"></i>
                    <span>Customers</span>
                </a>
            </li>
        </ul>
    </div>
</aside>