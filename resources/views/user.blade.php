<x-mainpage title="User page" hero="User page">
  <section class="ftco-section pt-5"><div class="container">
    <h2 class="h4">Felhasználói oldal (órai feladat)</h2>
    <p>Ezt az oldalt csak bejelentkezett felhasználó érheti el. Bejelentkezve: <strong class="text-white">{{ Auth::user()->name }}</strong>.</p>
  </div></section>
</x-mainpage>
