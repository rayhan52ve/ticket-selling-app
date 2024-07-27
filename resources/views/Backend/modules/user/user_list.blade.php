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
                    {{-- <h6 class="card-subtitle">Add class <code>.table</code></h6> --}}
                    <div class="table-responsive">
                        <table class="table table-striped" id="DataTbl">
                            <thead style="background-color: skyblue">
                                <tr>
                                    <th class="border-top-0">নং</th>
                                    <th class="border-top-0">নাম</th>
                                    <th class="border-top-0">মোবাইল নাম্বার</th>
                                    <th class="border-top-0">ঠিকানা</th>
                                    <th class="border-top-0">অ্যাকশন</th>
                                </tr>
                                <hr>
                            </thead>
                            <tbody>
                                @php
                                    $sl = 1;
                                @endphp
                                @forelse ($users as $user)
                                    <tr>
                                        <td>{{ $sl++ }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->address }}</td>
                                        <td class="">
                                            <div class="d-flex">
                                                {{-- <a href="{{ route('user.edit', $user) }}"
                                                    class="btn btn-rounded  btn-outline-primary btn-sm ml-1 mt-1"
                                                    title="Edit"><i class="mdi mdi-account-edit mdi-18px"></i></a> --}}

                                                @if ($user->role == 2)
                                                    <a href="{{ route('admin.userRole', $user->id) }}"
                                                        class="btn btn-rounded btn-outline-primary btn-sm ml-1 mt-1">Remove From Agent</a>
                                                @elseif ($user->role == 0)
                                                    <a href="{{ route('admin.userRole', $user->id) }}"
                                                        class="btn btn-rounded btn-outline-primary btn-sm ml-1 mt-1">Accept</a>
                                                @endif
                                                <form id="{{ 'form_' . $user->id }}"
                                                    action="{{ route('admin.user.destroy', $user) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button data-id="{{ $user->id }}"
                                                        class="delete btn btn-rounded btn-outline-danger btn-sm ml-1 mt-1"
                                                        type="button" title="Delete"><i
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
