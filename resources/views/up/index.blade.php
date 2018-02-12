@extends('layouts.master')
@section('title','Unidades Presupuestales')
@section('content')
@include('layouts.modal')
@include('layouts.paginator')
@include('up.table')
@include('up.up')
	<up></up>
@endsection