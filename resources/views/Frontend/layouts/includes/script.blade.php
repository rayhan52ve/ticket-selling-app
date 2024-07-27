    <!-- Vendor JS Files -->
    <script src="{{ asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>

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
