@extends('layouts.app')
@section('title', 'Items CRUD')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-11">
            <h2>Add New Item</h2>
        </div>
        <div class="col-lg-1">
            <a class="btn btn-dark" href="{{ route('items.index') }}"> Back</a>
        </div>
    </div>
    <form action="{{ route('items.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="itemName">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter Item Name" name="name" value="{{ old('name') }}" @if ($errors->has('name')) autofocus @endif>
        </div>
        @error('name')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
        <div class="form-group">
            <label for="itemQuantity">Quantity:</label>
            <input type="text" class="form-control" id="quantity" placeholder="Enter Item Quantity" name="quantity" value="{{ old('quantity') }}" @if ($errors->has('quantity')) autofocus @endif>
        </div>
        @error('quantity')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
        <div class="form-group">
            <label for="itemRate">Rate:</label>
            <input type="text" class="form-control" id="rate" placeholder="Enter Item Rate" name="rate" value="{{ old('rate') }}" @if ($errors->has('rate')) autofocus @endif>
        </div>
        @error('rate')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
        <button type="reset" class="btn btn-danger">Reset</button>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
@endsection