    <link rel="canonical" href="https://www.wrappixel.com/templates/materialpro-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('uploads/website' . @$webInfo->fevicon) }}">
    <!-- chartist CSS -->
    <link href="{{ asset('backend/assets/plugins/chartist-js/dist/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/plugins/chartist-js/dist/chartist-init.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css') }}"
        rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="{{ asset('backend/assets/plugins/c3-master/c3.min.css') }}" rel="stylesheet">
    {{-- boxicon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css">
    <!-- Custom CSS -->
    <link href="{{ asset('backend/css/style.min.css') }}" rel="stylesheet">
    {{-- data table --}}
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">
    {{-- fonrawesome --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}

    @stack('css')
