<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        return redirect('dashboard');
    }

    public function summary(){
        return view('admin.report.summary');
    }

}
