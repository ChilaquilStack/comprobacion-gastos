@extends('layouts.master')
@section('title','Unidades Responsables')
@section('content')
	@include('ur.ur')
	@include('ur.table')
	@include('layouts.modal')
	@include('layouts.paginator')
	<ur></ur>
@endsection