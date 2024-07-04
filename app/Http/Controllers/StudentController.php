<?php

namespace App\Http\Controllers;

use App\Models\student;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorestudentRequest;
use App\Http\Requests\UpdatestudentRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students=User::where('role','2')->latest()->paginate(10);     
       return view('student.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorestudentRequest $request)
        {
        $student=new User();
        $request->validate([   
            'name'=>'required',
            'email'=>'required |unique:users,email',
            'phone'=>'password',
            'phone'=>'required',
            'date_of_birth'=>'required',
            'gender'=>'required',
            'address'=>'required',
            'profile'=>'required'

        ]); 
        if($request->profile){
            $file=$request->profile;
            $newName='student_'.uniqid().".".$file->extension();
            $file->storeAs('public/student',$newName);
        }      
        $student->name=$request->name;
        $student->email=$request->email;
        $student->password=Hash::make($request->password);
        $student->phone=$request->phone;
        $student->date_of_birth=$request->date_of_birth;
        $student->gender=$request->gender;
        $student->address=$request->address;
        // $student->skills=$request->skills;
        // $student->is_fullstack=$request->is_fullstack;
        $student->profile=$newName;
        $student->role='2';
        $student->save();

        return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $student=User::FindOrFail($id);       
        return view('student.edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatestudentRequest $request,$id)
    {
        $teacher=User::FindOrFail($id);     
        if($request->profile){
            $file=$request->profile;
            $newName='student_'.uniqid().".".$file->extension();
            $file->storeAs('public/student',$newName);
            $teacher->profile=$newName;       
        }             
        $teacher->name=$request->name;
        $teacher->email=$request->email;
        $teacher->phone=$request->phone;
        $teacher->date_of_birth=$request->date_of_birth;
        $teacher->gender=$request->gender;
        $teacher->address=$request->address;       
        $teacher->update();       
        return redirect()->route('student.index');
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
      return redirect()->route('student.index');
 
    }
}
