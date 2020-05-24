@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'profile'
])

@section('content')
    <div class="content">
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
        <div class="row">
            <div class="col-md-4">
                <div class="card card-user">
                    <div class="image">
                        <img src="{{ asset('paper/img/damir-bosnjak.jpg') }}" alt="...">
                    </div>
                    <div class="card-body">
                        <div class="author">
                            <a href="#">
                                <img class="avatar border-gray" src="{{ asset('paper/img/mike.jpg') }}" alt="...">
                                <button class="btn btn-info btn-round btn_edit_profile" data-toggle="modal" data-target="#userEditProfileModal">
                                    <i class="fas fa-user-edit m-0 p-0"></i>
                                </button>
                            </a>
                            <h5 class="title mb-0 text-info">{{ __(auth()->user()->first_name)}} {{ __(auth()->user()->last_name)}}</h5>
                            <p class="description mt-0">
                                {{ __(auth()->user()->user_role)}}
                            </p>
                        </div>
                        <p class="text-center">
                            {{ __(auth()->user()->email) }}
                        </p>
                        <div class="button-container">
                            <div class="row d-flex justify-content-center">
                                {{-- <div class="col-lg-6 col-md-12 col-12">
                                    <button class="btn btn-dark btn-round" data-toggle="modal" data-target="#userEditProfileModal"><i class="nc-icon nc-single-02 mr-2"></i> Edit Profile</button>
                                </div> --}}
                                <div class="col-12 col-md-12">
                                    <button class="btn btn-outline-info btn-round"><i class="nc-icon nc-key-25 mr-2"></i> Change Password</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ __('Registered Guards') }}</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled team-members">
                            <li>
                                <div class="row d-flex align-items-center">
                                    <div class="col-md-2 col-2">
                                        <div class="avatar">
                                            <img src="{{ asset('paper/img/faces/ayo-ogunseinde-2.jpg') }}" alt="Circle Image"
                                                class="img-circle img-no-padding img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-7">
                                        {{ __('Guard 1') }}
                                        <br />
                                        <span class="text-muted">
                                            <small>{{ __('Offline') }}</small>
                                        </span>
                                    </div>
                                    <div class="col-md-3 col-3 text-right">
                                        <button class="btn btn-sm btn-outline-success btn-round btn-icon"><i
                                                class="fa fa-envelope"></i></button>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row d-flex align-items-center">
                                    <div class="col-md-2 col-2">
                                        <div class="avatar">
                                            <img src="{{ asset('paper/img/faces/joe-gardner-2.jpg') }}" alt="Circle Image"
                                                class="img-circle img-no-padding img-responsive">
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-7">
                                            {{ __('Guard 2') }}
                                        <br />
                                        <span class="text-success">
                                            <small>{{ __('Available') }}</small>
                                        </span>
                                    </div>
                                    <div class="col-md-3 col-3 text-right">
                                        <button class="btn btn-sm btn-outline-success btn-round btn-icon"><i
                                                class="fa fa-envelope"></i></button>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-12 text-center">
                                        <button class="btn btn-outline-success btn-round" data-toggle="modal" data-target="#registerNewGuard">
                                            <i class="nc-icon nc-badge mr-2"></i>
                                            {{ __('Register New Guard') }}
                                        </button>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8 text-center">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h5 class="title">{{ __('My Activity Logs') }}</h5>
                    </div>
                    <div class="card-body">

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
            <div class="modal-content modal-card">
                <div class="modal-header d-flex align-items-center">
                    <h5 class="modal-title" id="userEditProfileModal">Edit Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">
            <form class="col-md-12" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row text-center d-flex justify-content-center mb-5">
                    <img class="avatar border-gray user_image_edit shadow" src="{{ asset('paper/img/mike.jpg') }}" alt="...">
                </div>
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
                    <label class="col-md-3 col-form-label">{{ __('First Name') }}</label>
                    <div class="col-md-9">
                        <div class="form-group">
                            <input type="text" name="first_name" class="form-control" placeholder="First Name" value="{{ auth()->user()->first_name }}" required>
                        </div>
                        @if ($errors->has('first_name'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $errors->first('first_name') }}</strong>
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
                    <label class="col-md-3 col-form-label">{{ __('Email') }}</label>
                    <div class="col-md-9">
                        <div class="form-group">
                            <input type="text" name="employee_id" class="form-control" placeholder="Employee ID" value="{{ auth()->user()->employee_id }}" required>
                        </div>
                        @if ($errors->has('employee_id'))
                        <span class="invalid-feedback" style="display: block;" role="alert">
                            <strong>{{ $errors->first('employee_id') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </form>
            </div>
                <div class="modal-footer btn-group">
                    <button type="button" class="btn btn-secondary btn-round" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-info btn-round">{{ __('Save Changes') }}</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Register New Guard -->
    <div class="modal fade" id="registerNewGuard" tabindex="-1" role="dialog" aria-labelledby="userEditProfileModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-card">
                <form class="col-md-12" action="{{ route('profile.register') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <div class="modal-header d-flex align-items-center">
                    <h5 class="modal-title" id="userEditProfileModal">Register New Guard</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                <div class="row text-center d-flex justify-content-center mb-5">
                    <img class="avatar border-gray user_image_edit shadow" src="{{ asset('paper/img/mike.jpg') }}" alt="...">
                </div>
                <div class="row">
                    <label class="col-md-4 col-form-label">{{ __('Last Name') }}</label>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-4 col-form-label">{{ __('First Name') }}</label>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" name="first_name" class="form-control" placeholder="Enter First Name" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-4 col-form-label">{{ __('Employee ID') }}</label>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" name="employee_id" class="form-control" placeholder="Enter Employee ID" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-4 col-form-label">{{ __('Email') }}</label>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-4 col-form-label">{{ __('Password') }}</label>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" name="password" class="form-control" placeholder="Enter Password" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label for="selectUserRole" class="col-md-4 col-form-label">{{ __('User Role') }}</label>
                    <div class="col-md-8">
                        <div class="form-group">
                            <select class="form-control" name="user_role" id="selectUserRole">
                                <option value="Guard">Security Guard</option>
                                <option value="Administrator">Administrator</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
                <div class="modal-footer btn-group">
                    <button type="button" class="btn btn-secondary btn-round" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success btn-round">
                        <i class="nc-icon nc-share-66 mr-2"></i>
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection