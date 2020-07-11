<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Students;
use App\Violation;
use App\Useractivity;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ViolationRequest;
use Carbon\Carbon;

class ViolationEntryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display all the static pages when authenticated
     *
     * @param string 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view("violation_entry.index");
    }

    //fetch student to display for autocomplete search
    function fetch(Request $request)
    {
        if($request->get('query')){
            $query = $request->get('query');
            $data = Students::where('student_id', 'LIKE', "%{$query}%")
                        ->orWhere('student_last_name', 'LIKE', "%{$query}%")
                        ->orWhere('student_first_name', 'LIKE', "%{$query}%")
                        ->take(5)
                        ->get();

            $output = '<div class="list-group mt-2 ml-3 display_div">';
                if(count($data) > 0){
                    foreach($data as $student){
                        $output .= '
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-12 display_search_div">
                                    <a href="#" onclick="violationForm(this.id)"
                                        id="'.$student->student_id.'"
                                        class="violationFormStudent list-group-item list-group-item-action d-flex justify-content-start">
                                        <div class="student_image_div mr-3 shadow">
                                            <img class="student_img" src="storage/students_images/'.$student->student_image.'" alt="Student Image">
                                        </div>
                                        <div class="student_details_div">
                                            <p class="student_name_txt">'.$student->student_last_name.', '.$student->student_first_name.'</p>
                                            <p class="student_number_txt text-dark">'.$student->student_id.' <span class="text-muted"> | '.$student->student_course.'-'.$student->student_section.' | '.$student->student_school.' </span></p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        ';
                    }
                }else{
                    $output .= '
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-12 display_search_div no_result_found">
                                    <div class="list-group-item d-flex justify-content-start text-decoration-none">
                                        <p class="m-0">No Match Found for <span class="font-weight-bold"> '.$query.'</span></p>
                                    </div>
                                </div>
                            </div>
                                    ';
                }
                            // foreach($data as $student){
                            //     $output .= '
                            // <div class="row">
                            //     <div class="col-lg-4 col-md-6 col-sm-12 display_search_div">
                            //         <a href="#" onclick="violationForm(this.id)"
                            //             id="'.$student->student_id.'"
                            //             class="shadow-sm violationFormStudent list-group-item list-group-item-action d-flex justify-content-start text-decoration-none">
                            //             <div class="student_image_div mr-3">
                            //                 <img class="student_img" src="storage/students_images/'.$student->student_image.'" alt="Student Image">
                            //             </div>
                            //             <div class="student_details_div">
                            //                 <p class="student_name_txt">'.$student->student_last_name.', '.$student->student_first_name.'</p>
                            //                 <p class="student_number_txt text-dark">'.$student->student_id.' <span class="text-muted"> | '.$student->student_course.'-'.$student->student_section.' | '.$student->student_school.' </span></p>
                            //             </div>
                            //         </a>
                            //     </div>
                            // </div>
                            //         ';
                            // }
            $output .= '</div>';
            echo $output;
        }
    }

    //open dynamic modal with student details and form submit violation
    function form(Request $request)
    {
        if($request->get('student_id')){
            $student_id = $request->get('student_id');
            $student = Students::where('student_id', $student_id)->first();

            $date = \Carbon\Carbon::now()->isoformat('MMMM D, YYYY');
            $time = \Carbon\Carbon::now()->setTimezone('Asia/Manila')->isoformat('h:mm A');
            
            
            // $output ='
                //     <form class="col-md-12 p-0" action="{{ route("violation_entry.record") }}" method="POST" enctype="multipart/form-data">
                //         <div class="row d-flex justify-content-center mt-0">
                //             <div class="col-lg-12 col-md-12 col-sm-12">
                //                 <div class="card-body student_details_card d-flex justify-content-start px-4">
                //                     <div class="student_img_div_modal mr-4">
                //                         <img class="student_img_modal" src="storage/students_images/'.$student->student_image.'" alt="">
                //                     </div>
                //                     <div class="student_details_div_modal">
                //                         <p class="student_id_txt_modal">'.$student->student_id.'</p>
                //                         <p class="student_name_txt_modal">'.$student->student_first_name.' '.$student->student_last_name.'</p>
                //                         <p class="student_details_txt_modal">'.$student->student_course.'-'.$student->student_section.' | '.$student->student_school.'</p>
                //                     </div>
                //                 </div>
                //             </div>
                //         </div>
                //         <div class="row mt-3">
                //             <div class="col-lg-12 col-md-12 col-sm-12">
                //                 <div class="card-body student_offenses_card">
                //                     <div class="row">
                //                         <div class="col-lg-12 col-md-12 col-sm-12">
                //                             <p class="offense_title">MINOR OFFENSES</p>
                //                             <div class="form-group">
                //                                 <div class="custom-control custom-checkbox">
                //                                     <input type="checkbox" name="offenses[]" value="Violation of Dress Code" class="custom-control-input circle_cb" id="mv1">
                //                                     <label class="custom-control-label cb_label" for="mv1">Violation of Dress Code</label> 
                //                                 </div>
                //                             </div>
                //                             <div class="form-group">
                //                                 <div class="custom-control custom-checkbox">
                //                                     <input type="checkbox" name="offenses[]" value="Not Wearing the Prescribed Uniform" class="custom-control-input circle_cb" id="mv2">
                //                                     <label class="custom-control-label cb_label" for="mv2">Not Wearing the Prescribed Uniform</label> 
                //                                 </div>
                //                             </div>
                //                             <div class="form-group">
                //                                 <div class="custom-control custom-checkbox">
                //                                     <input type="checkbox" name="offenses[]" value="Not Wearing an ID" class="custom-control-input circle_cb" id="mv3">
                //                                     <label class="custom-control-label cb_label" for="mv3">Not Wearing an ID</label> 
                //                                 </div>
                //                             </div>
                //                             <div class="form-group">
                //                                 <div class="custom-control custom-checkbox">
                //                                     <input type="checkbox" name="offenses[]" value="Littering" class="custom-control-input circle_cb" id="mv4">
                //                                     <label class="custom-control-label cb_label" for="mv4">Littering</label> 
                //                                 </div>
                //                             </div>
                //                             <div class="form-group">
                //                                 <div class="custom-control custom-checkbox">
                //                                     <input type="checkbox" name="offenses[]" value="Using Cellular Phones and Other E-Gadgets while having a class" class="custom-control-input circle_cb" id="mv5">
                //                                     <label class="custom-control-label cb_label" for="mv5">Using Cellular Phones and Other E-Gadgets while having a class</label> 
                //                                 </div>
                //                             </div>
                //                             <div class="form-group">
                //                                 <div class="custom-control custom-checkbox">
                //                                     <input type="checkbox" name="offenses[]" value="Body Piercing" class="custom-control-input circle_cb" id="mv6">
                //                                     <label class="custom-control-label cb_label" for="mv6">Body Piercing</label> 
                //                                 </div>
                //                             </div>
                //                             <div class="form-group">
                //                                 <div class="custom-control custom-checkbox">
                //                                     <input type="checkbox" name="offenses[]" value="Indicent Public Display of Affection" class="custom-control-input circle_cb" id="mv7">
                //                                     <label class="custom-control-label cb_label" for="mv7">Indicent Public Display of Affection</label> 
                //                                 </div>
                //                             </div>
                //                         </div>
                //                     </div>
                //                     <div class="row mt-3">
                //                         <div class="col-lg-12 col-md-12 col-sm-12">
                //                             <p class="offense_title">LESS SERIOUS OFFENSES</p>
                //                             <div class="form-group">
                //                                 <div class="custom-control custom-checkbox">
                //                                     <input type="checkbox" name="offenses[]" value="Wearing Somebody Elses ID" class="custom-control-input circle_cb" id="lv1">
                //                                     <label class="custom-control-label cb_label" for="lv1">Wearing Somebody Elses ID</label> 
                //                                 </div>
                //                             </div>
                //                             <div class="form-group">
                //                                 <div class="custom-control custom-checkbox">
                //                                     <input type="checkbox" name="offenses[]" value="Wearing tampered/Unauthorized ID" class="custom-control-input circle_cb" id="lv2">
                //                                     <label class="custom-control-label cb_label" for="lv2">Wearing tampered/Unauthorized ID</label> 
                //                                 </div>
                //                             </div>
                //                             <div class="form-group">
                //                                 <div class="custom-control custom-checkbox">
                //                                     <input type="checkbox" name="offenses[]" value="Lending his/Her ID" class="custom-control-input circle_cb" id="lv3">
                //                                     <label class="custom-control-label cb_label" for="lv3">Lending his/Her ID</label> 
                //                                 </div>
                //                             </div>
                //                             <div class="form-group">
                //                                 <div class="custom-control custom-checkbox">
                //                                     <input type="checkbox" name="offenses[]" value="Smoking or Possession of Smoking Paraphernalia" class="custom-control-input circle_cb" id="lv4">
                //                                     <label class="custom-control-label cb_label" for="lv4">Smoking or Possession of Smoking Paraphernalia</label> 
                //                                 </div>
                //                             </div>
                //                         </div>
                //                     </div>
                //                     <div class="row mt-3">
                //                         <div class="col-lg-12 col-md-12 col-sm-12">
                //                             <div class="form-group">
                //                                 <label for="ov" class="offense_title">Others</label>
                //                                 <textarea class="form-control" id="ov" rows="4"></textarea>
                //                             </div>
                //                         </div>
                //                     </div>
                //                 </div>
                //             </div>
                //         </div>
                //         <div class="row d-flex justify-content-center">
                //             <div class="card-body text-center">
                //                 <div class="btn-group">
                //                     <button type="button" class="btn btn-secondary btn-round shadow" data-dismiss="modal">Cancel</button>
                //                     <button type="submit" class="btn btn-info btn-round shadow"><i class="nc-icon nc-share-66 mr-2"></i>Record Violation</button>
                //                 </div>
                //             </div>                    
                //         </div>
                //     </form>
            // ';

            $output = '
                <div class="modal-body" id="violationFormModalBody">
                    <div class="cotainer-fluid">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="card h-100 shadow">
                                            <div class="img_card">
                                                <img class="card-img-top" src="storage/students_images/'.$student->student_image.'" alt="Card image cap">
                                            </div>
                                            <div class="card-body student_details_div_modal text-center">
                                                <p class="student_id_txt_modal">'.$student->student_id.'</p>
                                                <p class="student_name_txt_modal">'.$student->student_first_name.' '.$student->student_last_name.'</p>
                                                <p class="student_details_txt_modal">'.$student->student_course.'-'.$student->student_section.' | '.$student->student_school.'</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="card-body violation_date shadow">
                                            <p><i class="nc-icon nc-single-02 mr-1 font-weight-bold"></i> <span class="font-weight-bold">'.auth()->user()->user_role.':</span> '.auth()->user()->user_first_name.'  '.auth()->user()->user_last_name.'</p>
                                            <p><i class="nc-icon nc-calendar-60 mr-1 font-weight-bold"></i> <span class="font-weight-bold">'.$date.'</span> <span class="text-lighter">|</span> '.$time.'</p>
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
                                                    <p class="offense_title">MINOR OFFENSES</p>
                                                    <div class="form-group">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" onchange="check()" name="minor_offenses[]" value="Violation of Dress Code" class="enableRecordBtn custom-control-input" id="mv1">
                                                            <label class="custom-control-label cb_label" for="mv1">Violation of Dress Code</label> 
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" onchange="check()" name="minor_offenses[]" value="Not Wearing the Prescribed Uniform" class="enableRecordBtn custom-control-input" id="mv2">
                                                            <label class="custom-control-label cb_label" for="mv2">Not Wearing the Prescribed Uniform</label> 
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" onchange="check()" name="minor_offenses[]" value="Not Wearing an ID" class="enableRecordBtn custom-control-input" id="mv3">
                                                            <label class="custom-control-label cb_label" for="mv3">Not Wearing an ID</label> 
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" onchange="check()" name="minor_offenses[]" value="Littering" class="enableRecordBtn custom-control-input" id="mv4">
                                                            <label class="custom-control-label cb_label" for="mv4">Littering</label> 
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" onchange="check()" name="minor_offenses[]" value="Using Cellular Phones and Other E-Gadgets while having a class" class="enableRecordBtn custom-control-input" id="mv5">
                                                            <label class="custom-control-label cb_label" for="mv5">Using Cellular Phones and Other E-Gadgets while having a class</label> 
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" onchange="check()" name="minor_offenses[]" value="Body Piercing" class="enableRecordBtn custom-control-input" id="mv6">
                                                            <label class="custom-control-label cb_label" for="mv6">Body Piercing</label> 
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" onchange="check()" name="minor_offenses[]" value="Indicent Public Display of Affection" class="enableRecordBtn custom-control-input" id="mv7">
                                                            <label class="custom-control-label cb_label" for="mv7">Indecent Public Display of Affection</label> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 pl-0">
                                                <div class="card-body student_offenses_card h-100">
                                                    <p class="offense_title">LESS SERIOUS OFFENSES</p>
                                                    <div class="form-group">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" onchange="check()" name="less_serious_offenses[]" value="Wearing Somebody Elses ID" class="enableRecordBtn custom-control-input" id="lv1">
                                                            <label class="custom-control-label cb_label" for="lv1">Wearing Somebody Elses ID</label> 
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" onchange="check()" name="less_serious_offenses[]" value="Wearing tampered/Unauthorized ID" class="enableRecordBtn custom-control-input" id="lv2">
                                                            <label class="custom-control-label cb_label" for="lv2">Wearing tampered/Unauthorized ID</label> 
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" onchange="check()" name="less_serious_offenses[]" value="Lending his/Her ID" class="enableRecordBtn custom-control-input" id="lv3">
                                                            <label class="custom-control-label cb_label" for="lv3">Lending his/Her ID</label> 
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" onchange="check()" name="less_serious_offenses[]" value="Smoking or Possession of Smoking Paraphernalia" class="enableRecordBtn custom-control-input" id="lv4">
                                                            <label class="custom-control-label cb_label" for="lv4">Smoking or Possession of Smoking Paraphernalia</label> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="card-body student_offenses_card pb-1">
                                                    <label class="offense_title">Others</label>
                                                    <div class="input-group m-0" id="field_wrapper">
                                                        
                                                    </div>
                                                    <button onclick="addNewInputField()" type="button" class="btn btn-outline-sdca mt-2 mb-0"><i class="nc-icon nc-simple-add mr-2"></i>Add New Offense</button>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="student_id" value="'.$student->student_id.'" />
                                        <div class="row mt-2">
                                            <div class="col-lg-12 col-md-12 col-sm-12 d-flex justify-content-end btn-group">
                                                <button type="button" class="btn btn-svms-blue btn-round shadow v_btn" data-dismiss="modal">Cancel</button>
                                                <button type="submit" id="recordBtn" class="btn btn-sdca btn-round shadow v_btn" disabled><i class="nc-icon nc-share-66 mr-2"></i>Record Violation</button>
                                            </div>
                                        </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            ';
            echo $output;
        }
    }

    // record student's offenses
    function record(Request $request)
    {
        // $other_offenses = array();
        // $minor_offenses        = json_encode(request('minor_offenses'));
        // $less_serious_offenses = json_encode(request('less_serious_offenses'));
        // $other_offenses        = json_encode(request('other_offenses'));

        $minor_offenses        = request('minor_offenses');
        $less_serious_offenses = request('less_serious_offenses');
        $other_offenses        = request('other_offenses');

        if(!is_null($minor_offenses)){
            $count_minor_offense = count($minor_offenses);
        }else{
            $count_minor_offense = 0;
        }
        if(!is_null($less_serious_offenses)){
            $count_less_serious_offenses  = count($less_serious_offenses);
        }else{
            $count_less_serious_offenses = 0;
        }
        if(!is_null($other_offenses)){
            $count_other_offenses  = count($other_offenses);
        }else{
            $count_other_offenses = 0;
        }
        $offense_count = $count_minor_offense + $count_less_serious_offenses + $count_other_offenses;

        $date_now = Carbon::now()->setTimezone('Asia/Manila')->isoformat('D MMMM YYYY, dddd h:mm A');

        $violation = new Violation();
        $violation->created_at            = now();
        $violation->updated_at            = now();
        $violation->minor_offenses        = json_encode(request('minor_offenses'));
        $violation->less_serious_offenses = json_encode(request('less_serious_offenses'));
        $violation->other_offenses        = json_encode(request('other_offenses'));
        $violation->offense_count         = $offense_count;
        $violation->student_id            = request('student_id');
        $violation->user_id               = Auth::user()->id;
        $violation->save();

        // $activity = new Useractivity();
        // $activity->created_at       = now();
        // $activity->updated_at       = now();
        // $activity->user_id          = auth()-user()->id;
        // $activity->activity_type    = "VIOLATION ENTRY";
        // $activity->affected_key     = $offense_count;
        // $activity->save();

        return back()->withStatus(__('Violation Recorded Successfully.'));

        // dd($violation);
        // echo $violation;
    }
}