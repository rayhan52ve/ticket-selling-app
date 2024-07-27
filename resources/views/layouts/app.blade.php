<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>

</html>
