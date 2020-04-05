@extends('layouts.app')


@section('main-content')
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

            </div> <div class="col-md-4">
            <a href="{{ route('index') }}" class="btn btn-primary float-right" style="margin-top: -0px;">Back</a>
            <a href="{{ route('fee.create') }}" class="btn btn-primary float-right" style="margin-top: 0px; margin-right: 30px;">Pay Fee</a>
        </div></div></div>
        <div class="card-body">
            <table class="table table-bordered table-dark text-center">
                <thead>
                <tr>
                
                    <th scope="col">#</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">Amount Paid(Ksh)</th>
                    <th scope="col">Date Paid</th>
                    
                    <th scope="col">Action</th>
                </tr>
                </thead>{{ $total = 0 }}
                <tbody>
                
                        @forelse($fees as $key=>$fee)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $fee->student->name }}</td>
                                <td>{{ number_format($fee->amount) }}</td>
                                <td>{{ $fee->dop }}</td> 
                                <td>
                                {{$total += $fee->amount}}
                                  
                                    <button onclick="deleteMobile({{ $fee->id }})" class="btn btn-danger" type="button">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    <form id="delete-form-{{ $fee->id }}" action="{{ route('fee.destroy', $fee->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>

                                    <a href="{{ route('fee.show', $fee->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                                
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">No data found!</td>
                            </tr>
                        @endforelse

                </tbody>
                <tr>
                
                    <th scope="col"></th>
                     <th scope="col">Total Paid(Ksh)</th>
                    <th scope="col">{{ number_format($total) }}</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </table>
        </div>
    </div>
@endsection

@push('js')
    <script>
        function deleteMobile(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false,
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush
