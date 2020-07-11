@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'users_management'
])

@section('content')
<div class="content">
    @if (session('register_status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                <i class="nc-icon nc-simple-remove"></i>
            </button>
            {{ session('register_status') }}
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
                        <img class="illustration_violation_records" src="{{ asset('paper/illustrations/illustration_users_management.svg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        {{-- List of Registered Users --}}
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card shadow-none br_radius_all">
                    <div class="card-header bg_darken_gray cust_card_padd cust_card_header">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <h4 class="cust_card_title">{{ __('REGISTERED USERS') }}</h4><br>
                                @if(count($users) > 0)
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
                                        @foreach($users as $user)
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
                                            {{count($users)}} registered user found
                                        @else
                                            {{count($users)}} registered users found
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
            <div class="col-lg-4 col-md-4 col-sm-12 p-0">
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
                                        @foreach($user_roles as $role)
                                            <div class="card user_roles_lists shadow">
                                                <div class="card-header p-0" id="user role heading">
                                                    <button class="btn btn-block collapse_btn_block d-flex justify-content-between align-items-center" type="button" data-toggle="collapse" data-target="#{{$role->user_role_id}}" aria-expanded="true" aria-controls="{{$role->user_role_id}}">
                                                        <div class="collapse_btn_txt">
                                                            <span class="user_role_txt">{{$role->user_role}}</span>
                                                            <span class="users_reg_roles_txt">
                                                                {{$reg_users_count = App\Users::where('user_role', $role->user_role)->count()}} 
                                                                @if($reg_users_count == 1)
                                                                    Registered User found
                                                                @elseif($reg_users_count == 0)
                                                                    Registered Users
                                                                @else
                                                                    Registered Users found
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
                                                                    <?php $registered_users = App\Users::select('user_first_name', 'user_last_name')->where('user_role', $role->user_role)->get() ?>
                                                                    @if(count($registered_users) > 0)
                                                                    <div class="card-body bg_light_blue mb-2">
                                                                        <p class="title_bg_light_blue">Registered Users:</p>
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
                                                                        <p class="title_bg_light_blue">Registered Users:</p>
                                                                        <span class="user_role_notice_txt"><i class="nc-icon nc-alert-circle-i pr-1"></i>There are no registered users for {{$role->user_role}} role</span>
                                                                        {{-- <p class="subtitle_bg_light_blue">There are no registered users for {{$role->user_role}} role</p> --}}
                                                                    </div>
                                                                    @endif
                                                                @endif
                                                                @if($role->user_role_access != 'null')
                                                                <div class="card-body bg_light_green">
                                                                    <p class="title_bg_light_green">{{$role->user_role}} Access Controls:</p>
                                                                    @foreach (json_decode($role->user_role_access) as $index => $user_role_access)
                                                                        <p class="access_controls_txt"> <span class="access_control_count pr-1">{{$index+1}}.</span> {{ $user_role_access }}</p>
                                                                    @endforeach
                                                                </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        @if($role->user_role == 'Administrator')
                                                            <div class="row mt-2">
                                                                <div class="col-lg-12 col-md-12 colsm-12">
                                                                    <div class="card-body bg_light_blue mb-2">
                                                                        <span class="user_role_notice_txt"><i class="nc-icon nc-alert-circle-i pr-1"></i>Administrator is a fixed User Role that can't be edited or deleted from the system</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @else
                                                            @if($role->user_role == 'Security Guard')
                                                                <div class="row mt-2">
                                                                    <div class="col-lg-12 col-md-12 colsm-12">
                                                                        <div class="card-body bg_light_blue mb-2">
                                                                            <span class="user_role_notice_txt"><i class="nc-icon nc-alert-circle-i pr-1"></i>Security Guard is also a fixed User Role that can't be deleted from the system but you can change the access controls.</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row d-flex justify-content-end">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-end">
                                                                        <button type="reset" class="btn btn-svms-blue shadow m-0">
                                                                            <i class="fa fa-pencil-square-o mr-2" aria-hidden="true"></i>{{ __('Edit Role') }}
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            @else
                                                                <div class="row mt-2 d-flex justify-content-end">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-end">
                                                                        <button type="reset" class="btn btn-svms-blue shadow m-0">
                                                                            <i class="fa fa-pencil-square-o mr-2" aria-hidden="true"></i>{{ __('Edit Role') }}
                                                                        </button>
                                                                        <button type="reset" class="btn btn-sdca shadow my-0 ml-1">
                                                                            <i class="fa fa-trash-o mr-2" aria-hidden="true"></i>{{ __('Delete Role') }}
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
        {{-- Create New User Form --}}
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card shadow br_radius_all">
                    <div class="card-header cust_card_padd cust_card_header">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <h4 class="cust_card_title">CREATE NEW USERS</h4><br>
                                <span class="cust_card_sub_title">Create New System User by filling-up this form. <br/> <span class="alert_notice_txt_red font-italic"><i class="nc-icon nc-alert-circle-i pr-1"></i>All input fields are required *</span></span>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('users.create') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body cust_card_padd">
                            <div class="row mt-2 mb-3">
                                <div class="col-lg-12 col-md-12 col-sm-12 text-center imgUp">
                                    <div class="imagePreview">
                                        {{-- <img class="img_user_image" src="{{ asset('paper/img/user/user_default_image.jpg') }}" alt="..." /> --}}
                                    </div>
                                    <label class="btn text-white btn-round shadow btn-svms-blue user_upload_image_btn">
                                        <i class="nc-icon nc-image m-0 p-0 align-middle"></i>
                                        <input name="user_image" type="file" class="uploadFile img" value="Upload User Photo">
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="user_last_name">Last Name <span class="text-sdca-red">*</span></label>
                                        <input type="text" name="user_last_name" class="form-control" id="user_last_name" placeholder="Type New User's Last Name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="user_first_name">First Name <span class="text-sdca-red">*</span></label>
                                        <input type="text" name="user_first_name" class="form-control" id="user_first_name" placeholder="Type New User's First Name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="user_employee_id">Employee ID <span class="text-sdca-red">*</span></label>
                                        <input type="number" name="user_employee_id" min="0" class="form-control" id="user_employee_id" placeholder="Type New User's Employee ID" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="user_description">Job Description <span class="text-sdca-red">*</span></label>
                                        <input type="text" name="user_description" class="form-control" id="user_description" list="userDescription" placeholder="Type New User's Job Description" required>
                                        <datalist id="userDescription">
                                            <option value="Security Guard">
                                        </datalist>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="user_email">User Email <span class="text-sdca-red">*</span></label>
                                        <input type="email" name="user_email" class="form-control" id="user_email" placeholder="Type New User's Email Address" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="user_role">User Role <span class="text-sdca-red">*</span></label>
                                        <select class="form-control" name="user_role" id="user_role" placeholder="Assign User Role">
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
                        <div class="card-footer pt-0 pb-3">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                    <div class="btn-group mr-auto">
                                        <button type="reset" class="btn btn-svms-blue btn-round shadow">
                                            <i class="nc-icon nc-simple-delete mr-2"></i>
                                            {{ __('Clear') }}
                                        </button>
                                        <button type="submit" class="btn btn-success btn-round shadow">
                                            <i class="nc-icon nc-share-66 mr-2"></i>
                                            {{ __('Save New User') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        {{-- Create New User Form End --}}
    </div>
</div>

{{-- Modals --}}
{{-- Add User Role --}}
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
                                                    <input type="checkbox" name="new_user_role_access[]" value="Profile" class="enableAddBtn custom-control-input" id="profile_module" checked>
                                                    <label class="custom-control-label cb_label" for="profile_module">Profile Module</label> 
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="new_user_role_access[]" value="Violation Entry" class="enableAddBtn custom-control-input" id="violation_entry_module" checked>
                                                    <label class="custom-control-label cb_label" for="violation_entry_module">Violation Entry Module</label> 
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="new_user_role_access[]" value="Student Handbook" class="enableAddBtn custom-control-input" id="student_handbook_module" checked>
                                                    <label class="custom-control-label cb_label" for="student_handbook_module">Student Handbook Module</label> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card-body bg_light_red">
                                    <p class="title_bg_light_red pb-2">Administrator Modules:</p>
                                    <p class="warning_text">Modules limited only to the System Administrator
                                        @if(auth()->user()->user_role == 'Administrator')
                                             (You).
                                        @endif
                                        Select Modules you want to be accessible for <span class="font-weight-bold"> New <span class="display_new_user_role"></span> Role.</span>
                                    </p>
                                    <div class="form-group mt-2">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="new_user_role_access[]" value="Announcement" class="enableAddBtn custom-control-input" id="announcement_module">
                                            <label class="custom-control-label cb_label" for="announcement_module">Announcement Module</label> 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="new_user_role_access[]" value="Violation Records" class="enableAddBtn custom-control-input" id="violation_records_module">
                                            <label class="custom-control-label cb_label" for="violation_records_module">Violation Records Module</label> 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="new_user_role_access[]" value="Users Management" class="enableAddBtn custom-control-input" id="users_management_module">
                                            <label class="custom-control-label cb_label" for="users_management_module">Users Management Module</label> 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="new_user_role_access[]" value="Dashboard" class="enableAddBtn custom-control-input" id="dashboard_module">
                                            <label class="custom-control-label cb_label" for="dashboard_module">Dashboard Module</label> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
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
                                                                        <input type="checkbox" name="new_user_role_access[]" value="Announcement" class="enableAddBtn custom-control-input" id="announcement_module">
                                                                        <label class="custom-control-label cb_label labelonDisabled_modules" for="announcement_module">Announcement Module</label> 
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" name="new_user_role_access[]" value="Violation Records" class="enableAddBtn custom-control-input" id="violation_records_module">
                                                                        <label class="custom-control-label cb_label labelonDisabled_modules" for="violation_records_module">Violation Records Module</label> 
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" name="new_user_role_access[]" value="Users Management" class="enableAddBtn custom-control-input" id="users_management_module">
                                                                        <label class="custom-control-label cb_label labelonDisabled_modules" for="users_management_module">Users Management Module</label> 
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" name="new_user_role_access[]" value="Dashboard" class="enableAddBtn custom-control-input" id="dashboard_module">
                                                                        <label class="custom-control-label cb_label labelonDisabled_modules" for="dashboard_module">Dashboard Module</label> 
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
{{-- Add User Role End --}}
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

    {{-- display text from input live --}}
    <script>
        $(document).ready(function () {
            $("#new_user_role").keyup(function () {
                $(".display_new_user_role").text($("#new_user_role").val());
            });
        });
    </script>

    {{-- show access controls when new user role input has text --}}
    <script>
        $('#new_user_role').on('change keyup', function() {
            $('#addNewUserRoleBtn').prop('disabled', !($('.enableAddBtn:checked').length && $('#new_user_role').val()));
        });
    </script>

    {{-- collapse dropdown button on click change icon --}}
    <script>
        $(".collapse_btn_toggle_icon").click(function(){
            // $('.collapse_btn_toggle_icon').toggle('1000');
            $("i", this).toggleClass("nc-minimal-up nc-minimal-down");
        });
    </script>
@endpush