@extends('layouts.app')
@section('title', 'Company Data')
@section('content')
    @include('layouts.navbar')
    <div class="container">
        <div class="row">
            <div class="col-lg-11">
                <h2>Company Data</h2>
            </div>
            <div class="col-lg-1">
                <a class="btn btn-primary" href="{{ route('company.create') }}">Add</a>
            </div>
        </div>
        @if(Session::has('success'))
            <div class="alert alert-success text-center">
                {{ Session::get('success') }}
            </div>
        @endif
        @if(Session::has('update'))
        <div class="alert alert-info text-center">
            {{ Session::get('update') }}
        </div>
        @endif
        @if(Session::has('delete'))
        <div class="alert alert-success text-center">
            {{ Session::get('delete') }}
        </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Company Name</th>
                <th>Company Email</th>
                <th>Company Website</th>
                <th>Company Logo</th>
                <th width="280px">Action</th>
            </tr>
            @php
                $i = 0;
            @endphp
            @foreach ($companies as $company)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->email }}</td>
                    <td><a href="{{ $company->website }}">{{ $company->website }}</a></td>
                    <td><img src={{ asset("storage/images/".$company->logo) }} width="150" height="150"></td>
                    <td>
                        <a class="btn btn-warning" href="{{ route('company.edit',['id' => $company->id]) }}">Edit</a>
                        <a class="btn btn-danger" href="{{ route('company.destroy',['id' => $company->id]) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection