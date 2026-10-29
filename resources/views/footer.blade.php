{{-- Lábléc: minden oldal alján a készítők neve és Neptun kódja --}}
@php
  // TODO: írjátok be a saját neveteket és Neptun kódotokat!
  $keszitok = [
      ['nev' => 'Készítő Egy', 'neptun' => 'NEPTUN1'],
      ['nev' => 'Készítő Kettő', 'neptun' => 'NEPTUN2'],
  ];
@endphp
<footer class="ftco-footer ftco-section img">
  <div class="overlay"></div>
  <div class="container">
    <div class="row mb-5">
      <div class="col-lg-4 col-md-6 mb-5">
        <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2">Rólunk</h2>
          <p>Pizzéria webalkalmazás – a Web-programozás II. beadandó feladata. Laravel keretrendszerrel és MySQL adatbázissal készült.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mb-5">
        <div class="ftco-footer-widget mb-4 ml-md-4">
          <h2 class="ftco-heading-2">Menü</h2>
          <ul class="list-unstyled">
            <li><a href="{{ route('adatbazis') }}" class="py-1 d-block">Adatbázis</a></li>
            <li><a href="{{ route('diagram') }}" class="py-1 d-block">Diagram</a></li>
            <li><a href="{{ route('kapcsolat') }}" class="py-1 d-block">Kapcsolat</a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-4 col-md-12 mb-5">
        <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2">Készítők</h2>
          <div class="block-23 mb-3">
            <ul>
              @foreach ($keszitok as $k)
                <li><span class="icon icon-person"></span><span class="text">{{ $k['nev'] }} – <strong class="keszito-neptun">{{ $k['neptun'] }}</strong></span></li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 text-center">
        <p class="mb-1">
          Készítették: @foreach ($keszitok as $k){{ $k['nev'] }} ({{ $k['neptun'] }}){{ $loop->last ? '' : ', ' }}@endforeach
        </p>
        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          Copyright &copy; {{ date('Y') }} | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" rel="noopener">Colorlib</a>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
      </div>
    </div>
  </div>
</footer>
