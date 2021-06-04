<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('profile.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user_id = auth()->user()->id;
        $validatedData = $request->validate([
            'address' => 'required' ,
            'experience' => 'required | min:20' ,
            'bio' => 'required | min:20',
            'phone_number' => 'required | min:10 | numeric',
        ]);

        if($validatedData->fails()) {
            return back()->withErrors($validatedData);
        }

        User::whereId($user_id) -> update($validatedData);
        return redirect('user/profile')->with('message','Profile Updated');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function coverletter(Request $request)
    {
        $this->validate($request,[
            'cover_letter' => 'required | mimes:pdf,doc,docx,png,jpg | max:20000',
        ]);

        $user_id = auth()->user()->id;
        $cover = $request->file('cover_letter')->store('files','public');

        User::whereId($user_id) -> update([
            'cover_letter' => $cover
        ]);

        return redirect('user/profile')->with('message','Cover Letter Updated');
    }

    public function resume(Request $request)
    {
        $this->validate($request,[
            'resume' => 'required | mimes:pdf,doc,docx,png,jpg | max:20000',
        ]);
        $user_id = auth()->user()->id;
        $resume = $request->file('resume')->store('files','public');

        User::whereId($user_id) -> update([
            'resume' => $resume
        ]);

        return redirect('user/profile')->with('message','Resume Updated');
    }

    public function avatar(Request $request)
    {
        $this->validate($request,[
            'avatar' => 'required | mimes:png,jpg,jpeg | max:20000',
        ]);
        $user_id = auth()->user()->id; 
        if($request->hasfile('avatar')){
            $file = $request->file('avatar');
            $ext = $file->getClientOriginalExtension();
            $filename = date('YmdHis') . "." . $ext;
            $file->move('uploads/avatar/',$filename);
            User::whereId($user_id) -> update([
                'avatar' => $filename
            ]);
            return redirect('user/profile')->with('message','Avatar Updated');
        }
        //$imageName = date('YmdHis') . "." . request()->avatar->getClientOriginalExtension();
        //dd($imageName);
        //$imageName->move(public_path('images'),$imageName);
    }
}
