<!DOCTYPE html>
<html dir="ltr" lang="en">

@php
    $webInfo = \App\Models\WebsiteInfo::first();
@endphp

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, materialpro admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, materialpro admin lite design, materialpro admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Material Pro Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $webInfo->title ?? null}} | @yield('title') </title>
    @include('Backend.layouts.includes.css')

    {{-- bangla web font --}}
    <link href="https://fonts.maateen.me/apona-lohit/font.css" rel="stylesheet">
    <style>
        body {
            font-family: 'AponaLohit', Arial, sans-serif !important;
        }

        h4,
        h5 {
            font-family: 'AponaLohit', Arial, sans-serif !important;
        }
    </style>


    <style>
        @import url('https://fonts.maateen.me/adorsho-lipi/font.css');

        li {
            font-family: 'AdorshoLipi', sans-serif !important;
        }

        h1,
        h2,
        h3 {
            font-family: 'AdorshoLipi', sans-serif !important;
        }
    </style>
    {{-- bangla web font --}}

</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        @include('Backend.layouts.includes.topnav')
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        @include('Backend.layouts.includes.sidenav')
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-md-6 col-8 align-self-center">
                        <h3 class="page-title mb-0 p-0">@yield('breadcrumb')</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Panel</li>
                                    <li class="breadcrumb-item active" aria-current="page">@yield('breadcrumb')</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-md-6 col-4 align-self-center">
                        <div class="text-end upgrade-btn">
                            @if (Auth::user()->role == 1)
                                <h3 class=" text-dark" target="_blank">Admin Panel</h3>
                            @elseif (Auth::user()->role == 2)
                                <h3 class=" text-dark" target="_blank">Agent Panel</h3>
                            @else
                                <h3 class=" text-dark" target="_blank">User Panel</h3>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer"> © Copyright {{$webInfo->title ?? null}} 2024.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    @include('Backend.layouts.includes.script')
</body>

</html>
