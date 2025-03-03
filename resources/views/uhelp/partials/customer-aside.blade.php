<div class="customer-card">
    <div class="card">
        <div class="card-body">
            <div class="profile">
                <div class="profile-img">
                    <img src="https://randomuser.me/api/portraits/men/{{ $user->id }}.jpg" alt="user avatar">
                </div>
                <h5 class="profile-name">{{ ucwords($user->name) }}</h5>
                <small class="profile-email">{{ $user->email }}</small>
            </div>
        </div>

        <div class="card-sidebar">
            <ul class="side-menu">
                <li>
                    <a href="{{ route('uhelp.index') }}" class="side-menu-item {{ request()->routeIs('uhelp.index') ? 'active' : '' }}">
                        <i class="fa fa-navicon"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('uhelp.create') }}" class="side-menu-item {{ request()->routeIs('uhelp.create') ? 'active' : '' }}">
                        <i class="fa fa-pencil"></i>
                        <span>Create Ticket</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('uhelp.index', 'active') }}" class="side-menu-item {{ ($status ?? null) === 'active' ? 'active' : ''}}">
                        <i class="fa fa-bell-o"></i>
                        <span>Active Ticket</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('uhelp.index', 'closed') }}" class="side-menu-item {{ ($status ?? null) === 'closed' ? 'active' : ''}}">
                        <i class="fa fa-bell-slash-o"></i>
                        <span>Closed Ticket</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>