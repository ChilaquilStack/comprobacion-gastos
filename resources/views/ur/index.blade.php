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
		</h1>
	</div>
	<div class="col-lg-12">
		@include('ur.table')
	</div>
</div>
@endsection