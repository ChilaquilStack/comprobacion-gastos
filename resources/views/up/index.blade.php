@extends('layouts.master')
@section('title','Unidades Presupuestales')
@section('content')
<div class="row" id="up">
	@include('up.agregar')
	@include('up.editar')
	<div class="col-lg-12 col-md-8 col-sm-4">
		
		<h1 class="page-header">Unidades Presupuestales
			<button class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="left" title="Agregar Unidad Presupuestal"@click="mostrar_formulario_agregar_up">
				<i class="fa fa-plus"></i>
			</button>
			<input type="text" name="buscar_up" v-model='buscar_up' class="form-control" placeholder="buscar...">
		</h1>

		<div class="jumbotron alert alert-warning" v-if='ups.length == 0'>
			<p>Aun no existen Unidades Presupuestales</p>
		</div>

		@include('up.table')
	</div>
</div>
@endsection