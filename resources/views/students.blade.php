@extends('layouts.app')
@section('main-content')
    <div class="card">
        <div class="card-header bg-secondary">
            <h3 class="card-title">Add Student</h3>
            <a href="{{ route('index') }}" class="btn btn-primary float-right" style="margin-top: -40px;">Back</a>
        </div>
        <div class="card-body">
            <form action="{{ route('student.store') }}" method="post">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" placeholder="Name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Student No</label>
                    <div class="col-sm-10">
                        <input type="text" name="studentnumber" class="form-control" id="studentnumber" value="{{ old('studentnumber') }}" placeholder="Student No">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Date Of Birth</label>
                    <div class="col-sm-10">
                        <input type="date" name="dob" class="form-control" id="dob" value="{{ old('dob') }}" placeholder="Date Of Birth">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                        <input type="text" name="address" class="form-control" id="address" value="{{ old('address') }}" placeholder="Address">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            <form/>
        </div>
    </div>
@endsection
