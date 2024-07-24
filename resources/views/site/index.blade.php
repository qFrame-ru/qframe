@extends('site.template')

@section('title', \App\Models\Metatag::getValue(\App\Models\Metatag::TYPE_HOME_TITLE))
@section('description', \App\Models\Metatag::getValue(\App\Models\Metatag::TYPE_HOME_DESCRIPTION))
@section('keywords', \App\Models\Metatag::getValue(\App\Models\Metatag::TYPE_HOME_KEYWORDS))
@section('content')
	@if(\App\Models\Metatag::hasValue(\App\Models\Metatag::TYPE_HOME_H1))
		<h1 class="h1">{{ \App\Models\Metatag::getValue(\App\Models\Metatag::TYPE_HOME_H1) }}</h1>
	@endif

	@foreach($items as $item)
		@include('site.components.card')
	@endforeach
@stop
