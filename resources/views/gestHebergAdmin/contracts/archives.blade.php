@extends('layouts-Admin.master')

@section('navbar')
@include('layouts-Admin.navContracts')
@endsection

@section('content')

  <h1>Archive des contrats</h1>
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
      	{{-- @foreach --}}
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        {{-- @endforeach --}}
      </tbody>
    </table>
  </div>
</main>
@endsection