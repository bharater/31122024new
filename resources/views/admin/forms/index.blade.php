@extends('layouts.admin')

@section('title', 'About Us Settings')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">

        @if (session('error'))
            <div class="alert alert-danger mb-3">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger mb-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('admin/settings/update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="card mb-3">
                <div class="card-header bg-primary">
                    <h3 class="text-white mb-0">About Us Settings</h3>
                </div>
                <div class="card-body">
                    @foreach (['mission', 'vision', 'values'] as $section)
                        <!-- Section: Mission, Vision, and Values -->
                        <div class="row mb-4">
                            <!-- Image Section -->
                            <div class="col-md-4">
                                <label for="{{ $section }}_image" class="form-label">{{ ucfirst($section) }} Image</label>
                                <input type="file" name="{{ $section }}_image" id="{{ $section }}_image" class="form-control">
                                @if (optional($appSetting)->{ $section . '_image' })
                                    <img src="{{ asset('uploads/' . $section . '/' . $appSetting->{ $section . '_image' }) }}" alt="{{ $section }}_image" class="img-fluid border" style="max-width: 100%">
                                @endif
                            </div>

                            <!-- Title Section -->
                            <div class="col-md-4">
                                <label for="{{ $section }}_title" class="form-label">{{ ucfirst($section) }} Title</label>
                                <input type="text" name="{{ $section }}_title" id="{{ $section }}_title" value="{{ old("{$section}_title", optional($appSetting)->{ $section . '_title' }) }}" class="form-control" placeholder="Enter {{ ucfirst($section) }} Title">
                            </div>

                            <!-- Description Section -->
                            <div class="col-md-4">
                                <label for="{{ $section }}_description" class="form-label">{{ ucfirst($section) }} Description</label>
                                <textarea name="{{ $section }}_description" id="{{ $section }}_description" class="form-control" rows="2" placeholder="Enter {{ ucfirst($section) }} Description">{{ old("{$section}_description", optional($appSetting)->{ $section . '_description' }) }}</textarea>
                            </div>
                        </div>
                        <hr>
                    @endforeach

                    
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary text-white">Save Changes</button>
                    </div>

                    <hr>


                    <div class="row">
                        @foreach (['6', '7', '8'] as $project)
                            <!-- Project Card Section -->
                            <div class="col-md-4 mb-1">
                                <div class="card">
                                    <!-- Title Section -->
                                    <div class="card-body">
                                        <h5 class="card-title">Project {{ $project }} Title</h5>
                                        <input type="text" name="project_{{ $project }}_title" id="project_{{ $project }}_title" 
                                            value="{{ old('project_' . $project . '_title', optional($appSetting)->{ 'project_' . $project . '_title' }) }}" 
                                            class="form-control" placeholder="Enter Project {{ $project }} Title">
                                    </div>
                    
                                    <!-- Image Section -->
                                    <div class="card-body">
                                        <label for="project_{{ $project }}_image" class="form-label">Project {{ $project }} Image</label>
                                        <input type="file" name="project_{{ $project }}_image" id="project_{{ $project }}_image" class="form-control mb-1">
                                        @if (optional($appSetting)->{ 'project_' . $project . '_image' })
                                            <img src="{{ asset('uploads/projects/' . $appSetting->{ 'project_' . $project . '_image' }) }}" 
                                                alt="project_{{ $project }}_image" class="img-fluid border" style="max-width: 100%">
                                        @endif
                                    </div>
                    
                                    <!-- Description Section -->
                                    <div class="card-body">
                                        <label for="project_{{ $project }}_description" class="form-label">Project {{ $project }} Description</label>
                                        <textarea name="project_{{ $project }}_description" id="project_{{ $project }}_description" 
                                            class="form-control" rows="2" placeholder="Enter Project {{ $project }} Description">
                                            {{ old('project_' . $project . '_description', optional($appSetting)->{ 'project_' . $project . '_description' }) }}
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    <!-- Save Button (placed at the bottom of the form) -->
                    <div class="row mb-4">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                    
                

                </div>
            </div>
        </form>
    </div>
</div>
@endsection
