@extends('layouts.app')
@section('title', 'Items CRUD')
@section('content')
    @include('layouts.navbar')
    <div class="container">
        <div class="row">
            <div class="col-lg-11">
                <h2>Laravel 8 Items CRUD</h2>
            </div>
            <div class="col-lg-1">
                <a class="btn btn-primary" href="{{ route('items.create') }}">Add</a>
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
                        <a class="btn btn-warning" href="{{ route('items.edit',['id' => $item->id]) }}">Edit</a>
                        <a class="btn btn-danger" href="{{ route('items.destroy',['id' => $item->id]) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection