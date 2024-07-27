@extends('Frontend.layouts.master')

@section('title', 'Coming-Soon')

@section('content')
    <main id="main">
        <div class="container-fluid my-5 py-5">
            <div class="d-flex justify-content-center">
                <div class="col-md-6">
                    <div class="">
                        <div class="">
                            <h1 class="text-center mt-2"><i class='bx bxs-balloon bx-fade-up'></i></h1>
                            <h3 class="text-center mt-3">
                                We are working on this page. It will appear here shortly.
                            </h3>
                        </div>
                        <div class="">
                            <img class="card-img-top" style="max-width: 80%;padding-left:20%;" src="{{ asset('frontend/assets/img/upcoming4.png') }}"
                                alt="Card image cap">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
