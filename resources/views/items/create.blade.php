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

    <form action="{{ route('item.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="itemName">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter Item Name" name="name">
        </div>
        <div class="form-group">
            <label for="itemQuantity">Quantity:</label>
            <input type="text" class="form-control" id="quantity" placeholder="Enter Item Quantity" name="quantity">
        </div>
        <div class="form-group">
            <label for="itemRate">Rate:</label>
            <input type="text" class="form-control" id="rate" placeholder="Enter Item Rate" name="rate">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@endsection