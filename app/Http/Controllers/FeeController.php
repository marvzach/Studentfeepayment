<?php

namespace App\Http\Controllers;

use App\Fee;
use App\Student;
use Input;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class FeeController extends Controller
{
   
    public function index()
    {
        $fees = Fee::latest()->get();
        return view('fee.index', compact('fees'));
    }
    public function create()
    {
        $users = Student::all();
        return view('fee.fees', compact('users'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'amount' => 'required',
            'dop' => 'required',
            'user' => 'required'
        ]);

        $fee = new Fee();
        $fee->amount = $request->amount;
        $fee->dop = $request->dop;
        $fee->student_id = $request->user;
        $fee->save();

        Toastr::success('Fee successfully paid...', 'Success');
        return back();
    }
    public function show($id)
    {
        $fee = Fee::findOrFail($id);
        return view('fee.show', compact('fee'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'amount' => 'required',
            'dop' => 'required',
            'user' => 'required'
        ]);

        $fee = Fee::findOrFail($id);
        $fee->amount = $request->amount;
        $fee->dop = $request->dop;
        $fee->student_id = $request->user;
        $fee->save();

        Toastr::success('Fee successfully updated...', 'Success');
        return redirect(route('fee.index'));
    }
    public function destroy($id)
    {
        $fee = Fee::findOrFail($id);
        $fee->delete();

        Toastr::success('Fee successfully deleted...', 'Success');
        return back();
    }
}
