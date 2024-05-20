<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.index') }}" class="brand-link">
        <img src="{{ asset('template/app/images/logo.png') }}" alt="AdminLTE Logo" class="brand-image rounded elevation-3"
            style="background: white;opacity: .9">
        <span class="brand-text font-weight-light">AZIR CINEMA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ Storage::url(Auth::user()->image) }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
                        <i class="nav-icon fas fa-ticket-alt"></i>
                        <p>
                            General
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.theaters.index') }}"
                                class="nav-link {{ request()->routeIs('admin.theaters.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Theaters</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.rooms.index') }}"
                                class="nav-link {{ request()->routeIs('admin.rooms.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Rooms</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.genres.index') }}"
                                class="nav-link {{ request()->routeIs('admin.genres.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Genres</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.directors.index') }}"
                                class="nav-link {{ request()->routeIs('admin.directors.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Directors</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.actors.index') }}"
                                class="nav-link {{ request()->routeIs('admin.actirs.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Actors</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.movies.index') }}"
                                class="nav-link {{ request()->routeIs('admin.movies.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Movies</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.showtimes.index') }}"
                                class="nav-link {{ request()->routeIs('admin.showtimes.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ShowTimes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.bookings.index') }}"
                                class="nav-link {{ request()->routeIs('admin.bookings.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bookings</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.users.index') }}"
                                class="nav-link {{ request()->routeIs('admin.users.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Users</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('admin.admins.index') }}"
                                class="nav-link {{ request()->routeIs('admin.admins.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Admin</p>
                            </a>
                        </li> --}}
                    </ul>
                </li>
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link">
                        {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p>
                            Statistical
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Statistical</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- <li class="nav-item">
                    <a href="pages/widgets.html" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Widgets
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li> --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
