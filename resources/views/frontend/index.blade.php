@extends('layouts.app')

@section('title', 'Home Page')

@section('content')

<!--slider section start-->
<div class="hero-section section position-relative">
    <!-- Debug line to check image path - remove after fixing -->
    @if(env('APP_DEBUG'))
        <!-- Current Image Paths: -->
        @foreach($sliders as $slider)
            <!-- {{ $slider->image }} -->
        @endforeach
    @endif

    <div class="tf-element-carousel slider-nav">
        @foreach($sliders as $key => $sliderItem)
            <!--Hero Item start-->
            <div class="hero-item">
                <!-- Change from background-image to direct img tag for testing -->
                <img src="{{ asset($sliderItem->image) }}" alt="Slider Image" style="width: 100%; height: 600px; object-fit: cover; position: absolute;">
                <div class="container position-relative" style="z-index: 2;">
                    <div class="row">
                        <div class="col-12">
                            <div class="hero-content-2 {{ $key == 0 ? 'color-1 center' : 'color-2' }}">
                                <h2>view our</h2>
                                <h1>{!! $sliderItem->title !!}</h1>
                                <h3>{!! $sliderItem->description !!}</h3>
                                <a href="#" class="btn-slider">shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Hero Item end-->
        @endforeach
    </div>
</div>
<!--slider section end-->

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

@section('style')
<style>
.hero-item {
    position: relative;
    height: 600px;
    overflow: hidden;
}

.hero-content-2 {
    position: relative;
    z-index: 2;
}

/* Add overlay */
.hero-item::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0,0,0,0.3);
    z-index: 1;
}

    .hero-section {
        margin-bottom: 30px;
    }
    .hero-item {
        min-height: 600px;
        position: relative;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }
    .hero-content-2 {
        padding: 100px 0;
        position: relative;
        z-index: 2;
    }
    .hero-content-2.center {
        text-align: center;
    }
    .hero-content-2 h2 {
        font-size: 30px;
        text-transform: uppercase;
        margin-bottom: 15px;
    }
    .hero-content-2 h1 {
        font-size: 60px;
        text-transform: uppercase;
        margin-bottom: 15px;
    }
    .hero-content-2 h3 {
        font-size: 30px;
        margin-bottom: 30px;
    }
    .hero-content-2 .btn-slider {
        display: inline-block;
        padding: 15px 30px;
        background: #fff;
        color: #222;
        text-transform: uppercase;
        font-weight: 700;
        border-radius: 50px;
        transition: all 0.3s;
    }
    .hero-content-2 .btn-slider:hover {
        background: #222;
        color: #fff;
    }
    .color-1 {
        color: #222;
    }
    .color-2 {
        color: #fff;
    }
    .hero-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0,0,0,0.2);
        z-index: 1;
    }

    /* Hover effects for buttons */
    .btn1:hover {
        background-color: #ffcc00;
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
@endsection

@section('script')
<script>
$(document).ready(function(){
    $('.tf-element-carousel').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        arrows: true,
        dots: true,
        autoplay: true,
        autoplaySpeed: 5000,
        speed: 500,
        fade: true,
        cssEase: 'linear',
        prevArrow: '<button class="slick-prev"><i class="fa fa-angle-left"></i></button>',
        nextArrow: '<button class="slick-next"><i class="fa fa-angle-right"></i></button>',
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                },
            }
        ]
    });

    // Initialize owl carousel
    $('.four-carousel').owlCarousel({
        loop: true,
        margin: 10,
        dots: true,
        nav: false,
        autoplay: false,
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
});
</script>
@endsection
