<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminatr\Http\Request;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use App\Profile;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        // $profiles = Profile::all();
        $profiles = Profile::where('user_role', 'Guard')->get();
        return view('profile.edit')->with('profiles', $profiles);
    }


    /**
     * Update Active User's profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        // User Imgae Handler
        if($request->hasFile('user_image')){
            // get filename with extension
            $filenameWithExt = $request->file('user_image')->getClientOriginalName();
            // get just filename
            $fileName = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // get just extension
            $extension = $request->file('user_image')->getClientOriginalExtension();
            // filename to store
            $fileNameToStore = $fileName.'_'.time().'_'.$extension;
            // upload public/storage/user-image
            $path = $request->file('user_image')->storeAs('public/user_images', $fileNameToStore);
        } 

        $request = new Profile();
        $request->user_last_name    = $request->input('user_last_name');
        $request->user_first_name   = $request->input('user_first_name');
        $request->user_employee_id  = $request->input('user_employee_id');
        $request->user_description  = $request->input('user_description');
        $request->user_role         = $request->input('user_role');
        if($request->hasFile('user_image')){
            $request->user_image = $fileNameToStore;
        };
        $request->email             = $request->input('email');

        auth()->user()->update($request->all());
        return back()->withStatus(__('Profile successfully updated.'));
    }

    /**
     * Change Active User's password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }
}
