@extends('layouts.app')







@section('main-content')
    <div class="card">
        <div class="card-header bg-secondary">
            <h3 class="card-title">Show Data</h3>
            <a href="{{ route('index') }}" class="btn btn-primary float-right" style="margin-top: -40px;">Back</a>
        </div>
        <div class="card-body">
            @if (!empty($user))
                <h1>Name: {{ $user->name }}</h1>
            @else
                <h1>Name: No data found!</h1>
            @endif

            <h3>Amount:</h3>
            @forelse($user->fees as $amount)
                <ul>
                    <li>{{ $amount->amount }}</li>
                </ul>
            @empty
                <h3>amounts: No data found!</h3>
            @endforelse

            <a href="{{ route('student.edit', $user->id) }}" class="btn btn-primary">Edit</a>
        </div>
    </div>
@endsection
