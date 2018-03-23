@extends('layouts-Admin.master')

@section('navbar')
@include('layouts-Admin.navContracts')
@endsection

@section('content')
<h1>Test 2</h1>
<form class="" method="POST" action=""> 
	<label>Nom :</label>
	<input type="" name="name of the new contract type">
	<hr>
	<label>Description :</label>
	<br>
	<textarea name='libelle'></textarea>
	<hr>
	<button class="submit">Valider</button>
</form>
@endsection