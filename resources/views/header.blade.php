{{--
  Menü – az órai header.blade.php továbbfejlesztése.
  Látogató:            Főoldal, Adatbázis, Kapcsolat, Diagram, Bejelentkezés, Regisztráció
  Regisztrált látogató: + Üzenetek, Kijelentkezés
  Admin:               + CRUD
--}}
@php
  $menu = function ($route) { return request()->routeIs($route) ? 'active' : ''; };
@endphp
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
  <div class="container">
    <a class="navbar-brand" href="{{ route('home') }}"><span class="flaticon-pizza-1 mr-1"></span>Pizzéria<br><small>Királyi ízek</small></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Menü megnyitása">
      <span class="oi oi-menu"></span> Menü
    </button>
    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item {{ $menu('home') }}"><a href="{{ route('home') }}" class="nav-link">Főoldal</a></li>
        <li class="nav-item {{ $menu('adatbazis') }}"><a href="{{ route('adatbazis') }}" class="nav-link">Adatbázis</a></li>
        <li class="nav-item {{ $menu('kapcsolat') }}"><a href="{{ route('kapcsolat') }}" class="nav-link">Kapcsolat</a></li>
        <li class="nav-item {{ $menu('diagram') }}"><a href="{{ route('diagram') }}" class="nav-link">Diagram</a></li>

        @if (Auth::check())
          <li class="nav-item {{ $menu('uzenetek') }}"><a href="{{ route('uzenetek') }}" class="nav-link">Üzenetek</a></li>
          @if (Auth::User()->role==1)
            <li class="nav-item {{ $menu('crud.*') }}"><a href="{{ route('crud.index') }}" class="nav-link">CRUD</a></li>
          @endif
          <li class="nav-item">
            {{-- Kijelentkezés: POST kérés kell (CSRF), ezért egy rejtett űrlapot küld el a menüpont --}}
            <a href="{{ url('/logout') }}" id="kijelentkezes" class="nav-link" title="Bejelentkezve: {{ Auth::user()->name }}"
               onclick="event.preventDefault(); document.getElementById('kijelentkezes-form').submit();">
              Kijelentkezés <small class="nev-cimke">({{ Auth::user()->name }})</small>
            </a>
            <form id="kijelentkezes-form" method="post" action="{{ url('/logout') }}" class="d-none">
              @csrf
            </form>
          </li>
        @else
          <li class="nav-item {{ $menu('login') }}"><a href="{{ route('login') }}" class="nav-link">Bejelentkezés</a></li>
          <li class="nav-item {{ $menu('register') }}"><a href="{{ route('register') }}" class="nav-link">Regisztráció</a></li>
        @endif
      </ul>
    </div>
  </div>
</nav>
<!-- END nav -->
