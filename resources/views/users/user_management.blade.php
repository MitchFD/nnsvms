@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'users_management'
])

@section('content')
<div class="content">
{{-- Notification Alerts --}}
    @if (session('register_status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                <i class="nc-icon nc-simple-remove"></i>
            </button>
            {{ session('register_status') }}
        </div>
    @endif
    @if (session('register_email_exists_status'))
        <div class="alert alert-danger-sdca-red alert-dismissible fade show" role="alert">
            <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                <i class="nc-icon nc-simple-remove"></i>
            </button>
            {{ session('register_email_exists_status') }}
        </div>
    @endif
    @if (session('register_user_role_status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                <i class="nc-icon nc-simple-remove"></i>
            </button>
            {{ session('register_user_role_status') }}
        </div>
    @endif
    @if (session('update_user_role_status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                <i class="nc-icon nc-simple-remove"></i>
            </button>
            {{ session('update_user_role_status') }}
        </div>
    @endif
{{-- Notification Alerts End --}}

{{-- Page Title-Link And Illustration Card --}}
    <div class="row mb-3">
        <div class="col-lg-12 col-md-12 col-12">
            <h6 class="dir_link_active">{{ __('Users Management') }}</h6>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card shadow">
                <div class="card-body p-0 border-0 notice_card">
                    <div class="notice_div float-left">
                        <p class="card_title">{{'Users Management'}}</p>
                        <p class="card_sub_title text-muted">Manage User Accounts, View User's Log and Activity Histories, Create/Update/Delete User Account Information, Assign User Roles and Manage Roles. </p>
                    </div>
                    <div class="illustration_div">
                        <img class="illustration_svg" src="{{ asset('paper/illustrations/illustration_users_management.svg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- Page Title-Link And Illustration Card End --}}
    
    <div class="row">
    {{-- Create New User Form --}}
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card shadow-none br_radius_all">
                <div class="card-header bg_darken_gray cust_card_padd cust_card_header">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h4 class="cust_card_title">CREATE NEW USERS</h4><br>
                            <span class="cust_card_sub_title">Create New User Account by filling-up the forms below. Select from two options below that matches the User's current status.</span>
                            {{-- <br/> <span class="alert_notice_txt_red font-italic"><i class="nc-icon nc-alert-circle-i pr-1"></i>All input fields are required *</span> --}}
                        </div>
                    </div>
                </div>
                <div class="card-body bg_darken_gray cust_card_padd">
                    <div class="row mb-3">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <ul class="nav nav-pills d-flex justify-content-center" id="pills-tab" role="tablist">
                                <li class="nav-item custom_navlink_blue">
                                    <a class="nav-link active" id="pills_new_user_employee_form" data-toggle="pill" href="#pills_employee_form" role="tab" aria-controls="pills_employee_form" aria-selected="true">Employee</a>
                                </li>
                                <li class="nav-item custom_navlink_blue">
                                    <a class="nav-link" id="new_user_student_form" data-toggle="pill" href="#pills_student_form" role="tab" aria-controls="pills_student_form" aria-selected="false">Student</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content" id="pills-tabContent">
                    {{-- Employee Type Form --}}
                        <div class="tab-pane fade show active" id="pills_employee_form" role="tabpanel" aria-labelledby="pills_new_user_employee_form">
                            <div class="card shadow br_radius_all">
                                <div class="card-header cust_card_padd cust_card_header">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <h4 class="cust_card_title">EMPLOYEE TYPE USER</h4><br>
                                            <span class="alert_notice_txt_red font-italic"><i class="nc-icon nc-alert-circle-i pr-1"></i>All input fields are required *</span>
                                        </div>
                                    </div>
                                </div>
                                <form action="{{ route('users.create_employee_user') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body cust_card_padd">
                                        <div class="row mt-2 mb-3">
                                            <div class="col-lg-12 col-md-12 col-sm-12 text-center imgUp">
                                                <div class="imagePreview">
                                                    <img class="img_user_image" src="{{ asset('paper/img/user/user_default_image.jpg') }}" alt="..." />
                                                </div>
                                                <label class="btn text-white btn-round shadow btn-svms-blue user_upload_image_btn">
                                                    <i class="nc-icon nc-image m-0 p-0 align-middle"></i>
                                                    <input name="user_employee_image" type="file" class="uploadFile img" value="Upload User Photo">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="user_employee_id">Employee ID <span class="text-sdca-red">*</span></label>
                                                    <input type="number" name="user_employee_id" min="0" class="form-control" id="user_employee_id" placeholder="Type Employee ID" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="user_employee_last_name">Last Name <span class="text-sdca-red">*</span></label>
                                                    <input type="text" name="user_employee_last_name" class="form-control" id="user_employee_last_name" placeholder="Type Employee's Last Name" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="user_employee_first_name">First Name <span class="text-sdca-red">*</span></label>
                                                    <input type="text" name="user_employee_first_name" class="form-control" id="user_employee_first_name" placeholder="Type Employee's First Name" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="user_employee_job_description">Job Description <span class="text-sdca-red">*</span></label>
                                                    <input type="text" name="user_employee_job_description" class="form-control" id="user_employee_job_description" list="userDescription" placeholder="Type Employee's Job Description" required>
                                                    <datalist id="userDescription">
                                                        <option value="Security Guard">
                                                    </datalist>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="user_employee_department">Department <span class="text-sdca-red">*</span></label>
                                                    <input type="text" name="user_employee_department" class="form-control" id="user_employee_department" placeholder="Type Employee's Deprtment" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="user_employee_phone_num">Phone Number <span class="text-sdca-red">*</span></label>
                                                    <input type="number" name="user_employee_phone_num" min="0" class="form-control" id="user_employee_phone_num" placeholder="Type Employee's Phone Number" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="user_employee_role">User Role <span class="text-sdca-red">*</span></label>
                                                    <select class="form-control" name="user_employee_role" id="user_employee_role" placeholder="Assign User Role">
                                                        <option selected>Assign User Role</option>
                                                        @if(count($user_roles) > 0)
                                                            @foreach($user_roles as $role)
                                                                @if($role->user_role == 'Administrator')
                                                                    <option value="{{$role->user_role}}" class="d-none" disabled>{{$role->user_role}}</option>
                                                                @else
                                                                    <option value="{{$role->user_role}}">{{$role->user_role}}</option>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body cust_card_padd cb_light_bg">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="user_employee_email">Email Address <span class="text-sdca-red">*</span></label>
                                                    <input type="email" name="user_employee_email" class="form-control" id="email" placeholder="Type Employee's Email Address" required>
                                                    <div id="email_error">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="username">Username <span class="text-sdca-red">*</span></label>
                                                    <input type="text" name="username" class="form-control" id="username" placeholder="Assign Username" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="user_password">User Password <span class="text-sdca-red font-italic">* minimum of 6 characters</span></label>
                                                    <input type="password" name="user_password" pattern=".{6,16}" class="form-control" id="user_password" placeholder="Assign Password for New User" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer px-3">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                                <div class="btn-group mr-auto">
                                                    <button type="reset" class="btn btn-svms-blue btn-round shadow">
                                                        <i class="nc-icon nc-simple-delete mr-2"></i>
                                                        {{ __('Clear') }}
                                                    </button>
                                                    <button type="submit" class="btn btn-success btn-round shadow" id="saveNewUserBtn" disabled>
                                                        <i class="nc-icon nc-simple-add mr-2"></i>
                                                        {{ __('Save New User') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    {{-- Employee Type Form End--}}
                    {{-- Student Type Form --}}
                        <div class="tab-pane fade" id="pills_student_form" role="tabpanel" aria-labelledby="new_user_student_form">
                            <div class="card shadow br_radius_all">
                                <div class="card-header cust_card_padd cust_card_header">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <h4 class="cust_card_title">STUDENT TYPE USER</h4><br>
                                            <span class="alert_notice_txt_red font-italic"><i class="nc-icon nc-alert-circle-i pr-1"></i>All input fields are required *</span>
                                        </div>
                                    </div>
                                </div>
                                <form action="route('users.create_student_user')" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body cust_card_padd">
                                        <div class="row mt-2 mb-3">
                                            <div class="col-lg-12 col-md-12 col-sm-12 text-center imgUp">
                                                <div class="imagePreview">
                                                    <img class="img_user_image" src="{{ asset('paper/img/user/user_default_image.jpg') }}" alt="..." />
                                                </div>
                                                <label class="btn text-white btn-round shadow btn-svms-blue user_upload_image_btn">
                                                    <i class="nc-icon nc-image m-0 p-0 align-middle"></i>
                                                    <input name="user_student_image" type="file" class="uploadFile img" value="Upload User Photo">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="user_student_number">Student Number <span class="text-sdca-red">*</span></label>
                                                    <input type="number" name="user_student_number" min="0" class="form-control" id="user_student_number" placeholder="Type Student Number" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="user_student_last_name">Last Name <span class="text-sdca-red">*</span></label>
                                                    <input type="text" name="user_student_last_name" class="form-control" id="user_student_last_name" placeholder="Type Student's Last Name" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="user_student_first_name">First Name <span class="text-sdca-red">*</span></label>
                                                    <input type="text" name="user_student_first_name" class="form-control" id="user_student_first_name" placeholder="Type Student's First Name" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="user_student_school">School <span class="text-sdca-red">*</span></label>
                                                    <select class="form-control" name="user_student_school" id="user_student_school" placeholder="Select Student's School" required>
                                                        <option selected>Select Student's School</option>
                                                        <option value="SASE">SASE</option>
                                                        <option value="SBCS">SBCS</option>
                                                        <option value="SHSP">SHSP</option>
                                                        <option value="SIHTM">SIHTM</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="user_student_program">Program <span class="text-sdca-red">*</span></label>
                                                    <select class="form-control" name="user_student_program" id="user_student_program" placeholder="Select Student's Program" required>
                                                        <option selected>Select Studen's Program</option>
                                                        <option value="BSIT">BSIT</option>
                                                        <option value="BMA">BMA</option>
                                                        <option value="BSBA">BSBA</option>
                                                        <option value="BSA">BSA</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="user_student_year_level">Year Level <span class="text-sdca-red">*</span></label>
                                                    <select class="form-control" name="user_student_year_level" id="user_student_year_level" placeholder="Select Student's Year Level" required>
                                                        <option selected>Select Student's Year Level</option>
                                                        <option value="FIRST">FIRST YEAR</option>
                                                        <option value="SECOND">SECOND YEAR</option>
                                                        <option value="THIRD">THIRD YEAR</option>
                                                        <option value="FOURTH">FOURTH YEAR</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="user_student_section">Section <span class="text-sdca-red">*</span></label>
                                                    <input type="text" name="user_student_section" class="form-control" id="user_student_section" placeholder="Type Student's Section" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="user_student_phone_num">Phone Number <span class="text-sdca-red">*</span></label>
                                                    <input type="number" name="user_student_phone_num" min="0" class="form-control" id="user_student_phone_num" placeholder="Type Student's Phone Number" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="user_student_user_role">User Role <span class="text-sdca-red">*</span></label>
                                                    <select class="form-control" name="user_student_user_role" id="user_student_user_role" placeholder="Assign User Role">
                                                        <option selected>Assign User Role</option>
                                                        @if(count($user_roles) > 0)
                                                            @foreach($user_roles as $role)
                                                                @if($role->user_role == 'Administrator')
                                                                    <option value="{{$role->user_role}}" class="d-none" disabled>{{$role->user_role}}</option>
                                                                @elseif($role->user_role == 'Security Guard')
                                                                    <option value="{{$role->user_role}}" class="d-none" disabled>{{$role->user_role}}</option>
                                                                @else
                                                                    <option value="{{$role->user_role}}">{{$role->user_role}}</option>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="user_student_email">Email Address<span class="text-sdca-red">*</span></label>
                                                    <input type="text" name="user_student_email" class="form-control" id="user_student_email" placeholder="Type Student's Email Address" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="student_username">Username <span class="text-sdca-red">*</span></label>
                                                    <input type="text" name="student_username" class="form-control" id="student_username" placeholder="Assign Username" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="user_student_password">User Password <span class="text-sdca-red font-italic">* minimum of 6 characters</span></label>
                                                    <input type="password" name="user_student_password" pattern=".{6,16}" class="form-control" id="user_student_password" placeholder="Assign Password for New User" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer pt-0 pb-3">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                                <div class="btn-group mr-auto">
                                                    <button type="reset" class="btn btn-svms-blue btn-round shadow">
                                                        <i class="nc-icon nc-simple-delete mr-2"></i>
                                                        {{ __('Clear') }}
                                                    </button>
                                                    <button type="submit" class="btn btn-success btn-round shadow">
                                                        <i class="nc-icon nc-simple-add mr-2"></i>
                                                        {{ __('Save New User') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    {{-- Student Type Form End --}}
                    </div>
                </div>
            </div>
        </div>
    {{-- Create New User Form End --}}

        <div class="col-lg-8 col-md-8 col-sm-12">
        {{-- Users Activity Logs --}}
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 pl-0">
                    <div class="accordion" id="usersActivityLogsAccordion">
                        <div class="card shadow-none br_radius_all">
                            <div class="card-header bg_darken_gray p-0" id="headingOne">
                                <button class="btn btn-block cust_card_padd cust_card_header_2 collapse_btn_block_gray d-flex justify-content-between" type="button" data-toggle="collapse" data-target="#collapseUsersActivityLogs" aria-expanded="true" aria-controls="collapseUsersActivityLogs">
                                    <div class="collapse_btn_txt">
                                        <h4 class="cust_card_title">{{ __('USER ROLES') }}</h4><br/>
                                        <span class="cust_card_sub_title font-weight-normal" id="subTitle_toggle">Toggle this card to view all the recorded Activities made by active users.</span>
                                        <span class="cust_card_sub_title font-weight-normal d-none" id="subTitle_toggleShow">Below table shows the list of all Activity Logs made by active System Users.</span>
                                    </div>
                                    <i class="nc-icon nc-minimal-down align-self-center"></i>
                                </button>
                            </div>
                        
                            <div id="collapseUsersActivityLogs" class="collapse" aria-labelledby="headingOne" data-parent="#usersActivityLogsAccordion">
                            <div class="card-body bg_darken_gray cust_card_padd">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div>
                                            <table class="table table-hover">
                                                <thead class="text-primary thead-svms-blue position-sticky">
                                                    <th class="text-left">{{ __('User') }}</th>
                                                    <th class="text-left">{{ __('Details') }}</th>
                                                    <th class="text-left">{{ __('Date') }}</th>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td colspan="3" class="text-center with_bg">
                                                            <img class="no_data_yet_img mt-3" src="{{ asset('paper/illustrations/no_sanctions_yet_illustration.svg') }}" alt="">
                                                            <p class="text-muted font-italic">No Activity Logs yet...</p>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row d-flex">
                                            <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-end m-0">
                                                <button class="btn btn-success my-0"><i class="nc-icon nc-paper pr-1"></i>Print</button>
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
        {{-- Users Activity Logs End --}}
            <div class="row">
            {{-- List of Registered Users --}}
                <div class="col-lg-6 col-md-6 col-sm-12 p-0">
                    <div class="card shadow-none br_radius_all">
                        <div class="card-header bg_darken_gray cust_card_padd cust_card_header">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <h4 class="cust_card_title">{{ __('REGISTERED USERS') }}</h4><br>
                                    @if(count($users) > 0 )
                                        <span class="cust_card_sub_title">Below are the list of registerd Users. <span class="font-weight-bold"> Click the user</span> to view more information.</span>
                                    @else
                                        <span class="cust_card_sub_title font-italic">There are no Registered Users Found... </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-body bg_darken_gray cust_card_padd record_offenses_parent_div">
                            @if(count($users) > 0)
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="list-group registered_users_list_group shadow">
                                            @foreach($users->sortBy('created_at') as $user)
                                                @if($user->id == auth()->user()->id)
                                                    <a href="{{ route('profile.edit') }}" class="list-group-item list_group_cust_border list-group-item-action d-flex justify-content-between align-items-center">
                                                        <div class="ul_user_list_imgtxt_div">
                                                            <div class="ul_user_image_div">
                                                                <img class="shadow img-fluid user_imgage_img" src="{{asset('storage/user_images/'.$user->user_image)}}" alt="User Image">
                                                            </div>
                                                            <div class="user_intro_div">
                                                                <span class="user_intro_name_txt">{{$user->user_first_name}} {{$user->user_last_name}}</span>
                                                                <span class="user_intro_role_txt">{{$user->user_role}}</span>
                                                            </div>
                                                        </div>
                                                        <i class="nc-icon nc-minimal-right"></i>
                                                    </a>
                                                @else
                                                    <a href="{{ route('users_management.user',$user->id) }}" class="list-group-item list_group_cust_border list-group-item-action d-flex justify-content-between align-items-center">
                                                        <div class="ul_user_list_imgtxt_div">
                                                            <div class="ul_user_image_div">
                                                                <img class="shadow img-fluid user_imgage_img" src="{{asset('storage/user_images/'.$user->user_image)}}" alt="User Image">
                                                            </div>
                                                            <div class="user_intro_div">
                                                                <span class="user_intro_name_txt">{{$user->user_first_name}} {{$user->user_last_name}}</span>
                                                                <span class="user_intro_role_txt">{{$user->user_role}}</span>
                                                            </div>
                                                        </div>
                                                        <i class="nc-icon nc-minimal-right"></i>
                                                    </a>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3 d-flex justify-content-start">
                                    <div class="col-lg-12 col-md-12 col-sm-12 registered_users_count">
                                        <span class="d-flex align-items-center"><i class="nc-icon nc-circle-10 pr-1"></i>
                                            @if(count($users) == 1)
                                                {{count($users)}} Registered User found
                                            @else
                                                {{count($users)}} Registered Users found
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            {{-- List of Registered Users End --}}

            {{-- List of User Roles --}}
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="card shadow-none br_radius_all">
                        <div class="card-header bg_darken_gray cust_card_padd cust_card_header">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-between">
                                    <div class="user_roles_header_div">
                                        <h4 class="cust_card_title">{{ __('USER ROLES') }}</h4><br>
                                        @if(count($users) > 0)
                                            <span class="cust_card_sub_title">Below are the list of User Roles and the modules it can access. <span class="font-weight-bold"> Click a User Role</span> to view more details.</span>
                                        @else
                                            <span class="cust_card_sub_title font-italic">There are no Registered User Roles... </span>
                                        @endif
                                    </div>
                                    <button class="btn btn_add_userRole" type="button" data-toggle="modal" data-target="#addNewUserRole">
                                        <i class="nc-icon nc-simple-add" aria-hidden="true"></i>
                                    </button>
                                    {{-- <div class="dropdown">
                                        <button class="btn dropdown_menu" type="button" id="offenseCardDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="offenseCardDropDown">
                                            <a class="dropdown-item" data-toggle="modal" data-target="#addNewUserRole"><i class="nc-icon nc-simple-add pr-1 align-middle font-weight-bold text-svms-blue"></i> Add New User Role</a>
                                            <a class="dropdown-item" href="#"><i class="nc-icon nc-simple-delete pr-1 align-middle font-weight-bold text-success"></i> Edit User Role/s</a>
                                            <a class="dropdown-item" href="#"><i class="nc-icon nc-simple-remove pr-1 align-middle font-weight-bold text-sdca-red"></i> Delete User Role/s</a>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="card-body bg_darken_gray cust_card_padd record_offenses_parent_div">
                            @if(count($user_roles) > 0)
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="list-group registered_users_list_group shadow">
                                            <div class="accordion" id="userRolesCollapse">
                                            @foreach($user_roles->sortBy('created_at') as $role)
                                                <div class="card user_roles_lists shadow">
                                                    <div class="card-header p-0" id="user role heading">
                                                        <button class="btn btn-block collapse_btn_block d-flex justify-content-between align-items-center" type="button" data-toggle="collapse" data-target="#{{$role->user_role_id}}" aria-expanded="true" aria-controls="{{$role->user_role_id}}">
                                                            <div class="collapse_btn_txt">
                                                                <span class="user_role_txt">{{$role->user_role}}</span>
                                                                <span class="users_reg_roles_txt">
                                                                    {{$reg_users_count = App\Users::where('user_role', $role->user_role)->count()}} 
                                                                    @if($reg_users_count == 1)
                                                                        Assigned User found
                                                                    @elseif($reg_users_count == 0)
                                                                        Assigned Users
                                                                    @else
                                                                        Assigned Users found
                                                                    @endif
                                                                </span>
                                                            </div>
                                                            <i class="nc-icon nc-minimal-down"></i>
                                                        </button>
                                                    </div>
                                                
                                                    <div id="{{$role->user_role_id}}" class="collapse" aria-labelledby="user role heading" data-parent="#userRolesCollapse">
                                                        <div class="card-body user_role_access_div pt-0">
                                                            <div class="row">
                                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                                    @if(count($users) > 0)
                                                                        <?php $registered_users = DB::table('users_tbl')->join('users_employee_info_tbl', 'users_employee_info_tbl.employee_id', '=', 'users_tbl.id')
                                                                                                    ->select('user_first_name', 'user_last_name')->where('user_role', $role->user_role)->get() 
                                                                        ?>
                                                                        @if(count($registered_users) > 0)
                                                                        <div class="card-body bg_light_blue mb-2">
                                                                            <p class="title_bg_light_blue">Assigned Users:</p>
                                                                            @foreach($registered_users as $index => $registered_user)
                                                                                <p class="access_controls_txt"> 
                                                                                    <span class="user_role_reg_users_count pr-1">{{$index+1}}.</span> {{ $registered_user->user_first_name }} {{ $registered_user->user_last_name }} 
                                                                                    <span class="font-italic font-weight-bold">
                                                                                        @if(auth()->user()->user_role == $role->user_role)
                                                                                            ~ you
                                                                                        @endif
                                                                                    </span>
                                                                                </p>
                                                                            @endforeach
                                                                        </div>
                                                                        @else
                                                                        <div class="card-body bg_light_blue mb-2">
                                                                            <p class="title_bg_light_blue">Assigned Users:</p>
                                                                            <span class="user_role_notice_txt"><i class="nc-icon nc-alert-circle-i pr-1"></i>There are no users assigned to {{$role->user_role}} role</span>
                                                                        </div>
                                                                        @endif
                                                                    @endif
                                                                    @if($role->user_role_access != 'null')
                                                                    <div class="card-body bg_light_green">
                                                                        <p class="title_bg_light_green">{{$role->user_role}} Access Controls:</p>
                                                                        @foreach (json_decode($role->user_role_access) as $index => $user_role_access)
                                                                            <p class="access_controls_txt"> <span class="access_control_count pr-1">{{$index+1}}.</span> {{ ucwords($user_role_access) }}</p>
                                                                        @endforeach
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            @if($role->user_role == 'Administrator')
                                                                <div class="row mt-2">
                                                                    <div class="col-lg-12 col-md-12 colsm-12">
                                                                        <div class="card-body bg_light_blue mb-2">
                                                                            <span class="user_role_notice_txt"><i class="nc-icon nc-alert-circle-i pr-1"></i>Administrator is a fixed User Role that can't be edited or deleted from the system. All Modules are Accessible to the Administrator.</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                @if($role->user_role == 'Security Guard')
                                                                    <div class="row mt-2">
                                                                        <div class="col-lg-12 col-md-12 colsm-12">
                                                                            <div class="card-body bg_light_blue mb-2">
                                                                                <span class="user_role_notice_txt"><i class="nc-icon nc-alert-circle-i pr-1"></i>Security Guard is also a fixed User Role that can't be deleted from the system but you can change the access controls. Default Modules are only selected to be accessbile to the Security Guard Role.</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-2 mb-2 d-flex justify-content-end">
                                                                        <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-end">
                                                                            <button type="reset" class="btn btn-outline-sdca-blue shadow m-0" onclick="editUserRoleForm(this.id)" id="{{$role->user_role_id}}">
                                                                                <i class="nc-icon nc-ruler-pencil mr-2" aria-hidden="true"></i>{{ __('Edit Role') }}
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                @else
                                                                    <div class="row mt-3 mb-2 d-flex justify-content-end">
                                                                        <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-end">
                                                                            <button type="reset" class="btn btn-outline-sdca-blue shadow m-0" onclick="editUserRoleForm(this.id)" id="{{$role->user_role_id}}">
                                                                                <i class="nc-icon nc-ruler-pencil mr-2" aria-hidden="true"></i>{{ __('Edit Role') }}
                                                                            </button>
                                                                            <button type="reset" class="btn btn-outline-sdca shadow my-0 ml-1" onclick="removeUserRoleForm(this.id)" id="{{$role->user_role_id}}">
                                                                                <i class="nc-icon nc-simple-delete mr-2" aria-hidden="true"></i>{{ __('Remove Role') }}
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3 d-flex justify-content-start">
                                    <div class="col-lg-12 col-md-12 col-sm-12 registered_users_count">
                                        <span class="d-flex align-items-center"><i class="nc-icon nc-tap-01 pr-1"></i>
                                            @if(count($user_roles) == 1)
                                                {{count($user_roles)}} User Roles found
                                            @else
                                                {{count($user_roles)}} User Roles found
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            {{-- List of User Roles End --}}
            </div>
        </div>
    </div>
</div>

{{-- Modals --}}
{{-- Add User Role  Modal--}}
    <div class="modal fade" id="addNewUserRole" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content modal-card">
                <div class="modal-header">
                    <h5 class="modal-title" id="violationEntryFormModalLabel">Add New User Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('users.create_user_role') }}" name="sform" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row mb-2">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <span class="cust_card_sub_title">Add new User Role and assign Access Controls.</span>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card-body bg_light_blue">
                                    <p class="title_bg_light_blue">User Role <span class="text-sdca-red">*</span></p>
                                    <div class="form-group mt-2">
                                        <input type="text" name="new_user_role" class="form-control" id="new_user_role" placeholder="Type New User Role Name" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-212 col-md-12 col-sm-12">
                                <div class="card-body bg_light_blue">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <p class="title_bg_light_blue">Default Modules for New User Role: <span class="display_new_user_role"></span></p>
                                            <div class="form-group mt-2">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="new_user_role_access[]" value="profile" class="enableAddBtn custom-control-input" id="profile_module" checked>
                                                    <label class="custom-control-label cb_label" for="profile_module">Profile Module</label> 
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="new_user_role_access[]" value="violation entry" class="enableAddBtn custom-control-input" id="violation_entry_module" checked>
                                                    <label class="custom-control-label cb_label" for="violation_entry_module">Violation Entry Module</label> 
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="new_user_role_access[]" value="student handbook" class="enableAddBtn custom-control-input" id="student_handbook_module" checked>
                                                    <label class="custom-control-label cb_label" for="student_handbook_module">Student Handbook Module</label> 
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
                                    <div class="accordion" id="disabledModulesAccordion">
                                        <div class="card disabled_modules_card bg_light_red">
                                            <div class="card-header p-0" id="disabled modules">
                                                <button class="btn btn-block collapse_btn_block_red d-flex justify-content-between align-items-center" type="button" data-toggle="collapse" data-target="#disabledModuleCollapse" aria-expanded="true" aria-controls="disabledModuleCollapse">
                                                    <div class="collapse_btn_txt">
                                                        <p class="title_bg_light_red">Disabled Modules:</p>
                                                        <p class="subtitle_bg_light_red">Modules limited to System Administrator (You) only.</p>
                                                    </div>
                                                    <i class="nc-icon nc-minimal-down text-sdca-red"></i>
                                                </button>
                                            </div>
                                      
                                            <div id="disabledModuleCollapse" class="collapse" aria-labelledby="disabled modules" data-parent="#disabledModulesAccordion">
                                                <div class="card-body pt-0">
                                                    <div class="row pt-0">
                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                                            <div class="card-body pt-0 bg_light_red">
                                                                <div class="form-group mt-2">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" name="new_user_role_access[]" value="announcement" class="enableAddBtn custom-control-input" id="announcement_module">
                                                                        <label class="custom-control-label cb_label labelonDisabled_modules" for="announcement_module">Announcement Module</label> 
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" name="new_user_role_access[]" value="violation records" class="enableAddBtn custom-control-input" id="violation_records_module">
                                                                        <label class="custom-control-label cb_label labelonDisabled_modules" for="violation_records_module">Violation Records Module</label> 
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" name="new_user_role_access[]" value="users management" class="enableAddBtn custom-control-input" id="users_management_module">
                                                                        <label class="custom-control-label cb_label labelonDisabled_modules" for="users_management_module">Users Management Module</label> 
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" name="new_user_role_access[]" value="dashboard" class="enableAddBtn custom-control-input" id="dashboard_module">
                                                                        <label class="custom-control-label cb_label labelonDisabled_modules" for="dashboard_module">Dashboard Module</label> 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p class="subtitle_bg_light_red mt-2"><i class="nc-icon nc-alert-circle-i pr-1"></i>You can Select Modules you want to be accessible to New User Role: <span class="display_new_user_role font-weight-bold"></span></p>
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
                                <button type="submit" id="addNewUserRoleBtn" class="btn btn-success btn-round shadow m-0" disabled><i class="nc-icon nc-share-66 mr-2"></i>Add New User Role</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
{{-- Add User Role Modal End --}}

{{-- Edit User Role Modal --}}
    <div class="modal fade" id="editUserRoleModal" tabindex="-1" role="dialog" aria-labelledby="editUserRoleModal" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content modal-card">
                <div class="modal-header">
                    <h5 class="modal-title">Edit User Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('users.update_user_role') }}" name="sform" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div id="editUserRoleModalBody">

                    </div>
                </form>
            </div>
        </div>
    </div>
{{-- Edit User Role Modal End --}}

{{-- Remove User Role from active roles Modal --}}
    <div class="modal fade" id="removeUserRoleModal" tabindex="-1" role="dialog" aria-labelledby="removeUserRoleModal" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content modal-card">
                <div class="modal-header">
                    <h5 class="modal-title">Remove User Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('users.remove_user_role') }}" name="removeUserRole" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div id="removeUserRoleModalBody">

                    </div>
                </form>
            </div>
        </div>
    </div>
{{-- Remove User Role from active roles Modal End --}}

@endsection

@push('scripts')
    {{-- <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
            demo.initChartsPages();
        });
    </script> --}}

{{-- on image file upload display selected image from browse --}}
    <script>
        $(function() {
            $(document).on("change",".uploadFile", function(){
            var uploadFile = $(this);
            var files = !!this.files ? this.files : [];
            if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

                if (/^image/.test( files[0].type)){ // only image file
                    var reader = new FileReader(); // instance of the FileReader
                    reader.readAsDataURL(files[0]); // read the local file

                    reader.onloadend = function(){ // set image data as background of div
                    //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
                    uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url("+this.result+")");
                }
            }
            });
        });
    </script>
{{-- on image file upload display selected image from browse End --}}

{{-- Email Live Validation on Create User Form --}}
    <script>
        $(document).ready(function(){
            $('#email').blur(function(){
                var email_error = '';
                var email = $('#email').val();
                var _token = $('input[name="_token"]').val();
                var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if(!filter.test(email)){    
                    $('#email_error').html('<div class="invalid-feedback">Invalid Input!</div>');
                    $('#email').addClass('is-invalid');
                    // document.getElementById("saveNewUserBtn").removeAttribute("disabled");
                }else{
                    $.ajax({
                    url:"{{ route('users.verify_email') }}",
                    method:"POST",
                    data:{email:email, _token:_token},
                    success:function(result){
                    if(result == 'email_dont_exists'){
                        $('#email_error').html('<div class="valid-feedback">Email Available!</div>');
                        $('#email').removeClass('is-valid');
                        $('#email').addClass('is-valid');
                        document.getElementById("saveNewUserBtn").removeAttribute("disabled");
                    }else{
                        $('#email_error').html('<div class="invalid-feedback">Email Already Used!</div>');
                        $('#email').addClass('is-invalid');
                        document.getElementById("saveNewUserBtn").setAttribute("disabled", "disabled");
                    }
                }
                })
                }
            });

        });
    </script>
{{-- Email Live Validation on Create User Form End --}}

{{-- display text from input live --}}
    <script>
        $(document).ready(function () {
            $("#new_user_role").keyup(function () {
                $(".display_new_user_role").text($("#new_user_role").val());
            });
        });
    </script>
{{-- display text from input live End --}}

{{-- show access controls when new user role input has text --}}
    <script>
        $('#new_user_role').on('change keyup', function() {
            $('#addNewUserRoleBtn').prop('disabled', !($('.enableAddBtn:checked').length && $('#new_user_role').val()));
        });
    </script>
{{-- show access controls when new user role input has text End --}}

{{-- collapse dropdown button on click change icon --}}
    <script>
        $(".collapse_btn_toggle_icon").click(function(){
            // $('.collapse_btn_toggle_icon').toggle('1000');
            $("i", this).toggleClass("nc-minimal-up nc-minimal-down");
        });
    </script>
{{-- collapse dropdown button on click change icon End --}}

{{-- Edit User Role Modal --}}
    <script>
        // get user_role_id and display user role details on Edit User Role Modal
        function editUserRoleForm(user_role_id){
            $.ajax({
                url:"{{ route('users.edit_user_role') }}",
                method:"GET",
                data:{user_role_id:user_role_id},
                    success:function(data){
                        $('#editUserRoleModal').modal('show');
                        $('#editUserRoleModalBody').html(data);
                    }
            });
        };
    </script>
{{-- Edit User Role Modal End --}}

{{-- Delete User Role Modal --}}
    <script>
        // get user_role_id and display user role details on Edit User Role Modal
        function removeUserRoleForm(user_role_id){
            $.ajax({
                url:"{{ route('users.remove_user_role') }}",
                method:"GET",
                data:{user_role_id:user_role_id},
                    success:function(data){
                        $('#removeUserRoleModal').modal('show');
                        $('#removeUserRoleModalBody').html(data);
                    }
            });
        };
    </script>
{{-- Delete User Role Modal End --}}

{{-- show Remove Role Buttonn when Textarea has text --}}
    <script>
        function manage(reasonRemoveUserRole) {
            if (reasonRemoveUserRole.value != '') {
                document.getElementById("removeUserRoleBtn").removeAttribute("disabled");
            }
            else {
                document.getElementById("removeUserRoleBtn").setAttribute("disabled", "disabled");
            }
        }   
    </script>
{{-- show Remove Role Buttonn when Textarea has text End --}}
@endpush