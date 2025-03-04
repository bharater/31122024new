@extends('layouts.app')

@section('title','About Us')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-1 animated-title title-box">About Us</h1>
    <hr class="animated-hr">

    <!-- First Section -->
    <div class="mb-5 section">
        <div class="row align-items-center">
            <div class="col-md-4">
                <img src="{{ asset('uploads/mission/' . $aboutSetting->mission_image) }}" class="img-fluid rounded shadow img-hover animated-img" alt="Mission Image">
            </div>
            <div class="col-md-8">
                <h2 class="text-primary animated-text title-box">{{ $aboutSetting->mission_title }}</h2>
                <p class="lead animated-text description-box">
                    {{ $aboutSetting->mission_description }}
                </p>
            </div>
        </div>
    </div>

    <!-- Second Section -->
    <div class="mb-5 section">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h2 class="text-primary animated-text title-box">{{ $aboutSetting->vision_title }}</h2>
                <p class="lead animated-text description-box">
                    {{ $aboutSetting->vision_description }}
                </p>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('uploads/vision/' . $aboutSetting->vision_image) }}" class="img-fluid rounded shadow img-hover animated-img" alt="Vision Image">
            </div>
        </div>
    </div>

    <!-- Third Section -->
    <div class="mb-5 section">
        <div class="row align-items-center">
            <div class="col-md-4">
                <img src="{{ asset('uploads/values/' . $aboutSetting->values_image) }}" class="img-fluid rounded shadow img-hover animated-img" alt="Values Image">
            </div>
            <div class="col-md-8">
                <h2 class="text-primary animated-text title-box">{{ $aboutSetting->values_title }}</h2>
                <p class="lead animated-text description-box">
                    {{ $aboutSetting->values_description }}
                </p>
            </div>
        </div>
    </div>

    <hr><hr>

    <!-- Image Row Section (last three images side by side) -->
    <div class="row">
        @for($i = 6; $i <= 8; $i++)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100 card-hover animated-card">
                <a href="#"><img class="card-img-top img-hover animated-img" src="{{ asset('uploads/projects/' . $aboutSetting->{'project_'.$i.'_image'}) }}" alt="Project {{ $i }} Image"></a>
                <div class="card-body">
                    <h4 class="card-title animated-text title-box">
                        <a href="#">{{ $aboutSetting->{'project_'.$i.'_title'} }}</a>
                    </h4>
                    <p class="card-text animated-text description-box">{{ $aboutSetting->{'project_'.$i.'_description'} }}</p>
                </div>
            </div>
        </div>
        @endfor
    </div>
    <hr class="animated-hr">
</div>

@endsection

