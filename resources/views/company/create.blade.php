@extends('layouts.app')
@section('title', 'Company Data')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-11">
            <h2>Add Company</h2>
        </div>
        <div class="col-lg-1">
            <a class="btn btn-dark" href="{{ route('company.index') }}"> Back</a>
        </div>
    </div>
    <form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="companyname">Company Name:</label>
            <input type="text" class="form-control" id="companyname" placeholder="Enter Company Name" name="companyname" value="{{ old('companyname') }}" @if ($errors->has('companyname')) autofocus @endif>
        </div>
        @error('companyname')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
        <div class="form-group">
            <label for="companyemail">Company Email</label>
            <input type="text" class="form-control" id="companyemail" placeholder="Enter Company Email" name="companyemail" value="{{ old('companyemail') }}" @if ($errors->has('companyemail')) autofocus @endif>
        </div>
        @error('companyemail')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
        <div class="form-group">
            <label for="website">Website:</label>
            <input type="text" class="form-control" id="website" placeholder="Enter Company Website" name="website" value="{{ old('website') }}" @if ($errors->has('website')) autofocus @endif>
        </div>
        @error('website')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
        <div class="form-group">
            <label for="logo">Logo:</label>
            <input type="file" class="form-control" id="logo" name="logo" value="{{ old('logo') }}" @if ($errors->has('logo')) autofocus @endif>
        </div>
        @error('logo')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
        <button type="reset" class="btn btn-danger">Reset</button>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
@endsection