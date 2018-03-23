@extends('layouts-Admin.master')
@section('navbar')
@include('layouts-Admin.navContracts')
@endsection
@section('content')
<h1>Test 2</h1>
<form class="" method="POST" action="{{ route("gestHeberg.newContract") }}">
	{{ csrf_field() }}

	<label>Client :</label>
	<select name="user">
		@foreach($users as $user)
		<option value="{{ $user->id }}"> {{ $user->name }} {{ $user->surname }} </option>
		@endforeach
	</select>
	<label>Type de contrat :</label>
	<select name="contractType">
		@foreach($types as $type)
		<option value="{{ $type->id }}"> {{ $type->nom }} </option>
		@endforeach
	</select>
	<br>
	<label>Titre du contrat :</label>
	<br>
	<input class="" type="" name="title">
	<hr>
	<label>Description du contrat :</label>
	<br>
	<textarea cols="100%" name="libelle"></textarea>
	<hr>
	<label>Prix :</label>
	<input type="" name="price">
	<br>
	<label>Date de fin :</label>
	<input type="" name="dateFin" value="aaaa-mm-jj">
	<hr>
	<button type="submit">Créer le contrat</button>
</form>
@endsection