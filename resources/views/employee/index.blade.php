@extends('layouts.app')
@section('title', 'Employee Data')
@section('content')
    @include('layouts.navbar')
    <div class="container">
        <div class="row">
            <div class="col-lg-11">
                <h2>Employee Data</h2>
            </div>
            <div class="col-lg-1">
                <a class="btn btn-primary" href="{{ route('employee.create') }}">Add</a>
            </div>
        </div>
        @if(Session::has('success'))
            <div class="alert alert-success text-center">
                {{ Session::get('success') }}
            </div>
        @endif
        @if(Session::has('update'))
        <div class="alert alert-info text-center">
            {{ Session::get('update') }}
        </div>
        @endif
        @if(Session::has('delete'))
        <div class="alert alert-success text-center">
            {{ Session::get('delete') }}
        </div>
        @endif
        @if(Session::has('missingemployee'))
        <div class="alert alert-danger text-center">
            {{ Session::get('missingemployee')}}
        </div>
        @endif
        @if(Session::has('employeerestore'))
        <div class="alert alert-success text-center">
            {{ Session::get('employeerestore') }}
        </div>
        @endif
        @if(Session::has('employeerestoreall'))
        <div class="alert alert-success text-center">
            {{ Session::get('employeerestoreall') }}
        </div>
        @endif
        <table class="table table-bordered yajra-datatable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Company</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            @php
                $i = 0;
            @endphp
            @foreach ($employees as $employee)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $employee->firstname }}</td>
                <td>{{ $employee->lastname }}</td>
                <td>@php echo App\Http\Controllers\CompanyController::show($employee->company_id);  @endphp</td>
                <td>
                    <a class="btn btn-warning" href="{{ route('employee.edit',['id' => $employee->id]) }}">Edit</a>
                    <a class="btn btn-danger" href="{{ route('employee.destroy',['id' => $employee->id]) }}">Delete</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <script type="text/javascript">
        $(function () {
            var table = $('.yajra-datatable').DataTable({
                processing: true,
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'firstname', name: 'firstname'},
                    {data: 'lastname', name: 'lastname'},
                    {data: 'company', name: 'company'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@endsection