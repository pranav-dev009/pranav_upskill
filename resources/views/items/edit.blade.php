@extends('layouts.app')

@section('content')
    <div class="row">
        <div>
            <h2>Update item</h2>
        </div>
    </div>
    <form method="post" action="{{ route('item.update', $item->id) }}" >
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label for="itemName">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter First Name" name="name" value="{{ $item->name }}">
        </div>
        <div class="form-group">
            <label for="itemQuantity">Quantity:</label>
            <input type="text" class="form-control" id="quantity" placeholder="Enter Last Name" name="quantity" value="{{ $item->quantity }}">
        </div>
        <div class="form-group">
            <label for="itemRate">Rate:</label>
            <input type="text" class="form-control" id="rate" placeholder="Enter Address" name="rate" value="{{ $item->rate }}">
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
@endsection