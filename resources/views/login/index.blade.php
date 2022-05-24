@extends('layouts.app')
@section('title', 'Items CRUD')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <!-- Login Form -->
        <div class="col-md-6">
            <div class="card ml-2 mr-2" id="admin_login_form">
                <div class="card-header bg-secondary">
                <h3 class="text-white text-center">Login</h3>
            </div>
            @if(Session::has('success'))
                <div class=" mt-2 alert alert-success text-center">
                    {{ Session::get('success') }}
                </div>
            @endif
            @if(Session::has('failedLogin'))
                <div class=" mt-2 alert alert-danger text-center">
                    {{ Session::get('failedLogin') }}
                </div>
            @endif
            <form action="{{route('login.auth')}}" method="POST">
                @csrf
                <div class="card-body">
                    <form method="POST" id="adminDetails" name="adminDetails" class="mt-3">
                        <div class="form-group ml-3">
                            <label for="email" class="mt-2">Username:</label>
                            <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <div class="text-danger">{{ $errors->first('email') }}</div>
                            @endif
                        </div>
                        <div class="form-group ml-3">
                            <label for="password" class="mt-2">Password:</label>
                            <input type="password" name="password" id="password" class="form-control" value="{{ old('password') }}">
                            @if ($errors->has('password'))
                                <div class="text-danger">{{ $errors->first('password') }}</div>
                            @endif
                        </div>
                        <div class="mt-2 ml-3 text-center">
                            <input type="submit" name="submit" id="submit" value="Submit" class="mt-1 btn btn-success">
                        </div>
                        <div class="mt-2 ml-3 text-center">
                            <br>
                            <a href="{{route('login.google')}}" class="btn btn-danger">Login with Google</a>
                            <br><br>
                            <a href="{{route('login.facebook')}}" class="btn btn-primary">Login with Facebook</a>
                        </div>
                    </form>
                    <div class="mt-3 ml-3 mb-3 text-center">
                        <a href="{{route('register.index')}}" class="text-secondary">New User?, Register here</a>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
@endsection