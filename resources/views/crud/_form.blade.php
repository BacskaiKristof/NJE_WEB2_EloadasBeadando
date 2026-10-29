{{-- Közös űrlapmezők az új / szerkesztés oldalhoz --}}
<div class="form-group">
  <label for="nev">Pizza neve *</label>
  <input type="text" id="nev" name="nev" maxlength="50" class="form-control urlap-mezo @error('nev') is-invalid @enderror" value="{{ old('nev', $pizza->nev ?? '') }}">
  @error('nev')<div class="hiba-szoveg">{{ $message }}</div>@enderror
</div>
<div class="form-group">
  <label for="kategorianev">Kategória *</label>
  <select id="kategorianev" name="kategorianev" class="form-control urlap-mezo @error('kategorianev') is-invalid @enderror">
    <option value="">– válasszon –</option>
    @foreach ($kategoriak as $k)
      <option value="{{ $k->nev }}" @selected(old('kategorianev', $pizza->kategorianev ?? '') === $k->nev)>
        {{ ucfirst($k->nev) }} ({{ number_format($k->ar, 0, ',', ' ') }} Ft)
      </option>
    @endforeach
  </select>
  @error('kategorianev')<div class="hiba-szoveg">{{ $message }}</div>@enderror
</div>
<div class="form-group form-check">
  <input type="checkbox" class="form-check-input" id="vegetarianus" name="vegetarianus" value="1" @checked(old('vegetarianus', $pizza->vegetarianus ?? false))>
  <label class="form-check-label" for="vegetarianus">Vegetáriánus</label>
</div>
