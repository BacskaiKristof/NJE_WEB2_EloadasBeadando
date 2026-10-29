{{-- CRUD – Read: a pizza tábla listája (csak admin) --}}
@php $ft = fn ($n) => number_format($n, 0, ',', ' ').' Ft'; @endphp
<x-mainpage title="CRUD – Pizzák" hero="CRUD – Pizzák" breadcrumb="CRUD">
  <section class="ftco-section pt-5">
    <div class="container">
      <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <h2 class="h3 mb-2 text-white">Pizzák kezelése <small class="text-muted">({{ $pizzak->total() }} db)</small></h2>
        <a href="{{ route('crud.create') }}" class="btn btn-primary py-2 px-4 mb-2">+ Új pizza</a>
      </div>

      <form method="get" action="{{ route('crud.index') }}" class="szuro-form mb-3">
        <div class="form-row">
          <div class="col-sm-6 col-md-4 mb-2"><input type="text" name="q" value="{{ $kereses }}" class="form-control form-control-sm" placeholder="Keresés névre…" aria-label="Keresés"></div>
          <div class="col-auto mb-2">
            <button class="btn btn-primary btn-sm px-3">Keresés</button>
            @if ($kereses)<a href="{{ route('crud.index') }}" class="btn btn-white btn-outline-white btn-sm px-3">Összes</a>@endif
          </div>
        </div>
      </form>

      <div class="table-responsive">
        <table class="table tabla-sajat">
          <thead>
            <tr><th>Név</th><th>Kategória</th><th class="text-center">Vega</th><th class="text-right">Ár</th><th class="text-right">Rendelések</th><th class="text-right">Műveletek</th></tr>
          </thead>
          <tbody>
            @forelse ($pizzak as $p)
              <tr>
                <td><a href="{{ route('crud.show', $p) }}">{{ $p->nev }}</a></td>
                <td>{{ $p->kategorianev }}</td>
                <td class="text-center">@if ($p->vegetarianus)<span class="cimke-vega">vega</span>@else – @endif</td>
                <td class="text-right ar">{{ $ft($p->kategoria->ar ?? 0) }}</td>
                <td class="text-right">{{ $p->rendelesek_count }}</td>
                <td class="text-right text-nowrap">
                  <a href="{{ route('crud.show', $p) }}" class="btn btn-sm btn-muvelet">Megtekint</a>
                  <a href="{{ route('crud.edit', $p) }}" class="btn btn-sm btn-muvelet">Szerkeszt</a>
                  <form method="post" action="{{ route('crud.destroy', $p) }}" class="d-inline"
                        data-kerdes="Biztosan törli: {{ $p->nev }}?{{ $p->rendelesek_count ? ' A hozzá tartozó '.$p->rendelesek_count.' rendelés is törlődik!' : '' }}"
                        onsubmit="return confirm(this.dataset.kerdes);">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-torles">Töröl</button>
                  </form>
                </td>
              </tr>
            @empty
              <tr><td colspan="6" class="text-center">Nincs találat.</td></tr>
            @endforelse
          </tbody>
        </table>
      </div>
      <div class="lapozo">{{ $pizzak->links('pagination::bootstrap-4') }}</div>
    </div>
  </section>
</x-mainpage>
