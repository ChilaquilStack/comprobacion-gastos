@extends('layouts.master')
@section('title','Regiones')
@section('content')
	<div class="row" id="regiones">
		@include('regiones.agregar')
		@include('regiones.editar')
		<div class="col-lg-12 col-md-8 col-sm-4">
			<h1>
				Regiones
				<button class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Agregar Region" @click="mostrar_formulario_agregar_region">
					<i class="fa fa-plus"></i>
				</button>
			</h1>
			<div class="row">
				<div class="col-lg-12">
					@include('regiones.table')
				</div>
			</div>
		</div>
	</div>
@endsection