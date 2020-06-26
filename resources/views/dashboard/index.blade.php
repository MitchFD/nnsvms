@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'dashboard'
])

@section('content')
    <div class="content">
        <div class="row mb-3">
            <div class="col-lg-12 col-md-12 col-12">
                <h6>{{ __('Dashboard') }}</h6>
            </div>
        </div>
    {{-- Violators Count for each School Departments --}}
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-globe text-warning"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="department_text mb-2">SASE</p>
                                    <div class="violators_count_div">
                                        <p class="violators_count">10</p>
                                        <p class="violators_text">violators</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="nc-icon nc-refresh-69"></i> Updated 5 minutes ago...
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-globe text-warning"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="department_text mb-2">SBCS</p>
                                    <div class="violators_count_div">
                                        <p class="violators_count">10</p>
                                        <p class="violators_text">violators</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="nc-icon nc-refresh-69"></i> Updated 5 minutes ago...
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-globe text-warning"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="department_text mb-2">SHSP</p>
                                    <div class="violators_count_div">
                                        <p class="violators_count">10</p>
                                        <p class="violators_text">violators</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="nc-icon nc-refresh-69"></i> Updated 5 minutes ago...
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-globe text-warning"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="department_text mb-2">SIHTM</p>
                                    <div class="violators_count_div">
                                        <p class="violators_count">10</p>
                                        <p class="violators_text">violators</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="nc-icon nc-refresh-69"></i> Updated 5 minutes ago...
                        </div>
                    </div>
                </div>
            </div>
        </div>

    {{-- Graph Violators count for each School Departments --}}
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header ">
                        <h5 class="card-title">Users Behavior</h5>
                        <p class="card-category">24 Hours performance</p>
                    </div>
                    <div class="card-body ">
                        <canvas id=chartHours width="400" height="100"></canvas>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-history"></i> Updated 3 minutes ago
                        </div>
                    </div>
                </div>
            </div>
        </div>

    {{-- Top Cards --}}
        <div class="row">
            
            <div class="col-lg-4 col-md-4 clo-sm-12">
                <div class="card card-chart">
                    <div class="card-header">
                        <h5 class="card-title">Top 5 Violators</h5>
                        <p class="card-category">Students with most counts of Committed Offenses</p>
                    </div>
                    <div class="card-body px-0">
                        <div class="list-group">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <a href="#"
                                        id=""
                                        class="list-group-item list-group-item-action top_violators d-flex justify-content-start text-decoration-none">
                                        <div class="student_image_div mr-3">
                                            <img class="student_img" src="storage/students_images/default_student_image.jpg" alt="Student Image">
                                        </div>
                                        <div class="top_violator_student_div">
                                            <p class="student_name_txt m-0">Mitch Frankein O. Desierto</p>
                                            <p class="student_number_txt text-dark align-middle">20150348<span class="text-muted"> | BSIT-4A | SBCS </span> <span class="ml-2 badge badge-pill badge-sdca student_offense_count">10 Offenses</span></p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <hr>
                        <div class="stats">
                            <i class="nc-icon nc-refresh-69"></i> Updated 5 minutes ago...
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{-- <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
            demo.initChartsPages();
        });
    </script> --}}
@endpush