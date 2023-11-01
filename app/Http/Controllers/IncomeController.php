<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Income;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class IncomeController extends Controller
{
    public function __construct(){
        $this ->middleware('auth');
    }

    public function index(){
        $all=Income::where('income_status',1)->orderBy('income_id','DESC')->paginate(5);
         return view ('admin.income.main.all',compact('all'));
    }

    public function add(){
        return view ('admin.income.main.add');
    }

    public function edit(){
        return view ('admin.income.main.edit');
    }

    public function view(){
        return view ('admin.income.main.view');
    }

    public function insert(Request $request){
        $this->validate($request,[
            'title'=>'required|max:100',
            'category'=>'required',
            'amount'=>'required',
            'date'=>'required',

            ],[
            'title.required'=>'Please enter income title.',
            'category.required'=>'Please select income category.',
            'amount.required'=>'Please select income amount.',
            'date.required'=>'Please select income date.'
            ]);
    
            //$slug = Str::slug($request->name, '-');
            $slug='I'.uniqid(20);
            $creator=Auth::user()->id;
    
            $insert=Income::insert([
                'income_title'=>$request->title,
                'incate_id'=>$request['category'],
                'income_amount'=>$request['amount'],
                'income_date'=>$request['date'],
                'income_creator'=>$creator,
                'income_slug'=>$slug,
                'created_at'=>Carbon::now()->toDateTimeString(),
            ]);
    
            if($insert){
                Session::flash('success','Successfully added income.');
               return redirect('dashboard/income/add');
            }else{
                Session::flash('error','Opps operation failed.');
                return redirect('dashboard/income/add');
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
