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
    <div class="row mb-3">
        <div class="col-lg-12 col-md-12 col-12">
            <h6>{{ __('User Management') }}</h6>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="card shadow-none bg_darken_gray border-0">
                <div class="card-header mb-4 bg_darken_gray">
                    <h4 class="card-title">{{ __('Registered Guards') }}</h4>
                <span class="text-mutated text-secondary">{{ __('Below are the Registered Users. ') }} <span class="font-italic font-weight-bold">{{__('Click a user to view more user details')}}</span></span>
                </div>
                <div class="card-body bg_darken_gray br_radius_bottom px-4">
                    <div class="row">
                        @if(count($users) > 0)
                        @foreach($users as $user)
                        <div class="col-lg-3 col-md-6 col-sm-12 px-2">
                            <a href="#" class="user_card_as_link">
                                <div class="card shadow-none user_card">
                                    <div class="card-body text-center pt-4">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-3 col-sm-4">
                                                <img class="shadow img-fluid" src="/storage/user_images/{{$user->user_image}}" alt="Circle Image" 
                                                style="height:70px;width:70px;max-height:70px;max-width:70px;border-radius:50%;">
                                            </div>
                                            <div class="col-lg-12 col-md-9 col-sm-8">
                                                <p class="title mb-1 mt-3 user_name_txt">{{ __($user->first_name)}} {{ __($user->last_name)}}</p>
                                                <h6 class="font-weight-normal text-uppercase text-secondary mb-4">{{ __($user->user_description)}}</h6>
                                                <p class="font-weight-bold text-info mb-0">Employee ID</p>
                                                <p class="mb-4 font-weight-bold text-muted">{{ __($user->employee_id) }}</p>
                                                <p class="font-weight-bold text-info mb-0">System {{ __($user->user_role)}}</p>
                                                <p class="text-muted">{{ __($user->email)}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                        @else
                        <div class="col-lg-12 col-md-12 col-12">
                            <p>No Registered Users Found.</p>
                        </div>
                        @endif

                    </div>
                    {{-- <div class="list-group">
                        @if(count($users) > 0)
                        @foreach($users as $user)
                        <a href="/users/user_management/{{ $user->id }}" class="list-group-item list-group-item-action my-0 border-0">
                            <div class="row d-flex align-items-center"> 
                                <div class="col-md-12 col-12 d-flex align-items-center">
                                    <div class="circle_div mr-3 user_image_circle shadow">
                                        <img src="{{ asset('paper/img/faces/ayo-ogunseinde-2.jpg') }}" alt="Circle Image">
                                    </div>
                                    <div class="user_name_status">
                                        <span class="user_name_label_txt">
                                            {{ __($user->first_name) }} {{ __($user->last_name) }}
                                        </span>
                                        <br />
                                        <span class="text-success user_status_txt">
                                            {{ __('ONLINE') }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    @else
                        <a href="#" class="list-group-item list-group-item-action my-0 border-0">
                            <div class="row d-flex align-items-center">
                                <div class="col-12">
                                    <p class="text-muted">No Registered Guards</p>
                                </div>
                            </div>
                        </a>
                    @endif
                        <div class="row d-flex justify-content-center">
                            <div class="col-12 text-center">
                                <button class="btn btn-outline-success btn-round shadow" data-toggle="modal" data-target="#registerNewGuard">
                                    <i class="fa fa-user-plus mr-2"></i>
                                    {{ __('Register New Guard') }}
                                </button>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="card card-user">
                <div class="card-header mb-4">
                    <h4 class="card-title">{{ __('Create New User') }}</h4>
                    <span class="text-mutated text-secondary">{{ __('Fill-up the form to create new user account.') }}</span>
                </div>
                <div class="image bg_img_on_create_user_card">
                    <img src="{{ asset('paper/img/damir-bosnjak.jpg') }}" alt="...">
                </div>                
                <form class="col-md-12 p-0" action="{{ route('users.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="user_image_div mx-auto">
                            <img class="avatar_new border-gray shadow" src="{{ asset('paper/img/user/john_wick.jpg') }}" alt="...">
                            <button class="btn btn-info btn-round btn_edit_profile shadow" data-toggle="modal" data-target="#userEditProfileModal">
                                <i class="fa fa-pencil m-0 p-0"></i>
                            </button>   
                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="file" name="user_image">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <label>{{ __('Last Name') }}</label>
                                    <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <label>{{ __('First Name') }}</label>
                                    <input type="text" name="first_name" class="form-control" placeholder="Enter First Name" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <label>{{ __('Employee ID') }}</label>
                                    <input type="text" name="employee_id" class="form-control" placeholder="Enter Employee ID" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <label>{{ __('Job Description') }}</label>
                                    <input type="text" name="user_description" class="form-control" placeholder="Enter User's Job Position" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <label>{{ __('Email') }}</label>
                                    <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <label>{{ __('Password') }} <span class="font-italic text-danger">{{ __('( 6 characters minimum )') }}</span></label>
                                    <input type="text" name="password" class="form-control" placeholder="Enter Password" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-group">
                                    <label for="selectUserRole">{{ __('User Role') }}</label>
                                    <select class="form-control" name="user_role" id="selectUserRole">
                                        <option value="Guard">{{ __('Security Guard') }}</option>
                                        <option value="Administrator">{{ __('System Administrator') }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-light py-4 br_radius_br br_radius_bl">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="btn-group mr-auto">
                                    <button type="reset" class="btn btn-secondary btn-round shadow">
                                        <i class="nc-icon nc-simple-delete mr-2"></i>
                                        {{ __('Clear') }}
                                    </button>
                                    <button type="submit" class="btn btn-info btn-round shadow">
                                        <i class="nc-icon nc-simple-add mr-2"></i>
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
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
@endpush