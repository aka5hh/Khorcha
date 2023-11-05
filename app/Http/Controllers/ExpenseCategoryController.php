<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\ExpenseCategory;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ExpenseCategoryController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $all=ExpenseCategory::where('expcate_status',1)->orderBy('expcate_id','DESC')->get();
         return view('admin.expense.category.all', compact('all'));
    }
    public function add(){
         
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
