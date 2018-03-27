@extends('layouts.master')
@section('title','Unidades Operadoras del Gasto')
@section('content')
	@include('layouts.modal')
	@include('layouts.table')
	@include('layouts.paginator')
	@include('uog.uog')
	<uog></uog>
@endsection