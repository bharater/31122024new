@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h3>Product Variations</h3>
                <a href="{{ url('admin/variations/create') }}" class="btn btn-primary btn-sm float-end">Add Variation</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Values</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($variations as $variation)
                            <tr>
                                <td>{{ $variation->id }}</td>
                                <td>{{ $variation->name }}</td>
                                <td>{{ implode(', ', $variation->values) }}</td>
                                <td>{{ $variation->status ? 'Active' : 'Inactive' }}</td>
                                <td>
                                    <a href="{{ route('variations.edit', $variation->id) }}" 
                                       class="btn btn-sm btn-success">Edit</a>
                                       <a href="{{url('admin/variations/'.$variation->id.'/delete')}}" onclick="return confirm('Are you sure you want to delete this data ?')" class="btn  btn-danger btn-sm">Delete</a>
                                    </td>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No Variations Found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
