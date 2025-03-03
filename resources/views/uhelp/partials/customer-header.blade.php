<header class="banner">
    <div class="header-container">
        <div class="header-text">
            <h1 class="header">{{ $title ?? 'Dashboard'}}</h1>
        </div>
        @if (request()->routeIs('uhelp.show'))
            <div class="header-dashboard">
                <a href="{{ route('uhelp.index') }}">Dashboard</a>
            </div>
        @endif
    </div>
</header>