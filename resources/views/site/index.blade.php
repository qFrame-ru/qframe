@extends('site.template')

@section('title', env('SITE_INDEX_TITLE'))
@section('content')
	<h1 class="h1">{{ env('SITE_INDEX_H1') }}</h1>

	@foreach($items as $item)
		@include('site.components.card')
	@endforeach
@stop
