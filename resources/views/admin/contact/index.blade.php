@extends('layouts.admin')

@section('title', 'Contact Submissions')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">  
            <div class="card-header">
                <h3>Contact Submissions</h3>
            </div>

            <div class="card-body">
                @if($submissions->isEmpty())
                    <p>No submissions found.</p>
                @else
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Message</th>
                                <th>Submitted At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($submissions as $submission)
                                <tr>
                                    <td>{{ $submission->id }}</td>
                                    <td>{{ $submission->name }}</td>
                                    <td>{{ $submission->email }}</td>
                                    <td>{{ $submission->phone }}</td>
                                    <td>{{ $submission->message }}</td>
                                    <td>{{ $submission->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
