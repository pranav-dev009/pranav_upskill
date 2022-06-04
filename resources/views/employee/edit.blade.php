@extends('layouts.app')
@section('title', 'Employee Data')
@section('content')
<div class="container">
    <div class="row">
        <div>
            <h2>Update Employee Information</h2>
        </div>
    </div>
    <form method="post" action="{{ route('employee.update', ['id' => $employee->id]) }}" >
        @csrf
        <div class="form-group">
            <label for="firstname">First Name:</label>
            <input type="text" class="form-control" id="firstname" placeholder="Enter First Name" name="firstname" value="{{ $employee->firstname }}">
        </div>
        <div class="form-group">
            <label for="lastname">Last Name:</label>
            <input type="text" class="form-control" id="lastname" placeholder="Enter Last Name" name="lastname" value="{{ $employee->lastname }}">
        </div>
        <div class="form-group">
            <label for="company">Company:</label>
            <input type="text" class="form-control" id="company" placeholder="Enter Company" name="company" value="{{ $employee->company }}">
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
        <a href="{{ route('employee.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection