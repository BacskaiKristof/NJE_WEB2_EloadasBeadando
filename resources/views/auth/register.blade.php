{{-- Regisztráció (a POST /register kérést a starter kit RegisteredUserController-e kezeli, role = 2) --}}
<x-mainpage title="Regisztráció" hero="Regisztráció">
  <section class="ftco-section pt-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-7 col-lg-5 urlap-doboz">
          <h2 class="h4 mb-4">Fiók létrehozása</h2>
          <form method="post" action="{{ url('/register') }}" novalidate>
            @csrf
            <div class="form-group">
              <label for="name">Név</label>
              <input type="text" id="name" name="name" class="form-control urlap-mezo @error('name') is-invalid @enderror" value="{{ old('name') }}" autocomplete="name" autofocus>
              @error('name')<div class="hiba-szoveg">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
              <label for="email">E-mail cím</label>
              <input type="email" id="email" name="email" class="form-control urlap-mezo @error('email') is-invalid @enderror" value="{{ old('email') }}" autocomplete="email">
              @error('email')<div class="hiba-szoveg">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
              <label for="password">Jelszó (legalább 8 karakter)</label>
              <input type="password" id="password" name="password" class="form-control urlap-mezo @error('password') is-invalid @enderror" autocomplete="new-password">
              @error('password')<div class="hiba-szoveg">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
              <label for="password_confirmation">Jelszó megerősítése</label>
              <input type="password" id="password_confirmation" name="password_confirmation" class="form-control urlap-mezo" autocomplete="new-password">
            </div>
            <button type="submit" class="btn btn-primary py-2 px-4">Regisztráció</button>
          </form>
          <p class="mt-4 mb-0">Már van fiókja? <a href="{{ route('login') }}">Jelentkezzen be!</a></p>
        </div>
      </div>
    </div>
  </section>
</x-mainpage>
