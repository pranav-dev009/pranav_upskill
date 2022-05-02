@extends('layouts.app')
@section('content')
    <div class="row">
        <!-- Admin Registration Image -->
        <div class="col-lg-6 d-none d-lg-block text-center" id="registerImg">
            <img src="/images/admin_register.jpg" width="500" height="500" alt="adminImg">
        </div>
        <!-- Admin Registration Form -->
        <div class="col-md-6">
            <div class="card ml-2 mr-2" id="admin_registration_form">
                <div class="card-header bg-secondary">
                    <h3 class="text-white text-center">Admin Registration</h3>
                </div>
                <div class="card-body">
                    <form method="POST" id="adminDetails" name="adminDetails" class="mt-3">
                        <div class="form-group ml-3">
                            <label for="adminName" class="mt-2">Username:</label>
                            <input type="text" name="adminName" id="adminName" class="form-control">
                        </div>
                        <div class="form-group ml-3">
                            <label for="adminEmail" class="mt-2">Email:</label>
                            <input type="email" name="adminEmail" id="adminEmail" class="form-control">
                        </div>
                        <div class="form-group ml-3">
                            <label for="adminPswd" class="mt-2">Password:</label>
                            <input type="password" name="adminPswd" id="adminPswd" class="form-control">
                        </div>
                        <div class="form-group ml-3">
                            <label for="confirmPswd" class="mt-2">Confirm Password:</label>
                            <input type="password" name="confirmPswd" id="confirmPswd" class="form-control">
                            <div class="mt-2" id="errmsg"></div>
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
    </div>
@endsection