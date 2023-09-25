<!-- partial:partials/_navbar.html -->
<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="{{ url('admin/dashboard') }}"><img
                src="{{ url('assets/images/logo.png') }}" alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="{{ url('admin/dashboard') }}"><img
                src="{{ url('assets/images/logo-min.PNG') }}" alt="logo" /></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
        </button>
        <div class="search-field d-none d-md-block">
        </div>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item d-none d-lg-block full-screen-link">
                <a class="nav-link">
                    <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
                    data-bs-toggle="dropdown">
                    <p type="" class="position-relative mt-3">
                        <i class="mdi mdi-bell-outline"></i>
                        <span <?php
                        [$usersnotification, $usersnot] = notificationBell();
                        ?>
                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger  {{ count($usersnotification) == 0 ? 'd-none' : '' }}">
                            <input type="hidden" class="notfication" value="{{ count($usersnotification ?? '') }}">
                            <input type="hidden" name="notfication_route" value="{{ route('notification') }}">
                            <span>{{ count($usersnotification) ?? '' }}</span>
                            <span class="visually-hidden">unread messages</span>
                        </span>
                    </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list notificationdiv"
                    aria-labelledby="notificationDropdown">
                    @foreach ($username as $notname)
                        @foreach ($usersnot as $notification)
                            @if ($notname->id == $notification->userid)
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div
                                        class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                        <p class="text-gray ellipsis mb-0 fw-bold"> {{ $notname->name }} Submited
                                            report.
                                        </p>
                                    </div>
                                </a>
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </li>
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <div class="nav-profile-img">
                        <img src="{{ url('assets/images/admin-icon.png') }}" alt="image">
                        <span class="availability-status online"></span>
                    </div>
                    <div class="nav-profile-text">
                        <p class="mb-1 text-black">{{ Auth::user()->name }}</p>
                    </div>
                </a>
                <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                        <i class="mdi mdi-logout me-2 text-primary"></i> {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>
<!-- partial -->
