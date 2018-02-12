@extends('layouts.master')
@section('title','Unidades Responsables')
@section('content')
<div class="row" id="ur">
	@include('ur.agregar')
	@include('ur.editar')
	<div class="col-lg-12 col-md-8 col-sm-4">
		<h1 class="page-header">Unidades Responsables
			<button class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="left" title="Agregar Unidad Responsable" @click="mostrar_formulario_agregar_ur">
				<i class="fa fa-plus"></i>
			</button>
			<input type="text" v-model="ur_buscar" class="form-control" placeholder="Buscar...">
		</h1>

		<div class="jumbotron alert alert-warning" v-if='urs.length == 0'>
			<p>Aun no existen Unidades Responsables</p>
		</div>

		@include('ur.table')
	</div>

	
</div>
@endsection