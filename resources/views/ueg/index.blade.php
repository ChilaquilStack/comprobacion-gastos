@extends('layouts.master')
@section('title','Unidades Ejecutoras del Gasto')
@section('content')
	@include('ueg.ueg')
	@include('ueg.table')
	@include('layouts.modal')
	@include('layouts.paginator')
	<ueg></ueg>
@endsection