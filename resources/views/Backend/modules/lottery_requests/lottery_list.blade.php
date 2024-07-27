@extends('Backend.layouts.master')

@section('title', $pageTitle)

@section('breadcrumb', $pageTitle)

@section('content')
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- column -->
        <div class="col-sm-12">
            <div class="card">
                {{-- <div class="card-header">
                </div> --}}
                <div class="card-body">
                    <h1 class="card-title">{{ $pageTitle }}</h1>
                    @foreach ($acceptedLotteries as $item)
                        <h6>{{ $item->id }}</h6><br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    @push('js')
        <script>
            $(document).ready(function() {
                $('#DataTbl').DataTable({
                    "paging": true,
                    "pageLength": 10,
                    "lengthMenu": [10, 25, 50, 100],
                    "ordering": true,
                    "searching": true,
                    "info": true,
                    "autoWidth": true,
                    "responsive": true
                });
            });


            $('.delete').on('click', function() {
                let id = $(this).attr('data-id')
                // console.log(id)

                Swal.fire({
                    title: 'আপনি কি নিশ্চিত?',
                    text: "ডিলিট করার পর ডাটা আর ফেরতযোগ্য নয়!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(`#form_${id}`).submit()

                    }
                })
            })
        </script>
    @endpush
@endsection
