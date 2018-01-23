@extends('layouts.master')
@section('title','Unidades Ejecutoras del Gasto')
@section('content')
<div class="row" id="ueg">
	@include('ueg.agregar')
	@include('ueg.editar')
	<div class="col-lg-12 col-md-8 col-sm-4">
		<h1 class="page-header">Unidades Ejecutoras del Gasto
			<button class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="left" title="Agregar Unidad Ejecutora del Gasto" @click="mostrar_formulario_agregar_ueg">
				<i class="fa fa-plus"></i>
			</button>
		</h1>
		<div class="row">
			<div class="col-lg-12">
				@include('ueg.table')
			</div>
		</div>
	</div>
</div>
@endsection