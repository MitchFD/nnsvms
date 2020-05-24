<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Students;

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

    //fetch student
    function fetch(Request $request)
    {
        if($request->get('query')){
            $query = $request->get('query');
            $data = Students::where('student_id', 'LIKE', "%{$query}%")
                        ->orWhere( 'last_name', 'LIKE', "%{$query}%")
                        ->orWhere('first_name', 'LIKE', "%{$query}%")
                        ->take(5)
                        ->get();

            $output = '<div class="list-group mt-3 ml-3">';         
                            foreach($data as $student){
                                $output .= '
                            <div class="row">
                                <div class="col-lg-8 col-md-12 col-sm-12" >
                                    <a href="#" data-toggle="modal" data-target="#violationEntryForm" class="list-group-item list-group-item-action d-flex justify-content-start text-decoration-none">
                                        <div class="student_image_div mr-3">
                                            <img class="student_img" src="../paper/img/students_images/default_student_image.jpg" alt="Student Image">
                                        </div>
                                        <div class="student_details_div">
                                            <p class="student_name_txt">'.$student->last_name.', '.$student->first_name.'</p>
                                            <p class="student_number_txt text-dark">'.$student->student_id.' <span class="text-muted"> | '.$student->course.'-'.$student->section.' | '.$student->school.' </span></p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                                    ';
                            }
            $output .= '</div>';
            echo $output;
        }
        
        // if($request->get('query')){
        //     $searchQuery = trim($request->query('query'));
        //     $requestData = ['student_id', 'last_name', 'first_name', 'course'];
        //     $students = Students::where(function($q) use($requestData, $searchQuery) {
        //     foreach ($requestData as $field)
        //         $q->orWhere($field, 'like', "%{$searchQuery}%");
        //     })->get();
        // }
    }
}
