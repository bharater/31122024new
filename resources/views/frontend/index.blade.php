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

        <!--Banner section start-->
        <div class="banner-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3">
                        <!-- Single Banner Start -->
        @foreach($sliders as $key => $sliderItem)

                        <div class="single-banner mb-30">
                            <a href="#">
                                <img src="{{ asset($sliderItem->image) }}" alt="">
                            </a>
                        </div>
                        <!-- Single Banner End -->
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <!-- Single Banner Start -->
                        <div class="single-banner mb-30">
                            <a href="#">
                                {{-- <img src="images/h1-banner-2.png" alt=""> --}}
                                <img src="{{ asset($sliderItem->image) }}" alt="">

                            </a>
                        </div>
                        <!-- Single Banner End -->
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <!-- Single Banner Start -->
                        <div class="single-banner mb-30">
                            <a href="#">
                                <img src="{{ asset($sliderItem->image) }}" alt="">

                                {{-- <img src="images/h1-banner-3.png" alt=""> --}}
                            </a>
                        </div>
                        <!-- Single Banner End -->
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <!--Banner section end-->


                <!--Deal Of Product section start-->
                <div class="deal-product-section section pt-70 pt-lg-50 pt-md-40 pt-sm-30 pt-xs-20">
                    <div class="container">
                        <div class="row">
                            <!-- Section Title Start -->
                            <div class="col">
                                <div class="section-title mb-40 mb-xs-20">
                                    <h2>Deals of the day</h2>
                                </div>
                            </div>
                            <!-- Section Title End -->
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="tf-element-carousel" data-slick-options="{
                                " slidestoshow":="" 1,="" "slidestoscroll":="" "infinite":="" true,="" "arrows":="" "prevarrow":="" {"buttonclass":="" "slick-btn="" slick-prev",="" "iconclass":="" "fa="" fa-angle-left"="" },="" "nextarrow":="" slick-next",="" fa-angle-right"="" }="" }"="" data-slick-responsive="[
                                {" breakpoint":768,="" "settings":="" {="" "slidestoshow":="" false,="" "autoplay":="" true="" }},="" {"breakpoint":575,="" }}="" ]"="">
                                    <!-- Single Deal Product Start -->
                                    <div class="single-deal-product">
                                        <div class="row">
                                            @foreach($sliders as $key => $sliderItem)
                                            <div class="col-lg-6 col-md-6">
                                                <div class="deal-product-img">
                                                    <a href="#">
                                                        <img src="{{ asset($sliderItem->image) }}" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="deal-product-content">
                                                    <h3><a href="single-product.html">Aftershave Lotion</a></h3>
                                                    <div class="ratting">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <h4 class="price"><span class="new">€110.00</span><span class="old">€130.00</span></h4>
                                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                                                        nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat
                                                        volutpat. Ut wisi..</p>
                                                    <div class="cs-countdown black-color">
                                                        <div class="pro-countdown" data-countdown="2021/01/10"></div>
                                                    </div>
                                                    <div class="actoion-box">
                                                        <div class="product-action d-flex justify-content-between">
                                                            <a class="product-btn" href="#">Add to Cart</a>
                                                            <ul class="d-flex">
                                                                <li><a href="#quick-view-modal-container" data-bs-toggle="modal" title="Quick View"><i class="fa fa-eye"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-heart-o"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-exchange"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @endforeach
                                    <!-- Single Deal Product End -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Deal Of Product section end-->




<!--Product section start-->
<div class="product-section section pt-100 pt-lg-70 pt-md-65 pt-sm-60 pt-xs-45 pb-70 pb-lg-50 pb-md-40 pb-sm-30 pb-xs-20">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="product-tab-menu mb-40 mb-xs-20">
                    <ul class="nav">
                        <li><a class="active" data-bs-toggle="tab" href="#products">New Products</a></li>
                        <li><a data-bs-toggle="tab" href="#onsale">OnSale</a></li>
                        <li><a data-bs-toggle="tab" href="#featureproducts">Feature Products</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="featureproducts">
                        <div class="row product-slider">
                            @foreach ($featuredProducts as $productItem)
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="single-product mb-30">
                                    <div class="product-img">
                                        @if ($productItem->productImages->count() > 0)
                                            <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                                                <img src="{{ asset($productItem->productImages[0]->image) }}" alt="{{ $productItem->name }}">
                                            </a>
                                        @endif
                                        <span class="descount-sticker">-10%</span>
                                        <span class="sticker">New</span>
                                        <div class="product-action d-flex justify-content-between">
                                            <a class="product-btn" href="#">Add to Cart</a>
                                            <ul class="d-flex">
                                                <li><a href="#quick-view-modal-container" data-bs-toggle="modal" title="Quick View"><i class="fa fa-eye"></i></a></li>
                                                <li><a href="#"><i class="fa fa-heart-o"></i></a></li>
                                                <li><a href="#"><i class="fa fa-exchange"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3>
                                            <a href="{{ url('/collections/'.$productItem->category->slug.'/'.$productItem->slug) }}">
                                                {{ $productItem->name }}
                                            </a>
                                        </h3>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <h4 class="price">
                                            <span class="new">${{ $productItem->selling_price }}</span>
                                            @if($productItem->original_price > $productItem->selling_price)
                                                <span class="old">${{ $productItem->original_price }}</span>
                                            @endif
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Product section end-->




        <!--Call To Action section start-->
        <div class="cta-section section bg-image pt-90 pt-lg-70 pt-md-60 pt-sm-50 pt-xs-40 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-40"
    data-bg="{{ asset($sliders[0]->image ?? '') }}">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cta-content">
                    <h3>Get <span>10%</span> Discount</h3>
                    <p><span>Subscribe to the TheFace mailing list to receive updates on new arrivals,</span>
                        <span>special offers and other discount information.</span></p>
                    <div class="cta-form">
                        <form id="mc-form" class="mc-form">
                            <input id="mc-email" type="email" autocomplete="off" placeholder="Your email address here">
                            <button id="mc-submit" class="cta-btn">Subscribe</button>
                        </form>
                        <!-- mailchimp-alerts Start -->
                        <div class="mailchimp-alerts text-centre">
                            <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                            <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                            <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <!--Call To Action section end-->



        <!--List Product section start-->
        <div class="list-section section pt-95 pt-lg-75 pt-md-65 pt-sm-55 pt-xs-45 pb-30 pb-lg-10 pb-md-0 pb-sm-0 pb-xs-0">
    <div class="container">
        <!-- Add Product Tab Menu -->
        <div class="row">
            <div class="col-12">
                <div class="product-tab-menu mb-40 mb-xs-20">
                    <ul class="nav justify-content-center">
                        <li><a class="active" data-bs-toggle="tab" href="#trending-tab">Trending Products</a></li>
                        <li><a data-bs-toggle="tab" href="#new-arrivals-tab">New Arrivals</a></li>
                        <li><a data-bs-toggle="tab" href="#featured-tab">Featured Products</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="tab-content">
                    <!-- Trending Products Tab -->
                    <div class="tab-pane fade show active" id="trending-tab">
                        <div class="row">
                            @foreach($trendingProducts->take(3) as $product)
                            <div class="col-lg-4 col-md-6 col-sm-6 mb-40">
                                <div class="single-list-product">
                                    <div class="list-product-inner d-flex">
                                        <div class="product-image">
                                            @if($product->productImages->count() > 0)
                                            <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}">
                                                <img src="{{ asset($product->productImages[0]->image) }}" alt="{{ $product->name }}" style="width: 100px; height: 100px; object-fit: cover;">
                                            </a>
                                            @endif
                                        </div>
                                        <div class="product-content">
                                            <h3><a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}">{{ $product->name }}</a></h3>
                                            <h4 class="price">
                                                <span class="new">${{ $product->selling_price }}</span>
                                                @if($product->original_price > $product->selling_price)
                                                <span class="old">${{ $product->original_price }}</span>
                                                @endif
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- New Arrivals Tab -->
                    <div class="tab-pane fade" id="new-arrivals-tab">
                        <div class="row">
                            @foreach($newArrivalsProducts->take(3) as $product)
                            <div class="col-lg-4 col-md-6 col-sm-6 mb-40">
                                <div class="single-list-product">
                                    <div class="list-product-inner d-flex">
                                        <div class="product-image">
                                            @if($product->productImages->count() > 0)
                                            <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}">
                                                <img src="{{ asset($product->productImages[0]->image) }}" alt="{{ $product->name }}" style="width: 100px; height: 100px; object-fit: cover;">
                                            </a>
                                            @endif
                                        </div>
                                        <div class="product-content">
                                            <h3><a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}">{{ $product->name }}</a></h3>
                                            <h4 class="price">
                                                <span class="new">${{ $product->selling_price }}</span>
                                                @if($product->original_price > $product->selling_price)
                                                <span class="old">${{ $product->original_price }}</span>
                                                @endif
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Featured Products Tab -->
                    <div class="tab-pane fade" id="featured-tab">
                        <div class="row">
                            @foreach($featuredProducts->take(3) as $product)
                            <div class="col-lg-4 col-md-6 col-sm-6 mb-40">
                                <div class="single-list-product">
                                    <div class="list-product-inner d-flex">
                                        <div class="product-image">
                                            @if($product->productImages->count() > 0)
                                            <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}">
                                                <img src="{{ asset($product->productImages[0]->image) }}" alt="{{ $product->name }}" style="width: 100px; height: 100px; object-fit: cover;">
                                            </a>
                                            @endif
                                        </div>
                                        <div class="product-content">
                                            <h3><a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug) }}">{{ $product->name }}</a></h3>
                                            <h4 class="price">
                                                <span class="new">${{ $product->selling_price }}</span>
                                                @if($product->original_price > $product->selling_price)
                                                <span class="old">${{ $product->original_price }}</span>
                                                @endif
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--List Product section end-->


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

/* Removed the overlay filter */

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
    font-size: 20px;
    line-height: 1;
    text-decoration: underline;
    /* display: block; */
    color: #cea679 !important;
    font-weight: 600;
    width: fit-content;

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

    /* Remove the before pseudo-element that was adding the dark overlay */
    .hero-item::before {
        display: none;
    }

    /* Remove the after pseudo-element that was adding the dark overlay */
    .hero-item::after {
        display: none;
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

    /* Custom Navigation Styling */
    .slick-prev, .slick-next {
        background: rgba(255, 255, 255, 0.7);
        width: auto;
        height: auto;
        padding: 10px 20px;
        border-radius: 5px;
        z-index: 10;
        font-weight: bold;
        transition: all 0.3s ease;
    }

    .slick-prev {
        left: 20px;
    }

    .slick-next {
        right: 20px;
    }

    .slick-prev:hover, .slick-next:hover {
        background: rgba(255, 255, 255, 0.9);
    }

    .slick-prev:before {
        content: 'Prev';
        color: #000;
        font-family: Arial, sans-serif;
    }

    .slick-next:before {
        content: 'Next';
        color: #000;
        font-family: Arial, sans-serif;
    }

    /* Add these new styles */
    .product-slider .slick-track {
        display: flex;
        margin-left: 0;
        margin-right: 0;
    }

    .product-slider .slick-slide {
        /* margin: 0 15px; */
        height: auto;
    }

    .product-slider {
        margin: 0 -15px;
    }

    .single-product {
        margin-bottom: 30px;
        height: 100%;
    }

    /* Add these new styles for consistent card sizes */
    .single-product {
        height: 100%;
        display: flex;
        flex-direction: column;
        background: #fff;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .product-img {
        position: relative;
        width: 100%;
        padding-top: 100%; /* Create a square aspect ratio */
        overflow: hidden;
    }

    .product-img img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover; /* This will ensure images cover the area without distortion */
    }

    .product-content {
        /* padding: 4px; */
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .product-content h3 {
        /* margin-bottom: 4px; */
        font-size: 16px;
        line-height: 1;
        height: 22px; /* Set fixed height for title - allows for 2 lines */
        overflow: hidden;
    }

    .product-content .ratting {
        /* margin-bottom: 4px; */
    }

    .product-content .price {
        margin-top: auto; /* Push price to bottom */
    }

    /* Ensure slider items maintain consistent width */
    .product-slider .slick-slide > div {
        height: 100%;
    }

    .product-slider .col-lg-3 {
        height: 100%;
    }

    /* Add these new styles for list products */
    .list-product-wrapper {
        display: flex;
        flex-direction: column;
    }

    .single-list-product {
        border-bottom: 1px solid #eee;
        padding-bottom: 15px;
    }

    .single-list-product:last-child {
        border-bottom: none;
    }

    .list-product-inner {
        gap: 15px;
    }

    .list-product-inner .product-image {
        flex: 0 0 100px;
    }

    .list-product-inner .product-content {
        flex: 1;
        padding: 10px 0;
    }

    .list-product-inner .product-content h3 {
        margin: 0 0 10px;
        font-size: 14px;
        line-height: 1.4;
    }

    .list-product-inner .price {
        font-size: 16px;
        margin: 0;
    }

    .list-product-inner .price .old {
        margin-left: 5px;
        text-decoration: line-through;
        color: #999;
    }

    /* Add these styles for the product tab menu */
    .product-tab-menu .nav {
        border-bottom: 1px solid #eee;
        margin-bottom: 30px;
    }

    .product-tab-menu .nav li {
        margin: 0 15px;
    }

    .product-tab-menu .nav li a {
        font-size: 18px;
        font-weight: 500;
        color: #333;
        padding: 0 0 10px;
        position: relative;
        cursor: pointer;
    }

    .product-tab-menu .nav li a:after {
        content: '';
        position: absolute;
        left: 0;
        bottom: -1px;
        width: 0;
        height: 2px;
        background: #cea679;
        transition: all 0.3s ease;
    }

    .product-tab-menu .nav li a.active,
    .product-tab-menu .nav li a:hover {
        color: #cea679;
    }

    .product-tab-menu .nav li a.active:after,
    .product-tab-menu .nav li a:hover:after {
        width: 100%;
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
        // Removed fade: true
        // Removed cssEase: 'linear'
        prevArrow: '<button type="button" class="slick-prev">Prev</button>',
        nextArrow: '<button type="button" class="slick-next">Next</button>',
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                }
            }
        ]
    });

    $('.product-slider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        infinite: true,
        arrows: true,
        dots: false,
        autoplay: true,
        autoplaySpeed: 5000,
        speed: 500,
        prevArrow: '<button type="button" class="slick-prev">Prev</button>',
        nextArrow: '<button type="button" class="slick-next">Next</button>',
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    arrows: false
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                    arrows: false
                }
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
