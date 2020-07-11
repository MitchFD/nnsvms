<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Users;
use App\Userroles;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Viwe\View
     */
    public function index()
    {
        $users      = Users::get();
        $user_roles = Userroles::get();
        return view('users.user_management')->with(compact('users', 'user_roles'));
    }

    public function user($user_id)
    {
        $users = Users::where('id', $user_id)->first();
        return view('users.user')->with('users', $users);
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
        $register->username         = $request->input('username');
        $register->user_last_name   = $request->input('user_last_name');
        $register->user_first_name  = $request->input('user_first_name');
        $register->user_employee_id = $request->input('user_employee_id');
        $register->user_description = $request->input('user_description');
        $register->email            = $request->input('user_email');
        $register->user_role        = $request->input('user_role');
        $register->user_image       = $fileNameToStore;
        $register->password         = Hash::make($request->input('user_password'));
        $register->created_at       = now();
        $register->updated_at       = now();
        $register->save();

        return back()->withRegisterStatus(__('New User Registered Successfully.'));
    }

    /**
     * Create New User Role
     *
     *  @param App\Http\Requests\RegisterRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create_user_role(Request $request)
    {

        // Create New User Role
        $create_user_role = new Userroles;
        $create_user_role->user_role        = $request->input('new_user_role');
        $create_user_role->user_role_access = json_encode(request('new_user_role_access'));
        $create_user_role->created_at       = now();
        $create_user_role->updated_at       = now();
        $create_user_role->save();

        return back()->withRegisterUserRoleStatus(__('New User Role Registered Successfully.'));
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
