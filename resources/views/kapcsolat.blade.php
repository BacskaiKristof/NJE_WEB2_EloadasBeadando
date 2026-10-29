{{-- Kapcsolat menü: üzenetküldő űrlap, szerver oldali validációval --}}
<x-mainpage title="Kapcsolat" hero="Kapcsolat" heroImg="bg_2.jpg">
  <section class="ftco-section contact-section pt-5">
    <div class="container mt-4">
      <div class="row block-9">
        <div class="col-md-4 contact-info">
          <div class="row">
            <div class="col-md-12 mb-4"><h2 class="h4">Elérhetőségek</h2></div>
            <div class="col-md-12 mb-3"><p><span>Cím:</span> 1234 Pizzaváros, Minta utca 12.</p></div>
            <div class="col-md-12 mb-3"><p><span>Telefon:</span> +36 1 234 5678</p></div>
            <div class="col-md-12 mb-3"><p><span>E-mail:</span> info@pizzeria.example</p></div>
            <div class="col-md-12 mb-3"><p><span>Nyitvatartás:</span> minden nap 10:00 – 23:00</p></div>
          </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-7">
          <h2 class="h4 mb-4">Írjon nekünk!</h2>

          @if ($errors->any())
            <div class="alert alert-sajat alert-hiba" role="alert">Kérjük, javítsa a hibásan kitöltött mezőket!</div>
          @endif

          {{-- novalidate: a böngésző ne ellenőrizzen, így a szerver oldali validáció látszik --}}
          <form method="post" action="{{ route('kapcsolat.store') }}" class="contact-form" novalidate>
            @csrf
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="nev" class="sr-only">Név</label>
                  <input type="text" id="nev" name="nev" class="form-control @error('nev') is-invalid @enderror" placeholder="Név *" value="{{ old('nev', Auth::user()?->name) }}">
                  @error('nev')<div class="hiba-szoveg">{{ $message }}</div>@enderror
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="email" class="sr-only">E-mail</label>
                  <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="E-mail cím *" value="{{ old('email', Auth::user()?->email) }}">
                  @error('email')<div class="hiba-szoveg">{{ $message }}</div>@enderror
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="targy" class="sr-only">Tárgy</label>
              <input type="text" id="targy" name="targy" class="form-control @error('targy') is-invalid @enderror" placeholder="Tárgy *" value="{{ old('targy') }}">
              @error('targy')<div class="hiba-szoveg">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
              <label for="uzenet" class="sr-only">Üzenet</label>
              <textarea id="uzenet" name="uzenet" cols="30" rows="7" class="form-control @error('uzenet') is-invalid @enderror" placeholder="Üzenet (legalább 10 karakter) *">{{ old('uzenet') }}</textarea>
              @error('uzenet')<div class="hiba-szoveg">{{ $message }}</div>@enderror
            </div>
            <div class="form-group">
              <input type="submit" value="Üzenet küldése" class="btn btn-primary py-3 px-5">
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</x-mainpage>
