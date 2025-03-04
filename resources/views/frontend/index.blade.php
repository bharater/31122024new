@extends('layouts.app')

@section('title', 'Home Page')

@section('content')

<!-- Carousel Section -->
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        @foreach ($sliders as $key => $sliderItem)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                @if ($sliderItem->image)
                    <img src="{{ asset($sliderItem->image) }}" class="d-block w-100" alt="...">
                @endif
                <div class="carousel-caption d-none d-md-block">
                    <div class="custom-carousel-content">
                        <h1>{!! $sliderItem->title !!}</h1>
                        <p>{!! $sliderItem->description !!}</p>
                        <div>
                            <a href="#" class="btn btn-slider text-white">Get Now</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

















<!-- Welcome Section -->
<div class="py-4 bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h4>Welcome to Fuerte Ecom</h4>
                <div class="underline mx-auto"></div>
                <p>Discover amazing products, shop from a wide range of collections, and experience seamless online shopping.</p>
            </div>
        </div>
    </div>
</div>

<!-- Trending Products Section -->
<div class="py-1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Trending Products</h4>
                <div class="underline mb-4"></div>
            </div>

            @if ($trendingProducts->isNotEmpty())
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme four-carousel">
                        @foreach ($trendingProducts as $productItem)
                            <div class="item">
                                <div class="product-card">
                                    <div class="product-card-img">
                                        <label class="stock bg-danger">New</label>

                                        @if ($productItem->productImages->count() > 0)
                                            <a href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                                <img src="{{ asset($productItem->productImages[0]->image) }}" alt="{{ $productItem->name }}">
                                            </a>
                                        @endif
                                    </div>
                                    <div class="product-card-body">
                                        <p class="product-brand">{{ $productItem->brand }}</p>
                                        <h5 class="product-name">
                                            <a href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                                {{ $productItem->name }}
                                            </a>
                                        </h5>
                                        <div>
                                            <span class="selling-price">${{ $productItem->selling_price }}</span>
                                            <span class="original-price">${{ $productItem->original_price }}</span>
                                        </div>
                                        <div class="mt-2">
                                            <a href="#" class="btn btn1">Add To Cart</a>
                                            <a href="#" class="btn btn1"><i class="fa fa-heart"></i></a>
                                            <a href="#" class="btn btn1">View</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="col-md-12">
                    <div class="p-2">
                        <h4>No Trending Products Available</h4>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Featured Products Section -->
<div class="py-1 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-between">
                <h4>Featured Products</h4>
                <a href="{{ url('featured-products') }}" class="btn btn-warning">View More</a>
            </div>
            <div class="underline mb-4"></div>

            @if ($featuredProducts->isNotEmpty())
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme four-carousel">
                        @foreach ($featuredProducts as $productItem)
                            <div class="item">
                                <div class="product-card">
                                    <div class="product-card-img">
                                        <label class="stock bg-danger">New</label>

                                        @if ($productItem->productImages->count() > 0)
                                            <a href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                                <img src="{{ asset($productItem->productImages[0]->image) }}" alt="{{ $productItem->name }}">
                                            </a>
                                        @endif
                                    </div>
                                    <div class="product-card-body">
                                        <p class="product-brand">{{ $productItem->brand }}</p>
                                        <h5 class="product-name">
                                            <a href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                                {{ $productItem->name }}
                                            </a>
                                        </h5>
                                        <div>
                                            <span class="selling-price">${{ $productItem->selling_price }}</span>
                                            <span class="original-price">${{ $productItem->original_price }}</span>
                                        </div>
                                        <div class="mt-2">
                                            <a href="#" class="btn btn1">Add To Cart</a>
                                            <a href="#" class="btn btn1"><i class="fa fa-heart"></i></a>
                                            <a href="#" class="btn btn1">View</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="col-md-12">
                    <div class="p-2">
                        <h4>No Featured Products Available</h4>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- New Arrivals Section -->
<div class="py-1">
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-between">
                <h4>New Arrivals</h4>
                <a href="{{ url('new-arrivals') }}" class="btn btn-warning">View More</a>
            </div>
            <div class="underline mb-4"></div>

            @if ($newArrivalsProducts->isNotEmpty())
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme four-carousel">
                        @foreach ($newArrivalsProducts as $productItem)
                            <div class="item">
                                <div class="product-card">
                                    <div class="product-card-img">
                                        <label class="stock bg-danger">New</label>

                                        @if ($productItem->productImages->count() > 0)
                                            <a href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                                <img src="{{ asset($productItem->productImages[0]->image) }}" alt="{{ $productItem->name }}">
                                            </a>
                                        @endif
                                    </div>
                                    <div class="product-card-body">
                                        <p class="product-brand">{{ $productItem->brand }}</p>
                                        <h5 class="product-name">
                                            <a href="{{ url('/collections/' . $productItem->category->slug . '/' . $productItem->slug) }}">
                                                {{ $productItem->name }}
                                            </a>
                                        </h5>
                                        <div>
                                            <span class="selling-price">${{ $productItem->selling_price }}</span>
                                            <span class="original-price">${{ $productItem->original_price }}</span>
                                        </div>
                                        <div class="mt-2">
                                            <a href="#" class="btn btn1">Add To Cart</a>
                                            <a href="#" class="btn btn1"><i class="fa fa-heart"></i></a>
                                            <a href="#" class="btn btn1">View</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="col-md-12">
                    <div class="p-2">
                        <h4>No New Arrivals Available</h4>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    // Initialize owl carousel
    $('.four-carousel').owlCarousel({
        loop: true,
        margin: 10,
        dots: true,
        nav: false,
        autoplay: false, // Automatic sliding
        autoplayTimeout: 5000, // Time between slides (5 seconds)
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    });
</script>
@endsection

<style>
    /* Hover effects for buttons */
    .btn1:hover {
        background-color: #ffcc00;
        color: #fff;
    }

    .btn-slider:hover {
        background-color: #007bff;
        color: #fff;
    }

    /* Styling for View More button */
    .btn-warning {
        text-align: right;
        padding: 10px 20px;
    }

    .d-flex {
        display: flex;
        justify-content: space-between;
    }
</style>
