@extends('layouts.master')
@section('title', 'Tipo de Programa General')
@section('content')
	<div class="row" id="tpg">
		@include('tpg.agregar')
		@include('tpg.editar')
		<div class="col-lg-12 col-md-8 col-sm-4">
			<h1 class="page-header">Tipo de Programa General
				<button class="btn btn-success btn-sm" @click="agregar">
					<i class="fa fa-plus"></i>
				</button>
			</h1>
			@include('tpg.table') 
		</div>
	</div>
@endsection