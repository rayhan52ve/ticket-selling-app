@extends('Backend.layouts.master')

@section('breadcrumb', 'Add Member Data')

@section('content')
    <div class="row">
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Add Member Data</p>
                    <hr>
                    <form class="form-horizontal form-material mx-2" action="{{ route('user.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-4">

                                <div class="form-outline">
                                    <label class="form-label" for="name">নামঃ</label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') }}" />
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-6 mb-4">

                                <div class="form-outline">
                                    <label class="form-label" for="phone">মোবাইল নম্বরঃ</label>
                                    <input type="number" name="phone" value="{{ old('phone') }}"
                                        class="form-control @error('phone') is-invalid @enderror" />
                                    @error('phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">

                                <div class="form-outline">
                                    <label class="form-label" for="email">ই-মেইলঃ</label>
                                    <input type="email" value="{{ old('email') }}" name="email"
                                        class="form-control @error('email') is-invalid @enderror" />
                                    @error('email')
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
                                        value="{{ old('address') }}" />
                                </div>
                                @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="col-md-6 mb-4 pb-2">

                                <h6 class="mb-2 pb-1">একাউন্টের টাইপ সিলেক্ট করুন? </h6>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" style="border-color: black;" type="radio"
                                        name="account_type" value="0" checked />ব্যাক্তিগত
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" style="border-color: black;" type="radio"
                                        name="account_type" value="1" />প্রতিষ্ঠান/সেবা
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4 pb-2">

                                <label class="form-label select-label">সার্ভিস/পেশা/প্রতিষ্ঠানের ধরনঃ</label>
                                <select class="select form-control @error('service_category_id') is-invalid @enderror"
                                    value="{{ old('service_category_id') }}" name="service_category_id"
                                    id="service_category_id" onchange="setSubCategory(this.value)">
                                    <option selected disabled>সার্ভিস/পেশার ধরন সিলেক্ট করুন</option>
                                    @foreach ($serviceCategories as $serviceCategory)
                                        <option value="{{ $serviceCategory->id }}">
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
                                    <option selected disabled>সার্ভিস/পেশা/প্রতিষ্ঠান সিলেক্ট করুন</option>
                                    {{-- @foreach ($services as $service)
                                        <option value="{{ $service->id }}">
                                            {{ $service->name }}</option>
                                    @endforeach --}}
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
                                        name="blood_donor" id="yes" value="1" />হ্যাঁ
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" style="border-color: black;" type="radio"
                                        name="blood_donor" id="no" value="0" checked />না
                                </div>

                            </div>
                            <div class="col-md-4 mb-4 blood_group">
                                <label class="form-label select-label">রক্তের গ্রুপঃ </label>
                                <select class="select form-control @error('blood_group') is-invalid @enderror"
                                    value="{{ old('blood_group') }}" name="blood_group">
                                    <option selected disabled>রক্তের গ্রুপ সিলেক্ট করুন</option>
                                    <option value="A+">A+ (এ পজেটিভ)</option>
                                    <option value="A-">A- (এ নেগেটিভ)</option>
                                    <option value="B+">B+ (বি পজেটিভ)</option>
                                    <option value="B-">B- (বি নেগেটিভ)</option>
                                    <option value="AB+">AB+ (এবি পজেটিভ)</option>
                                    <option value="AB-">AB- (এবি নেগেটিভ)</option>
                                    <option value="O+">O+ (ও পজেটিভ)</option>
                                    <option value="O-">O- (ও নেগেটিভ)</option>
                                </select>
                                @error('blood_group')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="col-md-4 mb-4 pb-2 last_donation" id="last_donation_div">

                                <div class="form-outline">
                                    <label class="form-label" for="last_donation">শেষ রক্তদানের তারিখঃ</label>
                                    <input type="date" name="last_donation"
                                        class="form-control @error('last_donation') is-invalid @enderror" />
                                </div>
                                @error('last_donation')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 d-flex">
                                <button type="submit" class="btn btn-success mx-auto mx-md-0 text-white">Save
                                    Data</button>
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

    @push('js')
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
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var yesRadio = document.getElementById('yes');
                var bloodGroupDiv = document.querySelector('.blood_group');
                var bloodGroupSelect = bloodGroupDiv.querySelector('[name="blood_group"]');
                var lastDonationDiv = document.getElementById('last_donation_div');

                function toggleBloodGroup() {
                    if (yesRadio.checked) {
                        bloodGroupDiv.style.display = 'block';
                        bloodGroupSelect.disabled = false;
                        lastDonationDiv.style.display = 'block'; // Show last_donation div
                    } else {
                        bloodGroupDiv.style.display = 'none';
                        bloodGroupSelect.disabled = true;
                        lastDonationDiv.style.display = 'none'; // Hide last_donation div
                    }
                }

                toggleBloodGroup();

                // Add event listener
                document.querySelectorAll('input[name="blood_donor"]').forEach(function(radio) {
                    radio.addEventListener('change', toggleBloodGroup);
                });
            });
        </script>
    @endpush
@endsection
