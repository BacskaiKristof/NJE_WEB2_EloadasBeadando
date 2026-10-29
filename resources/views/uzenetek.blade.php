{{-- Üzenetek menü: a Kapcsolat űrlapon küldött üzenetek, a legfrissebb elöl (csak bejelentkezve) --}}
<x-mainpage title="Üzenetek" hero="Üzenetek" heroImg="image_2.jpg">
  <section class="ftco-section pt-5">
    <div class="container">
      <div class="row justify-content-center mb-4">
        <div class="col-md-8 heading-section text-center ftco-animate">
          <h2 class="mb-3">Beérkezett üzenetek</h2>
          <p>Összesen {{ $uzenetek->total() }} üzenet, fordított időrendben (a legfrissebb van elöl).</p>
        </div>
      </div>

      <div class="table-responsive">
        <table class="table tabla-sajat tabla-uzenet">
          <thead>
            <tr><th>Küldés ideje</th><th>Név</th><th>E-mail</th><th>Tárgy</th><th>Üzenet</th></tr>
          </thead>
          <tbody>
            @forelse ($uzenetek as $u)
              <tr>
                <td class="text-nowrap">{{ $u->created_at->timezone('Europe/Budapest')->format('Y.m.d. H:i:s') }}</td>
                <td>
                  {{ $u->nev }}
                  @if ($u->user)<br><small class="cimke-tag" title="Bejelentkezett felhasználó küldte">tag</small>@endif
                </td>
                <td><a href="mailto:{{ $u->email }}">{{ $u->email }}</a></td>
                <td>{{ $u->targy }}</td>
                <td class="uzenet-szoveg">{!! nl2br(e($u->uzenet)) !!}</td>
              </tr>
            @empty
              <tr><td colspan="5" class="text-center">Még nem érkezett üzenet.</td></tr>
            @endforelse
          </tbody>
        </table>
      </div>
      <div class="lapozo">{{ $uzenetek->links('pagination::bootstrap-4') }}</div>
    </div>
  </section>
</x-mainpage>
