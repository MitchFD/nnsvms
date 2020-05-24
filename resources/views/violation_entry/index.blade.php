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
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <input type="text" name="search_student" id="search_student" class="form-control input-lg search_student_input px-4" placeholder="Search Student by student ID or names..." />
                    {{-- display fetch --}}
                    <div id="studentsList">

                    </div>
                    {{-- <div class="list-group mt-3 ml-4">
                        <div class="row">
                            <div class="col-lg-8 col-md-12 col-sm-12" >
                                <a href="#" class="list-group-item list-group-item-action d-flex justify-content-start text-decoration-none">
                                    <div class="student_image_div mr-3">
                                        <img class="student_img" src="storage/user_images/{{ auth()->user()->user_image }}" alt="">
                                    </div>
                                    <div class="student_details_div">
                                        <p class="student_name_txt">Desierto, Mitch Frankein O.</p>
                                        <p class="student_number_txt text-dark">20150348 <span class="text-muted"> | BSIT4A | SBCS </span></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div> --}}
                </div>
                {{ csrf_field() }}
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="violationEntryForm" tabindex="-1" role="dialog" aria-labelledby="violationEntryFormLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
        <div class="modal-content modal-card">
            <div class="modal-header d-flex align-items-center">
                <h5 class="modal-title" id="violationEntryFormLabel">Violation Entry</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="cotainer-fluid">
                    <div class="row d-flex justify-content-center">
                        <div class="form_title_div mt-4 mb-4">
                            <p class="DSAS_txt">DEPARTMENT OF STUDENT AFFAIRS AND SERVICES</p>
                            <p class="SDU_txt">STUDENT DISCIPLINE UNIT</p>
                            <p class="violation_form_txt">VIOLATION FORM</p>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card-body student_details_card d-flex justify-content-start px-4">
                                <div class="student_img_div_modal mr-4">
                                    <img class="student_img_modal" src="../paper/img/students_images/default_student_image.jpg" alt="">
                                </div>
                                <div class="student_details_div_modal">
                                    <p class="student_id_txt_modal">20150348</p>
                                    <p class="student_name_txt_modal">Mitch Frankein O. Desierto</p>
                                    <p class="student_details_txt_modal">BSIT-4A | SBCS</span></p>
                                    {{-- <p class="student_violation_count">4 Recorded Violations</span></p> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <p class="minor_offenses_txt">Minor Offenses</p>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="pda" class="custom-control-input circle_cb" id="minorViolation7">
                                    <label class="custom-control-label cb_label" for="minorViolation7">Indecent Public Display of Affection</label> 
                                </div>
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
@endpush