@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'violation_entry'
])

@section('content')
    <div class="content">
        <div class="row mb-3">
            <div class="col-lg-12 col-md-12 col-12">
                <h6>{{ __('Violation Entry') }}</h6>
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
        <div class="row mt-3">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body p-0 notice_card">
                        <div class="notice_div float-left">
                            <p class="date_today_txt">{{ \Carbon\Carbon::now()->isoformat('MMMM D, YYYY') }}</p>
                            <p class="day_today_txt">{{ \Carbon\Carbon::now()->isoformat('dddd') }}</p>
                            <p class="announcement_txt text-muted">Today, students are expected to wear the SDCA shirt or any red SDCA Foundation shirt if they are reporting to school.</p>
                            <div class="form-group mt-4 mb-3">
                                <input type="text" name="search_student" id="search_student" class="form-control input-lg search_student_input px-4" placeholder="Search Student by student ID or names..." />
                            </div>
                        </div>
                        <div class="illustration_div">
                            <img class="illustration_search_student" src="{{ asset('paper/illustrations/search_student_illustration.svg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-12 col-md-12 col-sm-12">
                {{-- <div class="form-group">
                    <input type="text" name="search_student" id="search_student" class="form-control input-lg search_student_input px-4" placeholder="Search Student by student ID or names..." /> --}}
                    {{-- display fetch --}}
                    {{-- <div id="studentsList">
                        
                    </div>
                </div> --}}
                {{-- display fetch --}}
                <div id="studentsList">
                                    
                </div>
                {{ csrf_field() }}
            </div>
        </div>
    </div>

    <!-- Violation Form Modal -->
    <div class="modal fade" id="violationEntryForm" tabindex="-1" role="dialog" aria-labelledby="violationEntryFormLabel" aria-hidden="true">
        <div class="modal-dialog modal_w">
            <div class="modal-content modal-card">
                <div class="modal-header d-flex align-items-center">
                    <h5 class="modal-title" id="violationEntryFormLabel">Violation Entry</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pb-0" id="violationFormModalBody">
                    <div class="cotainer-fluid">
                        <div class="row d-flex justify-content-center">
                            <div class="form_title_div mt-4 mb-4">
                                <p class="DSAS_txt">DEPARTMENT OF STUDENT AFFAIRS AND SERVICES</p>
                                <p class="SDU_txt">STUDENT DISCIPLINE UNIT</p>
                                <p class="violation_form_txt">VIOLATION FORM</p>
                            </div>
                        </div>
                        <div id="studentDetails">
                            
                            {{ csrf_field() }}
                        </div>
                    {{--                             
                        <div class="row d-flex justify-content-center mt-0">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div id="studentDetails" class="card-body student_details_card d-flex justify-content-start px-4">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card-body student_offenses_card">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <p class="offense_title">MINOR OFFENSES</p>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="" class="custom-control-input circle_cb" id="mv1">
                                                    <label class="custom-control-label cb_label" for="mv1">Violation of Dress Code</label> 
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="" class="custom-control-input circle_cb" id="mv2">
                                                    <label class="custom-control-label cb_label" for="mv2">Not Wearing the Prescribed Uniform</label> 
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="" class="custom-control-input circle_cb" id="mv3">
                                                    <label class="custom-control-label cb_label" for="mv3">Not Wearing an ID</label> 
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="" class="custom-control-input circle_cb" id="mv4">
                                                    <label class="custom-control-label cb_label" for="mv4">Littering</label> 
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="" class="custom-control-input circle_cb" id="mv5">
                                                    <label class="custom-control-label cb_label" for="mv5">Using Cellular Phones and Other E-Gadgets while having a class</label> 
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="" class="custom-control-input circle_cb" id="mv6">
                                                    <label class="custom-control-label cb_label" for="mv6">Body Piercing</label> 
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="" class="custom-control-input circle_cb" id="mv7">
                                                    <label class="custom-control-label cb_label" for="mv7">Indicent Public Display of Affection</label> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <p class="offense_title">LESS SERIOUS OFFENSES</p>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="" class="custom-control-input circle_cb" id="lv1">
                                                    <label class="custom-control-label cb_label" for="lv1">Wearing Somebody Elses ID</label> 
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="" class="custom-control-input circle_cb" id="lv2">
                                                    <label class="custom-control-label cb_label" for="lv2">Wearing tampered/Unauthorized ID</label> 
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="" class="custom-control-input circle_cb" id="lv3">
                                                    <label class="custom-control-label cb_label" for="lv3">Lending his/Her ID</label> 
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" name="" class="custom-control-input circle_cb" id="lv4">
                                                    <label class="custom-control-label cb_label" for="lv4">Smoking or Possession of Smoking Paraphernalia</label> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="ov" class="offense_title">Others</label>
                                                <textarea class="form-control" id="ov" rows="4"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <p class="recorded_by_txt"><i class="nc-icon nc-alert-circle-i mr-1 font-weight-bold"></i> Recorded by: <span class="font-weight-bold ml-1 text-secondary">{{ auth()->user()->user_role }} {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</span> </p>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <p class="recorded_date_txt"><i class="nc-icon nc-calendar-60 mr-1 font-weight-bold"></i> January 20, 2020 <span class="font-weight-bold ml-1 text-secondary">10:41 PM</span> </p>
                            </div>
                        </div>
                    --}}
                    </div>
                </div>
                <div class="modal-footer pt-0 d-block">
                    <div class="row mt-2">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <p class="recorded_by_txt"><i class="nc-icon nc-tap-01 mr-1 font-weight-bold"></i> {{ auth()->user()->user_role }}: <span class="font-weight-bold ml-1 text-secondary"> {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</span> </p>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-lg-12 col-md-12 col-sm-12 pl-0">
                            <p class="recorded_date_txt"><i class="nc-icon nc-calendar-60 mr-1 font-weight-bold"></i> January 20, 2020 <span class="font-weight-bold ml-1 text-secondary">10:41 PM</span> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-xl" id="violationEntryFormModal" tabindex="-1" role="dialog" aria-labelledby="violationEntryFormModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-content modal-card">
                    <div class="modal-header d-flex align-items-center">
                        <h5 class="modal-title" id="violationEntryFormModalLabel">Violation Entry</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('violation_entry.record')}}" name="vform" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                        <div id="violationEntryFormModalBody">

                        </div>
                    </form>
                    {{-- <div class="modal-body" id="violationFormModalBody">
                        <div class="cotainer-fluid">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="card h-100 shadow">
                                                <div class="img_card">
                                                    <img class="card-img-top" src="storage/students_images/desierto.png" alt="Card image cap">
                                                </div>
                                                <div class="card-body student_details_div_modal text-center">
                                                    <p class="student_id_txt_modal">20150348</p>
                                                    <p class="student_name_txt_modal">Mitch Frankein O. Desierto</p>
                                                    <p class="student_details_txt_modal">BSIT-4A | SBCS</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="card-body violation_date shadow">
                                                <p><i class="nc-icon nc-single-02 mr-1 font-weight-bold"></i> <span class="font-weight-bold font-italic">{{ auth()->user()->user_role }}</span>: {{ auth()->user()->user_first_name }} {{ auth()->user()->user_last_name }}</p>
                                                <p><i class="nc-icon nc-calendar-60 mr-1 font-weight-bold"></i> <span class="font-weight-bold">January 01, 2021</span> <span class="text-lighter">|</span> 10:01 AM</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-12 pl-0">
                                    <div class="card-body offenses_div">
                                        <div class="row">
                                            <div class="col-12 form_title_div">
                                                <p class="DSAS_txt">DEPARTMENT OF STUDENT AFFAIRS AND SERVICES</p>
                                                <p class="SDU_txt">STUDENT DISCIPLINE UNIT</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="card-body student_offenses_card h-100">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <p class="offense_title">MINOR OFFENSES</p>
                                                            <div class="form-group">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" name="offenses[]" value="Violation of Dress Code" class="custom-control-input circle_cb" id="mv1">
                                                                    <label class="custom-control-label cb_label" for="mv1">Violation of Dress Code</label> 
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" name="offenses[]" value="Not Wearing the Prescribed Uniform" class="custom-control-input circle_cb" id="mv2">
                                                                    <label class="custom-control-label cb_label" for="mv2">Not Wearing the Prescribed Uniform</label> 
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" name="offenses[]" value="Not Wearing an ID" class="custom-control-input circle_cb" id="mv3">
                                                                    <label class="custom-control-label cb_label" for="mv3">Not Wearing an ID</label> 
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" name="offenses[]" value="Littering" class="custom-control-input circle_cb" id="mv4">
                                                                    <label class="custom-control-label cb_label" for="mv4">Littering</label> 
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" name="offenses[]" value="Using Cellular Phones and Other E-Gadgets while having a class" class="custom-control-input circle_cb" id="mv5">
                                                                    <label class="custom-control-label cb_label" for="mv5">Using Cellular Phones and Other E-Gadgets while having a class</label> 
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" name="offenses[]" value="Body Piercing" class="custom-control-input circle_cb" id="mv6">
                                                                    <label class="custom-control-label cb_label" for="mv6">Body Piercing</label> 
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" name="offenses[]" value="Indicent Public Display of Affection" class="custom-control-input circle_cb" id="mv7">
                                                                    <label class="custom-control-label cb_label" for="mv7">Indicent Public Display of Affection</label> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 pl-0">
                                                <div class="card-body student_offenses_card h-100">
                                                    <p class="offense_title">LESS SERIOUS OFFENSES</p>
                                                    <div class="form-group">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="offenses[]" value="Wearing Somebody Elses ID" class="custom-control-input circle_cb" id="lv1">
                                                            <label class="custom-control-label cb_label" for="lv1">Wearing Somebody Elses ID</label> 
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="offenses[]" value="Wearing tampered/Unauthorized ID" class="custom-control-input circle_cb" id="lv2">
                                                            <label class="custom-control-label cb_label" for="lv2">Wearing tampered/Unauthorized ID</label> 
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="offenses[]" value="Lending his/Her ID" class="custom-control-input circle_cb" id="lv3">
                                                            <label class="custom-control-label cb_label" for="lv3">Lending his/Her ID</label> 
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" name="offenses[]" value="Smoking or Possession of Smoking Paraphernalia" class="custom-control-input circle_cb" id="lv4">
                                                            <label class="custom-control-label cb_label" for="lv4">Smoking or Possession of Smoking Paraphernalia</label> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row d-flex mt-3 d-flex align-items-end">
                                            <div class="col-lg-8 col-md-8 col-sm-12">
                                                <div class="card-body student_offenses_card pb-1">
                                                    <div class="form-group">
                                                        <label for="ov" class="offense_title">Others</label>
                                                        <textarea class="form-control other_offense_txt_area" id="ov" rows="3"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-12 pl-0">
                                                <button type="submit" class="btn btn-sdca btn-round shadow btn-block v_btn"><i class="nc-icon nc-share-66 mr-2"></i>Record Violation</button> 
                                                <button type="button" class="btn btn-sdca-blue btn-round shadow btn-block v_btn" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
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

    <script>
        // process autocomplete search
        $(document).ready(function(){
            $('#search_student').keyup(function(){ 
                var query = $(this).val();
                if(query != '')
                {
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url:"{{ route('violation_entry.fetch') }}",
                        method:"GET",
                        data:{query:query, _token:_token},
                            success:function(data){
                                $('#studentsList').fadeIn();  
                                $('#studentsList').html(data);
                        }
                    });
                }else{
                    $('#studentsList').fadeOut();  
                }
            });
            // result on click - display in input
                // $(document).on('click', 'li', function(){  
                //     $('#search_student').val($(this).text());  
                //     $('#studentsList').fadeOut();  
                // });  
        });
    </script>

    <script>
        // get student_id and display students details on Violation Form Modal
        function violationForm(student_id){
            $.ajax({
                url:"{{ route('violation_entry.form') }}",
                method:"GET",
                data:{student_id:student_id},
                    success:function(data){
                        $('#violationEntryFormModal').modal('show');
                        $('#violationEntryFormModalBody').html(data);
                    }
            });
        };
    </script>

    <script>
        var maxField = 5;
        var x = 1;
        function addNewInputField(){
            if(x < maxField){ 
                x++;
                $('#field_wrapper').append('<div class="input-group mb-0 mt-2" id="addedInputField"><input type="text" name="other_offenses[]" id="hasText" onkeyup="manage(this)" class="form-control" placeholder="Type Other Offenses Here..." /><div class="input-group-append"><button id="removeInputField" type="button" class="btn btn-sdca m-0"><i class="nc-icon nc-simple-remove mr-2"></i>Remove</button></div></div>');
            }
            $('#field_wrapper').on('click', '#removeInputField', function(e){
                e.preventDefault();
                $(this).closest('#addedInputField').remove();
                x--;
            });
        }
        // $(document).ready(function(){ 
            //     var maxField = 5;
            //     var x = 1;

            //     $('#addNewInputField_button').click(function(){
            //         console.log('wow');
            //         if(x < maxField){ 
            //             x++;
            //             $('#field_wrapper').append('<div class="input-group mt-2"><input type="text" name="other_offenses[]" class="form-control" placeholder="Type Other Offenses Here..." /><div class="input-group-append"><button type="button" class="btn btn-sdca m-0" id="removeInputField_button"><i class="nc-icon nc-simple-remove mr-2"></i>Remove</button></div></div>');
            //         }
            //     });
                
            //     $('#field_wrapper').on('click', '.remove_button', function(e){
            //         e.preventDefault();
            //         $(this).parent('div').remove();
            //         x--;
            //     });
            // });
    </script>

    <script>
        function manage(hasText) {
            if (hasText.value != '') {
                document.getElementById("recordBtn").removeAttribute("disabled");
            }
            else {
                document.getElementById("recordBtn").setAttribute("disabled", "disabled");
            }
        }   
    </script>

    <script>
        function check() {
            var obj;
            var count = 0;
            // var record = document.getElementById('recordBtn')[0];
                for (var i=0; i<vform.elements.length; i++) {
                    obj = vform.elements[i];
                    if (obj.type == "checkbox" && obj.checked) {
                        count++;
                    }
                }
            if(count==0){
                document.getElementById("recordBtn").setAttribute("disabled", "disabled");
            }
            if(count==1){
                document.getElementById("recordBtn").removeAttribute("disabled");
            }
            if(count>1){
                document.getElementById("recordBtn").removeAttribute("disabled");
            }
        }
    </script>

@endpush