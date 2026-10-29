{{-- Bejelentkezés (a POST /login kérést a starter kit AuthenticatedSessionController-e kezeli) --}}
<x-mainpage title="Bejelentkezés" hero="Bejelentkezés">
  <section class="ftco-section pt-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-7 col-lg-5 urlap-doboz">
          <h2 class="h4 mb-4">Jelentkezzen be!</h2>
          <form method="post" action="{{ url('/login') }}" novalidate>
            @csrf
            <div class="form-group">
              <label for="email">E-mail cím</label>
              <input type="email" id="email" name="email" class="form-control urlap-mezo @error('email') is-invalid @enderror" value="{{ old('email') }}" autocomplete="email" autofocus>
              @error('email')<div class="hiba-szoveg">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
              <label for="password">Jelszó</label>
              <input type="password" id="password" name="password" class="form-control urlap-mezo @error('password') is-invalid @enderror" autocomplete="current-password">
              @error('password')<div class="hiba-szoveg">{{ $message }}</div>@enderror
            </div>
            <div class="form-group form-check">
              <input type="checkbox" class="form-check-input" id="remember" name="remember" value="1">
              <label class="form-check-label" for="remember">Emlékezz rám</label>
            </div>
            <button type="submit" class="btn btn-primary py-2 px-4">Bejelentkezés</button>
          </form>
          <p class="mt-4 mb-0">Még nincs fiókja? <a href="{{ route('register') }}">Regisztráljon!</a></p>
        </div>
      </div>
    </div>
  </section>
</x-mainpage>
