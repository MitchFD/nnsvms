<?php

namespace App\Http\Controllers;

use App\Violation;
use Illuminate\Http\Request;

class DashboardController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // get all violation records from Violation Model
        $violation = Violation::all();
        return view('dashboard.index')->with('violation', $violation);
    }
}
