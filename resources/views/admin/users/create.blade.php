@extends('layouts.admin')

@section('title','Users List')

@section('content')

<div class="row">
    <div class="col-md-12">
        @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        @if ($errors->any())
                    <ul class="alert alert-warning">
                        @foreach ($errors->all() as $error)
                            <li>
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                @endif

        <div class="card">
            <div class="card-header">
                <h3>Add Users
                    <a href="{{ url('admin/users') }}" class="btn btn-danger btn-sm text-white float-end">Add
                        BACK</a>
                </h3>
            </div>
            <div class="card-body">

                <form action="{{url('admin/users')}}" method="POST">
                    @csrf   

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name"/>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" id="email"/>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password"/>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="role_as">Select Role</label>
                            <select name="role_as" class="form-control" id="role_as">
                                <option value="">Select Role</option>
                                <option value="0">User</option>
                                <option value="1">Admin</option>
                            </select>
                        </div>
                        <div class="col-md-12 text-end">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>

                    
                </form>
                
            </div>
        </div>
    </div>

</div>    
@endsection