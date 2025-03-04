@extends('layouts.admin')

@section('title', 'Edit Users')

@section('content')

<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        @if ($errors->any())
            <ul class="alert alert-warning">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <div class="card">
            <div class="card-header">
                <h3>Edit Users
                    <a href="{{ url('admin/users') }}" class="btn btn-danger btn-sm text-white float-end">BACK</a>
                </h3>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/users/' . $user->id) }}" method="POST">
                    @csrf   
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" id="name"/>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" id="email"/>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password"/>
                            <small class="text-muted">Leave blank to keep the current password</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="role_as">Select Role</label>
                            <select name="role_as" class="form-control" id="role_as">
                                <option value="">Select Role</option>
                                <option value="0" {{ $user->role_as == 0 ? 'selected' : '' }}>User</option>
                                <option value="1" {{ $user->role_as == 1 ? 'selected' : '' }}>Admin</option>
                            </select>
                        </div>
                        <div class="col-md-12 text-end">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
