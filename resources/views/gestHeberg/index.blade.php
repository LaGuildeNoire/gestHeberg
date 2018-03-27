@extends('layouts.master')
@section('navbar')
@include('layouts.navContracts')
@endsection
@section('content')
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
        <th>Titre</th>
        <th>Début</th>
        <th>Fin</th>
        <th>Prix</th>
        <th>Type</th>
      </tr>
    </thead>
    <tbody>
      @foreach($contracts as $contract)
      <tr>
        <td>{{ $contract->numero }}</td>
        <td>{{ $contract->demName }} {{ $contract->demSurname }}</td>
        <td>{{ $contract->title }}</td>
        <td>{{ $contract->dateDebut }}</td>
        <td>{{ $contract->dateFin }}</td>
        <td>{{ $contract->prix }}</td>
        <td>{{ $contract->type }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection