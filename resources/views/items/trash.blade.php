@extends('layouts.app')
@section('title', 'Items CRUD')
@section('content')
    @include('layouts.navbar')
    <div class="container">
        <div class="row">
            <div class="col-lg-11">
                <h2>Items Data</h2>
            </div>
            @if (count($items) != 0)
            <div class="col-lg-1">
                <a class="btn btn-success" href="{{ route('items.restoreAll') }}">Restore All</a>
            </div>
            @endif
        </div>
        @if (Session::has('itemrestore'))
        <div class="alert alert-success text-center">
            {{ Session::get('itemrestore') }}
        </div>
        @endif
        <table class="table table-bordered yajra-datatable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Deleted Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 0; ?>
            @foreach ($items as $item)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->deleted_at }}</td>
                    <td><a href="{{ route('items.restore',['id'=>$item->id]) }}" class="btn btn-success">Restore</a></td>
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
                    {data: 'deleted_at', name: 'deleted_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        });
    </script>
@endsection