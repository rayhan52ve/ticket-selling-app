    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('backend/assets/plugins/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('backend/assets/plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/js/app-style-switcher.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('backend/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('backend/js/sidebarmenu.js') }}"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- chartist chart -->
    <script src="{{ asset('backend/assets/plugins/chartist-js/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js') }}">
    </script>
    <!--c3 JavaScript -->
    <script src="{{ asset('backend/assets/plugins/d3/d3.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/c3-master/c3.min.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset('backend/js/custom.js') }}"></script>
    {{-- boxicon --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/dist/boxicons.min.js"></script>

    {{-- sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session()->has('msg'))
        <script>
            Swal.fire({
                position: 'top-end',
                icon: '{{ session('cls') }}',
                toast: 'true',
                title: '{{ session('msg') }}',
                showConfirmButton: false,
                confirmButtonText: "ok",
                timerProgressBar: true,
                showCancelButton: false,
                allowOutsideClick: false,
                allowEscapeKey: false,
                showCloseButton: true,
                timer: 5000
            })
        </script>
    @endif
    {{-- sweetalert --}}

    {{-- data table --}}
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    {{-- boxicon --}}
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    {{-- fonrawesome --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/js/all.min.js"
        integrity="sha512-u3fPA7V8qQmhBPNT5quvaXVa1mnnLSXUep5PS1qo5NRzHwG19aHmNJnj1Q8hpA/nBWZtZD4r4AX6YOt5ynLN2g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

    @stack('js')
