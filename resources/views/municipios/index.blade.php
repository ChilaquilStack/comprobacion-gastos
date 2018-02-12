@extends('layouts.master')
@section('title','Municipios')
@section('content')
		@include('layouts.modal')
		@include('municipios.table')
		@include('layouts.paginator')
        <script type="text/template" id="municipios">
			<div class="row">
				<modal :id="'agregar_municipio'" :title="title_modal">
					<template slot="modal-body">
						@include('municipios.form')
					</template>
					<template slot="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-success" @click="guardar_municipio" v-show="action.save">Guardar</button>
                        <button type="button" class="btn btn-success" @click="actualizar_municipio" v-show="action.update">Actualizar</button>
					</template>
				</modal>
	        	<div class="col-lg-12 col-md-8 col-sm-4">
        			<municipios-tabla 
        				@editarmunicipio="editar_municipio" 
        				@eliminarmunicipio="eliminar_municipio" 
        				@agregarmunicipio="agregar_municipio" 
        				@buscarmunicipio="buscar_municipio"
        				:municipios='municipios'>
        			</municipios-tabla>
		        </div>
	        	<div class="col-lg-12 col-md-8 col-sm-4">
	        		<paginator :pagination="pagination" :offset="offset" @changepage="changePage"></paginator>
	        	</div>
	    	</div>
        </script>
        <municipios></municipios>
@endsection