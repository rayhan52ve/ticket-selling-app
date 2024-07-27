<?php

namespace App\Http\Controllers;

use App\Models\Lottery;
use App\Models\WebsiteInfo;
use Illuminate\Http\Request;

class LotteryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Lottery Requests';
        $lotteryRequests = Lottery::where('status', 0)->latest()->get();
        return view('Backend.modules.lottery_requests.index', compact('lotteryRequests', 'pageTitle'));
    }

    public function acceptedLottery()
    {
        $pageTitle = 'Lottery List';
        $lotteryRequests = Lottery::where('status', 1)->latest()->get();
        return view('Backend.modules.lottery_requests.index', compact('lotteryRequests', 'pageTitle'));
    }

    public function lotteryIdlist()
    {
        $pageTitle = 'Lottery List';
        $acceptedLotteries = Lottery::where('status', 1)->latest()->get();
        return view('Backend.modules.lottery_requests.lottery_list', compact('acceptedLotteries', 'pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $websiteInfo = WebsiteInfo::first();

        return view('Backend.modules.lottery_requests.create',compact('websiteInfo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'user_id' => 'nullable',
                'name' => 'required',
                'phone' => 'required|digits:11',
                'address' => 'required',
                'trx_id' => 'required|unique:lotteries,trx_id',
                'trx_number' => 'required|digits:11',
            ], [
                'trx_id.required' => 'Transaction id is required',
                'trx_id.unique' => 'Transaction id already used',
                'trx_number.required' => 'Transaction number is required',
            ]);

            // Set status based on the presence of user_id
            // $validatedData['status'] = isset($validatedData['user_id']) ? 1 : 0;

            Lottery::create($validatedData);

            session()->flash('msg', 'Form Submitted Successfully.');
            session()->flash('cls', 'success');
        } catch (\Illuminate\Validation\ValidationException $e) {
            session()->flash('msg', $e->validator->errors()->first());
            session()->flash('cls', 'error');
            return redirect()->back()->withErrors($e->validator)->withInput();
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Lottery $lottery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lottery $lottery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lottery $lottery)
    {
        dd($lottery);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lottery $lottery)
    {
        //
    }

    public function lotteryStatus($id)
    {
        $lottery = Lottery::find($id);

        $nmbr = '88' . $lottery->phone;
    
        $url = "http://45.120.38.242/api/sendsms";
        $data = [
            "api_key" => "01732329071.4Cp8dZbb5LK2PGbthV",
            "type" => "text",
            "phone" => $nmbr,
            "senderid" => "8809604903086",
            "message" => "প্রিয় গ্রাহক, আপনার লটারি কোড :" .' '. $lottery->id,
        ];
    
        $ch = curl_init();
    
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    
        $response = curl_exec($ch);
    
        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
            curl_close($ch);
            session()->flash('msg', 'SMS sending failed: ' . $error_msg);
            session()->flash('cls', 'error');
            return back();
        }
    
        curl_close($ch);
    
        $response_data = json_decode($response, true);
    
        if (isset($response_data['status']) && $response_data['status'] === 'Failed') {
            $error_msg = $response_data['error'] ?? 'Unknown error occurred';
            session()->flash('msg', 'SMS sending failed: ' . $error_msg);
            session()->flash('cls', 'error');
            return back();
        }
    
    
        $lottery->status = 1;
        $lottery->save();
    
        session()->flash('msg', 'Lottery Request Accepted Successfully');
        session()->flash('cls', 'success');
    
        return back();
    }

}
