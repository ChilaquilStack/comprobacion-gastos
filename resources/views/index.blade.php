@extends('layouts.master')
@section('title','Inicio')
@section('content')
	@if (session('status'))
		<div class="alert alert-danger">{{ session('status') }}</div>
	@endif

	@if (session('end'))
		<div class="alert alert-success">{{ session('end') }}</div>
	@endif
	
	@include('login')
	@include('register')

	<h1>Inicio</h1>
@endsection