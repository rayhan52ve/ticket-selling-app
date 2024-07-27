<!DOCTYPE html>
<html lang="en">

@php
    $webInfo = \App\Models\WebsiteInfo::first();
@endphp

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ $webInfo->title ?? null}}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    @include('Frontend.layouts.includes.css')

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

</head>

<body>


    @include('Frontend.layouts.includes.topnav')

    <main id="main">
        @yield('content')
    </main><!-- End #main -->


    @include('Frontend.layouts.includes.footer')

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    @include('Frontend.layouts.includes.script')

</body>

</html>
