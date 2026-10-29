{{-- Diagram menü: Chart.js diagramok az adatbázis adataiból --}}
@php $ft = fn ($n) => number_format($n, 0, ',', ' '); @endphp
<x-mainpage title="Diagram" hero="Diagramok" heroImg="about.jpg">
  <section class="ftco-section pt-5">
    <div class="container">
      <div class="row justify-content-center mb-4">
        <div class="col-md-8 heading-section text-center ftco-animate">
          <h2 class="mb-3">Rendelési statisztikák</h2>
          <p>A diagramok a <strong>kategoria</strong>, <strong>pizza</strong> és <strong>rendeles</strong> táblák adataiból készülnek (Chart.js).</p>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-6 mb-5">
          <div class="diagram-doboz">
            <h3>Bevétel kategóriánként (Ft)</h3>
            <div class="diagram-vaszon"><canvas id="bevetelChart" aria-label="Bevétel kategóriánként oszlopdiagram" role="img"></canvas></div>
            <details class="diagram-tabla"><summary>Adatok táblázatban</summary>
              <table class="table table-sm tabla-sajat mb-0"><thead><tr><th>Kategória</th><th class="text-right">Eladott db</th><th class="text-right">Bevétel</th></tr></thead><tbody>
                @foreach ($kategoriaAdat as $k)<tr><td>{{ $k['nev'] }}</td><td class="text-right">{{ $k['darab'] }}</td><td class="text-right">{{ $ft($k['bevetel']) }} Ft</td></tr>@endforeach
              </tbody></table>
            </details>
          </div>
        </div>
        <div class="col-lg-6 mb-5">
          <div class="diagram-doboz">
            <h3>Pizzák száma kategóriánként</h3>
            <div class="diagram-vaszon"><canvas id="pizzaChart" aria-label="Pizzák száma kategóriánként, vegetáriánus bontásban" role="img"></canvas></div>
            <details class="diagram-tabla"><summary>Adatok táblázatban</summary>
              <table class="table table-sm tabla-sajat mb-0"><thead><tr><th>Kategória</th><th class="text-right">Vegetáriánus</th><th class="text-right">Nem vegetáriánus</th></tr></thead><tbody>
                @foreach ($kategoriaAdat as $k)<tr><td>{{ $k['nev'] }}</td><td class="text-right">{{ $k['vega'] }}</td><td class="text-right">{{ $k['pizzak'] - $k['vega'] }}</td></tr>@endforeach
              </tbody></table>
            </details>
          </div>
        </div>
        <div class="col-lg-6 mb-5">
          <div class="diagram-doboz">
            <h3>A 10 legtöbbet rendelt pizza (db)</h3>
            <div class="diagram-vaszon magas"><canvas id="topChart" aria-label="A 10 legtöbbet rendelt pizza" role="img"></canvas></div>
            <details class="diagram-tabla"><summary>Adatok táblázatban</summary>
              <table class="table table-sm tabla-sajat mb-0"><thead><tr><th>Pizza</th><th class="text-right">Rendelt db</th></tr></thead><tbody>
                @foreach ($top as $t)<tr><td>{{ $t['nev'] }}</td><td class="text-right">{{ $t['db'] }}</td></tr>@endforeach
              </tbody></table>
            </details>
          </div>
        </div>
        <div class="col-lg-6 mb-5">
          <div class="diagram-doboz">
            <h3>Rendelések a nap óráiban</h3>
            <div class="diagram-vaszon magas"><canvas id="oraChart" aria-label="Rendelések száma a felvétel órája szerint" role="img"></canvas></div>
            <details class="diagram-tabla"><summary>Adatok táblázatban</summary>
              <table class="table table-sm tabla-sajat mb-0"><thead><tr><th>Óra</th><th class="text-right">Rendelések</th></tr></thead><tbody>
                @foreach ($orak as $ora => $db)@if ($db)<tr><td>{{ $ora }}:00–{{ $ora }}:59</td><td class="text-right">{{ $db }}</td></tr>@endif @endforeach
              </tbody></table>
            </details>
          </div>
        </div>
      </div>
    </div>
  </section>

  @push('scripts')
    {{-- Chart.js 4.4.1 (https://www.chartjs.org/) helyben tárolva: public/js/chart.umd.min.js --}}
    <script src="{{ asset('js/chart.umd.min.js') }}"></script>
    <script>
      // Adatok a controllerből (adatbázis -> PHP -> JSON)
      const kategoriaAdat = @json($kategoriaAdat);
      const top10 = @json($top);
      const orak = @json($orak);

      // Színek: a sötét háttérhez ellenőrzött páros (borostyán + kék)
      const BOROSTYAN = '#c4861a', KEK = '#4a8fd6';
      Chart.defaults.color = 'rgba(255,255,255,0.75)';
      Chart.defaults.font.family = 'Poppins, Arial, sans-serif';
      Chart.defaults.borderColor = 'rgba(255,255,255,0.08)';
      Chart.defaults.maintainAspectRatio = false;
      const szam = n => n.toLocaleString('hu-HU');
      const oszlop = { borderRadius: 4, borderSkipped: 'start', maxBarThickness: 48 };

      new Chart(document.getElementById('bevetelChart'), {
        type: 'bar',
        data: {
          labels: kategoriaAdat.map(k => k.nev),
          datasets: [{ label: 'Bevétel', data: kategoriaAdat.map(k => k.bevetel), backgroundColor: BOROSTYAN, ...oszlop }]
        },
        options: {
          plugins: { legend: { display: false },
            tooltip: { callbacks: { label: c => ' ' + szam(c.parsed.y) + ' Ft (' + kategoriaAdat[c.dataIndex].darab + ' db)' } } },
          scales: { y: { beginAtZero: true, ticks: { callback: v => szam(v) } }, x: { grid: { display: false } } }
        }
      });

      new Chart(document.getElementById('pizzaChart'), {
        type: 'bar',
        data: {
          labels: kategoriaAdat.map(k => k.nev),
          datasets: [
            { label: 'Nem vegetáriánus', data: kategoriaAdat.map(k => k.pizzak - k.vega), backgroundColor: BOROSTYAN, borderColor: '#121618', borderWidth: { top: 2 }, borderRadius: 0, maxBarThickness: 48 },
            { label: 'Vegetáriánus', data: kategoriaAdat.map(k => k.vega), backgroundColor: KEK, borderColor: '#121618', borderWidth: { bottom: 2 }, borderRadius: { topLeft: 4, topRight: 4 }, borderSkipped: false, maxBarThickness: 48 }
          ]
        },
        options: {
          plugins: { legend: { position: 'bottom', labels: { boxWidth: 12, boxHeight: 12 } },
            tooltip: { mode: 'index', intersect: false } },
          scales: { x: { stacked: true, grid: { display: false } }, y: { stacked: true, beginAtZero: true, ticks: { precision: 0 } } }
        }
      });

      new Chart(document.getElementById('topChart'), {
        type: 'bar',
        data: {
          labels: top10.map(p => p.nev),
          datasets: [{ label: 'Rendelt darab', data: top10.map(p => p.db), backgroundColor: BOROSTYAN, borderRadius: 4, borderSkipped: 'start', maxBarThickness: 22 }]
        },
        options: {
          indexAxis: 'y',
          plugins: { legend: { display: false }, tooltip: { callbacks: { label: c => ' ' + c.parsed.x + ' db' } } },
          scales: { x: { beginAtZero: true, ticks: { precision: 0 } }, y: { grid: { display: false } } }
        }
      });

      new Chart(document.getElementById('oraChart'), {
        type: 'line',
        data: {
          labels: orak.map((_, i) => i + ':00'),
          datasets: [{ label: 'Rendelések', data: orak, borderColor: KEK, backgroundColor: KEK, borderWidth: 2, pointRadius: 3, pointHoverRadius: 6, tension: 0.3 }]
        },
        options: {
          interaction: { mode: 'index', intersect: false },
          plugins: { legend: { display: false }, tooltip: { callbacks: { label: c => ' ' + c.parsed.y + ' rendelés' } } },
          scales: { y: { beginAtZero: true, ticks: { precision: 0 } }, x: { grid: { display: false }, ticks: { maxRotation: 0, autoSkip: true, maxTicksLimit: 12 } } }
        }
      });
    </script>
  @endpush
</x-mainpage>
