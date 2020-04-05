<?php
use App\Fee;
use App\Student;
use Illuminate\Support\Facades\Input;

Route::get('/', 'HomeController@index')->name('index');


Route::resource('student', 'StudentController')->except(['index']);
Route::resource('fee', 'FeeController');
Route::resource('allstudents', 'AllStudentsController');

Route::any ( '/search', function () {
    $q = Input::get ( 'q' );
    $stfee = Student::where ( 'name', 'LIKE', '%' . $q . '%' )->orWhere ( 'dob', 'LIKE', '%' . $q . '%' )->get ();
    if (count ( $stfee ) > 0)
        return view ( 'fee.search' )->withDetails ( $stfee )->withQuery ( $q );
    else
        return view ( 'fee.search' )->withMessage ( 'No Details found. Try to search again !' );
} );
