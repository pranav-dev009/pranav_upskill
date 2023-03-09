@extends('layouts.app')
@section('title', 'Companies CRUD')
@section('content')
    @include('layouts.navbar')
    <div class="container">
        <div class="row">
            <div class="col-lg-11">
                <h2>Companies Data</h2>
            </div>
            @if (count($companies) != 0)
            <div class="col-lg-1">
                <a href="{{ route('company.restoreAll')}}" class="btn btn-success">Restore All</a>
            </div>
            @endif
        </div>
        @if (Session::has('companyrestore'))
        <div class="alert alert-success text-center">
            {{ Session::get('companyrestore') }}
        </div>
        @endif
        <table class="table table-bordered yajra-datatable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Logo</th>
                    <th>Website</th>
                    <th>Deleted Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 0; ?>
            @foreach ($companies as $company)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->email }}</td>
                    <td><img src={{ asset("storage/images/".$company->logo) }} width="100" height="100" alt="Company Logo"></td>
                    <td>{{ $company->website }}</td>
                    <td>{{ $company->deleted_at }}</td>
                    <td><a href="{{ route('company.restore', ['id' => $company->id ]) }}" class="btn btn-success">Restore</a></td>
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
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'logo', name: 'logo'},
                    {data: 'website', name: 'website'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@endsection