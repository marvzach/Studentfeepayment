@extends('layouts.app')




@section('main-content')
    <div class="card">
        <div class="card-header bg-secondary">
            <h3 class="card-title">Insert Data</h3>
            <a href="{{ route('fee.index') }}" class="btn btn-primary float-right" style="margin-top: -40px;">Back</a>
        </div>
        <div class="card-body">
            <form action="{{ route('fee.store') }}" method="post">
                @csrf
                <div class="form-group row">
                    <label for="amount" class="col-sm-2 col-form-label">Fee Amount</label>
                    <div class="col-sm-10">
                        <input type="text" name="amount" class="form-control" id="amount" value="{{ old('ticket') }}" placeholder="Fee Amount">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="amount" class="col-sm-2 col-form-label">Date Paid</label>
                    <div class="col-sm-10">
                        <input type="date" name="dop" class="form-control" id="dop" value="{{ old('dop') }}" placeholder="Date Paid">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="user" class="col-sm-2 col-form-label">User</label>
                    <div class="col-sm-10">
                        <select name="user" id="user" class="custom-select my-1 mr-sm-2">
                            <option selected disabled>Choose...</option>
                                @forelse($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @empty
                                    <option disabled>No data found!!</option>
                                @endforelse
                        </select>
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
