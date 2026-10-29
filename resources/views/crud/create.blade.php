{{-- CRUD – Create: új pizza felvétele --}}
<x-mainpage title="Új pizza" hero="Új pizza" breadcrumb="CRUD / Új pizza">
  <section class="ftco-section pt-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 urlap-doboz">
          <h2 class="h4 mb-4">Új pizza felvétele</h2>
          <form method="post" action="{{ route('crud.store') }}" novalidate>
            @csrf
            @include('crud._form')
            <button type="submit" class="btn btn-primary py-2 px-4">Mentés</button>
            <a href="{{ route('crud.index') }}" class="btn btn-white btn-outline-white py-2 px-4">Mégse</a>
          </form>
        </div>
      </div>
    </div>
  </section>
</x-mainpage>
