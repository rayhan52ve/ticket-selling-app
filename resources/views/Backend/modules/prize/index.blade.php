@extends('Backend.layouts.master')

@section('title', 'Prize')

@section('breadcrumb', 'Prize')

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
                    <div class="d-flex justify-content-between">
                        <h1 class="card-title">Prize List</h1>
                        <div class="">
                            <a class="btn btn-lg btn-outline-cyan" href="{{ route('admin.prize.create') }}"><b>Add New
                                    Prize</b></a>
                        </div>
                    </div>
                    {{-- <h6 class="card-subtitle">Add class <code>.table</code></h6> --}}
                    <div class="table-responsive">
                        <table class="table table-striped align-middle" id="DataTbl" style="font-size: 13px">
                            <thead>
                                <tr>
                                    <th class="border-top-0">No.</th>
                                    <th class="border-top-0">Photo</th>
                                    <th class="border-top-0">Title</th>
                                    <th class="border-top-0">Description</th>
                                    <th class="border-top-0">Order By</th>
                                    <th class="border-top-0">Action</th>
                                </tr>
                                <hr>
                            </thead>
                            <tbody>
                                @php
                                    $sl = 1;
                                @endphp
                                @forelse ($prizes as $prize)
                                    <tr>
                                        <td>{{ $sl++ }}</td>
                                        <td><img src="{{ asset('uploads/prize/' . $prize->image) }}" class="img-thumbnail"
                                                width="150" style="max-height:200px;" alt="photo"></td>
                                        <td>{{ $prize->title }}</td>
                                        <td style="max-width: 300px">{{ $prize->description }}</td>
                                        <td style="max-width: 300px">{{ $prize->order_by }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('admin.prize.edit', $prize) }}"
                                                    class="btn btn-rounded  btn-outline-warning btn-sm ml-1 mt-1"
                                                    title="Edit"><i class="mdi mdi-account-edit mdi-18px"></i></a>
                                                <form id="{{ 'form_' . $prize->id }}"
                                                    action="{{ route('admin.prize.destroy', $prize) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button data-id="{{ $prize->id }}" title="Delete"
                                                        class="delete btn btn-rounded btn-outline-danger btn-sm ml-1 mt-1"
                                                        type="button"><i
                                                            class="mdi mdi-delete-forever mdi-18px"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <h5>No Data Found</h5>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
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
