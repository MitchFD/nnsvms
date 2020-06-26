@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'profile'
])

@section('content')
    <div class="content">
        {{-- Notifications --}}
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="nc-icon nc-simple-remove"></i>
                    </button>
                    {{ session('status') }}
                </div>
            @endif
            @if (session('password_status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="nc-icon nc-simple-remove"></i>
                    </button>
                    {{ session('password_status') }}
                </div>
            @endif
            @if (session('register_status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="nc-icon nc-simple-remove"></i>
                    </button>
                    {{ session('register_status') }}
                </div>
            @endif

        <div class="row mb-3">
            <div class="col-lg-12 col-md-12 col-12">
                <h6>{{ __('My Profile') }}</h6>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-3 col-md-5">
                {{-- User Card --}}
                <div class="card card-user">
                    <div class="image">
                        <img src="{{ asset('paper/img/damir-bosnjak.jpg') }}" alt="...">
                    </div>
                    <div class="card-body">
                        <div class="author">
                            <div class="user_image_div mb-4 mx-auto shadow">
                                <img class="img_user_image img-fluid" src="storage/user_images/{{ auth()->user()->user_image }}" alt="">
                            </div>
                            <button class="btn btn-round shadow btn-sdca user_image_btn" data-toggle="modal" data-target="#userEditProfileModal">
                                <i class="fa fa-pencil m-0 p-0"></i>
                            </button>
                            {{-- <img class="avatar border-gray shadow" src="/storage/user_images/{{ auth()->user()->user_image }}" alt="...">
                            <button class="btn btn-info btn-round btn_edit_profile shadow" data-toggle="modal" data-target="#userEditProfileModal">
                                <i class="fa fa-pencil m-0 p-0"></i>
                            </button> --}}

                            <h5 class="title mb-1">{{ __(auth()->user()->user_first_name)}} {{ __(auth()->user()->user_last_name)}}</h5>
                            <h6 class="font-weight-normal text-uppercase text-muted mb-4">{{ __(auth()->user()->user_description)}}</h6>
                            <p class="font-weight-bold text_sdca mb-0">Employee ID</p>
                            <p class="mb-4 font-weight-bold text-muted emp_id_text">{{ __(auth()->user()->user_employee_id) }}</p>
                            <p class="font-weight-bold text_sdca mb-0">System {{ __(auth()->user()->user_role)}}</p>
                            <p class="text-muted">{{ __(auth()->user()->email) }}</p>
                        </div>
                    </div>
                </div>
                {{-- Change Password Card --}}
                <form action="{{ route('profile.password') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">{{ __('Change Password') }}</h5>
                            <p class="text-secondary">Password must contain atleast <span class="font-italic text-danger">6 characters</span>.</p>
                        </div>
                        <div class="card-body bg-light">
                            <div class="row mb-1">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="form-group">
                                        <label>{{ __('Old Password') }}</label>
                                        <input type="password" name="old_password" class="form-control" placeholder="Old password" required>
                                        @if ($errors->has('old_password'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('old_password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-1">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="form-group">
                                        <label>{{ __('New Password') }}</label>
                                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="form-group">
                                        <label>{{ __('Password Confirmation') }}</label>
                                        <input type="password" name="password_confirmation" class="form-control" placeholder="Password Confirmation" required>
                                        @if ($errors->has('password_confirmation'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row my-2">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-svms-blue btn-round shadow"><i class="nc-icon nc-share-66 mr-2 font-weight-bold"></i>{{ __('Save Changes') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-9 col-md-7 text-center">
                {{-- User's Activity Logs Card --}}
                <div class="card">
                    <div class="card-header border-bottom">
                        <h5 class="title">{{ __('My Activity Logs') }}</h5>
                        <p class="text-secondary">Below are your Activity Logs to this system and <span class="font-italic font-weight-bold">Click on any row </span> to view more details.</p>
                    </div>
                    <div class="card-body px-0 pt-0">
                        <div class="table-responsive user_activity_table_div">
                            <table class="table table-hover">
                                <thead class="text-primary thead-svms-blue position-sticky">
                                    <th class="th_left">{{ __('Process Type') }}</th>
                                    <th class="th_left">{{ __('Description') }}</th>
                                    <th class="th_left">{{ __('Date/Time') }}</th>
                                    {{-- <th class="text-center">{{ __('Action') }}</th> --}}
                                </thead>
                                <tbody>
                                    <tr>    
                                        <td class="font-weight-bold td_left">{{ __('Login') }}</td>
                                        <td class="td_left">{{ __('You Logged in to system') }}</td>
                                        <td class="td_left">{{ __('January 1, 2020 | 10:30 AM') }}</td>
                                        {{-- <td class="text-center">
                                            <button type="button" class="btn btn-outline-info btn-round shadow btn-sm">{{ __('View Details') }}</button>
                                        </td> --}}
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold td_left">{{ __('Record Violation') }}</td>
                                        <td class="td_left">{{ __('Offenses Recorded to student ID: ') }} <span class="font-weight-bold"> 20150348</span></td>
                                        <td class="td_left">{{ __('January 3, 2020 | 12:30 PM') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold td_left">{{ __('Create User Account') }}</td>
                                        <td class="td_left">{{ __('Registered New User Account for: ') }} <span class="font-weight-bold"> Last Name</span></td>
                                        <td class="td_left">{{ __('January 5, 2020 | 09:30 AM') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold td_left">{{ __('Process Sanction') }}</td>
                                        <td class="td_left">{{ __('Sanctions added to student ID: ') }} <span class="font-weight-bold"> 20150348</span></td>
                                        <td class="td_left">{{ __('January 7, 2020 | 01:30 PM') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold td_left">{{ __('Update Account') }}</td>
                                        <td class="td_left">{{ __('You updated your account information') }}</td>
                                        <td class="td_left">{{ __('January 7, 2020 | 01:30 PM') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold td_left">{{ __('Update User Account') }}</td>
                                        <td class="td_left">{{ __('You updated the user Account for:') }}<span class="font-weight-bold"> John Wick</span></td>
                                        <td class="td_left">{{ __('January 7, 2020 | 01:30 PM') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold td_left">{{ __('Delete User Account') }}</td>
                                        <td class="td_left">{{ __('You deleted user account: ') }}<span class="font-weight-bold"> John Wick</span></td>
                                        <td class="td_left">{{ __('January 7, 2020 | 01:30 PM') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold td_left">{{ __('Process Sanction') }}</td>
                                        <td class="td_left">{{ __('Sanctions added to student ID: ') }} <span class="font-weight-bold"> 20150348</span></td>
                                        <td class="td_left">{{ __('January 7, 2020 | 01:30 PM') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold td_left">{{ __('Update Account') }}</td>
                                        <td class="td_left">{{ __('You updated your account information') }}</td>
                                        <td class="td_left">{{ __('January 7, 2020 | 01:30 PM') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold td_left">{{ __('Update User Account') }}</td>
                                        <td class="td_left">{{ __('You updated the user Account for:') }}<span class="font-weight-bold"> John Wick</span></td>
                                        <td class="td_left">{{ __('January 7, 2020 | 01:30 PM') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold td_left">{{ __('Delete User Account') }}</td>
                                        <td class="td_left">{{ __('You deleted user account: ') }}<span class="font-weight-bold"> John Wick</span></td>
                                        <td class="td_left">{{ __('January 7, 2020 | 01:30 PM') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold td_left">{{ __('Process Sanction') }}</td>
                                        <td class="td_left">{{ __('Sanctions added to student ID: ') }} <span class="font-weight-bold"> 20150348</span></td>
                                        <td class="td_left">{{ __('January 7, 2020 | 01:30 PM') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold td_left">{{ __('Update Account') }}</td>
                                        <td class="td_left">{{ __('You updated your account information') }}</td>
                                        <td class="td_left">{{ __('January 7, 2020 | 01:30 PM') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold td_left">{{ __('Update User Account') }}</td>
                                        <td class="td_left">{{ __('You updated the user Account for:') }}<span class="font-weight-bold"> John Wick</span></td>
                                        <td class="td_left">{{ __('January 7, 2020 | 01:30 PM') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold td_left">{{ __('Delete User Account') }}</td>
                                        <td class="td_left">{{ __('You deleted user account: ') }}<span class="font-weight-bold"> John Wick</span></td>
                                        <td class="td_left">{{ __('January 7, 2020 | 01:30 PM') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold td_left">{{ __('Logout') }}</td>
                                        <td class="td_left">{{ __('You Logged out from system') }}</td>
                                        <td class="td_left">{{ __('January 15, 2020 | 06:30 AM') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- <form class="col-md-12" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">{{ __('Edit Profile') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('Last Name') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="{{ auth()->user()->last_name }}" required>
                                    </div>
                                    @if ($errors->has('last_name'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('last_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('Email') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="Email" value="{{ auth()->user()->email }}" required>
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-info btn-round">{{ __('Save Changes') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <form class="col-md-12" action="{{ route('profile.password') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">{{ __('Change Password') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('Old Password') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="password" name="old_password" class="form-control" placeholder="Old password" required>
                                    </div>
                                    @if ($errors->has('old_password'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('old_password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('New Password') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">{{ __('Password Confirmation') }}</label>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <input type="password" name="password_confirmation" class="form-control" placeholder="Password Confirmation" required>
                                    </div>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-info btn-round">{{ __('Save Changes') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form> --}}
            </div>
        </div>
    </div>

    <!-- MODALS -->
    <!-- Edit User Profile Modal -->
    <div class="modal fade" id="userEditProfileModal" tabindex="-1" role="dialog" aria-labelledby="userEditProfileModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-card card-user">
                <div class="modal-header d-flex align-items-center">
                    <h5 class="modal-title" id="userEditProfileModal">Edit Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <form class="col-md-12 p-0" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body p-0">
                    <div class="card card-user m-0 shadow-none rounded-0">
                        <div class="image">
                            <img class="rounded-0" src="{{ asset('paper/img/damir-bosnjak.jpg') }}" alt="...">
                        </div>
                        <div class="card-body p-0">
                            <div class="author author_on_modal">
                                div class="container">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-6 imgUp">
                                        <div class="imagePreview">
                                            {{-- <img class="img_user_image" src="storage/user_images/{{ auth()->user()->user_image }}" alt=""> --}}
                                        </div>
                                        <label class="btn text-white btn-round shadow btn-sdca upload_image_btn py-auto px-1">
                                            <i class="nc-icon nc-image m-0 p-0"></i>
                                            <input name="user_image" type="file" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
                                        </label>
                                    </div>
                                </div>

                                {{-- <div class="user_image_div user_image_div_modal mb-4 mx-auto">
                                    <img class="img_user_image img-fluid" src="/storage/user_images/{{ auth()->user()->user_image }}" alt="User Upload Profile Image">
                                    <input type="file" name="user_image" class="btn btn-round shadow btn-sdca user_image_btn_on_modal">
                                        <i class="nc-icon nc-image m-0 p-0"></i>
                                    </input>
                                </div> --}}
                                {{-- <a href="#">
                                    <img class="avatar border-gray user_image_on_modal" src="/storage/user_images/{{ auth()->user()->user_image }}" alt="...">
                                    <input type="file" name="user_image" class="btn btn-info btn-round user_image_upload_btn">
                                        <i class="nc-icon nc-image m-0 p-0"></i>
                                    </input>
                                </a> --}}
                                <h5 class="title mx-3">System {{ __(auth()->user()->user_role)}}</h5>
                                {{-- <p class="mt-0 role_description_txt text-secondary">System {{ __(auth()->user()->user_role)}}</p> --}}
                            </div>
                            <div class="container-fluid bg-light pt-4">
                                {{-- <div class="row">
                                    <div class="col">
                                        <input type="file" name="user_image">
                                    </div>
                                </div> --}}
                                <div class="row">
                                    <label class="col-md-3 col-form-label">{{ __('Last Name') }}</label>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <input type="text" name="user_last_name" class="form-control" placeholder="Last Name" value="{{ auth()->user()->user_last_name }}" required>
                                        </div>
                                        @if ($errors->has('user_last_name'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('user_last_name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-form-label">{{ __('First Name') }}</label>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <input type="text" name="user_first_name" class="form-control" placeholder="First Name" value="{{ auth()->user()->user_first_name }}" required>
                                        </div>
                                        @if ($errors->has('user_first_name'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('user_first_name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-form-label">{{ __('Employee ID') }}</label>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <input type="text" name="user_employee_id" class="form-control" placeholder="Employee ID" value="{{ auth()->user()->user_employee_id }}" required>
                                        </div>
                                        @if ($errors->has('user_employee_id'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('user_employee_id') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-form-label">{{ __('Job Description') }}</label>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <input type="text" name="user_description" class="form-control" placeholder="Employee ID" value="{{ auth()->user()->user_description }}" required>
                                        </div>
                                        @if ($errors->has('user_description'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('user_description') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-3 col-form-label">{{ __('Email') }}</label>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ auth()->user()->email }}" required>
                                        </div>
                                        @if ($errors->has('email'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <input type="hidden" name="user_role" value="{{ auth()->user()->user_role }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="modal-footer btn-group">
                        <button type="button" class="btn btn-secondary btn-round shadow" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-info btn-round shadow"><i class="nc-icon nc-share-66 mr-2"></i>{{ __('Save Changes') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
            demo.initChartsPages();
        });
    </script>

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
@endpush