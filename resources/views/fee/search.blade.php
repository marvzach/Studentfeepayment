@extends('layouts.app')



    <div class="card">
        <div class="card-header bg-secondary">
        <div class="row">
        <div class="col-md-4">
    
            <h3 class="card-title">View All Fees paid</h3>
            </div>
            <div class="col-md-4">
            <form action="/search" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control" name="q" id="q"
            placeholder="Search Student Fees"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
</form>
<div class="container">
    @if(isset($details))
        <p> The Search results for your query <b> {{ $query }} </b> are :</p>
    <h2>Sample User details</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Amount</th>
                <th>Date Paid</th>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $stfee)
            <tr>
               <td>{{$stfee->name}}</td>
                <td>{{$stfee->id}}</td>
                <td>{{$stfee->dop}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
            
