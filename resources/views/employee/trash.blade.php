@extends('layouts.app')
@section('title', 'Employees CRUD')
@section('content')
    @include('layouts.navbar')
    <div class="container">
        <div class="row">
            <div class="col-lg-11">
                <h2>Employees Data</h2>
            </div>
            @if (count($employees) != 0)
            <div class="col-lg-1">
                <a href=" {{ route('employee.restoreAll')}}" class="btn btn-success">Restore All</a>
            </div>
            @endif
        </div>
        @if (Session::has('employeerestore'))
        <div class="alert alert-success text-center">
            {{ Session::get('employeerestore') }}
        </div>
        @endif
        <table class="table table-bordered yajra-datatable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Deleted Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 0; ?>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $employee->firstname }}</td>
                    <td>{{ $employee->lastname }}</td>
                    <td>{{ $employee->deleted_at }}</td>
                    <td><a href="{{ route('employee.restore', ['id' => $employee->id ]) }}" class="btn btn-success">Restore</a></td>
                </tr>
            @endforeach
            </tbody>
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
                    {data: 'deleted_at', name: 'deleted_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@endsection