{{--
  Dinamikus layout (Layouts Using Components) – az órai mainpage komponens továbbfejlesztése
  a "Pizza" (Colorlib, CC BY 3.0) reszponzív Bootstrap 4 template-tel.

  Használat:
    <x-mainpage title="Oldal címe" hero="Fejléc szöveg" heroImg="bg_3.jpg"> ... </x-mainpage>
  Ha nincs "hero", nincs aloldal-fejléc (pl. a főoldalnál, ahol saját slider van).
--}}
@props(['title' => null, 'hero' => null, 'heroImg' => 'bg_1.jpg', 'breadcrumb' => null])
<!DOCTYPE html>
<html lang="hu">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ? $title.' | ' : '' }}Pizzéria</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('template/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/style.css') }}">
    {{-- Saját kiegészítések (táblázatok, űrlap hibák, üzenetek) --}}
    <link rel="stylesheet" href="{{ asset('css/sajat.css') }}">
    @stack('head')
  </head>
  <body>
    @include('header')

    @if ($hero)
      <section class="home-slider owl-carousel img" style="background-image: url({{ asset('template/images/bg_1.jpg') }});">
        <div class="slider-item" style="background-image: url({{ asset('template/images/'.$heroImg) }});">
          <div class="overlay"></div>
          <div class="container">
            <div class="row slider-text justify-content-center align-items-center">
              <div class="col-md-8 col-sm-12 text-center ftco-animate">
                <h1 class="mb-3 mt-5 bread">{{ $hero }}</h1>
                <p class="breadcrumbs">
                  <span class="mr-2"><a href="{{ route('home') }}">Főoldal</a></span>
                  <span>{{ $breadcrumb ?? $hero }}</span>
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>
    @endif

    {{-- Visszajelzések (session flash) --}}
    @if (session('siker') || session('hiba') || session('status'))
      <div class="container mt-4">
        @if (session('siker'))
          <div class="alert alert-sajat alert-siker" role="alert">{{ session('siker') }}</div>
        @endif
        @if (session('hiba'))
          <div class="alert alert-sajat alert-hiba" role="alert">{{ session('hiba') }}</div>
        @endif
        @if (session('status'))
          <div class="alert alert-sajat alert-siker" role="alert">{{ session('status') }}</div>
        @endif
      </div>
    @endif

    <main class="content">
      {{ $slot }}
    </main>

    @include('footer')

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

    <script src="{{ asset('template/js/jquery.min.js') }}"></script>
    <script src="{{ asset('template/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('template/js/popper.min.js') }}"></script>
    <script src="{{ asset('template/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('template/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('template/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('template/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('template/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('template/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('template/js/aos.js') }}"></script>
    <script src="{{ asset('template/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('template/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('template/js/jquery.timepicker.min.js') }}"></script>
    <script src="{{ asset('template/js/scrollax.min.js') }}"></script>
    <script src="{{ asset('template/js/main.js') }}"></script>
    @stack('scripts')
  </body>
</html>
