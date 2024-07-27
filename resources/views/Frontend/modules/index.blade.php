@extends('Frontend.layouts.master')

@section('content')

    <style>
        .table-container {
            background: linear-gradient(145deg, #e0f7fa, #ffffff);
            box-shadow: 3px 3px 10px #babecc, -3px -3px 10px #ffffff;
            border-radius: 10px;
            padding: 20px;
        }

        .card-header {
            background-color: #007bff;
            color: white;
            text-align: center;
            font-size: 1.5rem;
            border-radius: 10px 10px 0 0;
        }

        .table thead th {
            background-color: #007bff;
            color: white;
            vertical-align: middle;
        }

        .table tbody td,
        .table tbody th {
            vertical-align: middle;
        }

        .table tbody tr {
            transition: all 0.3s ease-in-out;
        }

        .table tbody tr:hover {
            background-color: #e3f2fd;
        }

        .img-thumbnail {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .img-thumbnail:hover {
            transform: scale(1.1);
        }

        .text-center-empty {
            color: #007bff;
            font-weight: bold;
        }
    </style>


    <!-- ======= Hero Slider Section ======= -->
    <section id="hero-slider" class="hero-slider">
        <div class="container-md" data-aos="fade-in">
            <div class="row">
                <div class="col-12">
                    <div class="swiper sliderFeaturedPosts">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <a href="single-post.html" class="img-container d-flex align-items-end">
                                    @if (@$websiteInfo->hero)
                                        <img src="/uploads/website/{{ @$websiteInfo->hero }}" alt="Post Image"
                                            class="img-fluid">
                                    @else
                                        <img src="frontend/assets/img/hero1.jpeg" alt="Post Image" class="img-fluid">
                                    @endif
                                    <div class="img-bg-inner">
                                        {{-- <h2>The Best Homemade Masks for Face (keep the Pimples Away)</h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem neque
                                            est mollitia! Beatae minima assumenda repellat harum vero, officiis
                                            ipsam magnam obcaecati cumque maxime inventore repudiandae quidem
                                            necessitatibus rem atque.</p> --}}
                                    </div>
                                </a>
                            </div>


                        </div>
                        <div class="custom-swiper-button-next">
                            <span class="bi-chevron-right"></span>
                        </div>
                        <div class="custom-swiper-button-prev">
                            <span class="bi-chevron-left"></span>
                        </div>

                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Hero Slider Section -->

    <section>
        <div class="container-md" data-aos="fade-in">
            <div class="row justify-content-center">
                <div class="col-11">
                    <div class="form-outline text-center">
                        <h4 class="text-succes">লটারি বিক্রি হয়েছে</h4>
                        <div class="progress"  style="height: 30px;">
                            <div class="progress-bar" role="progressbar" style="width: {{$finalPercentage}}%;" aria-valuenow="{{$finalPercentage}}" aria-valuemin="0" aria-valuemax="100">{{$finalPercentage}}%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container" data-aos="fade-up" style="display: flex; justify-content: center; align-items: center;">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <button class="btn btn-xlg btn-warning" style="padding: 20px 40px; font-size: 24px;" data-bs-toggle="modal"
                    data-bs-target="#lotteryModal">Buy Lottery</button>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="lotteryModal" tabindex="-1" aria-labelledby="lotteryModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="lotteryModalLabel">lottery Form</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                    </div>
                    <div class="container">
                        <div class="text-center text-danger">
                            <p> নিম্নলখিত নাম্বারটিতে ২০ টাকা সেন্ড মানি করার পর প্রয়োজনীয় তথ্য দিয়ে ফর্মটি পুরন করুন।</p>
                            বিকাশ নাম্বার: <strong id="agentNumber">{{ @$websiteInfo->phone ?? null }}</strong><button
                                id="copy-btn" class="btn btn-success mx-3 btn-sm">কপি করুন</button>
                            <script>
                                // Copy agent number to clipboard
                                document.getElementById('copy-btn').addEventListener('click', function() {
                                    var agentNumber = document.getElementById('agentNumber').innerText;
                                    navigator.clipboard.writeText(agentNumber).then(function() {
                                        document.getElementById('copy-btn').innerText = 'কপি হয়েছে';
                                    });
                                });
                            </script>
                        </div>
                    </div>
                    <form action="{{ route('lottery.store') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">নাম:</label>
                                <input type="text" name="name" class="form-control form-control-sm"
                                    id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">মোবাইল নং:</label>
                                <input type="number" name="phone" class="form-control form-control-sm">
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">ঠিকানা:</label>
                                <input type="text" name="address" class="form-control form-control-sm">
                            </div>
                            <div class="mb-3">
                                <label for="trx_number" class="form-label">ট্রানজেকশন নম্বর:</label>
                                <input type="text" name="trx_number" placeholder="যে নাম্বার থেকে টাকা পাঠিয়েছেন"
                                    class="form-control form-control-sm">
                            </div>
                            <div class="mb-3">
                                <label for="trx_id" class="form-label">ট্রানজেকশন আইডি:</label>
                                <input type="text" name="trx_id" class="form-control form-control-sm">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- ======= Post Grid Section ======= -->
    <section id="posts" class="posts">
        <div class="container" data-aos="fade-up">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card table-container">
                        <div class="card-header">
                            Prize List
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col">#</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $sl = 1; @endphp
                                        @forelse ($prizes as $prize)
                                            <tr class="text-center">
                                                <th scope="row">{{ $sl++ }}</th>
                                                <td><img src="{{ asset('uploads/prize/' . $prize->image) }}"
                                                        class="img-thumbnail" style="max-width: 85px; height: auto;"
                                                        alt="No image"></td>
                                                <td>{{ $prize->title }}</td>
                                                <td>{{ $prize->description }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center text-center-empty">No prize enlisted
                                                    yet</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    @push('js')
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
                        timerProgressBar: false,
                        showCancelButton: false,
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        showCloseButton: true,
                        timer: 5000
                    })
                </script>
            @endpush
        @endif
    @endpush
@endsection
