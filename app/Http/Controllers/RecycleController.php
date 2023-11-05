<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Session;
use Illuminate\Support\Facades\Auth;

class RecycleController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        
    }
    public function user(){
        
    }
    public function income(){
        return view('admin.recycle.income');
    }
    public function income_category(){
        return view('admin.recycle.income-category');
    }
}
