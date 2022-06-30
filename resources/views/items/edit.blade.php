@extends('layouts.app')
@section('title', 'Items CRUD')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div>
            <h2>Update Item Information</h2>
        </div>
    </div>
    <form method="post" action="{{ route('items.update', ['id' => $item->id]) }}" >
        @csrf
        <div class="form-group">
            <label for="itemName">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="{{ $item->name }}">
        </div>
        <div class="form-group">
            <label for="itemQuantity">Quantity:</label>
            <input type="text" class="form-control" id="quantity" placeholder="Enter quantity" name="quantity" value="{{ $item->quantity }}">
        </div>
        <div class="form-group">
            <label for="itemRate">Rate:</label>
            <input type="text" class="form-control" id="rate" placeholder="Enter rate" name="rate" value="{{ $item->rate }}">
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
        <a href="{{ route('items.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection