<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="@yield('meta_keyword')">
    <meta name="author" content="E Com">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('assets/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/exzoom/jquery.exzoom.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/helper.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/iconfont.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">

    <!-- Alertify CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/default.min.css"/>

    <!-- Add Slick Slider CSS -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

    <style>
        /* Apply the theme colors */
        .header {
            background-color: {{ $appSetting->header_bg_color ?? 'blue ' }} !important;
        }

        footer {
            background-color: {{ $appSetting->footer_bg_color ?? 'blue' }} !important;
        }

        a {
            color: {{ $appSetting->link_color ?? 'blue' }} !important;
        }

        body {
            color: {{ $appSetting->font_color ?? 'black' }} !important;
        }
    </style>

    @livewireStyles
    @yield('style')
</head>

<body>
    <div id="app">
        @include('layouts.inc.frontend.navbar')

        <main>
            @yield('content')
        </main>

        @include('layouts.inc.frontend.footer')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-migrate-3.3.2.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
    <script>
        window.addEventListener('message', event => {
            alertify.set('notifier', 'position', 'top-right');
            alertify.notify(event.detail.text, event.detail.type);
        });
    </script>

    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/exzoom/jquery.exzoom.js') }}"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    @yield('script')

    @livewireScripts
    @stack('scripts')
</body>
</html>
