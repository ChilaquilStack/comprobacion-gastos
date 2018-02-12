@extends('layouts.master')
@section('title','Municipios')
@section('content')
	<div class="row" id="municipios">
        <div class="col-lg-12 col-md-8 col-sm-4">
            @include('municipios.agregar')
            @include('municipios.editar')
            <h1 class="page-header">Municipios
	    		<button class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="left" title="Agregar Municipio" @click="mostrar_formulario_agregar_municipio">
	        		<i class="fa fa-plus"></i>
	    		</button>
	    		<input type="text" v-model="buscar_municipio" class="form-control" placeholder="Buscar">
			</h1>
			<div class="jumbotron alert alert-warning" v-if='municipios.length == 0'>
	    		<p>Aun no existen municipios</p>
			</div>
			@include('municipios.table')
			@include('layouts.paginator')
        </div>
    </div>
@endsection