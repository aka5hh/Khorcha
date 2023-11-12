<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('superadmin');
        $this->middleware('admin');
    }

    public function index(){
        $all=User::where('status',1)->orderBy('id','DESC')->get();
        return view('admin.user.all',compact('all'));
    }

    public function add(){
        return view('admin.user.add');
    }

    public function edit($slug)
    {
        $data = User::where('status',1)->where('slug',$slug)->firstOrfail();
        return view('admin.user.edit',compact('data'));
    }
    public function view($slug)
    {
        $data = User::where('status',1)->where('slug',$slug)->firstOrfail();
        return view('admin.user.view',compact('data'));
    }

    public function insert(Request $request){
        $this->validate($request,[
            'name'=>'required|max:50',
            'email'=>'required|email|max:50|unique:users',
            'username'=>'required',
            'password'=>'required|min:8',
            'confirm_password'=>'required_with:password|same:password',
            'role'=>'required',

            ],[
            'name.required'=>'Please enter name.',
            'email.required'=>'Please select user email.',
            'username.required'=>'Please enter username.',
            'password.required'=>'Please enter password.',
            'confirm_password.required'=>'Please enter confirm password.',
            'role.required'=>'Please select role.',
            ]);

            $slug='U'.uniqid('20');

            $insert=User::insertGetId([
                'name'=>$request['name'],
                'phone'=>$request['phone'],
                'email'=>$request['email'],
                'username'=>$request['username'],
                'password'=>Hash::make($request['username']),
                'role'=>$request['role'],
                'slug'=>$slug,
                'created_at'=>Carbon::now()->toDateTimeString(),
                
            ]);

            if($insert){
                Session::flash('success','Successfully Registered User.');
               return redirect('dashboard/user/add');
            }else{
                Session::flash('error','Opps operation failed.');
                return redirect('dashboard/user/add');
            }
    }

    public function update(Request $request){
        $this->validate($request,[
            'name'=>'required|max:50',
            'email'=>'required|email|max:50|unique:users',
            'username'=>'required',
            'password'=>'required|min:8',
            'confirm_password'=>'required_with:password|same:password',
            'role'=>'required',

            ],[
            'name.required'=>'Please enter name.',
            'email.required'=>'Please select user email.',
            'username.required'=>'Please enter username.',
            'password.required'=>'Please enter password.',
            'confirm_password.required'=>'Please enter confirm password.',
            'role.required'=>'Please select role.',
            ]);
            $id=$request['id'];
            $slug=$request['slug'];
            $editor=Auth::user()->id;

            $update=User::where('status',1)->where('id',$id)->update([
                'name'=>$request['name'],
                'phone'=>$request['phone'],
                'email'=>$request['email'],
                'username'=>$request['username'],
                'password'=>Hash::make($request['username']),
                'role'=>$request['role'],
                'slug'=>$slug,
                'updated_at'=>Carbon::now()->toDateTimeString(),
                
            ]);

            if($update){
                Session::flash('success','Successfully Updated User Information.');
               return redirect('dashboard/user/add'.$slug);
            }else{
                Session::flash('error','Opps operation failed.');
                return redirect('dashboard/user/add'.$slug);
            }
    }

    public function softdelete(){
       
    }

    public function restore(){
       
    }

    public function delete(){
        return view('admin.user.delete');
    }

}
