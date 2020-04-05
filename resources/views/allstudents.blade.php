@extends('layouts.app')

@section('main-content')
    <div class="card">
        <div class="card-header bg-secondary">
            <h3 class="card-title">Details of All Students</h3>
            </div>
        <div class="card-body">
            <table class="table table-bordered table-dark text-center">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Student No</th>
                    <th scope="col">Date Of Birth</th>
                    <th scope="col">Address</th>
                   
                </tr>
                </thead>
                <tbody>
               
                    @forelse($users as $key=>$user)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->studentnumber }}</td>
                            <td>{{ $user->dob }}</td>
                            <td>{{ $user->address }}</td>
                            
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

