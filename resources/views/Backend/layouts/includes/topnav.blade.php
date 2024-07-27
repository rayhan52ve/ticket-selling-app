<header class="topbar" data-navbarbg="skin6">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin6">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand ms-4" href="{{ route('home') }}" title="Go To Home Page">
                <!-- Logo icon -->
                <b class="logo-icon">
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    <img src="{{asset('uploads/website/' . @$webInfo->logo)}}" alt="homepage" style="height: 60px"
                        class="dark-logo" />
                </b>
                <!--End Logo icon -->
                <!-- Logo text -->
                <span class="logo-text">
                    <h4 class="text-light pt-4">{{ $webInfo->title ?? null}}</h4>
                    {{-- <img src="{{asset('backend/assets/images/logo-light-text.png')}}" alt="homepage" class="dark-logo" /> --}}
                </span>
            </a>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <a class="nav-toggler waves-effect waves-light text-white d-block d-md-none" href="javascript:void(0)"><i
                    class="ti-menu ti-close"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            <ul class="navbar-nav d-lg-none d-md-block ">
                <li class="nav-item">
                    <a class="nav-toggler nav-link waves-effect waves-light text-white " href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                </li>
            </ul>
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav me-auto mt-md-0 ">
            </ul>

            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <a href="{{route('home')}}" class="link-light mt-3" title="Go To Home Page"><h4><i class="mdi mdi-send"></i> হোমে ফিরে যান <i class="mdi mdi-home-outline"></i></h4></a>

            <ul class="navbar-nav mx-5">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#"
                        id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" title="Sign Out">
                        @if(Auth::user()->image)
                            <img src="/uploads/profile/{{ auth()->user()->image }}" style="height:25px;width:25px" alt="user"
                                class="profile-pic me-2">
                        @else
                            <img src="{{ asset('backend/assets/images/users/avatar.png') }}" alt="user"
                                class="profile-pic me-2">
                        @endif
                        <span class="btn-rounded btn-sm" style="background-color: rgb(16, 229, 16)">SIGNED IN</span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li class="text-center"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" title="Sign Out">
                                <h5>SIGN OUT</h5>
                            </a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
