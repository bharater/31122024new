<footer class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h4 class="footer-heading">{{$appSetting->website_name ?? 'Website Name'}}</h4>
                <div class="footer-underline"></div>
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                </p>
            </div>
            <div class="col-md-3">
                <h4 class="footer-heading">Quick Links</h4>
                <div class="footer-underline"></div>
                <div class="mb-2"><a href="{{url('/')}}" class="text-white">Home</a></div>
                <div class="mb-2"><a href="{{url('/about')}}" class="text-white">About Us</a></div>
                <div class="mb-2"><a href="{{url('/contact')}}" class="text-white">Contact Us</a></div>
                <div class="mb-2"><a href="{{url('/blogs')}}" class="text-white">Blogs</a></div>
                <div class="mb-2"><a href="{{url('/sitemap')}}" class="text-white">Sitemaps</a></div>
            </div>
            <div class="col-md-3">
                <h4 class="footer-heading">Shop Now</h4>
                <div class="footer-underline"></div>
                <div class="mb-2"><a href="{{url('/collections')}}" class="text-white">Collections</a></div>
                <div class="mb-2"><a href="{{url('/trending')}}" class="text-white">Trending Products</a></div>
                <div class="mb-2"><a href="{{url('/new-arrivals')}}" class="text-white">New Arrivals</a></div>
                <div class="mb-2"><a href="{{url('/featured')}}" class="text-white">Featured Products</a></div>
                <div class="mb-2"><a href="{{url('/cart')}}" class="text-white">Cart</a></div>
            </div>
            <div class="col-md-3">
                <h4 class="footer-heading">Reach Us</h4>
                <div class="footer-underline"></div>
                <div class="mb-2">
                    <p>
                        <i class="fa fa-map-marker"></i>
                        {{$appSetting->address ?? 'Address not available'}}
                    </p>
                </div>
                <div class="mb-2">
                    <a href="tel:{{$appSetting->phone1 ?? '#'}}" class="text-white">
                        <i class="fa fa-phone"></i> {{$appSetting->phone1 ?? 'Phone number'}}
                    </a>
                </div>
                <div class="mb-2">
                    <a href="mailto:{{$appSetting->email1 ?? '#'}}" class="text-white">
                        <i class="fa fa-envelope"></i> {{$appSetting->email1 ?? 'Email address'}}
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="copyright-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <p> &copy; {{ date('Y') }} - {{$appSetting->website_name ?? 'Website Name'}}. All rights reserved.</p>
            </div>
            <div class="col-md-4">
                <div class="social-media">
                    Get Connected:
                    @if ($appSetting->facebook)
                        <a href="{{$appSetting->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a>
                    @endif
                    @if ($appSetting->twitter)
                        <a href="{{$appSetting->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a>
                    @endif
                    @if ($appSetting->instagram)
                        <a href="{{$appSetting->instagram}}" target="_blank"><i class="fa fa-instagram"></i></a>
                    @endif
                    @if ($appSetting->youtube)
                        <a href="{{$appSetting->youtube}}" target="_blank"><i class="fa fa-youtube"></i></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
