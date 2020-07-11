@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'violation_records'
])

@section('content')
    <div class="content">
    {{-- Has Record --}}
        @if($student !== null)
            <div class="row mb-3">
                <div class="col-lg-12 col-md-12 col-12 d-flex d-inline">
                    <a href="{{ url()->previous() }}" class="return_back_link"><h6>{{ __('Violation Records') }} </h6></a> <span class="dir_slash px-2"> / </span> <h6 class="dir_link_active"> {{ $student->student_last_name }}, {{ $student->student_first_name }}</h6>
                </div>
            </div>
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="nc-icon nc-simple-remove"></i>
                    </button>
                    {{ session('status') }}
                </div>
            @endif
            <div class="row h-100">
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="card shadow h-100">
                        <div class="img_card">
                            <img class="card-img-top" src="{{asset('storage/students_images/'.$student->student_image)}}" alt="{{ $student->student_id }}">
                        </div>
                        <div class="card-body student_details_div_modal text-center py-3">
                            <p class="student_id_txt_modal">{{ $student->student_id }}</p>
                            <p class="student_name_txt_modal">{{ $student->student_first_name }} {{ $student->student_last_name }}</p>
                            <p class="student_details_txt_modal">{{ $student->student_course }}-{{ $student->student_section }} | {{ $student->student_school }}</p>
                            @if(count($offenses) > 0)
                                <span class="badge badge-sdca mt-3 total_offenses_bagde">
                                    @foreach($offenses as $offense)
                                        {{$offense->offense_count}}
                                    @endforeach
                                </span>
                            @else
                                <span class="badge badge-success mt-3 total_offenses_bagde">
                                    No Violations Found
                                </span>
                            @endif
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-12">
                    <div class="card shadow h-100">
                        <div class="card-header cust_card_padd cust_card_header">
                            <h4 class="cust_card_title">{{ __('SANCTIONS') }}</h4><br>
                            @if(count($offenses) > 0)
                                <span class="cust_card_sub_title">Add Sanctions corresponding to the offenses committed by <span class="font-weight-bold"> {{ $student->student_first_name }} {{ $student->student_last_name }}.</span>
                            @else
                                <span class="cust_card_sub_title">There are no recorded violations found for <span class="font-weight-bold"> {{ $student->student_first_name }} {{ $student->student_last_name }}.</span>
                            @endif
                        </div>
                        {{-- If Student has Offenses Found --}}
                            @if(count($offenses) > 0)
                                <div class="card-body cust_card_padd">
                                    <div>
                                        <table class="table table-hover">
                                            <thead class="text-primary thead-svms-blue position-sticky">
                                                <th class="text-left">{{ __('No.') }}</th>
                                                <th class="text-left">{{ __('Sanction Details') }}</th>
                                                <th class="text-left">{{ __('Status') }}</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="3" class="text-center">
                                                        <img class="sr_no_sanctions_yet mt-3" src="{{ asset('paper/illustrations/no_sanctions_yet_illustration.svg') }}" alt="">
                                                        <p class="text-muted font-italic">No Sanctions yet...</p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row d-flex">
                                        <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-end m-0">
                                            <button class="btn btn-sdca my-0 mr-2" data-toggle="modal" data-target="#addEditSanctionModal"><i class="nc-icon nc-tap-01 pr-1"></i>Add Sanction</button>
                                            {{-- <button class="btn btn-svms-blue mx-1 my-0"><i class="nc-icon nc-bullet-list-67 pr-1"></i>Update Status</button> --}}
                                            <button class="btn btn-success my-0"><i class="nc-icon nc-paper pr-1"></i>Print</button>
                                        </div>
                                    </div>
                                </div>
                            @else
                        {{-- If Student has Offenses Found End --}}
                        {{-- If Student has No Offenses Found --}}
                            <div class="row mt-5">
                                <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                    <img class="sr_no_violations_found" src="{{ asset('paper/illustrations/no_violation_found.svg') }}" alt="">
                                    <p class="font-italic text-muted mt-3">No recorded violations found for {{ $student->student_first_name }} {{ $student->student_last_name }}</p>
                                </div>
                            </div>
                        {{-- If Student has No Offenses Found End --}}
                        @endif
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card h-100 shadow-none br_radius_all">
                        <div class="card-header bg_darken_gray cust_card_padd cust_card_header">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-between">
                                    <div class="title_and_subtitle_div">
                                        <h4 class="cust_card_title">{{ __('OFFENSES') }}</h4><br>
                                        @if(count($offenses) > 0)
                                            <span class="cust_card_sub_title">Below are the list of recorded offenses made by <span class="font-weight-bold"> {{ $student->student_first_name }} {{ $student->student_last_name }}</span> filtered by date.</span>
                                        @else
                                            <span class="cust_card_sub_title">There are no recorded violations found for <span class="font-weight-bold"> {{ $student->student_first_name }} {{ $student->student_last_name }}</span></span>
                                        @endif
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn dropdown_menu" type="button" id="offenseCardDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="offenseCardDropDown">
                                            <a class="dropdown-item" href="#">Add Violation</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body bg_darken_gray cust_card_padd record_offenses_parent_div">
                            @if(count($offenses) > 0)
                                <div class="row h-100">
                                    @foreach ($offenses->sortByDesc('created_at') as $offense)
                                    <div class="col-lg-3 col-md-4 col-sm-12 pr-1 py-2">
                                        <div class="card-body shadow offenses_card h-100">
                                            <div class="row d-flex">
                                                <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-between">
                                                    <div class="date_div">
                                                        <p class="offense_day_txt">{{ date('F j, Y', strtotime($offense->created_at)) }}</p>
                                                        <p class="offense_date_txt">{{ date('l - h:i A', strtotime($offense->created_at)) }}</p>
                                                    </div>
                                                    <div class="dropdown">
                                                        <button class="btn offense_card_dropdown_btn" type="button" id="offenseCardDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="offenseCardDropDown">
                                                            <a class="dropdown-item" href="#">Edit</a>
                                                            <a class="dropdown-item" href="#">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="offenses_list mt-2">
                                                @if($offense->minor_offenses != 'null')
                                                    <div class="card-body offense_card">
                                                        <p class="offense_title_txt">Minor Offense:</p>
                                                        @foreach (json_decode($offense->minor_offenses) as $index => $minor_offenses)
                                                            <p class="offense_txt"> <span class="offense_num_count_txt pr-1">{{$index+1}}.</span> {{ $minor_offenses }}</p>
                                                        @endforeach
                                                    </div>
                                                @endif
                                                @if($offense->less_serious_offenses != 'null')
                                                    <div class="card-body offense_card">
                                                        <p class="offense_title_txt">Less Serious Offense:</p>
                                                        @foreach (json_decode($offense->less_serious_offenses) as $index => $less_serious_offenses)
                                                            <p class="offense_txt"> <span class="offense_num_count_txt pr-1">{{$index+1}}.</span> {{ $less_serious_offenses }}</p>
                                                        @endforeach
                                                    </div>
                                                @endif
                                                @if($offense->other_offenses != 'null')
                                                    <div class="card-body offense_card">
                                                        <p class="offense_title_txt">Others:</p>
                                                        @foreach (json_decode($offense->other_offenses) as $index => $other_offenses)
                                                            <p class="offense_txt"> <span class="offense_num_count_txt pr-1">{{$index+1}}.</span> {{ $other_offenses }}</p>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="row d-flex justify-content-start mb-2">
                                                <div class="col-lg-12 col-md-12 col-sm-12 recorded_by_div">
                                                    <span class="d-flex align-items-center"><i class="nc-icon nc-single-02 pr-1"></i> Recorded by 
                                                        @if(auth()->user()->user_role == 'Administrator')
                                                        <span class="user_name">You</span> 
                                                        @else
                                                        {{$user->user_role}} <span class="user_name">{{$user->user_last_name}}</span> 
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            @else 
                                <div class="row d-flex text-right">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <button class="btn btn-outline-sdca shadow">Add Violations</button>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
    {{-- Has Record end --}}
    {{-- No Record --}}
        @else
            <div class="row mb-3">
                <div class="col-lg-12 col-md-12 col-12 d-flex d-inline">
                    <a href="{{ route("violation_records") }}" class="return_back_link"><h6>{{ __('Violation Records') }} </h6></a> <span class="dir_slash px-2"> / </span> <h6 class="dir_link_active"> {{ $student_id }}</h6>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-lg-12 col-md col-sm-12">
                    <div class="card shadow">
                        <div class="card-body">
                            <img class="unregistered_student_number_svg" src="{{ asset('paper/illustrations/unregistered_student_number.svg') }}" alt="unregistered student number">
                            <p class="unreg_student_num_txt">{{$student_id}}</p>
                            <p class="text-muted font-italic">No mMtched student number found for {{$student_id}}...</p>
                        </div>
                    </div>
                </div>
            </div>
    {{-- No Record end --}}
        @endif
        
    </div>

    {{-- Modals --}}
    {{-- Add / Edit Sanction Modal --}}
    <div class="modal fade" id="addEditSanctionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content modal-card">
                <div class="modal-header">
                    <h5 class="modal-title" id="violationEntryFormModalLabel">Add Sanction</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('sanction.save')}}" name="sform" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body custom_modal_body">
                        @if(count($offenses) > 0)
                        <div class="row mb-2">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="form-group margin_x">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="allViolations" class="enableRecordBtn custom-control-input" id="allViolations">
                                        <label class="custom-control-label cust_card_sub_title cb_label" for="allViolations">Select All Recorded Violation/s and Add Corresponding Sanctions.</label> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="accordion margin_x" id="listOfViolations">
                                    @foreach($offenses->sortByDesc('created_at') as $offense)
                                    <div class="card violation_lists shadow">
                                        <div class="card-header custom_header_collapse">
                                            <div class="row d-flex">
                                                <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-between">
                                                    <div class="form-group m-0">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="selected_violation_ids[]" value="{{$offense->violation_id}}" class="custom-control-input allViolations_child" id="{{$offense->created_at}}">
                                                            <label class="custom-control-label date_div2" for="{{$offense->created_at}}">
                                                                <p class="collapse_title">{{ date('F j, Y', strtotime($offense->created_at)) }} <span class="font-weight-normal"><span class="text-light">|</span> {{date('h:i A - l', strtotime($offense->created_at))}}</span></p>
                                                                <p class="collapse_subtitle">{{ $offense->offense_count }} offense/s found</p>
                                                            </label> 
                                                        </div>
                                                    </div>
                                                    {{-- <div class="date_div">
                                                        <p class="collapse_title m-0">{{ date('F j, Y', strtotime($offense->created_at)) }} <span class="font-weight-normal"><span class="text-light">|</span> {{date('h:i A - l', strtotime($offense->created_at))}}</span></p>
                                                        <p class="collapse_subtitle m-0">{{ $offense->offense_count }} offense/s found</p>
                                                    </div> --}}
                                                    <div class="dropdown">
                                                        <button class="btn offense_card_dropdown_btn btn-link" type="button" id="offenseCardDropDown" data-toggle="collapse" data-target="#{{$offense->violation_id}}" aria-expanded="true" aria-controls="{{$offense->violation_id}}">
                                                            <i class="nc-icon nc-minimal-down" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="{{$offense->violation_id}}" class="collapse" aria-labelledby="{{$offense->violation_id}}" data-parent="#accordionExample">
                                            <div class="card-body offenses_list pt-0">
                                                @if($offense->minor_offenses != 'null')
                                                <div class="card-body offense_card">
                                                    <p class="offense_title_txt">Minor Offense:</p>
                                                    @foreach (json_decode($offense->minor_offenses) as $index => $minor_offenses)
                                                        <p class="offense_txt"> <span class="offense_num_count_txt pr-1">{{$index+1}}.</span> {{ $minor_offenses }}</p>
                                                    @endforeach
                                                </div>
                                                @endif
                                                @if($offense->less_serious_offenses != 'null')
                                                    <div class="card-body offense_card">
                                                        <p class="offense_title_txt">Less Serious Offense:</p>
                                                        @foreach (json_decode($offense->less_serious_offenses) as $index => $less_serious_offenses)
                                                            <p class="offense_txt"> <span class="offense_num_count_txt pr-1">{{$index+1}}.</span> {{ $less_serious_offenses }}</p>
                                                        @endforeach
                                                    </div>
                                                @endif
                                                @if($offense->other_offenses != 'null')
                                                    <div class="card-body offense_card">
                                                        <p class="offense_title_txt">Others:</p>
                                                        @foreach (json_decode($offense->other_offenses) as $index => $other_offenses)
                                                            <p class="offense_txt"> <span class="offense_num_count_txt pr-1">{{$index+1}}.</span> {{ $other_offenses }}</p>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="modal-body p-0">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <table class="table table-hover">
                                    <thead class="text-primary thead-svms-blue">
                                        <th class="text-center">{{ __('No.') }}</th>
                                        <th class="text-left">{{ __('Sanction Details') }}</th>
                                        <th class="text-left">{{ __('Status') }}</th>
                                    </thead>
                                    <tbody id="sanction_field_wrapper">
                                        <tr>
                                            <td class="font-weight-bold text-center" width="55">
                                                <p class="m-0">1</p>
                                            </td>
                                            <td class="px-0">
                                                <div class="form-group m-0">
                                                    <input type="text" name="sanction" class="form-control" id="inputHasText" onkeyup="manage(this)" list="defaultSanctions" placeholder="Type Sanction">
                                                    <datalist id="defaultSanctions">
                                                        <option value="Counselling">
                                                        <option value="Warning">
                                                        <option value="One-Day Class Suspension">
                                                        <option value="Two-Days Class Suspension">
                                                        <option value="Seven-Days Class Suspension">
                                                        <option value="Ten-Days Class Suspension">
                                                    </datalist>
                                                </div>
                                            </td>
                                            <td width="250">
                                                <div class="input-group m-0">
                                                    <select class="custom-select" name="sanction_status">
                                                        <option value="Pending" class="text-muted" selected>Pending</option>
                                                        <option value="Completed" class="text-success" disabled>Completed</option>
                                                        <option value="Not Completed" class="text-danger" disabled>Not Completed</option>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <button onclick="addNewSanctionField()" class="btn btn-svms-blue addInputBtn" type="button"><i class="nc-icon nc-simple-add"></i></button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-end btn-group">
                                <button type="button" class="btn btn-svms-blue btn-round shadow m-0" data-dismiss="modal">Cancel</button>
                                <button type="submit" id="saveSanctionDetails" class="btn btn-sdca btn-round shadow m-0" disabled><i class="nc-icon nc-share-66 mr-2"></i>Save Changes</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Violation Form Modal -->
    
@endsection

@push('scripts')
    {{-- <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
            demo.initChartsPages();
        });
    </script> --}}
    <script>
        var maxField = 10;
        var x = 1;
        function addNewSanctionField(){
            if(x < maxField){ 
                x++;
                $('#sanction_field_wrapper').append('<tr id="addedSanctionField"> \
                                        <td class="font-weight-bold text-center" width="55"> \
                                            <p class="m-0">1</p> \
                                        </td> \
                                        <td class="px-0"> \
                                            <div class="form-group m-0"> \
                                                <input type="text" name="sanction" class="form-control" id="sanction" list="defaultSanctions" placeholder="Type Sanction" required> \
                                                <datalist id="defaultSanctions"> \
                                                    <option value="Counselling"> \
                                                    <option value="Warning"> \
                                                    <option value="One-Day Class Suspension"> \
                                                    <option value="Two-Days Class Suspension"> \
                                                    <option value="Seven-Days Class Suspension"> \
                                                    <option value="Ten-Days Class Suspension"> \
                                                </datalist> \
                                            </div> \
                                        </td> \
                                        <td width="250"> \
                                            <div class="input-group m-0"> \
                                                <select class="custom-select"> \
                                                    <option value="Pending" class="text-muted" selected>Pending</option> \
                                                    <option value="Completed" class="text-success">Completed</option> \
                                                    <option value="Not Completed" class="text-danger">Not Completed</option> \
                                                </select> \
                                                <div class="input-group-append"> \
                                                    <button id="removeAddedField" class="btn btn-sdca removeInputBtn" type="button"><i class="nc-icon nc-simple-remove"></i></button> \
                                                </div> \
                                            </div> \
                                        </td> \
                                    </tr>');
            }
            $('#sanction_field_wrapper').on('click', '#removeAddedField', function(e){
                e.preventDefault();
                $(this).closest('#addedSanctionField').remove();
                x--;
            });
        }
    </script>

    {{-- enable save sanction button when input field has text --}}
    <script>
        function manage(inputHasText) {
            if (inputHasText.value != '') {
                document.getElementById("saveSanctionDetails").removeAttribute("disabled");
            }
            else {
                document.getElementById("saveSanctionDetails").setAttribute("disabled", "disabled");
            }
        }   
    </script>

    {{-- selecttion of violations for processing sanction --}}
    <script>
        $(function() {
            $('#allViolations').on('change', function() {
                $('.allViolations_child').prop('checked', this.checked);
            });
            $('.allViolations_child').on('change', function() {
                $('#allViolations').prop('checked', $('.allViolations_child:checked').length===$('.allViolations_child').length);
            });
        });
    </script>

    {{-- change dropdown icon on click --}}
    <script>
        $(".offense_card_dropdown_btn").click(function(){
            // $('.offense_card_dropdown_btn').toggle('1000');
            $("i", this).toggleClass("nc-minimal-up nc-minimal-down");
        });
    </script>
    
    
@endpush