<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
//use App\Models\Income;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class IncomeController extends Controller
{
    public function __construct(){
        $this ->middleware('auth');
    }

    public function index(){
         return view ('admin.income.main.all');
    }

    public function add(){
        return view ('admin.income.main.add');
    }

    public function edit(){
        
    }

    public function view(){
        
    }

    public function insert(){
        
    }

    public function update(){
        
    }

    public function softdelete(){
       
    }

    public function restore(){
       
    }

    public function delete(){
       
    }

}
