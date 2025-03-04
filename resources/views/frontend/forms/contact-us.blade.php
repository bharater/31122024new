@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-1 animated-title title-box">Contact Us</h1>
    <hr class="animated-hr">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        <!-- Left Column: Contact Details and Map -->
        <div class="col-md-6 d-flex flex-column justify-content-between">
            <div class="contact-details mb-4">
                <h2 class="animated-title">Flipkart Contact Details</h2>
                <p class="animated-text"><strong>Customer Support:</strong> 1800 202 9898</p>
                <p class="animated-text"><strong>Email:</strong> cs@flipkart.com</p>
                <p class="animated-text"><strong>Corporate Office:</strong></p>
                <p class="animated-text">Flipkart Internet Pvt Ltd.,</p>
                <p class="animated-text">Buildings Alyssa, Begonia & Clove Embassy Tech Village,</p>
                <p class="animated-text">Outer Ring Road, Devarabeesanahalli Village,</p>
                <p class="animated-text">Bengaluru, 560103, Karnataka, India</p>
            </div>

            <div class="map-section">
                <h2 class="animated-title title-box">Our Location</h2>
                <div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 100%;">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3916.505776305484!2d77.6457522153168!3d12.93523799088165!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae144aeadf0e9d%3A0x8c2a23b4514b2f25!2sFlipkart%20Internet%20Private%20Limited!5e0!3m2!1sen!2sin!4v1649495912962!5m2!1sen!2sin" 
                    width="100%" height="300px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>

        <!-- Right Column: Contact Form -->
        <div class="col-md-6">
            <form action="{{ route('contact.store') }}" method="POST" class="d-flex flex-column h-100">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label animated-text title-box">Name</label>
                    <input type="text" class="form-control animated-input" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label animated-text title-box">Email</label>
                    <input type="email" class="form-control animated-input" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label animated-text title-box">Phone</label>
                    <input type="text" class="form-control animated-input" id="phone" name="phone" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label animated-text title-box">Message</label>
                    <textarea class="form-control animated-input" id="message" name="message" rows="10" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-hover mt-auto">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
