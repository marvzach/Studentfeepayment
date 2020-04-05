@extends('layouts.app')

@section('main-content')
    <div class="card">
        <div class="card-header bg-secondary">
            <h3 class="card-title">Report Of all Student Payments</h3>
            </div>
        <div class="card-body">
            <table class="table table-bordered table-dark text-center">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Student No</th>
                    <th scope="col">Paid Amount(Ksh)</th>
                    <th scope="col">Date Paid</th>
                   
                </tr>
                </thead>
                <tbody>
               
                    @forelse($users as $key=>$user)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->studentnumber }}</td>
                            <td>
                                @forelse($user->fees as $amount)
                               
                                    <ul>
                                    
                                        <li style="list-style: none;">{{ number_format ($amount->amount) }} </li>
                                        
                                    </ul>
                                @empty
                                   Not paid
                                @endforelse
                            </td>
                            
                            <td>
                                @forelse($user->fees as $dop)
                                    <ul>
                                        <li style="list-style: none;">{{ $dop->dop }}</li>
                                    </ul>
                                @empty
                                    Not Paid
                                @endforelse
                            </td>
                            
                        </tr>

                    @empty
                        <tr>
                            <td colspan="3">No Data Found!</td>
                        </tr>

                    @endforelse

                </tbody>
               
                
            </table>
        </div>
    </div>
@endsection

