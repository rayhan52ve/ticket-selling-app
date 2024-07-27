<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Agent Request';

        $users = User::where('role', 0)->latest()->get();
        return view('Backend.modules.user.user_list', compact('users', 'pageTitle'));
    }


    public function agentList()
    {
        $pageTitle = 'Agent List';
        $users = User::where('role', 2)->latest()->get();
        return view('Backend.modules.user.user_list', compact('users', 'pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Backend.modules.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required',
                'phone' => 'required|unique:users|min:11',
                'email' => 'nullable',
                'address' => 'required',
                'account_type' => 'required',
                'service_category_id' => 'required',
                'service_id' => 'required',
                'blood_group' => 'required_if:blood_donor,1',
                'last_donation' => 'nullable',
            ]);

            User::create($request->all());

            session()->flash('msg', 'Data Added Sucessfully.');
            session()->flash('cls', 'success');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('Backend.modules.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // dd($request->all(),$user);
        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'required|min:11|unique:users,phone,' . $user->id,
            'email' => 'nullable',
            'address' => 'required',
            'account_type' => 'required',
            'service_category_id' => 'required',
            'service_id' => 'required',
            'address' => 'required',
            'blood_group' => 'required_if:blood_donor,1',
            'last_donation' => 'nullable',
        ]);
        // dd($validatedData);

        $user->update($validatedData);

        session()->flash('msg', 'Data Updated Successfully.');
        session()->flash('cls', 'success');
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $destination = 'uploads/profile/' . $user->image;

        if (File::exists($destination)) {
            File::delete($destination);
        }

        $user->delete();
        session()->flash('msg', 'ইউজার ডিলিট হয়েছে।');
        session()->flash('cls', 'success');

        return redirect()->back();
    }

    public function userRole($id)
    {
        $user = User::find($id);
        if ($user->role == 0) {
            $user->role = 2;
        } elseif($user->role == 2) {
            $user->role = 0;
        }
        $user->save();
        session()->flash('msg', 'ইউজার টাইপ পরিবর্তন হয়েছে।');
        session()->flash('cls', 'success');

        return back();
    }
}
