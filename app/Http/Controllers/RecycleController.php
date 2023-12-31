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
        return view('admin.recycle.all');
    }
    public function user(){
        return view('admin.recycle.user');
    }
    public function income(){
        return view('admin.recycle.income');
    }
    public function income_category(){
        return view('admin.recycle.income-category');
    }
    public function expense(){
        return view('admin.recycle.expense');
    }
    public function expense_category(){
        return view('admin.recycle.expense-category');
    }
}
