@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-11">
            <h2>Add New Item</h2>
        </div>
        <div class="col-lg-1">
            <a class="btn btn-primary" href="{{ url('item') }}"> Back</a>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('item.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="itemName">Name:</label>
            <input type="text" class="form-control" id="itemName" placeholder="Enter First Name" name="itemName">
        </div>
        <div class="form-group">
            <label for="itemQuantity">Quantity:</label>
            <input type="text" class="form-control" id="itemQuantity" placeholder="Enter Last Name" name="itemQuantity">
        </div>
        <div class="form-group">
            <label for="itemRate">Rate:</label>
            <input type="text" class="form-control" id="itemRate" placeholder="Enter Address" name="itemRate">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@endsection