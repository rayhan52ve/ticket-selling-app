<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Advertisemt;
use App\Models\Album;
use App\Models\Hero;
use App\Models\Lottery;
use App\Models\Oitiho;
use App\Models\Photography;
use App\Models\Prize;
use App\Models\Product;
use App\Models\ServiceCategory;
use App\Models\User;
use App\Models\VisitorLog;
use App\Models\WebsiteInfo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Jenssegers\Agent\Facades\Agent;

class FrontendController extends Controller
{
    public function home(Request $request)
    {

        $websiteInfo = WebsiteInfo::first();

        $acceptedLotteryCount = Lottery::where('status', 1)->count();

        $acceptedLotteryPercentage = ($acceptedLotteryCount / $websiteInfo->progress_bar_target) * 100;
        $finalPercentage = 54 + $acceptedLotteryPercentage;

        $prizes = Prize::orderBy('order_by', 'ASC')->get();
        return view('Frontend.modules.index', compact('prizes','websiteInfo','finalPercentage'));
    }

    public function about()
    {

        $admins = User::where('role', 1)->orWhere('role', 2)->get();
        $websiteInfo = WebsiteInfo::first();

        $countAdmin = User::where('role', 1)->orWhere('role', 2)->count();
        $countUser = User::where('role', 0)->count();
        $countBloodDonor = User::where('blood_donor', 1)->count();
        $countWorkers = User::where('designition', '!=', '0')->count();
        $countOthers = User::where('designition', '0')->count();


        $totalCount = User::count();
        $customerPercent = round(($countUser > 0) ? ($countUser / $totalCount) * 100 : 0);
        $bloodDonorsPercent = round(($countBloodDonor > 0) ? ($countBloodDonor / $totalCount) * 100 : 0);
        $countWorkersPercent = round(($countWorkers > 0) ? ($countWorkers / $totalCount) * 100 : 0);
        $countOthersPercent = round(($countOthers > 0) ? ($countOthers / $totalCount) * 100 : 0);


        return view('Frontend.modules.about', compact('admins', 'websiteInfo', 'countAdmin', 'countUser', 'countBloodDonor', 'countWorkers', 'bloodDonorsPercent', 'countWorkersPercent', 'countOthersPercent', 'customerPercent'));
    }

    public function contact()
    {
        $websiteInfo = WebsiteInfo::first();
        return view('Frontend.modules.contact', compact('websiteInfo'));
    }



    public function upcoming()
    {
        return view('Frontend.layouts.upcoming');
    }

}
