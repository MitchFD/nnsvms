<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Users;
use App\Usersemployee;
use App\Usersstudent;
use App\Userroles;
use DB;

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
        // $users = DB::table('users_tbl')
        //         ->join('users_employee_info_tbl', 'users_employee_info_tbl.employee_id', '=', 'users_tbl.id')
        //         ->join('users_student_info_tbl', 'users_student_info_tbl.student_number', '=', 'users_tbl.id')->get();
        $user_roles = Userroles::get();
        return view('users.user_management')->with(compact('users', 'user_roles'));
    }

    public function user($user_id)
    {
        $users = Users::where('id', $user_id)->first();
        return view('users.user')->with('users', $users);
    }

    /**
     * Check if Email Exists in the Database to create new user account
     *
     *  @param App\Http\Requests\RegisterRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verify_email(Request $request){
        if($request->input('user_employee_email')){
            $email = $request->input('user_employee_email');
            $check_availability = Users::where('email', $email)->get();
            if(count($check_availability) > 0){
                return 'email_exists';
            }else{
                return 'email_dont_exists';
            }
        }
    }


    /**
     * Register New Employee type User
     *
     *  @param App\Http\Requests\RegisterRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create_employee_user(Request $request)
    {
        if (Users::where('email', $request->input('user_employee_email'))->exists()) {
            $email_exists = $request->input('user_employee_email');
            return back()->withRegisterEmailExistsStatus(__($email_exists.' already exists on Users record, Try another unique Email Address for the new user.'));
        }
        else{
            // User Imgae Handler
            if($request->hasFile('user_employee_image')){
                // get filename with extension
                $filenameWithExt = $request->file('user_employee_image')->getClientOriginalName();
                // get just filename
                $fileName = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // get just extension
                $extension = $request->file('user_employee_image')->getClientOriginalExtension();
                // filename to store
                $fileNameToStore = $fileName.'_'.time().'_'.$extension;
                // upload user_employee_image
                $path = $request->file('user_employee_image')->storeAs('public/user_images', $fileNameToStore);

            } else {
                $fileNameToStore = 'user_default_image.jpg';
            }

            // Register Employee as System User
            $register = new Users;
            $register->id              = $request->input('user_employee_id');
            $register->user_role       = $request->input('user_employee_role');
            $register->user_image      = $fileNameToStore;
            $register->user_last_name  = $request->input('user_employee_last_name');
            $register->user_first_name = $request->input('user_employee_first_name');
            $register->username        = $request->input('username');
            $register->password        = Hash::make($request->input('user_password'));
            $register->email           = $request->input('user_employee_email');
            $register->created_at      = now();
            $register->updated_at      = now();
            $register->recovered_at    = now();
            $register->save();

            $registerii = new Usersemployee;
            $registerii->employee_id              = $request->input('user_employee_id');
            $registerii->employee_job_description = $request->input('user_employee_job_description');
            $registerii->employee_department      = $request->input('user_employee_department');
            $registerii->employee_phone_num       = $request->input('user_employee_phone_num');
            $registerii->created_at               = now();
            $registerii->updated_at               = now();
            $registerii->recovered_at             = now();
            $registerii->save();
            
            return back()->withRegisterStatus(__('New User Account Registered Successfully.'));
        }
    }
    
     /**
     * Register New Student type User
     *
     *  @param App\Http\Requests\RegisterRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create_student_user(Request $request)
    {
        if (Users::where('email', $request->input('user_student_email'))->exists()) {
            $email_exists = $request->input('user_student_email');
            return back()->withRegisterEmailExistsStatus(__($email_exists.' already exists on Users record, Try another unique Email Address for the new user.'));
        }
        else{
            // User Imgae Handler
            if($request->hasFile('user_student_image')){
                // get filename with extension
                $filenameWithExt = $request->file('user_student_image')->getClientOriginalName();
                // get just filename
                $fileName = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // get just extension
                $extension = $request->file('user_student_image')->getClientOriginalExtension();
                // filename to store
                $fileNameToStore = $fileName.'_'.time().'_'.$extension;
                // upload user_student_image
                $path = $request->file('user_student_image')->storeAs('public/user_images', $fileNameToStore);

            } else {
                $fileNameToStore = 'user_default_image.jpg';
            }

            // Register Employee as System User
            $register = new Users;
            $register->id              = $request->input('user_student_number');
            $register->user_role       = $request->input('user_student_user_role');
            $register->user_image      = $fileNameToStore;
            $register->user_last_name  = $request->input('user_student_last_name');
            $register->user_first_name = $request->input('user_student_first_name');
            $register->username        = $request->input('student_username');
            $register->password        = Hash::make($request->input('user_student_password'));
            $register->email           = $request->input('user_student_email');
            $register->created_at      = now();
            $register->updated_at      = now();
            $register->recovered_at    = now();
            $register->save();

            $registerii = new Usersemployee;
            $registerii->student_number    = $request->input('user_student_number');
            $registerii->student_school    = $request->input('user_student_school');
            $registerii->student_course    = $request->input('user_employee_department');
            $registerii->student_yearlvl   = $request->input('user_student_year_level');
            $registerii->student_phone_num = $request->input('user_student_phone_num');
            $registerii->created_at        = now();
            $registerii->updated_at        = now();
            $registerii->recovered_at      = now();
            $registerii->save();
            
            return back()->withRegisterStatus(__('New User Account Registered Successfully.'));
        }
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

    // edit user role display in modal
    public function edit_user_role(Request $request){
        if($request->get('user_role_id')){
            $user_role_id = $request->get('user_role_id');
            $user_role    = Userroles::where('user_role_id', $user_role_id)->first();
            $user_role_default = $user_role->user_role_access;
            $profile           = 'profile';
            $violation_entry   = 'violation entry';
            $student_handbook  = 'student handbook';
            $announcement      = 'announcement';
            $violation_records = 'violation records';
            $users_management  = 'users management';
            $dashboard         = 'dashboard';

            $output = '
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <span class="cust_card_sub_title">Edit '.$user_role->user_role.' Role.</span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card-body bg_light_blue">
                                <p class="title_bg_light_blue">User Role:</p>
                                <div class="form-group mt-2">
                                    <input type="text" name="update_user_role" class="form-control" id="edit_user_role" value="'.$user_role->user_role.'">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-212 col-md-12 col-sm-12">
                            <div class="card-body bg_light_green">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <p class="title_bg_light_green">Default Modules for '.$user_role->user_role.' Role:</p>
                                        <div class="form-group mt-2">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="edit_user_role_access[]" value="Profile" class="enableAddBtn custom-control-input" id="edit_profile_module" checked>
                                                <label class="custom-control-label cb_label" for="edit_profile_module">Profile Module</label> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="edit_user_role_access[]" value="Violation Entry" class="enableAddBtn custom-control-input" id="edit_violation_entry_module" checked>
                                                <label class="custom-control-label cb_label" for="edit_violation_entry_module">Violation Entry Module</label> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="edit_user_role_access[]" value="Student Handbook" class="enableAddBtn custom-control-input" id="edit_student_handbook_module" checked>
                                                <label class="custom-control-label cb_label" for="edit_student_handbook_module">Student Handbook Module</label> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="list-group registered_users_list_group bg_light_red">
                                <div class="accordion" id="disabledModulesAccordion_editRole">
                                    <div class="card disabled_modules_card bg_light_red">
                                        <div class="card-header p-0" id="disabled modules">
                                            <button class="btn btn-block collapse_btn_block_red d-flex justify-content-between align-items-center" type="button" data-toggle="collapse" data-target="#disabledModuleCollapse_editRole" aria-expanded="true" aria-controls="disabledModuleCollapse_editRole">
                                                <div class="collapse_btn_txt">
                                                    <p class="title_bg_light_red">Disabled Modules:</p>
                                                    <p class="subtitle_bg_light_red">Modules limited to System Administrator (You) only.</p>
                                                </div>
                                                <i class="nc-icon nc-minimal-down text-sdca-red"></i>
                                            </button>
                                        </div>
                                
                                        <div id="disabledModuleCollapse_editRole" class="collapse" aria-labelledby="disabled modules" data-parent="#disabledModulesAccordion_editRole">
                                            <div class="card-body pt-0">
                                                <div class="row pt-0">
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <div class="card-body pt-0 bg_light_red">
                                                            <div class="form-group mt-2">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" name="edit_user_role_access[]" value="Announcement" class="enableAddBtn custom-control-input" id="edit_announcement_module">
                                                                    <label class="custom-control-label cb_label labelonDisabled_modules" for="edit_announcement_module">Announcement Module</label> 
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" name="edit_user_role_access[]" value="Violation Records" class="enableAddBtn custom-control-input" id="edit_violation_records_module">
                                                                    <label class="custom-control-label cb_label labelonDisabled_modules" for="edit_violation_records_module">Violation Records Module</label> 
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" name="edit_user_role_access[]" value="Users Management" class="enableAddBtn custom-control-input" id="edit_users_management_module">
                                                                    <label class="custom-control-label cb_label labelonDisabled_modules" for="edit_users_management_module">Users Management Module</label> 
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" name="edit_user_role_access[]" value="Dashboard" class="enableAddBtn custom-control-input" id="edit_dashboard_module">
                                                                    <label class="custom-control-label cb_label labelonDisabled_modules" for="edit_dashboard_module">Dashboard Module</label> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <p class="subtitle_bg_light_red mt-2"><i class="nc-icon nc-alert-circle-i pr-1"></i>You can Select Modules you want to be accessible to <span class="font-weight-bold">'.$user_role->user_role.'</span> Role.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-end btn-group">
                            <button type="button" class="btn btn-svms-blue btn-round shadow m-0" data-dismiss="modal">Cancel</button>
                            <button type="submit" id="editUserRoleBtn" class="btn btn-success btn-round shadow m-0"><i class="nc-icon nc-share-66 mr-2"></i>Save Changes</button>
                        </div>
                    </div>
                </div>
            ';
            return $output;
        }
    }

    // edit user role display in modal
    public function remove_user_role(Request $request){
        if($request->get('user_role_id')){
            $user_role_id = $request->get('user_role_id');
            $user_role    = Userroles::where('user_role_id', $user_role_id)->first();
            $index = 1;

            $output = '
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <span class="cust_card_sub_title">Remove <span class="font-weight-bold">'.$user_role->user_role.'</span> Role from active User Roles?</span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-212 col-md-12 col-sm-12">
                            <div class="card-body bg_light_green">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <p class="title_bg_light_green">'.$user_role->user_role.' Role Access Controls:</p>';
                                        foreach (json_decode($user_role->user_role_access) as $index => $user_role_access){
                            $output .= '<p class="access_controls_txt"> <span class="access_control_count pr-1">'. $index++ .'.</span> '. ucwords($user_role_access) .'</p>';
                                        }
                    $output .= '    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-12 col-md-12 colsm-12">
                            <div class="card-body bg_light_red">
                                <p class="subtitle_bg_light_red mt-2"><i class="nc-icon nc-alert-circle-i pr-1"></i>By clicking the <span class="font-weight-bold font-italic">"Remove Role"</span> Button, you will only remove <span class="font-weight-bold">'.$user_role->user_role.'</span> Role from active User Roles. You will not be able to assign users to '.$user_role->user_role.' Role, unless you recover it from Inactive User Roles .</p>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card-body bg_light_blue">
                                <p class="title_bg_light_blue">Reason of Removal: <span class="text-sdca-red">*</span></p>
                                <div class="form-group mt-2">
                                    <textarea class="form-control" name="reason_removal_userrole" id="reasonRemoveUserRole" onkeyup="manage(this)" rows="3" placeholder="Type the reason of removing '.$user_role->user_role.' Role from active User Roles..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-end btn-group">
                            <button type="button" class="btn btn-svms-blue btn-round shadow m-0" data-dismiss="modal">Cancel</button>
                            <button type="submit" id="removeUserRoleBtn" class="btn btn-sdca btn-round shadow m-0" disabled><i class="nc-icon nc-simple-delete mr-2"></i>Remove Role</button>
                        </div>
                    </div>
                </div>
            ';
            return $output;
        }
    }

    public function update_user_role(Request $request)
    {
        // $update_user_role = new Userroles;
        // $update_user_role->user_role        = $request->input('new_user_role');
        // $update_user_role->user_role_access = json_encode(request('new_user_role_access'));
        // $update_user_role->created_at       = now();
        // $update_user_role->updated_at       = now();
        // $update_user_role->save();

        return back()->withUpdateUserRoleStatus(__('New User Role Updated Successfully.'));
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
