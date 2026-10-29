{{-- CRUD – Read: egy pizza adatai és rendelései --}}
@php $ar = $pizza->kategoria->ar ?? 0; $ft = fn ($n) => number_format($n, 0, ',', ' ').' Ft'; @endphp
<x-mainpage title="{{ $pizza->nev }}" hero="{{ $pizza->nev }}" breadcrumb="CRUD / Részletek">
  <section class="ftco-section pt-5">
    <div class="container">
      <div class="row">
        <div class="col-md-5 mb-4">
          <div class="urlap-doboz">
            <h2 class="h4 mb-3">{{ $pizza->nev }}</h2>
            <p class="mb-1"><span class="text-white">Kategória:</span> {{ $pizza->kategorianev }}</p>
            <p class="mb-1"><span class="text-white">Ár:</span> {{ $ft($ar) }}</p>
            <p class="mb-1"><span class="text-white">Vegetáriánus:</span> {{ $pizza->vegetarianus ? 'igen' : 'nem' }}</p>
            <p class="mb-3"><span class="text-white">Eladott darab:</span> {{ $pizza->rendelesek->sum('darab') }}</p>
            <a href="{{ route('crud.edit', $pizza) }}" class="btn btn-primary py-2 px-4">Szerkesztés</a>
            <a href="{{ route('crud.index') }}" class="btn btn-white btn-outline-white py-2 px-4">Vissza</a>
          </div>
        </div>
        <div class="col-md-7">
          <h3 class="tabla-cim">Rendelések</h3>
          <div class="table-responsive">
            <table class="table tabla-sajat">
              <thead><tr><th>#</th><th>Felvétel</th><th>Kiszállítás</th><th class="text-right">Darab</th><th class="text-right">Összeg</th></tr></thead>
              <tbody>
                @forelse ($pizza->rendelesek as $r)
                  <tr>
                    <td>{{ $r->az }}</td>
                    <td>{{ $r->felvetel?->format('Y.m.d. H:i') }}</td>
                    <td>{{ $r->kiszallitas?->format('Y.m.d. H:i') }}</td>
                    <td class="text-right">{{ $r->darab }}</td>
                    <td class="text-right ar">{{ $ft($r->darab * $ar) }}</td>
                  </tr>
                @empty
                  <tr><td colspan="5" class="text-center">Erre a pizzára még nem rendeltek.</td></tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</x-mainpage>
