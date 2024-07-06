@extends('site.template')

@section('title', $item->name)
@section('content')

	<h1 class="h1">{{ $item->name }}</h1>

	@if ($item->hasImages())
		<div class="slider slider_negative">
			<div class="swiper-wrapper">
				@for ($i = 1; $i <= $item->getImagesCount(); $i++)
					<div class="swiper-slide">
						<img src="{{ asset('i/' . $item->id . '/' . $i . '.webp') }}">
					</div>
				@endfor
			</div>
			<div class="swiper-pagination"></div>
		</div>
	@endif

	@if ($item->hasProperties())
		<div class="item-data">
			<div class="item-data__params">
				@foreach($item->getPropertiesWithValues() as $property)
					<div class="item-data__param">
						<div class="item-data__param-label">{{ $property['name'] }}</div>
						<div class="item-data__param-value">{{ $property['value'] }}</div>
					</div>
				@endforeach
			</div>
		</div>
	@endif

	@if ($item->description)
	<section class="article">
		@php($description = str_replace("\n", '</p><p>', $item->description))
		<p>{!! $description !!}</p>
	</section>
	@endif

@stop
