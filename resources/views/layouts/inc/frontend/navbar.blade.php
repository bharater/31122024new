


        <!--Header section start-->
        <header class="header header-transparent header-sticky">
            <div class="header-top bg-dark">
                <div class="container-fluid pl-75 pr-75 pl-lg-15 pr-lg-15 pl-md-15 pr-md-15 pl-sm-15 pr-sm-15 pl-xs-15 pr-xs-15">
                    <div class="row align-items-center">

                        <div class="col-xl-6 col-lg-8 d-flex flex-wrap justify-content-lg-start justify-content-center align-items-center">
                            {{-- <!--Links start-->
                            <div class="header-top-links color-white">
                                <ul>
                                    <li><a href="#"><i class="fa fa-phone"></i>(08) 123 456 7890</a></li>
                                    <li><a href="#"><i class="fa fa-envelope-open-o"></i>yourmail@domain.com</a></li>
                                </ul>
                            </div>
                            <!--Links end--> --}}
                            <!--Socail start-->
                            <div class="header-top-social color-white">
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-vimeo"></i></a>
                            </div>
                            <!--Socail end-->
                        </div>
                        <div class="col-xl-6 col-lg-4">
                            <div class="ht-right d-flex justify-content-lg-end justify-content-center">
                                <ul class="ht-us-menu color-white d-flex">
                                    <li><a href="#"><i class="fa fa-user-circle-o"></i>Login</a>
                                        <ul class="ht-dropdown right">
                                            <li><a href="compare.html">Compare Products</a></li>
                                            <li><a href="my-account.html">My Account</a></li>
                                            <li><a href="wishlist.html">My Wish List</a></li>
                                            <li><a href="login-register.html">Sign In</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <ul class="ht-cr-menu color-white d-flex">
                                    <li><a href="#">EUR</a>
                                        <ul class="ht-dropdown width-20">
                                            <li><a href="#">USD</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#"><img src="images/english.png" alt="">English2</a>
                                        <ul class="ht-dropdown width-50">
                                            <li><a href=""><img src="images/english.png" alt="">English1</a></li>
                                            <li><a href=""><img src="images/english.png" alt="">English3</a></li>
                                            <li><a href=""><img src="images/english.png" alt="">English4</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="header-bottom menu-right bg-dark">
                <div class="container-fluid pl-75 pr-75 pl-lg-15 pr-lg-15 pl-md-15 pr-md-15 pl-sm-15 pr-sm-15 pl-xs-15 pr-xs-15">
                    <div class="row align-items-center">

                        <!--Logo start-->
                        <div class="col-lg-3 col-md-3 col-6 order-lg-1 order-md-1 order-1">
                            <div class="logo">
                                @if(isset($appSetting->logo))
                                <img src="{{ asset('uploads/logos/' . $appSetting->logo) }}" alt="Website Logo"
                                    style="max-width:120px; margin-right: 10px;">
                                @endif
                            </div>
                        </div>
                        <!--Logo end-->

                        <!-- Brand Name and Logo -->
                {{-- <div class="col-md-2 my-auto d-none d-md-block">
                    <div class="d-flex align-items-center">

                        <h5 class="brand-name">
                            {{ $appSetting->website_name ?? '' }}
                        </h5>
                    </div>
                </div> --}}

                        <!--Menu start-->
                        <div class="col-lg-6 col-md-6 col-12 order-lg-2 order-md-2 order-3 d-flex justify-content-center">
                            <nav class="main-menu color-white">
                                <ul>
                                    {{-- <li><a href="index.html">Home</a> --}}
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>

                                        <ul class="sub-menu">
                                            <li><a href="index.html">Home One</a></li>
                                            <li><a href="index-2.html">Home Two</a></li>
                                            <li><a href="index-3.html">Home Three</a></li>
                                            <li><a href="index-4.html">Home Four</a></li>
                                            <li><a href="index-5.html">Home Five</a></li>
                                            <li><a href="index-6.html">Home Six</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="shop.html">Shop</a>
                                        <ul class="mega-menu four-column">
                                            <li><a href="#" class="item-link">Pages</a>
                                                <ul>
                                                    <li><a href="compare.html">Compare</a></li>
                                                    <li><a href="cart.html">Shopping Cart</a></li>
                                                    <li><a href="checkout.html">Checkout</a></li>
                                                    <li><a href="wishlist.html">Wishlist</a></li>
                                                    <li><a href="my-account.html">My Account</a></li>
                                                    <li><a href="login-register.html">Login Register</a></li>
                                                    <li><a href="faq.html">Frequently Questions</a></li>
                                                    <li><a href="404.html">Error 404</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#" class="item-link">Shop Layout</a>
                                                <ul>
                                                    <li><a href="shop.html">Shop</a></li>
                                                    <li><a href="shop-three-column.html">Shop Three Column</a></li>
                                                    <li><a href="shop-four-column.html">Shop Four Column</a></li>
                                                    <li><a href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
                                                    <li><a href="shop-list-nosidebar.html">Shop List No Sidebar</a></li>
                                                    <li><a href="shop-list-left-sidebar.html">Shop List Left Sidebar</a>
                                                    </li>
                                                    <li><a href="shop-list-right-sidebar.html">Shop List Right
                                                            Sidebar</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#" class="item-link">Product Details</a>
                                                <ul>
                                                    <li><a href="single-product.html">Single Product</a></li>
                                                    <li><a href="single-product-variable.html">Variable Product</a></li>
                                                    <li><a href="single-product-affiliate.html">Affiliate Product</a>
                                                    </li>
                                                    <li><a href="single-product-group.html">Group Product</a></li>
                                                    <li><a href="single-product-tabstyle-2.html">Product Left Tab</a>
                                                    </li>
                                                    <li><a href="single-product-tabstyle-3.html">Product Right Tab</a>
                                                    </li>
                                                    <li><a href="single-product-gallery-left.html">Product Gallery
                                                            Left</a></li>
                                                    <li><a href="single-product-gallery-right.html">Product Gallery
                                                            Right</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#" class="item-link">Product Details</a>
                                                <ul>
                                                    <li><a href="single-product-sticky-left.html">Product Sticky
                                                            Left</a></li>
                                                    <li><a href="single-product-sticky-right.html">Product Sticky
                                                            Right</a></li>
                                                    <li><a href="single-product-slider-box.html">Product Box Slider</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="blog.html">Blog</a>
                                        <ul class="sub-menu">
                                            <li><a href="blog.html">Blog Three Column</a></li>
                                            <li><a href="blog-two-column.html">Blog Two Column</a></li>
                                            <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
                                            <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                                            <li><a href="blog-details.html">Blog Details</a></li>
                                            <li><a href="blog-details-gallery.html">Blog Details Gallery</a></li>
                                            <li><a href="blog-details-audio.html">Blog Details Audio</a></li>
                                            <li><a href="blog-details-video.html">Blog Details Video</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="{{ url('/about-us') }}">About Us</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{ url('/contact-us') }}">Contact Us</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!--Menu end-->

                        <!--Search Cart Start-->
                        <div class="col-lg-3 col-md-3 col-6 order-lg-3 order-md-3 order-2 d-flex justify-content-end">
                            <div class="header-search">
                                <button class="header-search-toggle color-white"><i class="fa fa-search"></i></button>
                                <div class="header-search-form">
                                    <form action="#">
                                        <input type="text" placeholder="Type and hit enter">
                                        <button><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                            </div>
                            <div class="header-cart color-white">
                                <a href="cart.html"><i class="fa fa-shopping-cart"></i><span>  @livewire('frontend.cart.cart-count')</span></a>

                                <!--Mini Cart Dropdown Start-->
                                <div class="header-cart-dropdown">
                                    <ul class="cart-items">
                                        <li class="single-cart-item">
                                            <div class="cart-img">
                                                <a href="cart.html"><img src="images/cart-1.jpg" alt=""></a>
                                            </div>
                                            <div class="cart-content">
                                                <h5 class="product-name"><a href="single-product.html">Dell Inspiron
                                                        24</a></h5>
                                                <span class="product-quantity">1 ×</span>
                                                <span class="product-price">$278.00</span>
                                            </div>
                                            <div class="cart-item-remove">
                                                <a title="Remove" href="#"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </li>
                                        <li class="single-cart-item">
                                            <div class="cart-img">
                                                <a href="cart.html"><img src="images/cart-2.jpg" alt=""></a>
                                            </div>
                                            <div class="cart-content">
                                                <h5 class="product-name"><a href="single-product.html">Lenovo Ideacentre
                                                        300</a></h5>
                                                <span class="product-quantity">1 ×</span>
                                                <span class="product-price">$23.39</span>
                                            </div>
                                            <div class="cart-item-remove">
                                                <a title="Remove" href="#"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="cart-total">
                                        <h5>Subtotal :<span class="float-right">$39.79</span></h5>
                                        <h5>Eco Tax (-2.00) :<span class="float-right">$7.00</span></h5>
                                        <h5>VAT (20%) : <span class="float-right">$0.00</span></h5>
                                        <h5>Total : <span class="float-right">$46.79</span></h5>
                                    </div>
                                    <div class="cart-btn">

                                        <a href="{{ url('cart') }}">View Cart</a>
                                        <a href="checkout.html">checkout</a>
                                    </div>
                                </div>
                                <!--Mini Cart Dropdown End-->
                            </div>
                        </div>
                        <!--Search Cart End-->
                    </div>

                    <!--Mobile Menu start-->
                    <div class="row">
                        <div class="col-12 d-flex d-lg-none d-block">
                            <div class="mobile-menu"></div>
                        </div>
                    </div>
                    <!--Mobile Menu end-->

                </div>
            </div>
        </header>
        <!--Header section end-->



{{--
<div class="main-navbar shadow-sm sticky-top">
    <div class="top-navbar header">
        <div class="container-fluid">
            <div class="row">
                <!-- Brand Name and Logo -->
                <div class="col-md-2 my-auto d-none d-md-block">
                    <div class="d-flex align-items-center">
                        @if(isset($appSetting->logo))
                        <img src="{{ asset('uploads/logos/' . $appSetting->logo) }}" alt="Website Logo"
                            style="max-width:120px; margin-right: 10px;">
                        @endif
                        <h5 class="brand-name">
                            {{ $appSetting->website_name ?? '' }}
                        </h5>
                    </div>
                </div>
                <!-- Brand Name -->
                {{-- <div class="col-md-2 my-auto d-none d-md-block">
                    <h5 class="brand-name">
                        {{ $appSetting->website_name ?? 'Website Name' }}
                    </h5>
                </div> --}}
                <!-- Search Bar -->
                {{-- <div class="col-md-5 my-auto">
                    <form role="search" action="{{ url('search') }}" method="GET">
                        <div class="input-group">
                            <input type="search" name="search" value="{{ Request::get('search') }}"
                                placeholder="Search your product" class="form-control" />
                            <button class="btn bg-white" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div> --}}
                <!-- Right-side Navbar Links -->
                {{-- <div class="col-md-5 my-auto">
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('cart') }}">
                                <i class="fa fa-shopping-cart"></i> Cart
                                @livewire('frontend.cart.cart-count')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ url('wishlist') }}">
                                <i class="fa fa-heart"></i> Wishlist
                                @livewire('frontend.wishlist-count')
                            </a>
                        </li>
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item text-white">
                            <a class="nav-link text-white" href="{{ route('login') }}">Login</a>
                        </li>
                        @endif
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('register') }}">Register</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown text-white">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-user text-white"></i> {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ url('profile') }}"><i class="fa fa-user"></i>
                                        Profile</a></li>
                                <li><a class="dropdown-item" href="{{ url('orders') }}"><i class="fa fa-list"></i> My
                                        Orders</a></li>
                                <li><a class="dropdown-item" href="{{ url('wishlist') }}"><i class="fa fa-heart"></i> My
                                        Wishlist</a></li>
                                <li><a class="dropdown-item" href="{{ url('cart') }}"><i
                                            class="fa fa-shopping-cart"></i> My Cart</a></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out"></i> Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Bottom Navbar -->
    {{-- <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand d-md-none" href="{{ url('/') }}">Ecom</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/collections') }}">All Categories</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/new-arrivals') }}">New Arrivals</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/featured-products') }}">Featured
                            Products</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/electronics') }}">Electronics</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/fashion') }}">Fashions</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/accessories') }}">Accessories</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/about-us') }}">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/contact-us') }}">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div> --}}
