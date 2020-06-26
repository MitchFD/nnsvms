<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Students;
use App\Violation;
use DB;
use DataTables;

class ViolationRecordsController extends Controller
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
        // get all violation records: join violations_tbl and students_tbl
        $violations = DB::table('violations_tbl')->join('students_tbl', 'students_tbl.student_id', '=', 'violations_tbl.student_id')
            ->orderBy('created_at', 'desc')->paginate(10);

        return view("violation_records.index")->with('violations', $violations);
    }

    public function student($student_id){
        // get all student's violation records
        $student = Students::where('student_id', $student_id)->first();
        $offenses = Violation::where('student_id', $student_id)->get();

        return view("violation_records.student")->with('student', $student);
    }
}
