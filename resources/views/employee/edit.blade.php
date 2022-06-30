@extends('layouts.app')
@section('title', 'Employee Data')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div>
            <h2>Update Employee Information</h2>
        </div>
    </div>
    <form method="post" action="{{ route('employee.update', ['id' => $employee->id]) }}" >
        @csrf
        <div class="form-group">
            <label for="firstname">First Name:</label>
            <input type="text" class="form-control" id="firstname" name="firstname" value="{{ $employee->firstname }}">
        </div>
        <div class="form-group">
            <label for="lastname">Last Name:</label>
            <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $employee->lastname }}">
        </div>
        <div class="form-group">
            <label for="company">Company:</label>
            <select name="company">
            @foreach ($companies as $company)
                <option value={{ $company->id }} @if ($company->id == $employee->company_id) selected @endif>{{ $company->name }}</option>
            @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
        <a href="{{ route('employee.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection