@extends('layouts.master')
@section('title','Clasificador Por Objeto del Gasto')
@section('content')
	@include('layouts.paginator')
	@include('COG.tabla')
	@include('COG.cog')
	<cog></cog>
@endsection