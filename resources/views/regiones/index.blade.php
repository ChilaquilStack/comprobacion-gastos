@extends('layouts.master')
@section('title','Regiones')
@section('content')
	@include('regiones.table')
	@include('layouts.modal')
	@include('layouts.paginator')
	<script type="text/template" id="regiones">
		<div class="row">
			<modal :id="'agregar_region'" :title="title_modal">
				<template slot="modal-body">
					@include('regiones.form')
				</template>
				<template slot="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-success" @click="guardar_region" v-show="action.save">Guardar</button>
					<button type="button" class="btn btn-success" @click="actualizar_region" v-show="action.update">Actualizar</button>
				</template>
			</modal>
			<div class="col-lg-12 col-md-8 col-sm-4">
				<regiones-tabla 
					:regiones='regiones' 
					@agregarregion="agregar_region" 
					@editarregion="editar_region" 
					@eliminarregion="eliminar_region"
					@buscarregion="buscar_region">
				</regiones-tabla>
				<paginator :pagination="pagination" :offset="offset" @changepage="changePage"></paginator>
			</div>
		</div>
	</script>
	<regiones></regiones>
@endsection