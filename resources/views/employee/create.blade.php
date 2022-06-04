@extends('layouts.app')
@section('title', 'Employee Data')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-11">
            <h2>Add Employee</h2>
        </div>
        <div class="col-lg-1">
            <a class="btn btn-dark" href="{{ route('employee.index') }}"> Back</a>
        </div>
    </div>
    <form action="{{ route('employee.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="firstname">First Name:</label>
            <input type="text" class="form-control" id="firstname" placeholder="Enter First Name" name="firstname" value="{{ old('firstname') }}" @if ($errors->has('firstname')) autofocus @endif>
        </div>
        @error('firstname')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
        <div class="form-group">
            <label for="lastname">Last Name:</label>
            <input type="text" class="form-control" id="lastname" placeholder="Enter Last Name" name="lastname" value="{{ old('lastname') }}" @if ($errors->has('lastname')) autofocus @endif>
        </div>
        @error('lastname')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
        <div class="form-group">
            <label for="company">Company:</label>
            <input type="text" class="form-control" id="company" placeholder="Enter Company Name" name="company" value="{{ old('company') }}" @if ($errors->has('company')) autofocus @endif>
        </div>
        @error('company')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
        <button type="reset" class="btn btn-danger">Reset</button>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
@endsection