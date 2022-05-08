@extends('layouts.app')
@section('title', 'Items CRUD')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card ml-2 mr-2" id="admin_registration_form">
                <div class="card-header bg-secondary">
                    <h3 class="text-white text-center">Admin Registration</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('register.register')}}" method="POST" id="adminDetails" name="adminDetails" class="mt-3">
                        @csrf
                        @if(Session::has('failedRegistration'))
                        <div class=" mt-2 alert alert-danger text-center">
                            {{ Session::get('failedRegistration') }}
                        </div>
                        @endif
                        <div class="form-group ml-3">
                            <label for="name" class="mt-2">Name:</label>
                            <input type="text" name="name" id="name" class="form-control">
                            @if($errors->has('name'))
                                <div class="error">{{ $errors->first('name') }}</div>
                            @endif
                        </div>
                        <div class="form-group ml-3">
                            <label for="email" class="mt-2">Email:</label>
                            <input type="email" name="email" id="email" class="form-control">
                            @if($errors->has('email'))
                                <div class="error">{{ $errors->first('email') }}</div>
                            @endif
                        </div>
                        <div class="form-group ml-3">
                            <label for="password" class="mt-2">Password:</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group ml-3">
                            <label for="password_confirmation" class="mt-2">Confirm Password:</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                            @if($errors->has('password'))
                                <div class="error">{{ $errors->first('password') }}</div>
                            @endif
                        </div>
                        <div class="mt-2 ml-3 text-center">
                            <input type="submit" name="submit" id="submit" value="Submit" class="mt-1 btn btn-success">
                        </div>
                    </form>
                    <div class="mt-3 ml-3 mb-5 text-center">
                        <a href="{{route('login.index')}}" class="text-secondary">Already User?, Login here</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
@endsection