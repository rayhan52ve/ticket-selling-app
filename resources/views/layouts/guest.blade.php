<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@php
    $webInfo = \App\Models\WebsiteInfo::first();
@endphp

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

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

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <a href="/">
                <img src="{{asset('uploads/website/' . @$webInfo->logo)}}" alt="">
                {{-- <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> --}}
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
