@extends('Frontend.layouts.master')

@section('title', 'Developers Info')

@section('content')

    <main id="main">

        <!-- ======= Contact Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Developers Info</h2>
                    <ol>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>Developers Info</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Contact Section -->

        <!-- ======= Team Section ======= -->

        <section class="team" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
            <div class="container">

                <div class="row justify-content-center">

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="member">
                            <div class="member-img">

                                <img src="{{ asset('frontend/assets/img/developer/sajid.jpg') }}" class="img-fluid"
                                    alt="">
                                <span class="btn btn-block" style="position: absolute; top: 0; right: 0;"><i class="bi bi-eye">{{ $visitorCountdev }}</i></span>
                                <div class="social">
                                    <a href="https://github.com/rayhan52ve" title="github"><i class="bi bi-github"></i></a>
                                    <a href="https://www.facebook.com/sajid.rayhan.31" title="facebook"><i
                                            class="bi bi-facebook"></i></a>
                                    <a href="https://www.instagram.com/rayhan52ve/" title="instagram"><i
                                            class="bi bi-instagram"></i></a>
                                    <a href="https://www.linkedin.com/in/sajid-rayhan-a1a953252/" title="linkedin"><i
                                            class="bi bi-linkedin"></i></a>

                                    <div id="tooltip" class=" pt-2">
                                        <input type="text" value="{{ $developer->email }}" id="emailInput"
                                            style="display: none">
                                        <a href="javascript: copyEmail()" onmouseout="outEmail()"><span class="tooltiptext"
                                                id="demailTooltip">Copy Email</span><i class='bx bx-envelope bx-sm'></i></a>
                                    </div>

                                </div>

                            </div>
                            <div class="member-info">
                                <h4>{{$developer->name}}</h4>
                                <span>Laravel Developer (Full Stack)</span>
                                <p>Phone: {{$developer->phone}}</p>
                                <p>As a dedicated Laravel developer, I am passionate about crafting robust and efficient web
                                    applications. With a keen eye for detail and a strong understanding of the Laravel
                                    framework, I excel in creating elegant solutions that meet both client needs and
                                    industry standards. My expertise extends to designing scalable and maintainable code,
                                    implementing RESTful APIs, and optimizing database performance. Continuously staying
                                    updated on the latest Laravel developments, I thrive in collaborative environments,
                                    contributing to seamless project workflows and successful outcomes. My commitment to
                                    delivering high-quality, user-friendly applications is evident in my proactive
                                    problem-solving approach and commitment to staying abreast of emerging technologies
                                    within the Laravel ecosystem.</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Team Section -->

    </main><!-- End #main -->

    @push('js')
        <script>
            function copyEmail() {
                var copyText = document.getElementById("emailInput");
                copyText.select();
                copyText.setSelectionRange(0, 99999);
                navigator.clipboard.writeText(copyText.value);

                var tooltip = document.getElementById("demailTooltip");
                tooltip.innerHTML = "Email copied";
            }

            function outEmail() {
                var tooltip = document.getElementById("demailTooltip");
                tooltip.innerHTML = "Copy Email";
            }
        </script>
    @endpush
@endsection
