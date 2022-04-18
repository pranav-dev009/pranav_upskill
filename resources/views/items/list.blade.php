@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-11">
                <h2>Laravel 8 Items CRUD</h2>
        </div>
        <div class="col-lg-1">
            <a class="btn btn-success" href="{{ route('item.create') }}">Add</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Rate</th>
            <th width="280px">Action</th>
        </tr>
        @php
            $i = 0;
        @endphp
        @foreach ($items as $item)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ $item->rate }}</td>
                <td>
                    <form action="" method="POST">
                        <a class="btn btn-info" href="{{ route('item.show', $item->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('item.edit', $item->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection