<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Exports\IncomeExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Income;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class IncomeController extends Controller
{
    public function __construct(){
        $this ->middleware('auth');
        $this->middleware('admin');
    }

    public function index(){
        $all=Income::where('income_status',1)->orderBy('income_date','DESC')->get(); //paginate(2);
        return view('admin.income.main.all',compact('all'));
    }

    public function add(){
        return view('admin.income.main.add');
    }

    public function edit($slug){
        $data=Income::where('income_status',1)->where('income_slug',$slug)->firstOrFail();
        return view('admin.income.main.edit',compact('data'));
        
    }

    public function view($slug){
        $data=Income::where('income_status',1)->where('income_slug',$slug)->firstOrFail();
        return view('admin.income.main.view',compact('data'));       
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

    public function update(Request $request){
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
            $id=$request['id'];
            $slug=$request['slug'];
            $editor=Auth::user()->id;
    
            $update=Income::where('income_status',1)->where('income_id',$id)->update([
                'income_title'=>$request->title,
                'incate_id'=>$request['category'],
                'income_amount'=>$request['amount'],
                'income_date'=>$request['date'],
                'income_editor'=>$editor,
                'income_slug'=>$slug,
                'updated_at'=>Carbon::now()->toDateTimeString(),
            ]);
    
            if($update){
                Session::flash('success','Successfully update income.');
                return redirect('dashboard/income/view/'.$slug);
            }else{
                Session::flash('error','Opps operation failed.');
                return redirect('dashboard/income/edit/'.$slug);
            }
    }

    public function softdelete(){
        $id=$_POST['modal_id'];
        $soft=Income::where('income_status',1)->where('income_id',$id)->update([
            'income_status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($soft){
            Session::flash('success','Successfully Deleted income.');
            return redirect('dashboard/income');
        }else{
            Session::flash('error','Opps operation failed.');
            return redirect('dashboard/income');
        }
    }

    public function restore(){
        $id=$_POST['modal_id'];
        $restore=Income::where('income_status',0)->where('income_id',$id)->update([
            'income_status'=>1,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if($restore){
            Session::flash('success','Successfully restore income.');
            return redirect('dashboard/recycle/income');
        }else{
            Session::flash('error','Opps operation failed.');
            return redirect('dashboard/recycle/income');
        }
    }

    public function delete(){
        $id=$_POST['modal_id'];
        $delete=Income::where('income_status',0)->where('income_id',$id)->delete([]);

        if($delete){
            Session::flash('success','Successfully Permanently Deleted income.');
            return redirect('dashboard/recycle/income');
        }else{
            Session::flash('error','Opps operation failed.');
            return redirect('dashboard/recycle/income');
        }
    }

    
    public function pdf(){
        $all=Income::where('income_status',1)->orderBy('income_date','DESC')->get();
        $pdf = PDF::loadView('admin.income.main.pdf',compact('all'));
        return $pdf->download('income_'.time().'.pdf');
    }

    public function excel(){
        return Excel::download(new IncomeExport, 'income.xlsx');
    }
}
