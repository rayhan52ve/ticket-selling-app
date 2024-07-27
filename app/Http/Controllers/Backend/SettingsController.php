<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use App\Models\Lottery;
use App\Models\Oitiho;
use App\Models\WebsiteInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class SettingsController extends Controller
{
    public function editWebsiteInfo()
    {
        $websiteInfo = WebsiteInfo::first();

        $acceptedLotteryCount = Lottery::where('status', 1)->count();

        $acceptedLotteryPercentage = ($acceptedLotteryCount / $websiteInfo->progress_bar_target) * 100;
        $finalPercentage = 54 + $acceptedLotteryPercentage;

        return view('Backend.modules.settings.website_info', compact('websiteInfo','finalPercentage'));
    }

    public function updateWebsiteInfo(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
        ]);
    
        $websiteInfo = WebsiteInfo::first() ?? new WebsiteInfo();
    
        $this->handleFileUpload($request, $websiteInfo, 'hero');
        $this->handleFileUpload($request, $websiteInfo, 'logo');
        $this->handleFileUpload($request, $websiteInfo, 'fevicon');
    
        $websiteInfo->title = $request->title;
        $websiteInfo->email = $request->email;
        $websiteInfo->phone = $request->phone;
        $websiteInfo->address = $request->address;
        $websiteInfo->description = $request->description;
        $websiteInfo->progress_bar_target = $request->progress_bar_target;
        $websiteInfo->facebook = $request->facebook;
        $websiteInfo->telegram = $request->telegram;
        $websiteInfo->youtube = $request->youtube;
    
        $websiteInfo->save();
    
        session()->flash('msg', 'Website Info Updated Successfully.');
        session()->flash('cls', 'success');
        return redirect()->back();
    }
    
    private function handleFileUpload(Request $request, $websiteInfo, $fieldName)
    {
        if ($request->hasFile($fieldName)) {
            $destination = 'uploads/website/' . $websiteInfo->$fieldName;
    
            if (File::exists($destination)) {
                File::delete($destination);
            }
    
            $file = $request->file($fieldName);
            $extension = $file->getClientOriginalExtension();
            $filename = $fieldName . time() . '.' . $extension;
            $path = 'uploads/website/';
            $file->move(public_path($path), $filename);
    
            $websiteInfo->$fieldName = $filename;
        }
    }
    


}
