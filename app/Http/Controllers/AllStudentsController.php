<?php

namespace App\Http\Controllers;

use App\Student;
use Input;
use Illuminate\Http\Request;

class AllStudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Student::latest()->get();
        return view('allstudents', compact('users'));
    }
}
