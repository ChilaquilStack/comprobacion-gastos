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
            </h1>
            @include('municipios.table')
        </div>
    </div>
@endsection