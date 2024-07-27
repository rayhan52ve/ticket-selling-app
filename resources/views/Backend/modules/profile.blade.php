@extends('Backend.layouts.master')

@section('breadcrumb', 'Profile')

@section('content')
    <div class="row">
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Edit Profile</p>
                    <hr>
                    <form class="form-horizontal form-material mx-2" action="{{ route('profile_update', Auth::user()->id) }}"
                        method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="mb-4">
                            <label class="image" for="imageInput">
                                <input type="file" id="imageInput" name="image" class="form-control">
                                @if (auth()->user()->image)
                                    <img id="profileImage" src="/uploads/profile/{{ Auth::user()->image }}" height="150"
                                        width="150">
                                @else
                                    <img id="profileImage" src="{{ asset('backend/assets/images/users/avatar.png') }}"
                                        height="150" width="150">
                                @endif
                                <i class="mdi mdi-camera mdi-24px"></i>
                            </label>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">

                                <div class="form-outline">
                                    <label class="form-label" for="name">নামঃ</label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ auth()->user()->name }}" />
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-6 mb-4">

                                <div class="form-outline">
                                    <label class="form-label" for="phone">মোবাইল নম্বরঃ</label>
                                    <input type="number" name="phone" value="{{ auth()->user()->phone }}"
                                        class="form-control @error('phone') is-invalid @enderror" />
                                    @error('phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        {{-- <div class="row">
                            <div class="col-md-6 mb-4">

                                <div class="form-outline">
                                    <label class="form-label" for="email">ই-মেইলঃ</label>
                                    <input type="email" value="{{ auth()->user()->email }}" name="email"
                                        class="form-control @error('email') is-invalid @enderror" />
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                        </div> --}}

                        <div class="row">
                            <div class="col-md-6 mb-4 pb-2">

                                <div class="form-outline">
                                    <label class="form-label" for="address">ঠিকানাঃ</label>
                                    <input type="text" name="address"
                                        class="form-control @error('address') is-invalid @enderror"
                                        value="{{ auth()->user()->address }}" />
                                </div>
                                @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>

                        </div>

                        <div class="form-group">
                            <div class="col-sm-12 d-flex">
                                <button type="submit" class="btn btn-success mx-auto mx-md-0 text-white">Update
                                    Profile</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Change Pasword</p>
                    <hr>
                    @if (session('message'))
                        <h5 class="alert alert-{{ session('cls') }} mb-2">{{ session('message') }}</h5>
                    @endif

                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li class="text-danger m-2">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <form action="{{ route('changePassword') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label>Current Password</label>
                            <input type="password" name="current_password" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label>New Password</label>
                            <input type="password" name="password" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label>Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" />
                        </div>
                        <div class="mb-3 text-end">
                            <button type="submit" class="btn btn-success text-light">Update Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>

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

    @push('css')
        <style>
            .image {
                display: block;
                width: 60vw;
                max-width: 150px;
                background-color: rgb(239, 241, 245);
                border-radius: 2px;
                font-size: 1em;
                line-height: 1.6em;
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
                /* border-radius: 50%; */
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
@endsection
