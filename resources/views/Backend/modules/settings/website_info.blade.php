@extends('Backend.layouts.master')

@section('title', 'Settings')

@section('breadcrumb', 'Settings')

@section('content')


    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <p class="card-title">Edit Website info</p>
                <hr>
                <form class="form-horizontal form-material mx-2" action="{{ route('admin.updateWebsiteInfo') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="row justify-content-center mb-3">
                            <div class="col-md-10">
                                <div class="mb-4">
                                    <label class="image" for="imageInput1">
                                        <input type="file" id="imageInput1" name="hero" class="form-control">
                                        @if (@$websiteInfo->hero)
                                            <img id="profileImage1" src="/uploads/website/{{ @$websiteInfo->hero }}"
                                                class="img-fluid">
                                        @else
                                            <img id="profileImage1" src="{{ asset('asset/no-images-banner.png') }}"
                                                class="img-fluid">
                                        @endif
                                        <i class="mdi mdi-camera mdi-24px"></i> Upload Banner Photo
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="row mb-2">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <label class="form-label" for="logo">ওয়েবসাইটের লোগো:</label>
                                            <input id="imageInput2" type="file" value="{{ @$websiteInfo->logo }}"
                                                name="logo" class="form-control @error('logo') is-invalid @enderror" />
                                            @error('logo')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            @if (@$websiteInfo->logo)
                                                <img id="profileImage2" src="/uploads/website/{{ @$websiteInfo->logo }}"
                                                    class="img-fluid"
                                                    style="height: 100px;width:100px;border:2px solid black">
                                            @else
                                                <img id="profileImage2" src="{{ asset('asset/no-images.jpg') }}"
                                                    class="img-fluid"
                                                    style="height: 100px;width:100px;border:2px solid black">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <label class="form-label" for="fevicon">ওয়েবসাইটের টাইটেল আইকন:</label>
                                            <input id="imageInput3" type="file" value="{{ @$websiteInfo->fevicon }}"
                                                name="fevicon"
                                                class="form-control @error('fevicon') is-invalid @enderror" />
                                            @error('fevicon')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            @if (@$websiteInfo->fevicon)
                                                <img id="profileImage3" src="/uploads/website/{{ @$websiteInfo->fevicon }}"
                                                    class="img-fluid"
                                                    style="height: 100px;width:100px;border:2px solid black">
                                            @else
                                                <img id="profileImage3" src="{{ asset('asset/no-images.jpg') }}"
                                                    class="img-fluid"
                                                    style="height: 100px;width:100px;border:2px solid black">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <label class="form-label" for="title">ওয়েবসাইটের নাম:</label>
                                            <input type="text" value="{{ @$websiteInfo->title }}" name="title"
                                                class="form-control @error('title') is-invalid @enderror" />
                                            @error('title')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <label class="form-label" for="email">ওয়েবসাইট ই-মেইল:</label>
                                            <input type="email" value="{{ @$websiteInfo->email }}" name="email"
                                                class="form-control @error('email') is-invalid @enderror" />
                                            @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <label class="form-label" for="phone">বিকাশ নম্বর:</label>
                                            <input type="number" name="phone" value="{{ @$websiteInfo->phone }}"
                                                class="form-control @error('phone') is-invalid @enderror" />
                                            @error('phone')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4 pb-2">
                                        <div class="form-outline">
                                            <label class="form-label" for="address">ঠিকানা:</label>
                                            <input type="text" name="address"
                                                class="form-control @error('address') is-invalid @enderror"
                                                value="{{ @$websiteInfo->address }}" />
                                        </div>
                                        @error('address')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <label class="form-label" for="description">ওয়েবসাইটের পরিচিতি:</label>
                                            <textarea name="description" rows="4" class="form-control @error('description') is-invalid @enderror">{{ @$websiteInfo->description }}</textarea>
                                            @error('description')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div> --}}


                                </div>
                                <h4>Social Links</h4>
                                <div class="row">
                                    <div class="col-md-6 mb-4 pb-2">
                                        <div class="form-outline">
                                            <label class="form-label" for="facebook">Facebook:</label>
                                            <input type="text" name="facebook"
                                                class="form-control @error('facebook') is-invalid @enderror"
                                                value="{{ @$websiteInfo->facebook }}" />
                                        </div>
                                        @error('facebook')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-4 pb-2">
                                        <div class="form-outline">
                                            <label class="form-label" for="telegram">Telegram:</label>
                                            <input type="text" name="telegram"
                                                class="form-control @error('telegram') is-invalid @enderror"
                                                value="{{ @$websiteInfo->telegram }}" />
                                        </div>
                                        @error('telegram')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-4 pb-2">
                                        <div class="form-outline">
                                            <label class="form-label" for="youtube">Youtube:</label>
                                            <input type="text" name="youtube"
                                                class="form-control @error('youtube') is-invalid @enderror"
                                                value="{{ @$websiteInfo->youtube }}" />
                                        </div>
                                        @error('youtube')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <label class="form-label" for="progress_bar_target">Progress Bar Target:</label>
                                        <input type="number" name="progress_bar_target"
                                            class="form-control @error('progress_bar_target') is-invalid @enderror"
                                            value="{{ @$websiteInfo->progress_bar_target }}" />
                                        @error('progress_bar_target')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <div class="form-outline">
                                        <div class="progress"  style="height: 30px;">
                                            <div class="progress-bar" role="progressbar" style="width: {{$finalPercentage}}%;" aria-valuenow="{{$finalPercentage}}" aria-valuemin="0" aria-valuemax="100">{{$finalPercentage}}%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 d-flex">
                                <button type="submit" class="btn btn-success mx-auto mx-md-0 text-white">Update Website
                                    info</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>


    @push('css')
        <style>
            .image {
                display: block;
                background-color: rgb(239, 241, 245);
                border-radius: 5px;
                font-size: 1em;
                line-height: 2em;
                text-align: center;
                position: relative;
                overflow: hidden;
            }

            .image img {
                width: 100%;
                height: auto;
                display: block;
                border: 2px solid #ccc;
                /* Add border to images */
                border-radius: 5px;
                /* Optional: Add border radius for rounded corners */
            }

            .image:hover {
                background-color: rgb(207, 226, 207);
            }

            .image:active {
                background-color: skyblue;
            }

            #imageInput1 {
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
            // first image
            var imageInput1 = document.getElementById("imageInput1");
            var profileImage1 = document.getElementById("profileImage1");

            imageInput1.addEventListener("change", function() {
                if (imageInput1.files && imageInput1.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        profileImage1.src = e.target.result;
                    };

                    reader.readAsDataURL(imageInput1.files[0]);
                }
            });

            // second image
            var imageInput2 = document.getElementById("imageInput2");
            var profileImage2 = document.getElementById("profileImage2");

            imageInput2.addEventListener("change", function() {
                if (imageInput2.files && imageInput2.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        profileImage2.src = e.target.result;
                    };

                    reader.readAsDataURL(imageInput2.files[0]);
                }
            });

            // third image
            var imageInput3 = document.getElementById("imageInput3");
            var profileImage3 = document.getElementById("profileImage3");

            imageInput3.addEventListener("change", function() {
                if (imageInput3.files && imageInput3.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        profileImage3.src = e.target.result;
                    };

                    reader.readAsDataURL(imageInput3.files[0]);
                }
            });
        </script>
    @endpush
    @push('js')
        <script>
            $('.delete').on('click', function() {
                let id = $(this).attr('data-id')

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
