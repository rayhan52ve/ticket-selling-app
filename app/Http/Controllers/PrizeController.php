<?php

namespace App\Http\Controllers;

use App\Models\Prize;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class PrizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prizes = Prize::orderBy('order_by', 'ASC')->get();
        return view('Backend.modules.prize.index', compact('prizes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Backend.modules.prize.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'title' => 'required',
            'description' => 'nullable',
            'order_by' => 'nullable',
        ]);

        $prize = new Prize;

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension; // Change the file extension to webp
            $path = 'uploads/prize/';

            $file->move(public_path($path), $filename);

            $prize->image = $filename;
        }


        $prize->title = $request->title;
        $prize->description = $request->description;
        $prize->order_by = $request->order_by;
        $prize->save();

        session()->flash('msg', 'Prize Added Successfully');
        session()->flash('cls', 'success');
        return redirect()->route('admin.prize.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prize $prize)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prize $prize)
    {
        return view('Backend.modules.prize.edit', compact('prize'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prize $prize)
    {
        if ($request->isMethod('PUT')) {
            $request->validate([
                'image' => 'nullable',
                'title' => 'required',
                'description' => 'nullable',
                'order_by' => 'nullable',
            ]);

            if ($prize) {
                if ($request->hasFile('image')) {
                    $destination = 'uploads/prize/' . $prize->image;

                    if (File::exists($destination)) {
                        File::delete($destination);
                    }

                    $file = $request->file('image');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time() . '.' . $extension; // Change the file extension to webp
                    $path = 'uploads/prize/';

                    $file->move(public_path($path), $filename);

                    $prize->image = $filename;
                }


                $prize->title = $request->title;
                $prize->description = $request->description;
                $prize->order_by = $request->order_by;
                $prize->save();
            }
        }

        session()->flash('msg', 'Prize Updated Sucessfully.');
        session()->flash('cls', 'success');
        return redirect()->route('admin.prize.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prize $prize)
    {
        $destination = 'uploads/prize/' . $prize->image;

        if (File::exists($destination)) {
            File::delete($destination);
        }

        $prize->delete();

        session()->flash('msg', 'Prize Deleted Successfully');
        session()->flash('cls', 'success');
        return redirect()->back();
    }
}
