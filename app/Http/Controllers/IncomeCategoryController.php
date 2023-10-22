<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\IncomeCategory;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Session\Session;

use Illuminate\Support\Facades\Auth;

class IncomeCategoryController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
         $allData=IncomeCategory::where('incate_status', 1)->orderBY('incate_id','DESC')->get();
         return view('admin.income.category.all',compact('allData'));
    }
    public function add(){
        return view('admin.income.category.add');
         
    }
    public function edit(){
        return view('admin.income.category.edit');
        
    }
    public function view(){
        return view('admin.income.category.view');
        
    }
    public function insert(Request $request){
        $this->validate($request,[
        'name'=>'required|max:50|unique:income_categories,incate_name'
        ],[
        'name.required'=>'Please enter income category name.'
        ]);

      //$slug='IC'.uniqid(20);
        $slug = Str::slug($request->name, '-');
        $creator=Auth::user()->id;
      
        $insert=IncomeCategory::insert([
            'incate_name'=>$request->name,
            'incate_remarks'=>$request->remarks,
            'incate_creator'=>$creator,
            'incate_slug'=>$slug,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($insert){
            Session::flash('success','Succesfully added income category.');
           return redirect('dashboard/income/category/add');
        }else{
            Session::flash('error','Opps operation failed.');
            return redirect('dashboard/income/category/add');
           
        }
       
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
