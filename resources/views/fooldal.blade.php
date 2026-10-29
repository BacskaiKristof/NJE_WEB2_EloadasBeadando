{{-- Főoldal: az alkalmazás bemutatása --}}
@php
  $ft = fn ($n) => number_format($n, 0, ',', ' ').' Ft';
  $katKep = ['apród' => 'pizza-1.jpg', 'lovag' => 'pizza-2.jpg', 'főnemes' => 'pizza-3.jpg', 'király' => 'pizza-4.jpg'];
  $katLeiras = [
    'apród' => 'A belépő szint: egyszerű, klasszikus feltétek kedvező áron.',
    'lovag' => 'Bátor ízek bőséges feltéttel – a legnépszerűbb választás.',
    'főnemes' => 'Különleges, nemesebb alapanyagok egy kis extrával.',
    'király' => 'A kínálat csúcsa: gazdag, prémium kompozíciók.',
  ];
@endphp
<x-mainpage title="Főoldal">

  {{-- Slider --}}
  <section class="home-slider owl-carousel img" style="background-image: url({{ asset('template/images/bg_1.jpg') }});">
    <div class="slider-item">
      <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text align-items-center" data-scrollax-parent="true">
          <div class="col-md-6 col-sm-12 ftco-animate">
            <span class="subheading">Ízletes</span>
            <h1 class="mb-4">Királyi pizzák</h1>
            <p class="mb-4 mb-md-5">Apródtól a királyig: {{ $statisztika['pizza'] }} féle pizza négy kategóriában. Böngészd a teljes kínálatot az Adatbázis menüben!</p>
            <p><a href="{{ route('adatbazis') }}" class="btn btn-primary p-3 px-xl-4 py-xl-3">Kínálat</a> <a href="{{ route('diagram') }}" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">Statisztikák</a></p>
          </div>
          <div class="col-md-6 ftco-animate">
            <img src="{{ asset('template/images/bg_1.png') }}" class="img-fluid" alt="Pizza">
          </div>
        </div>
      </div>
    </div>

    <div class="slider-item">
      <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text align-items-center" data-scrollax-parent="true">
          <div class="col-md-6 col-sm-12 order-md-last ftco-animate">
            <span class="subheading">Ropogós</span>
            <h1 class="mb-4">Olasz tészta, magyar ízek</h1>
            <p class="mb-4 mb-md-5">A Magyarostól a Tenger gyümölcseiig – és {{ $statisztika['vega'] }} vegetáriánus választás is vár.</p>
            <p><a href="{{ route('adatbazis', ['vega' => 1]) }}#pizzak" class="btn btn-primary p-3 px-xl-4 py-xl-3">Vegetáriánus pizzák</a></p>
          </div>
          <div class="col-md-6 ftco-animate">
            <img src="{{ asset('template/images/bg_2.png') }}" class="img-fluid" alt="Pizza">
          </div>
        </div>
      </div>
    </div>

    <div class="slider-item" style="background-image: url({{ asset('template/images/bg_3.jpg') }});">
      <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
          <div class="col-md-7 col-sm-12 text-center ftco-animate">
            <span class="subheading">Üdvözlünk</span>
            <h1 class="mb-4">Kérdésed van? Írj nekünk!</h1>
            <p class="mb-4 mb-md-5">A Kapcsolat menüben üzenetet küldhetsz, amelyet azonnal megkapunk.</p>
            <p><a href="{{ route('kapcsolat') }}" class="btn btn-primary p-3 px-xl-4 py-xl-3">Kapcsolat</a></p>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- Információs sáv --}}
  <section class="ftco-intro">
    <div class="container-wrap">
      <div class="wrap d-md-flex">
        <div class="info">
          <div class="row no-gutters">
            <div class="col-md-4 d-flex ftco-animate">
              <div class="icon"><span class="icon-phone"></span></div>
              <div class="text">
                <h3>+36 1 234 5678</h3>
                <p>Rendelésfelvétel egész nap</p>
              </div>
            </div>
            <div class="col-md-4 d-flex ftco-animate">
              <div class="icon"><span class="icon-my_location"></span></div>
              <div class="text">
                <h3>Minta utca 12.</h3>
                <p>1234 Pizzaváros</p>
              </div>
            </div>
            <div class="col-md-4 d-flex ftco-animate">
              <div class="icon"><span class="icon-clock-o"></span></div>
              <div class="text">
                <h3>Nyitva minden nap</h3>
                <p>10:00 – 23:00</p>
              </div>
            </div>
          </div>
        </div>
        <div class="social d-md-flex pl-md-5 p-4 align-items-center">
          <ul class="social-icon">
            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  {{-- Bemutatkozás --}}
  <section class="ftco-about d-md-flex">
    <div class="one-half img" style="background-image: url({{ asset('template/images/about.jpg') }});"></div>
    <div class="one-half ftco-animate">
      <div class="heading-section ftco-animate">
        <h2 class="mb-4">Üdvözöl a <span class="flaticon-pizza">Pizzéria</span></h2>
      </div>
      <div>
        <p>Ez a webalkalmazás egy pizzéria adatbázisát mutatja be. A pizzákat négy kategóriába soroltuk – <strong>apród, lovag, főnemes és király</strong> –, a kategória határozza meg a pizza árát.
           Az <a href="{{ route('adatbazis') }}">Adatbázis</a> menüben megtekintheted a kategóriákat, a pizzákat és a rendeléseket,
           a <a href="{{ route('diagram') }}">Diagram</a> menüben pedig grafikonokon láthatod, mi fogy a legjobban.</p>
        <p>Regisztrált látogatóként az Üzenetek menüben olvashatod a beérkezett üzeneteket, adminként pedig a CRUD menüben szerkesztheted a pizzák listáját.</p>
      </div>
    </div>
  </section>

  {{-- Funkciók --}}
  <section class="ftco-section ftco-services">
    <div class="overlay"></div>
    <div class="container">
      <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 heading-section ftco-animate text-center">
          <h2 class="mb-4">Amit az oldalon találsz</h2>
          <p>Az alkalmazás Laravel keretrendszerrel, MySQL adatbázisra épül.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 ftco-animate">
          <div class="media d-block text-center block-6 services">
            <div class="icon d-flex justify-content-center align-items-center mb-5"><span class="flaticon-pizza-1"></span></div>
            <div class="media-body">
              <h3 class="heading">Teljes kínálat</h3>
              <p>Három adatbázistábla adatai egy helyen: kategóriák, pizzák és rendelések, szűrhetően.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 ftco-animate">
          <div class="media d-block text-center block-6 services">
            <div class="icon d-flex justify-content-center align-items-center mb-5"><span class="flaticon-bicycle"></span></div>
            <div class="media-body">
              <h3 class="heading">Rendelési statisztikák</h3>
              <p>Chart.js diagramok a bevételről, a legnépszerűbb pizzákról és a csúcsidőszakokról.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 ftco-animate">
          <div class="media d-block text-center block-6 services">
            <div class="icon d-flex justify-content-center align-items-center mb-5"><span class="flaticon-chef"></span></div>
            <div class="media-body">
              <h3 class="heading">Admin felület</h3>
              <p>Az admin új pizzát vehet fel, módosíthat vagy törölhet a CRUD menüben.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- Kategóriák és árak az adatbázisból --}}
  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 heading-section ftco-animate text-center">
          <h2 class="mb-4">Kategóriák és árak</h2>
          <p class="flip"><span class="deg1"></span><span class="deg2"></span><span class="deg3"></span></p>
          <p class="mt-5">Minden pizza ára a kategóriájától függ.</p>
        </div>
      </div>
      <div class="row">
        @foreach ($kategoriak as $k)
          <div class="col-md-6">
            <div class="pricing-entry d-flex ftco-animate">
              <div class="img" style="background-image: url({{ asset('template/images/'.($katKep[$k->nev] ?? 'pizza-5.jpg')) }});"></div>
              <div class="desc pl-3">
                <div class="d-flex text align-items-center">
                  <h3><span>{{ ucfirst($k->nev) }}</span></h3>
                  <span class="price">{{ $ft($k->ar) }}</span>
                </div>
                <div class="d-block">
                  <p>{{ $katLeiras[$k->nev] ?? '' }} <a href="{{ route('adatbazis', ['kategoria' => $k->nev]) }}#pizzak">{{ $k->pizzak_count }} pizza &rarr;</a></p>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- Számlálók --}}
  <section class="ftco-counter ftco-bg-dark img" id="section-counter" style="background-image: url({{ asset('template/images/bg_2.jpg') }});" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-10">
          <div class="row">
            <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
              <div class="block-18 text-center"><div class="text">
                <div class="icon"><span class="flaticon-pizza-1"></span></div>
                <strong class="number" data-number="{{ $statisztika['pizza'] }}">0</strong>
                <span>Féle pizza</span>
              </div></div>
            </div>
            <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
              <div class="block-18 text-center"><div class="text">
                <div class="icon"><span class="flaticon-diet"></span></div>
                <strong class="number" data-number="{{ $statisztika['vega'] }}">0</strong>
                <span>Vegetáriánus</span>
              </div></div>
            </div>
            <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
              <div class="block-18 text-center"><div class="text">
                <div class="icon"><span class="flaticon-bicycle"></span></div>
                <strong class="number" data-number="{{ $statisztika['rendeles'] }}">0</strong>
                <span>Rendelés</span>
              </div></div>
            </div>
            <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
              <div class="block-18 text-center"><div class="text">
                <div class="icon"><span class="flaticon-laugh"></span></div>
                <strong class="number" data-number="{{ $statisztika['darab'] }}">0</strong>
                <span>Eladott pizza</span>
              </div></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- Legnépszerűbb pizzák --}}
  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 heading-section ftco-animate text-center">
          <h2 class="mb-4">A legnépszerűbb pizzák</h2>
          <p>A rendelések alapján ezek fogynak a legjobban.</p>
        </div>
      </div>
    </div>
    <div class="container-wrap">
      <div class="row no-gutters d-flex">
        @foreach ($nepszeru as $i => $p)
          <div class="col-lg-4 d-flex ftco-animate">
            <div class="services-wrap d-flex">
              <span class="img {{ $i >= 3 ? 'order-lg-last' : '' }}" style="background-image: url({{ asset('template/images/pizza-'.($i + 1).'.jpg') }});"></span>
              <div class="text p-4">
                <h3>{{ $p->nev }}</h3>
                <p>Kategória: {{ $p->kategorianev }}{{ $p->vegetarianus ? ' · vegetáriánus' : '' }}<br>Eddig {{ (int) $p->rendelt_db }} db fogyott.</p>
                <p class="price"><span>{{ $ft($p->kategoria->ar ?? 0) }}</span></p>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- Galéria --}}
  <section class="ftco-gallery">
    <div class="container-wrap">
      <div class="row no-gutters">
        @foreach ([1, 2, 3, 4] as $g)
          <div class="col-md-3 ftco-animate">
            <a href="{{ asset('template/images/gallery-'.$g.'.jpg') }}" class="gallery image-popup img d-flex align-items-center" style="background-image: url({{ asset('template/images/gallery-'.$g.'.jpg') }});">
              <div class="icon mb-4 d-flex align-items-center justify-content-center"><span class="icon-search"></span></div>
            </a>
          </div>
        @endforeach
      </div>
    </div>
  </section>

</x-mainpage>
