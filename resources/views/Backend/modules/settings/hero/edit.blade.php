@extends('Backend.layouts.master')

@section('title', 'Edit Slide')

@section('breadcrumb', 'Edit Slide')

@section('content')
    <div class="row">
        <!-- Column -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Edit Slide</p>
                    <hr>
                    <form class="form-horizontal form-material mx-2" action="{{ route('hero.update',$hero) }}" accept="image/*" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <label class="image" for="imageInput">
                                    <input type="file" id="imageInput" name="photo" class="form-control">
                                    <img id="profileImage"
                                        src="/uploads/hero/{{ $hero->photo }}"
                                        width="100%" style="max-height: 450px" class="rounded-top">
                                    <i class="mdi mdi-camera-enhance mdi-24px"></i>
                                </label>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 d-flex">
                                <button type="submit"
                                    class="btn btn-lg btn-success mx-auto mx-md-0 text-white mt-5 form-control">Update
                                    Slide Photo</button>
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
                width: 100%;
                height: auto;
                /* max-width: 100%; */
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
