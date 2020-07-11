<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Students;
use App\Violation;
use App\Users;
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

    public function student_records($student_id){
        // $student = DB::table('students_tbl')
        //     ->join('violations_tbl', 'violations_tbl.student_id', '=', 'students_tbl.student_id')
        //     ->where('violations_tbl.student_id', '=', $student_id)
        //     ->first();

        $student_id = $student_id;
        $student    = Students::where('student_id', $student_id)->first();
        $offenses   = Violation::where('student_id', $student_id)->get();
        $user       = DB::table('violations_tbl')->join('users_tbl', 'users_tbl.id', '=', 'violations_tbl.user_id')
                        ->first();

        if($student === null){
            return view("violation_records.student_records")->with(compact('student', 'student_id', 'offenses', 'user'));
        }

        return view("violation_records.student_records")->with(compact('student', 'offenses', 'user'));
    }
}
