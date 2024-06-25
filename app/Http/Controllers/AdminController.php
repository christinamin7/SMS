<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreadminRequest;
use App\Http\Requests\UpdateadminRequest;
use App\Models\User;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->role>0){
            return back();
        }        
        $admins=User::where('role','0')->latest()->paginate(10);     
        return view('admin.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Auth::user()->role>0){
            return back();
        }
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreadminRequest $request)
    {
        $admin=new User();
        $request->validate([   
            'name'=>'required',
            'email'=>'required |unique:users,email',
            'phone'=>'required',
            'date_of_birth'=>'required',
            'gender'=>'required',
            'address'=>'required',
            'profile'=>'required'

        ]); 
        if($request->profile){
            $file=$request->profile;
            $newName='admin_'.uniqid().".".$file->extension();
            $file->storeAs('public/admin',$newName);
        }      
        $admin->name=$request->name;
        $admin->email=$request->email;
        $admin->phone=$request->phone;
        $admin->date_of_birth=$request->date_of_birth;
        $admin->gender=$request->gender;
        $admin->address=$request->address;
        $admin->profile=$newName;
        $admin->role='0';
        $admin->save();

        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $admin=User::FindOrFail($id);       
        return view('admin.edit',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateadminRequest $request, $id)
    {
        $admin=User::FindOrFail($id);     
        if($request->profile){
            $file=$request->profile;
            $newName='admin_'.uniqid().".".$file->extension();
            $file->storeAs('public/admin',$newName);
            $admin->profile=$newName;       
        }             
        $admin->name=$request->name;
        $admin->email=$request->email;
        $admin->phone=$request->phone;
        $admin->date_of_birth=$request->date_of_birth;
        $admin->gender=$request->gender;
        $admin->address=$request->address;       
        $admin->update();       
        return redirect()->route('admin.index');
    

    /**
     * Remove the specified resource from storage.
     */
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user=User::FindOrFail($id);
        if($user){
         $user->delete();
        }
        return redirect()->route('admin.index');
    }
}
