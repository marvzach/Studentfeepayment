<?php

namespace App\Http\Controllers;

use App\Fee;
use App\Student;
use Input;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class StudentController extends Controller
{
  
    public function index()
    {
        //
    }
    public function create()
    {
        return view('students');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string'
        ]);

        $user = new Student();
        $user->name = $request->name;
        $user->studentnumber = $request->studentnumber;
        $user->dob = $request->dob;
        $user->address = $request->address;
        $user->save();

        Toastr::success('User successfully saved...', 'Success');
        return back();
    }
    public function show($id)
    {
        $user = Student::findOrFail($id);
        return view('show', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'studentnumber' => 'studentnumber',
            'dob' => 'required',
            'address' => 'required|string'
        ]);

        $user = Student::findOrFail($id);
        $user->name = $request->name;
        $user->studentnumber = $request->studentnumber;
        $user->dob = $request->dob;
        $user->address = $request->address;
        $user->save();

        Toastr::success('User successfully updated...', 'Success');
        return redirect(route('index'));
    }
    public function destroy($id)
    {
        $user = Student::findOrFail($id);
        $user->delete();
        $fee = Fee::findOrFail($id);
        $user->fees()->delete($fee);
        $fee->delete();

        Toastr::success('User successfully deleted...', 'Success');
        return back();
    }
}
