@extends('layouts.app')
@section('title', 'Company Data')
@section('content')
<div class="container">
    <div class="row">
        <div>
            <h2>Update Company Information</h2>
        </div>
    </div>
    <form method="post" action="{{ route('company.update', ['id' => $company->id]) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="companyname">Company Name:</label>
            <input type="text" class="form-control" id="companyname" name="companyname" value="{{ $company->name }}">
        </div>
        <div class="form-group">
            <label for="companyemail">Company Email:</label>
            <input type="text" class="form-control" id="companyemail" name="companyemail" value="{{ $company->email }}">
        </div>
        <div class="form-group">
            <label for="website">Company Website:</label>
            <input type="text" class="form-control" id="website" name="website" value="{{ $company->website }}">
        </div>
        <div class="form-group">
            <label for="logo">Company Logo:</label>
            <input type="file" class="form-control" id="logo" name="logo">
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
        <a href="{{ route('company.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection