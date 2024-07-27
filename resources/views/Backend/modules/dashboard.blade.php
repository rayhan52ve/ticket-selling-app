@extends('Backend.layouts.master')

@section('title', 'Controll Panel')

@section('breadcrumb', 'Dashboard')

@section('content')
    {{-- @if (Auth::user()->role == 1 || Auth::user()->role == 2) --}}
        <div class="row">
            <!-- Column -->
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-xl-3 col-md-3">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-header">
                                <h5>Agents</h5>
                            </div>
                            <div class="card-body text-center">
                                <h1>{{$agent}}</h1>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-3">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-header">
                                <h5>Agent Requests</h5>
                            </div>
                            <div class="card-body text-center">
                                <h1>{{$agentRequests}}</h1>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-3">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-header">
                                <h5>Pending Lotteries</h5>
                            </div>
                            <div class="card-body text-center">
                                <h1>{{$pendingLottery}}</h1>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-3">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-header">
                                <h5>Lottery Requested By Agent</h5>
                            </div>
                            <div class="card-body text-center">
                                <h1>{{$acceptedLottery}}</h1>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-xl-3 col-md-3">
                        <div class="card text-white mb-4" style="background-color: rgb(53, 53, 98)">
                            <div class="card-header">
                                <h5>Workers</h5>
                            </div>
                            <div class="card-body text-center">
                                <h1>6</h1>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-3">
                        <div class="card text-white mb-4" style="background-color: rgb(79, 164, 79)">
                            <div class="card-header">
                                <h5>Others</h5>
                            </div>
                            <div class="card-body text-center">
                                <h1>8</h1>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a class="small text-white stretched-link" href="#">View Details</a>
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>

    {{-- @else
        <div>
            <h3>Welcome! Dear, {{ Auth::user()->name }}.</h3>
            <p>To Change Profile info you can go to Change Profile option on Side Nav.If you are browsing from Mobile click
                three line icon from Topbar.</p>
        </div>
    @endif --}}


    @if (session()->has('msg'))
        @push('js')
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
        @endpush
    @endif

    @push('js')
       //
    @endpush
@endsection
