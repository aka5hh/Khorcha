<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Expense;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class ExpenseController extends Controller
{
    public function __construct(){
        $this ->middleware('auth');
    }

    public function index(){
        $all=Expense::where('expense_status',1)->orderBy('expense_date','DESC')->get();
        return view('admin.expense.main.all', compact('all'));        
    }

    public function add(){
        return view('admin.expense.main.add');
    }

    public function edit($slug){
        $data=Expense::where('expense_status',1)->where('expense_slug',$slug)->firstOrFail();
        return view('admin.expense.main.edit',compact('data'));
        
    }

    public function view($slug){
        $data=Expense::where('expense_status',1)->where('expense_slug',$slug)->firstOrFail();
        return view('admin.expense.main.view',compact('data'));
    }
    
    public function insert(Request $request){
        $this->validate($request,[
            'title'=>'required|max:100',
            'category'=>'required',
            'amount'=>'required',
            'date'=>'required',

            ],[
            'title.required'=>'Please enter expense title.',
            'category.required'=>'Please select expense category.',
            'amount.required'=>'Please select expense amount.',
            'date.required'=>'Please select expense date.'
            ]);
    
            //$slug = Str::slug($request->name, '-');
            $slug='I'.uniqid(20);
            $creator=Auth::user()->id;
    
            $insert=Expense::insert([
                'expense_title'=>$request->title,
                'expcate_id'=>$request['category'],
                'expense_amount'=>$request['amount'],
                'expense_date'=>$request['date'],
                'expense_creator'=>$creator,
                'expense_slug'=>$slug,
                'created_at'=>Carbon::now()->toDateTimeString(),
            ]);
    
            if($insert){
                Session::flash('success','Successfully added expense.');
               return redirect('dashboard/expense/add');
            }else{
                Session::flash('error','Opps operation failed.');
                return redirect('dashboard/expense/add');
            }
    }

    public function update(Request $request){
        $this->validate($request,[
            'title'=>'required|max:100',
            'category'=>'required',
            'amount'=>'required',
            'date'=>'required',

            ],[
            'title.required'=>'Please enter expense title.',
            'category.required'=>'Please select expense category.',
            'amount.required'=>'Please select expense amount.',
            'date.required'=>'Please select expense date.'
            ]);
    
            //$slug = Str::slug($request->name, '-');
            $id=$request['id'];
            $slug=$request['slug'];
            $editor=Auth::user()->id;
    
            $update=Expense::where('expense_status',1)->where('expense_id',$id)->update([
                'expense_title'=>$request->title,
                'expcate_id'=>$request['category'],
                'expense_amount'=>$request['amount'],
                'expense_date'=>$request['date'],
                'expense_editor'=>$editor,
                'expense_slug'=>$slug,
                'updated_at'=>Carbon::now()->toDateTimeString(),
            ]);
    
            if($update){
                Session::flash('success','Successfully update expense.');
               return redirect('dashboard/expense/view/'.$slug);
            }else{
                Session::flash('error','Opps operation failed.');
                return redirect('dashboard/expense/edit/'.$slug);
            }
    }

    public function softdelete(){
        $id=$_POST['modal_id'];
        $soft=Expense::where('expense_status',1)->where('expense_id',$id)->update([
            'expense_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($soft){
            Session::flash('success','Successfully Deleted expense.');
           return redirect('dashboard/expense');
        }else{
            Session::flash('error','Opps operation failed.');
            return redirect('dashboard/expense');
        }
    }

    public function restore(){
        $id=$_POST['modal_id'];
        $restore=Expense::where('expense_status',0)->where('expense_id',$id)->update([
            'expense_status'=>1,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($restore){
            Session::flash('success','Successfully restore expense.');
           return redirect('dashboard/recycle/expense');
        }else{
            Session::flash('error','Opps operation failed.');
            return redirect('dashboard/recycle/expense');
        }
    }

    public function delete(){
        $id=$_POST['modal_id'];
        $delete=Expense::where('expense_status',0)->where('expense_id',$id)->delete([]);

        if($delete){
            Session::flash('success','Successfully Permanently Deleted expense.');
           return redirect('dashboard/recycle/expense');
        }else{
            Session::flash('error','Opps operation failed.');
            return redirect('dashboard/recycle/expense');
        }
    }

}

