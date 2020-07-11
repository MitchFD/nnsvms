<div class="sidebar" data-color="black" data-active-color="sdca">
    <div class="logo">
        <a href="#" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="{{ asset('paper') }}/img/svms/svms_logo_light_outline.svg">
            </div>
        </a>
        <a href="{{ route('profile.edit') }}" class="simple-text logo-normal">
            {{ auth()->user()->user_role }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ $elementActive == 'profile' ? 'active' : '' }}">
                <a href="{{ route('profile.edit') }}">
                    <i class="nc-icon nc-single-02"></i>
                    <p>{{ __('My Profile') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <i class="nc-icon nc-layout-11"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'violation_entry' ? 'active' : '' }}">
                <a href="{{ route('violation_entry') }}">
                    <i class="nc-icon nc-paper"></i>
                    <p>{{ __('Violation Entry') }}</p>
                </a>
            </li>
            {{-- <li class="{{ $elementActive == 'violation_records' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'violation_records') }}">
                    <i class="nc-icon nc-bullet-list-67"></i>
                    <p>{{ __('Violation Records') }}</p>
                </a>
            </li> --}}
            <li class="{{ $elementActive == 'violation_records' ? 'active' : '' }}">
                <a href="{{ route('violation_records') }}">
                    <i class="nc-icon nc-bullet-list-67"></i>
                    <p>{{ __('Violation Records') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'users_management' ? 'active' : '' }}">
                <a href="{{ route('users_management') }}">
                    <i class="nc-icon nc-badge"></i>
                    <p>{{ __('Users Management') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'student_handbook' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'student_handbook') }}">
                    <i class="nc-icon nc-book-bookmark"></i>
                    <p>{{ __('Student Handbook') }}</p>
                </a>
            </li>
            {{-- <li class="{{ $elementActive == 'user' || $elementActive == 'profile' ? 'active' : '' }}">
                <a data-toggle="collapse" aria-expanded="true" href="#laravelExamples">
                    <i class="nc-icon"><img src="{{ asset('paper/img/laravel.svg') }}"></i>
                    <p>
                            {{ __('Laravel examples') }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="laravelExamples">
                    <ul class="nav">
                        <li class="{{ $elementActive == 'profile' ? 'active' : '' }}">
                            <a href="{{ route('profile.edit') }}">
                                <span class="sidebar-mini-icon">{{ __('UP') }}</span>
                                <span class="sidebar-normal">{{ __(' User Profile ') }}</span>
                            </a>
                        </li>
                        <li class="{{ $elementActive == 'user' ? 'active' : '' }}">
                            <a href="{{ route('page.index', 'user') }}">
                                <span class="sidebar-mini-icon">{{ __('U') }}</span>
                                <span class="sidebar-normal">{{ __(' User Management ') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li> --}}
            <li class="{{ $elementActive == 'icons' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'icons') }}">
                    <i class="nc-icon nc-diamond"></i>
                    <p>{{ __('Icons') }}</p>
                </a>
            </li>
            {{-- <li class="{{ $elementActive == 'map' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'map') }}">
                    <i class="nc-icon nc-pin-3"></i>
                    <p>{{ __('Maps') }}</p>
                </a>
            </li> --}}
            <li class="{{ $elementActive == 'notifications' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'notifications') }}">
                    <i class="nc-icon nc-bell-55"></i>
                    <p>{{ __('Notifications') }}</p>
                </a>
            </li>
            {{-- <li class="{{ $elementActive == 'tables' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'tables') }}">
                    <i class="nc-icon nc-tile-56"></i>
                    <p>{{ __('Table List') }}</p>
                </a>
            </li> --}}
            <li class="{{ $elementActive == 'typography' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'typography') }}">
                    <i class="nc-icon nc-caps-small"></i>
                    <p>{{ __('Typography') }}</p>
                </a>
            </li>
            {{-- <li class="active-pro {{ $elementActive == 'upgrade' ? 'active' : '' }} bg-danger">
                <a href="{{ route('page.index', 'upgrade') }}">
                    <i class="nc-icon nc-spaceship text-white"></i>
                    <p class="text-white">{{ __('Upgrade to PRO') }}</p>
                </a>
            </li> --}}
            {{-- <li class="active-pro">
                <a href="{{ route('logout') }}">
                    <i class="nc-icon nc-minimal-left"></i>
                    <p>{{ __('Logout') }}</p>
                </a>
            </li> --}}
        </ul>
    </div>
</div>