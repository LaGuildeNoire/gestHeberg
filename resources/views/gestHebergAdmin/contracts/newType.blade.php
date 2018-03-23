@extends('layouts-Admin.master')

@section('navbar')
@include('layouts-Admin.navContracts')
@endsection

@section('content')
<h1>Test 2</h1>
<form class="" method="POST" action="{{ route("gestHeberg.newType") }}">
	{{ csrf_field() }} 
	<label>Nom :</label>
	<input type="" name="name">
	<hr>
	<label>Description :</label>
	<br>
	<textarea name='libelle'></textarea>
	<hr>
	<button type="submit">Valider</button>
</form>
@endsection