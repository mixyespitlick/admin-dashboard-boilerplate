<nav class="pcoded-navbar" pcoded-header-position="relative">
    <div class="sidebar_toggle">
        <a href="#"><i class="icon-close icons"></i></a>
    </div>
    <div class="pcoded-inner-navbar main-menu">
        <div class="">
            <div class="main-menu-header">
                <img class="img-40" src="{{ asset('images/user.png') }}" alt="User-Profile-Image" />
                <div class="user-details">
                    <span>John Doe</span>
                    <span id="more-details">UX Designer<i class="ti-angle-down"></i></span>
                </div>
            </div>
            <div class="main-menu-content">
                <ul>
                    <li class="more-details">
                        <a href="user-profile.html"><i class="ti-user"></i>View Profile</a>
                        <a href="#!"><i class="ti-settings"></i>Settings</a>
                        <a href="#!"><i class="ti-layout-sidebar-left"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </div>
        {{-- <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation" menu-title-theme="theme5">
            Navigation
        </div> --}}
        <ul class="pcoded-item pcoded-left-item">
            {{-- <li class="pcoded-hasmenu {{ request()->routeIs('dashboard') ? 'active' : '' }} pcoded-trigger"> --}}
            <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }} pcoded-trigger">
                <a href="{{ route('dashboard') }}">
                    <span class="pcoded-micon"><i class="ti-home"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                {{-- <ul class="pcoded-submenu">
                    <li class="active">
                        <a href="{{ route('dashboard') }}">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.dash.default">Home</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul> --}}
            </li>
        </ul>
        <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms" menu-title-theme="theme5">
            Management
        </div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="{{ request()->routeIs('drivers*') ? 'active' : '' }}">
                <a href="{{ route('drivers.index') }}" data-i18n="nav.form-wizard.main">
                    <span class="pcoded-micon"><i class="ti-user"></i></span>
                    <span class="pcoded-mtext">Drivers</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="{{ request()->routeIs('vehicle_types*') ? 'active' : '' }}">
                <a href="{{ route('vehicle_types.index') }}" data-i18n="nav.form-wizard.main">
                    <span class="pcoded-micon"><i class="ti-truck"></i></span>
                    <span class="pcoded-mtext">Vehicle Types</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="{{ request()->routeIs('vehicles*') ? 'active' : '' }}">
                <a href="{{ route('vehicles.index') }}" data-i18n="nav.form-wizard.main">
                    <span class="pcoded-micon"><i class="ti-truck"></i></span>
                    <span class="pcoded-mtext">Vehicles</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>

            <li class="{{ request()->routeIs('service_provider_types*') ? 'active' : '' }}">
                <a href="{{ route('service_provider_types.index') }}" data-i18n="nav.form-wizard.main">
                    <span class="pcoded-micon"><i class="ti-home"></i></span>
                    <span class="pcoded-mtext">Service Provider Types</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="{{ request()->routeIs('service_providers*') ? 'active' : '' }}">
                <a href="{{ route('service_providers.index') }}" data-i18n="nav.form-wizard.main">
                    <span class="pcoded-micon"><i class="ti-medall"></i></span>
                    <span class="pcoded-mtext">Service Providers</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="{{ request()->routeIs('areas*') ? 'active' : '' }}">
                <a href="{{ route('areas.index') }}" data-i18n="nav.form-wizard.main">
                    <span class="pcoded-micon"><i class="ti-map"></i></span>
                    <span class="pcoded-mtext">Areas</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="{{ request()->routeIs('collection_points*') ? 'active' : '' }}">
                <a href="{{ route('collection_points.index') }}" data-i18n="nav.form-wizard.main">
                    <span class="pcoded-micon"><i class="ti-location-pin"></i></span>
                    <span class="pcoded-mtext">Collection Points</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="{{ request()->routeIs('weigh_in_logs*') ? 'active' : '' }}">
                <a href="{{ route('weigh_in_logs.index') }}" data-i18n="nav.form-wizard.main">
                    <span class="pcoded-micon"><i class="ti-book"></i></span>
                    <span class="pcoded-mtext">Weigh-in Logs</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="{{ request()->routeIs('tipping_fees*') ? 'active' : '' }}">
                <a href="{{ route('tipping_fees.index') }}" data-i18n="nav.form-wizard.main">
                    <span class="pcoded-micon"><i class="ti-receipt"></i></span>
                    <span class="pcoded-mtext">Tipping Fees</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="{{ request()->routeIs('payments*') ? 'active' : '' }}">
                <a href="{{ route('payments.index') }}" data-i18n="nav.form-wizard.main">
                    <span class="pcoded-micon"><i class="ti-receipt"></i></span>
                    <span class="pcoded-mtext">Payments</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>

        </ul>
    </div>
</nav>