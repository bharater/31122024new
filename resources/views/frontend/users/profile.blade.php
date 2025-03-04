@extends('layouts.app')

@section('title', 'User Profile')

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h4 class="col-md-10">User Profile
                    <a href="{{url('change-password')}}" class="btn btn-warning  float-end">Change Password ? </a>
                </h4>
                <div class="underline mb-4"></div>

                <div class="col-md-10">
                    @if (session('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif

                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li class='text-danger'>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <div class="card shadow">
                        <div class="card-header bg-primary">
                            <h4 class="mb-0 text-white">User Details</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('profile') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="username">User Name</label>
                                            <input type="text" value="{{ Auth::user()->name }}" name="username" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="email">Email Address</label>
                                            <input type="text" readonly name="email" value="{{ Auth::user()->email }}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="phone">Phone No.</label>
                                            <input type="text" value="{{ Auth::user()->userDetail->phone ?? '' }}" name="phone" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="pin_code">Zip/Pin Code</label>
                                            <input type="text" value="{{ Auth::user()->userDetail->pin_code ?? '' }}" name="pin_code" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="address">Address</label>
                                            <textarea name="address" class="form-control" rows="3">{{ Auth::user()->userDetail->address ?? '' }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">Save Data</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
