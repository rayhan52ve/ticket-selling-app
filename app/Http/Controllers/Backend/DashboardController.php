<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Lottery;
use App\Models\User;
use Carbon\Carbon;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {


        $agent = User::where('role', 2)->count();
        $agentRequests = User::where('role', 0)->count();
        $pendingLottery = Lottery::where('status', 0)->count();
        $acceptedLottery = Lottery::whereNotNull('user_id')->count();
        return view('Backend.modules.dashboard',compact('acceptedLottery','pendingLottery','agentRequests','agent'));

    }

    public function profile()
    {
        return view('Backend.modules.profile');
    }


    public function profile_update(Request $request, string $id)
    {
        if ($request->isMethod('PUT')) {
            $user = User::find($id);

            if ($request->hasFile('image')) {
                $destination = 'uploads/profile/' . $user->image;

                if (File::exists($destination)) {
                    File::delete($destination);
                }

                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension; // Change the file extension to webp
                $path = 'uploads/profile/';

                $file->move(public_path($path), $filename);

                // Resize the image before saving
                // $image = ImageManager::imagick()->read($file);

                // $image->resize(300, 300)->save($path);

                $user->image = $filename;
            }

            $user->name = $request->name;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->update();
        }

        session()->flash('msg', 'Profile Updated Successfully.');
        session()->flash('cls', 'success');
        return redirect()->back();
    }

    public function changePassword(Request $request)
    {
        $request->validate(
            [
                'current_password' => 'required|string',
                'password' => 'required|string|min:4|confirmed',
                'password_confirmation' => 'required'
            ],
            $message = [
                'password.confirmed' => 'Confirm password does not match.'
            ]
        );

        $currentPasswordStatus = Hash::check($request->current_password, Auth::user()->password);
        if ($currentPasswordStatus) {

            User::findOrFail(Auth::user()->id)->update([
                'password' => Hash::make($request->password),
            ]);

            session()->flash('msg', 'Password Updated Successfully.');
            session()->flash('cls', 'success');
            return redirect()->back();
        } else {

            session()->flash('message', 'Old Password does not match with Current Password.');
            session()->flash('cls', 'danger');
            return redirect()->back();
        }
    }
}
