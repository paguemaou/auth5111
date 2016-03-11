@extends('template.layout')

@section('content')

<h2>
	Test Zizaco Entrust<small> {{ getenv('NOM_DU_SITE') }}</small>
</h2>

		<br><a href="/">Accueil</a><br>

				@if (Auth::check())
				Bonjour utilisateur "{{ Auth::user()->name }}" <br>
				@else 
				Non connecté !!!<br>
				@endif
				<br><br>
				Vues standard<br>
				<a href="auth/login">auth/login</a><br>
				<a href="auth/logout">auth/logout</a><br>
				<a href="auth/register">auth/register</a><br>
				<a href="password/email">password/email</a><br><br>
				Compléments<br>
				<a href="#">admin only</a><br><br>




@include('partial.droitsUtilisateurs')

@stop
