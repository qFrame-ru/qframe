@extends('site.template')

@section('content')
	<h1>Дома, которые мы построили</h1>

	@for($i = 0; $i < 5; $i++)
		@include('site.components.card')
	@endfor

@stop
