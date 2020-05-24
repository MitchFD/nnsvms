<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Users;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Viwe\View
     */
    public function index()
    {
        $users = Users::where('user_role', 'Guard')->get();
        return view('users.user_management')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     *  @param App\Http\Requests\RegisterRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
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
            // upload user_image
            $path = $request->file('user_image')->storeAs('public/user_images', $fileNameToStore);

        } else {
            $fileNameToStore = 'user_default_image.jpg';
        }

        // Create Register
        $register = new Users;
        $register->last_name        = $request->input('last_name');
        $register->first_name       = $request->input('first_name');
        $register->first_name       = $request->input('first_name');
        $register->employee_id      = $request->input('employee_id');
        $register->user_description = $request->input('user_description');
        $register->user_role        = $request->input('user_role');
        $register->user_image       = $fileNameToStore;
        $register->email            = $request->input('email');
        $register->password         = $request->input('password');
        $register->created_at       = now();
        $register->updated_at       = now();
        $register->save();

        return back()->withRegisterStatus(__('New User Registered Successfully.'));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show($id)
    {
        $user = Users::find($id);
        return Redirect::to('users.user_management')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
