@extends('layouts.admin')
@section('title', 'Admin Setting')
@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">

        @if (session('message'))
            <div class="alert alert-success mb-3">
                {{ session('message') }}
            </div>
        @endif

        <form action="{{ url('admin/settings') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Website Settings Section -->
            <div class="card mb-3">
                <div class="card-header bg-primary">
                    <h3 class="text-white mb-0">Website Settings</h3>
                </div>
                <div class="card-body">
                    <div class="row">

                        <!-- Logo Upload Section -->
                        <div class="col-md-6 mb-3">
                            <label for="logo">Website Logo</label>
                            @if ($setting && $setting->logo)
                                <div class="mb-2">
                                    <img src="{{ asset('uploads/logos/' . $setting->logo) }}" alt="Logo" class="img-fluid border" style="max-width: 200px;">
                                </div>
                            @endif
                            <input type="file" name="logo" class="form-control">
                        </div>

                        <!-- Website Name -->
                        <div class="col-md-6 mb-3">
                            <label for="website_name">Website Name</label>
                            <input type="text" name="website_name" value="{{ $setting->website_name ?? '' }}" class="form-control">
                        </div>

                        <!-- Website URL -->
                        <div class="col-md-6 mb-3">
                            <label for="website_url">Website URL</label>
                            <input type="text" name="website_url" value="{{ $setting->website_url ?? '' }}" class="form-control">
                        </div>

                        <!-- Page Title -->
                        <div class="col-md-6 mb-3">
                            <label for="page_title">Page Title</label>
                            <input type="text" name="page_title" value="{{ $setting->page_title ?? '' }}" class="form-control">
                        </div>

                        <!-- Meta Keyword -->
                        <div class="col-md-6 mb-3">
                            <label for="meta_keyword">Meta Keyword</label>
                            <textarea name="meta_keyword" class="form-control" rows="3">{{ $setting->meta_keyword ?? '' }}</textarea>
                        </div>

                        <!-- Meta Description -->
                        <div class="col-md-6 mb-3">
                            <label for="meta_description">Meta Description</label>
                            <textarea name="meta_description" class="form-control" rows="3">{{ $setting->meta_description ?? '' }}</textarea>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Theme Color Section -->
            <div class="card mb-3">
                <div class="card-header bg-primary">
                    <h3 class="text-white mb-0">Theme Settings</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Header Background Color -->
                        <div class="col-md-6 mb-3">
                            <label for="header_bg_color">Header Background Color</label>
                            <div style="position: relative;">
                                <input type="color" name="header_bg_color" value="{{ $setting->header_bg_color ?? '#0000ff' }}" style="width: 100%; height: 36px; border: 1px solid #ced4da; border-radius: 4px; padding: 6px 12px; background: none; cursor: pointer; appearance: none; -webkit-appearance: none; -moz-appearance: znone; box-shadow: none;">
                            </div>
                        </div>

                        <!-- Footer Background Color -->
                        <div class="col-md-6 mb-3">
                            <label for="footer_bg_color">Footer Background Color</label>
                            <div style="position: relative;">
                                <input type="color" name="footer_bg_color" value="{{ $setting->footer_bg_color ?? '#0000ff' }}" style="width: 100%; height: 36px; border: 1px solid #ced4da; border-radius: 4px; padding: 6px 12px; background: none; cursor: pointer; appearance: none; -webkit-appearance: none; -moz-appearance: none; box-shadow: none;">
                            </div>
                        </div>

                        <!-- Link Color -->
                        <div class="col-md-6 mb-3">
                            <label for="link_color">Link Color</label>
                            <div style="position: relative;">
                                <input type="color" name="link_color" value="{{ $setting->link_color ?? '#0000ff' }}" style="width: 100%; height: 36px; border: 1px solid #ced4da; border-radius: 4px; padding: 6px 12px; background: none; cursor: pointer; appearance: none; -webkit-appearance: none; -moz-appearance: none; box-shadow: none;">
                            </div>
                        </div>

                        <!-- Font Color -->
                        <div class="col-md-6 mb-3">
                            <label for="font_color">Font Color</label>
                            <div style="position: relative;">
                                <input type="color" name="font_color" value="{{ $setting->font_color ?? '#0000ff' }}" style="width: 100%; height: 36px; border: 1px solid #ced4da; border-radius: 4px; padding: 6px 12px; background: none; cursor: pointer; appearance: none; -webkit-appearance: none; -moz-appearance: none; box-shadow: none;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Website Information Section -->
            <div class="card mb-3">
                <div class="card-header bg-primary">
                    <h3 class="text-white mb-0">Website Information</h3>
                </div>
                <div class="card-body">
                    <div class="row">

                        <!-- Address -->
                        <div class="col-md-12 mb-3">
                            <label for="address">Address</label>
                            <textarea name="address" class="form-control" rows="3">{{ $setting->address ?? '' }}</textarea>
                        </div>

                        <!-- Phone Numbers -->
                        <div class="col-md-6 mb-3">
                            <label for="phone1">Phone 1</label>
                            <input type="text" name="phone1" value="{{ $setting->phone1 ?? '' }}" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="phone2">Phone No. 2</label>
                            <input type="text" name="phone2" value="{{ $setting->phone2 ?? '' }}" class="form-control">
                        </div>

                        <!-- Emails -->
                        <div class="col-md-6 mb-3">
                            <label for="email1">Email ID 1</label>
                            <input type="text" name="email1" value="{{ $setting->email1 ?? '' }}" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email2">Email ID 2</label>
                            <input type="text" name="email2" value="{{ $setting->email2 ?? '' }}" class="form-control">
                        </div>

                    </div>
                </div>
            </div>

            <!-- Social Media Links Section -->
            <div class="card mb-3">
                <div class="card-header bg-primary">
                    <h3 class="text-white mb-0">Social Media Links</h3>
                </div>
                <div class="card-body">
                    <div class="row">

                        <!-- Social Links -->
                        <div class="col-md-6 mb-3">
                            <label for="facebook">Facebook</label>
                            <input type="text" name="facebook" value="{{ $setting->facebook ?? '' }}" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="instagram">Instagram</label>
                            <input type="text" name="instagram" value="{{ $setting->instagram ?? '' }}" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="youtube">YouTube</label>
                            <input type="text" name="youtube" value="{{ $setting->youtube ?? '' }}" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="twitter">Twitter</label>
                            <input type="text" name="twitter" value="{{ $setting->twitter ?? '' }}" class="form-control">
                        </div>

                    </div>
                </div>
            </div>

            <!-- Save Button -->
            <div class="text-end">
                <button type="submit" class="btn btn-primary text-white">Save Settings</button>
            </div>

        </form>
    </div>
</div>

@endsection
    