@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- Admin Login Image -->
        <div class="col-lg-6 d-none d-lg-block text-center" id="loginImg">
            <img src="/images/admin_login.png" width="500" height="500" alt="adminImg">
        </div>
        <!-- Admin Login Form -->
        <div class="col-md-6">
            <div class="card ml-2 mr-2" id="admin_login_form">
                <div class="card-header bg-secondary">
                    <h3 class="text-white text-center">Login</h3>
                </div>
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
                                <label for="username" class="mt-2">Username:</label>
                                <input type="text" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group ml-3">
                                <label for="password" class="mt-2">Password:</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="mt-2 ml-3 text-center">
                                <input type="submit" name="submit" id="submit" value="Submit" class="mt-1 btn btn-success">
                            </div>
                        </form>
                        <div class="mt-3 ml-3 mb-3 text-center">
                            <a href="{{route('login.create')}}" class="text-secondary">New User?, Register here</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection