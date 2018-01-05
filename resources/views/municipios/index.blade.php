@extends('layouts.master')
@section('title','Municipios')
@section('content')
@include('municipios.modal')
	<h1>
		Municipios
		<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#add_municipio">
			<i class="fa fa-plus"></i>
		</button>
	</h1>
	<div class="row">
		<div class="col-lg-12">
			@include('municipios.table')
		</div>
	</div>
@endsection