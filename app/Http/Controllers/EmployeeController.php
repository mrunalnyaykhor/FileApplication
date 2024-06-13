<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //
    protected $employee;
    public function __construct(){
        $this->employee = new Employee();
    }
    public function employee()
    {
        return view("auth.employee");

    }

    // public function store(Request $request){
    //     $request->validate([
    //         'name' => 'required|string',
    //         'email' => 'required|email',
    //         'address' => 'required|string',
    //         'mobilenumber' => 'required|string',
    //         'salary'=>'required|string',
    //     ]);
    //  $employee = new Employee();
    //  $employee->name = $request->name;
    //  $employee->email= $request->email;
    //  $employee->password=$request->password;
    //  $employee->mobilenumber=$request->mobilenumber;
    //  $employee->address=$request->address;
    //  $employee->salary=$request->salary;

    //  $employee->save();
    //  if($employee){


    //     return "success";
    // }else

    // return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong!'));

    // }
    public function store(Request $request){

     $employee = new Employee();
     $employee->name = $request->name;
     $employee->email= $request->email;
     $employee->password=$request->password;
     $employee->mobilenumber=$request->mobilenumber;
     $employee->address=$request->address;
     $employee->salary=$request->salary;

     $employee->save();
     if($employee){
        return "success";
    }else

    return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong!'));

    }
}
