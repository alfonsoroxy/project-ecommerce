<!-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title> -->

        <!-- Fonts -->
        <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> -->

        <!-- Styles -->
        <!-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> -->

        <!-- Scripts -->
        <!-- <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
    </body>
</html> -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, user-scalable=no, intial-scale=1.0,
    maximum-scale=1.0, minimum-scale=1.0">
  <title>Ite Inflammate Omnia</title>

  <!-- *** Favicon *** -->
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/images/favicon.png') }}" />

  <!-- *** Font Icon *** -->
  <link rel="stylesheet" href="{{ asset('frontend/plugins/themefisher-font/style.css') }}">

  <!-- *** bootstrap.min.css *** -->
  <link rel="stylesheet" href="{{ asset('frontend/plugins/bootstrap/css/bootstrap.min.css') }}">

  <!-- *** animate.css *** -->
  <link rel="stylesheet" href="{{ asset('frontend/plugins/animate/animate.css') }}">

  <!-- *** Slick Carousel *** -->
  <link rel="stylesheet" href="{{ asset('frontend/plugins/slick/slick.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/plugins/slick/slick-theme.css') }}">

  <!-- *** Main Stylesheet *** -->
  <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
  @livewireStyles
</head>

<body>
<!-- *** Main Content Starts *** -->
{{$slot}}
<!-- *** Main Content Ends *** -->

    <!-- *** Main jQuery *** -->
    <script src="{{ asset('frontend/plugins/jquery/dist/jquery.min.js') }}"></script>

    <!-- *** Bootstrap 3.1 *** -->
    <script src="{{ asset('frontend/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- *** Bootstrap Touchpin *** -->
    <script src="{{ asset('frontend/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') }}"></script>

    <!-- *** Instagram Feed Js *** -->
    <script src="{{ asset('frontend/plugins/instafeed/instafeed.min.js') }}"></script>

    <!-- *** Video Lightbox Plugin *** -->
    <script src="{{ asset('frontend/plugins/ekko-lightbox/dist/ekko-lightbox.min.js') }}"></script>

    <!-- *** Count Down Js *** -->
    <script src="{{ asset('frontend/plugins/syo-timer/build/jquery.syotimer.min.js') }}"></script>

    <!-- *** slick Carousel *** -->
    <script src="{{ asset('frontend/plugins/slick/slick.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/slick/slick-animation.min.js') }}"></script>

    <!-- *** Google Map *** -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
    <script type="text/javascript" src="{{ asset('frontend/plugins/google-map/gmap.js') }}"></script>

    <!-- *** Main Js File *** -->
    <script src="{{ asset('frontend/js/script.js') }}"></script>
    @livewireScripts

</body>
</html>
