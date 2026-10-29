{{-- Adatbázis menü: 3 tábla (kategoria, pizza, rendeles) adatai --}}
@php $ft = fn ($n) => number_format($n, 0, ',', ' ').' Ft'; @endphp
<x-mainpage title="Adatbázis" hero="Adatbázis" heroImg="image_3.jpg">
  <section class="ftco-section pt-5">
    <div class="container">

      <div class="row justify-content-center mb-4">
        <div class="col-md-9 heading-section text-center ftco-animate">
          <h2 class="mb-3">A pizzéria adatai</h2>
          <p>A <strong>kategoria</strong>, a <strong>pizza</strong> és a <strong>rendeles</strong> tábla adatai, Eloquent ORM kapcsolatokkal összekötve.</p>
          <ul class="nav nav-pills justify-content-center ugro-menu">
            <li class="nav-item"><a class="nav-link" href="#kategoriak">Kategóriák</a></li>
            <li class="nav-item"><a class="nav-link" href="#pizzak">Pizzák</a></li>
            <li class="nav-item"><a class="nav-link" href="#rendelesek">Rendelések</a></li>
          </ul>
        </div>
      </div>

      {{-- 1. tábla: kategoria --}}
      <h3 class="tabla-cim" id="kategoriak"><span class="flaticon-pizza-1"></span> Kategóriák <small>(kategoria tábla)</small></h3>
      <div class="table-responsive mb-5">
        <table class="table tabla-sajat">
          <thead>
            <tr><th>Kategória</th><th class="text-right">Ár</th><th class="text-right">Pizzák száma</th><th></th></tr>
          </thead>
          <tbody>
            @foreach ($kategoriak as $k)
              <tr>
                <td>{{ ucfirst($k->nev) }}</td>
                <td class="text-right ar">{{ $ft($k->ar) }}</td>
                <td class="text-right">{{ $k->pizzak_count }}</td>
                <td class="text-right"><a href="{{ route('adatbazis', ['kategoria' => $k->nev]) }}#pizzak">pizzák &rarr;</a></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      {{-- 2. tábla: pizza (szűrhető) --}}
      <h3 class="tabla-cim" id="pizzak"><span class="flaticon-pizza"></span> Pizzák <small>(pizza tábla – {{ $pizzak->count() }} db)</small></h3>
      <form method="get" action="{{ route('adatbazis') }}#pizzak" class="szuro-form mb-3">
        <div class="form-row align-items-center">
          <div class="col-sm-5 col-md-4 mb-2">
            <select name="kategoria" class="form-control form-control-sm" aria-label="Kategória">
              <option value="">Minden kategória</option>
              @foreach ($kategoriak as $k)
                <option value="{{ $k->nev }}" @selected($szuro['kategoria'] === $k->nev)>{{ ucfirst($k->nev) }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-auto mb-2">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="vega" value="1" id="vega" @checked($szuro['vega'])>
              <label class="form-check-label" for="vega">Csak vegetáriánus</label>
            </div>
          </div>
          <div class="col-auto mb-2">
            <button type="submit" class="btn btn-primary btn-sm px-3">Szűrés</button>
            @if ($szuro['kategoria'] || $szuro['vega'])
              <a href="{{ route('adatbazis') }}#pizzak" class="btn btn-white btn-outline-white btn-sm px-3">Összes</a>
            @endif
          </div>
        </div>
      </form>
      <div class="table-responsive mb-5">
        <table class="table tabla-sajat">
          <thead>
            <tr><th>Név</th><th>Kategória</th><th class="text-center">Vegetáriánus</th><th class="text-right">Ár</th></tr>
          </thead>
          <tbody>
            @forelse ($pizzak as $p)
              <tr>
                <td>{{ $p->nev }}</td>
                <td>{{ $p->kategorianev }}</td>
                <td class="text-center">@if ($p->vegetarianus)<span class="cimke-vega">vega</span>@else – @endif</td>
                <td class="text-right ar">{{ $ft($p->kategoria->ar ?? 0) }}</td>
              </tr>
            @empty
              <tr><td colspan="4" class="text-center">Nincs a szűrésnek megfelelő pizza.</td></tr>
            @endforelse
          </tbody>
        </table>
      </div>

      {{-- 3. tábla: rendeles (lapozható) --}}
      <h3 class="tabla-cim" id="rendelesek"><span class="flaticon-bicycle"></span> Rendelések <small>(rendeles tábla – {{ $rendelesek->total() }} db)</small></h3>
      <div class="table-responsive">
        <table class="table tabla-sajat">
          <thead>
            <tr>
              <th>#</th><th>Pizza</th><th class="text-right">Darab</th><th>Felvétel</th><th>Kiszállítás</th>
              <th class="text-right">Szállítási idő</th><th class="text-right">Összeg</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($rendelesek as $r)
              <tr>
                <td>{{ $r->az }}</td>
                <td>{{ $r->pizzanev }}</td>
                <td class="text-right">{{ $r->darab }}</td>
                <td>{{ $r->felvetel?->format('Y.m.d. H:i') }}</td>
                <td>{{ $r->kiszallitas?->format('Y.m.d. H:i') }}</td>
                <td class="text-right">{{ $r->szallitasi_ido !== null ? $r->szallitasi_ido.' perc' : '–' }}</td>
                <td class="text-right ar">{{ $ft($r->darab * ($r->pizza->kategoria->ar ?? 0)) }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="lapozo">{{ $rendelesek->links('pagination::bootstrap-4') }}</div>

    </div>
  </section>
</x-mainpage>
