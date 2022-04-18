@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-11">
            <h2>Update item</h2>
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
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
@endsection