@extends('Backend.layouts.master')

@section('title', 'Edit User Data')

@section('breadcrumb', 'Edit User Data')

@section('content')
    <div class="row">
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Edit User Data</p>
                    <hr>
                    <form class="form-horizontal form-material mx-2" action="{{ route('user.update', $user->id) }}"
                        method="POST">
                        @method('PUT')
                        @csrf
                        <div class="my-5">
                            @if ($user->image)
                                <img id="profileImage" src="/uploads/profile/{{ $user->image }}" class="img-thumbnail"
                                    height="150" width="150">
                            @else
                                <img id="profileImage" src="{{ asset('dashboard/assets/images/users/avatar.png') }}"
                                    height="150" width="150" class="img-thumbnail">
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">

                                <div class="form-outline">
                                    <label class="form-label" for="name">নামঃ</label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ $user->name }}" />
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-6 mb-4">

                                <div class="form-outline">
                                    <label class="form-label" for="username">ইউজারনেমঃ</label>
                                    <input type="text" name="username" value="{{ $user->username }}"
                                        class="form-control @error('username') is-invalid @enderror" />
                                    @error('username')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">

                                <div class="form-outline">
                                    <label class="form-label" for="email">ই-মেইলঃ</label>
                                    <input type="email" value="{{ $user->email }}" name="email"
                                        class="form-control @error('email') is-invalid @enderror" />
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-6 mb-4">

                                <div class="form-outline">
                                    <label class="form-label" for="phone">মোবাইল নম্বরঃ</label>
                                    <input type="number" name="phone" value="{{ $user->phone }}"
                                        class="form-control @error('phone') is-invalid @enderror" />
                                    @error('phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4 pb-2">

                                <div class="form-outline">
                                    <label class="form-label" for="address">ঠিকানাঃ</label>
                                    <input type="text" name="address"
                                        class="form-control @error('address') is-invalid @enderror"
                                        value="{{ $user->address }}" />
                                </div>
                                @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="col-md-6 mb-4 pb-2">

                                <h6 class="mb-2 pb-1">একাউন্টের টাইপ সিলেক্ট করুন? </h6>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" style="border-color: black;" type="radio"
                                        name="account_type"  value="0"
                                        {{ $user->account_type == 0 ? 'checked' : '' }} />ব্যাক্তিগত
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" style="border-color: black;" type="radio"
                                        name="account_type" value="1"
                                        {{ $user->account_type == 1 ? 'checked' : '' }} />প্রতিষ্ঠান/সেবা
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4 pb-2">

                                <label class="form-label select-label">সার্ভিস/পেশা/প্রতিষ্ঠানের ধরনঃ</label>
                                <select class="select form-control @error('service_category_id') is-invalid @enderror"
                                    value="{{ old('service_category_id') }}" name="service_category_id" id="service_category_id" onchange="setSubCategory(this.value)">
                                    <option selected disabled>সার্ভিস/পেশার ধরন সিলেক্ট করুন</option>
                                    @foreach ($serviceCategories as $serviceCategory)
                                        <option value="{{ $serviceCategory->id }}" @if($serviceCategory->id == $user->service_category_id) selected @endif>
                                            {{ $serviceCategory->name }}</option>
                                    @endforeach
                                </select>
                                @error('service_category_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="col-md-6 mb-4 pb-2">

                                <label class="form-label select-label">সার্ভিস/পেশা/প্রতিষ্ঠানঃ</label>
                                <select class="select form-control @error('service_id') is-invalid @enderror"
                                    value="{{ old('service_id') }}" name="service_id" id="subCategoryId">
                                    <option selected disabled>সার্ভিস/পেশা সিলেক্ট করুন</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}" @if($service->id == $user->service_id) selected @endif>
                                            {{ $service->name }}</option>
                                    @endforeach
                                </select>
                                @error('service_category_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-4 mt-2">

                                <h6 class="mb-2 pb-1">আপনি কি রক্তদাতা হতে চান? </h6>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" style="border-color: black;" type="radio"
                                        name="blood_donor" id="yes" value="1"
                                        {{ $user->blood_donor == 1 ? 'checked' : '' }} />হ্যাঁ
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" style="border-color: black;" type="radio"
                                        name="blood_donor" id="no" value="0"
                                        {{ $user->blood_donor == 0 ? 'checked' : '' }} />না
                                </div>

                            </div>
                            <div class="col-md-4 mb-4 blood_group">
                                <label class="form-label select-label">রক্তের গ্রুপঃ </label>
                                <select class="select form-control @error('blood_group') is-invalid @enderror"
                                    value="{{ old('blood_group') }}" name="blood_group">
                                    <option selected disabled>রক্তের গ্রুপ সিলেক্ট করুন</option>
                                    <option value="A+" @selected(value('A+') == $user->blood_group)>A+ (এ পজেটিভ)</option>
                                    <option value="A-" @selected(value('A-') == $user->blood_group)>A- (এ নেগেটিভ)</option>
                                    <option value="B+" @selected(value('B+') == $user->blood_group)>B+ (বি পজেটিভ)</option>
                                    <option value="B-" @selected(value('B-') == $user->blood_group)>B- (বি নেগেটিভ)</option>
                                    <option value="AB+" @selected(value('AB+') == $user->blood_group)>AB+ (এবি পজেটিভ)</option>
                                    <option value="AB-" @selected(value('AB-') == $user->blood_group)>AB- (এবি নেগেটিভ)</option>
                                    <option value="O+" @selected(value('O+') == $user->blood_group)>O+ (ও পজেটিভ)</option>
                                    <option value="O-" @selected(value('O-') == $user->blood_group)>O- (ও নেগেটিভ)</option>
                                </select>
                                @error('blood_group')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="col-md-4 mb-4 pb-2">

                                <div class="form-outline">
                                    <label class="form-label" for="last_donation">শেষ রক্তদানের তারিখঃ</label>
                                    <input type="date" name="last_donation"
                                        class="form-control @error('last_donation') is-invalid @enderror"
                                        value="{{ $user->last_donation ? \Carbon\Carbon::parse($user->last_donation)->format('Y-m-d') : '' }}" />
                                </div>
                                @error('last_donation')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 d-flex">
                                <button type="submit" class="btn btn-success mx-auto mx-md-0 text-white">Update
                                    User Data</button>
                            </div>
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

    <<script>
        function setSubCategory(id) {
            $.ajax({
                type: "GET",
                url: "{{ route('get-sub-category-by-category') }}",
                data: {
                    id: id
                },
                dataType: "JSON", // Corrected typo in 'dataType'
                success: function(response) {
                    var option = '<option value="" disabled selected>--সার্ভিস/পেশা/প্রতিষ্ঠান সিলেক্ট করুন--</option>';
                    $.each(response, function(key, value) {
                        option += '<option value="' + value.id + '">' + value.name + '</option>';
                    });
                    $('#subCategoryId').html(option); // Corrected to use 'html()' instead of 'append()'
                }
            });
        }
    </script>

@endsection
