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
  <link rel="stylesheet" href="styles/5star.css">

  <!-- *** bootstrap.min.css *** -->
  <link rel="stylesheet" href="{{ asset('frontend/plugins/bootstrap/css/bootstrap.min.css') }}">

  <!-- *** animate.css *** -->
  <link rel="stylesheet" href="{{ asset('frontend/plugins/animate/animate.css') }}">

  <!-- *** Slick Carousel *** -->
  <link rel="stylesheet" href="{{ asset('frontend/plugins/slick/slick.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/plugins/slick/slick-theme.css') }}">

  <!-- *** Star Rating *** -->
  <link rel="stylesheet" href="styles/5star.css">

  <!-- *** Main Stylesheet *** -->
  <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">

  @livewireStyles

</head>
<body>

<!-- *** Main Content *** -->
{{$slot}}

  <!-- *** Footer *** -->
  @include('partials.footer')

</body>

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

    <!-- *** Star Rating Js *** -->

    <!-- *** Google Map *** -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
    <script type="text/javascript" src="{{ asset('frontend/plugins/google-map/gmap.js') }}"></script>

    <!-- *** Main Js File *** -->
    <script src="{{ asset('frontend/js/script.js') }}"></script>

    <!-- *** WYSIWYG *** -->
    <script src="https://cdn.tiny.cloud/1/e6s9yjx9jyt8rooab7kd03t0g70w1nqozgta098bmp7qqyzg/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    @livewireScripts

    @stack('scripts')

</body>
</html>
