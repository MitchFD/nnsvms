<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Students;
use App\Violation;
use Illuminate\Support\Facades\Auth;

class SanctionController extends Controller
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

    function save(Request $request)
    {
        return back()->withStatus(__('Sanction/s Recorded Successfully.'));
    }
}
