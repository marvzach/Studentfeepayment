@extends('layouts.app')







@section('main-content')
    <div class="card">
        <div class="card-header bg-secondary">
            <h3 class="card-title">{{ $fee->user->name }}'s Payment</h3>
            <a href="{{ route('fee.index') }}" class="btn btn-primary float-right" style="margin-top: -40px;">Back</a>
        </div>
        <div class="card-body">
            <h1>Fee Amount Paid: Ksh {{ $fee->amount }}</h1>
            <h3>Date Paid: {{ $fee->dop }}</h3>
        
        </div>
    </div>
@endsection
