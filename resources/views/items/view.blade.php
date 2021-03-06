@extends('layouts.app')
@section('title', 'Items CRUD')
@section('content')
<div class="container">
    <div class="row">
        <div>
            <h2>Items CRUD</h2>
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
</div>
@endsection