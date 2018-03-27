@extends('layouts.master')
@section('title', 'Tipo de Programa General')
@section('content')
	@include('layouts.modal')
	@include('layouts.paginator')
	@include('tpg.table')
	@include('tpg.tpg')
	<tpg></tpg>
@endsection