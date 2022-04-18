@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-11">
                <h2>Items CRUD</h2>
        </div>
        <div class="col-lg-1">
            <a class="btn btn-primary" href="{{ url('item') }}"> Back</a>
        </div>
    </div>
    <table class="table table-bordered">
        <tr>
            <th>Name:</th>
            <td>{{ $item->name }}</td>
        </tr>
        <tr>
            <th>Quantity:</th>
            <td>{{ $item->quantity }}</td>
        </tr>
        <tr>
            <th>Rate:</th>
            <td>{{ $item->rate }}</td>
        </tr>
    </table>
@endsection