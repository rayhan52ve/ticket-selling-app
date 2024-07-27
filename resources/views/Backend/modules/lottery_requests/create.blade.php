@extends('Backend.layouts.master')

@section('breadcrumb', 'Book A Lottery')

@section('content')
    <div class="row justify-content-center">
        <!-- Column -->
        <div class="col-lg-6 col-xlg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <p class="card-title">Book A Lottery</p>
                    <hr>
                    <div class="">
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
                            <label for="trx_number" class="form-label">ট্রানজেকশন নম্বর:</label>
                            <input type="text" name="trx_number" placeholder="যে নাম্বার থেকে টাকা পাঠিয়েছেন" class="form-control form-control-sm">
                        </div>
                        <div class="mb-3">
                            <label for="trx_id" class="form-label">ট্রানজেকশন আইডি:</label>
                            <input type="text" name="trx_id" class="form-control form-control-sm">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">ঠিকানা:</label>
                            <input type="text" name="address" class="form-control form-control-sm">
                        </div>
                        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
@endsection
