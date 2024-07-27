    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="{{ url('/') }}" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="{{ asset('uploads/website/' . @$webInfo->logo) }}" alt="">
                <h1>{{ $webInfo->title ?? null }}</h1>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    {{-- <li><a href="index.html">Blog</a></li>
                    <li><a href="single-post.html">Single Post</a></li>
                    <li class="dropdown"><a href="category.html"><span>Categories</span> <i
                                class="bi bi-chevron-down dropdown-indicator"></i></a>
                        <ul>
                            <li><a href="search-result.html">Search Result</a></li>
                            <li><a href="#">Drop Down 1</a></li>
                            <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i
                                        class="bi bi-chevron-down dropdown-indicator"></i></a>
                                <ul>
                                    <li><a href="#">Deep Drop Down 1</a></li>
                                    <li><a href="#">Deep Drop Down 2</a></li>
                                    <li><a href="#">Deep Drop Down 3</a></li>
                                    <li><a href="#">Deep Drop Down 4</a></li>
                                    <li><a href="#">Deep Drop Down 5</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Drop Down 2</a></li>
                            <li><a href="#">Drop Down 3</a></li>
                            <li><a href="#">Drop Down 4</a></li>
                        </ul>
                    </li>

                    <li><a href="about.html">About</a></li> --}}
                    @auth
                        <form id="logout-form" method="POST" action="{{ route('logout') }}">
                            @csrf

                        </form>
                        <li><a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="d-md-none" data-toggle="tooltip" title="Sign Out" data-original-title="Sign Out"><i
                                    class="bi bi-box-arrow-right"></i> Logout</a></li>
                    @endauth

                </ul>
            </nav><!-- .navbar -->

            <div class="position-relative">
                <a href="{{$webInfo->facebook ?? null }}" class="mx-2"><span class="bi-facebook"></span></a>
                <a href="{{$webInfo->youtube ?? null }}" class="mx-2"><span class="bi-youtube"></span></a>
                <a href="{{$webInfo->telegram ?? null }}" class="mx-2"><span class="bi-telegram"></span></a>
                @auth
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="mx-2 d-none d-md-inline" data-toggle="tooltip" title="Sign Out"
                        data-original-title="Sign Out">
                        Logout <i class="bi bi-box-arrow-right"></i>
                    </a>
                @endauth

                <a href="#" class="mx-2 js-search-open"></span></a>
                {{-- <a href="#" class="mx-2 js-search-open"><span class="bi-search"></span></a> --}}
                <i class="bi bi-list mobile-nav-toggle"></i>

                <!-- ======= Search Form ======= -->
                <div class="search-form-wrap js-search-form-wrap">
                    <form action="search-result.html" class="search-form">
                        <span class="icon bi-search"></span>
                        <input type="text" placeholder="Search" class="form-control">
                        <button class="btn js-search-close"><span class="bi-x"></span></button>
                    </form>
                </div><!-- End Search Form -->

            </div>

        </div>

    </header><!-- End Header -->
