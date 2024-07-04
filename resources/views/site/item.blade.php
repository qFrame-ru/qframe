@extends('site.template')

@section('title', 'Двухэтажный дом в Новинках')
@section('content')

	<h1 class="h1">Двухэтажный дом в&nbsp;Новинках</h1>

	<div class="slider slider_negative">
		<div class="swiper-wrapper">
			<div class="swiper-slide">
				<img src="https://placehold.co/360x200/D0E1CA/FFF?text=Раз">
			</div>
			<div class="swiper-slide">
				<img src="https://placehold.co/360x200/CAD7E1/FFF?text=Два">
			</div>
			<div class="swiper-slide">
				<img src="https://placehold.co/360x200/E1CACB/FFF?text=Три">
			</div>
		</div>
		<div class="swiper-pagination"></div>
	</div>

	<div class="item-data">
		<div class="item-data__params">
			<div class="item-data__param">
				<div class="item-data__param-label">Стоимость</div>
				<div class="item-data__param-value">от 35 000 000 р.</div>
			</div>
			<div class="item-data__param">
				<div class="item-data__param-label">Срок постройки</div>
				<div class="item-data__param-value">6–12 месяцев</div>
			</div>
			<div class="item-data__param">
				<div class="item-data__param-label">Площадь</div>
				<div class="item-data__param-value">300 кв. м.</div>
			</div>
			<div class="item-data__param">
				<div class="item-data__param-label">Этажность</div>
				<div class="item-data__param-value">2</div>
			</div>
		</div>
	</div>

	<section class="article">
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
			magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat.</p>
		<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
			sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	</section>

@stop
