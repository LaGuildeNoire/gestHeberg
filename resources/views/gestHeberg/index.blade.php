@extends('layouts.master')
@section('content')
<main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
  <h1>Contrats</h1>
  {{-- <section class="row text-center placeholders">
    <div class="col-6 col-sm-3 placeholder">
      <img src="data:image/gif;base64,R0lGODlhAQABAIABAAJ12AAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
      <h4>Label</h4>
      <div class="text-muted">Something else</div>
    </div>
  </section> --}}
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>N°</th>
          <th>Client</th>
          <th>Début</th>
          <th>Fin</th>
          <th>Prix</th>
          <th>Type</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1,001</td>
          <td>Lorem</td>
          <td>ipsum</td>
          <td>dolor</td>
          <td>sit</td>
          <td>dd</td>
        </tr>
      </tbody>
    </table>
  </div>
</main>
@endsection