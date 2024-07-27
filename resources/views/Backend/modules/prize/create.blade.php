@extends('Backend.layouts.master')

@section('title', 'Create Prize')

@section('breadcrumb', 'Create Prize')

@section('content')
    <div class="row">
        <!-- Column -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Create Prize</p>
                    <hr>
                    <form class="form-horizontal form-material mx-2" action="{{ route('admin.prize.store') }}"
                        accept="image/*" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="image" for="imageInput">
                                    <input type="file" id="imageInput" value="{{ old('image') }}" name="image"
                                        class="form-control">
                                    <img id="profileImage"
                                        src="{{ asset('asset/no-images.png') }}" height="100%"
                                        width="100%" class="rounded-top">
                                    <i class="mdi mdi-camera-enhance mdi-24px"></i>
                                </label>
                            </div>
                            <div class="col-md-6">
                                <div class="row pt-1">
                                    <div class="col-md-12 mb-4">

                                        <div class="form-outline">
                                            <label class="form-label" for="title">Title</label>
                                            <input type="text" name="title" placeholder="Ex:- First Prize"
                                                value="{{ old('title') }}"
                                                class="form-control @error('title') is-invalid @enderror" />
                                            @error('title')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>

                                </div>
                                <div class="row pt-1">
                                    <div class="col-md-12 mb-4">

                                        <div class="form-outline">
                                            <label class="form-label" for="order_by">Order By(Serial No.)</label>
                                            <input type="number" name="order_by" placeholder=""
                                                value="{{ old('order_by') }}"
                                                class="form-control @error('order_by') is-invalid @enderror" />
                                            @error('order_by')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>

                                </div>
                                <div class="row pt-1">
                                    <div class="col-md-12 mb-4">

                                        <div class="form-outline">
                                            <label class="form-label" for="name">Description</label>
                                            <textarea name="description" placeholder="You can write a description here" rows="3"
                                                class="form-control @error('description') is-invalid @enderror"></textarea>
                                            @error('description')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 d-flex">
                                <button type="submit"
                                    class="btn btn-lg btn-success mx-auto mx-md-0 text-white mt-5 form-control">Create
                                    Prize</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>


    @push('css')
        <style>
            .image {
                display: block;
                width: 500px;
                max-width: 100%;
                background-color: rgb(239, 241, 245);
                border-radius: 5px;
                font-size: 1em;
                line-height: 2em;
                text-align: center;
            }

            .image:hover {
                background-color: rgb(207, 226, 207);
            }

            .image:active {
                background-color: skyblue;
            }

            #imageInput {
                border: 5px;
                clip: rect(1px, 1px, 1px, 1px);
                height: 1px;
                margin: -1px;
                overflow: hidden;
                padding: 0;
                position: absolute;
                width: 1px;
            }
        </style>
    @endpush

    @push('js')
        <script>
            var imageInput = document.getElementById("imageInput");
            var profileImage = document.getElementById("profileImage");

            imageInput.addEventListener("change", function() {
                // Check if a file has been selected
                if (imageInput.files && imageInput.files[0]) {
                    var reader = new FileReader();

                    // When the file is loaded, set the src attribute of the img element
                    reader.onload = function(e) {
                        profileImage.src = e.target.result;
                    };

                    // Read the selected file as a data URL
                    reader.readAsDataURL(imageInput.files[0]);
                }
            });
        </script>
    @endpush
    @if (session()->has('msg'))
        @push('js')
            <script>
                Swal.fire({
                    position: 'top-right',
                    icon: '{{ session('cls') }}',
                    toast: 'true',
                    title: '{{ session('msg') }}',
                    showConfirmButton: false,
                    confirmButtonText: "ok",
                    timerProgressBar: false,
                    showCancelButton: false,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showCloseButton: true,
                    timer: 2000
                })
            </script>
        @endpush
    @endif
@endsection
