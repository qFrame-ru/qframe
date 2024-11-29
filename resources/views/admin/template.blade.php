<!doctype html>
<html lang="ru" class="has-navbar-fixed-top">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{ $title ?? 'Админцентр' }} — кьюФрейм</title>
	<link rel="shortcut icon" href="{{ asset('a/i/logo_sign.svg') }}">
	@vite('resources/sass/admin/app.scss')
	@livewireStyles
</head>
<body class="vstack">

<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
	<div class="container-fluid">

		{{--Логотип--}}
		<a class="navbar-brand" href="{{ route('admin.index') }}" wire:navigate>
			<img src="{{ asset('a/i/logo_full.svg') }}" style="height: 32px">
		</a>

		{{--Кнопка-бургер--}}
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
			<span class="navbar-toggler-icon"></span>
		</button>

		{{--Сворачиваемая часть--}}
		<div class="collapse navbar-collapse" id="navbarSupportedContent">

			{{--Меню--}}
			<ul class="navbar-nav me-auto">

				@foreach($menu as $title => $value)
					@if (is_array($value))
						<livewire:components.nav.dropdown title="{{ $title }}" :items="$value" />
					@else
						<livewire:components.nav.item route="{{ $value }}" title="{{ $title }}" />
					@endif
				@endforeach

			</ul>

			{{--Правая часть--}}
			<div class="hstack column-gap-2">

				{{--Ссылка на сайт--}}
				<a class="btn btn-primary" href="{{ route('site.index') }}" target="_blank">
					<x-admin.icon icon="arrow-up-right-from-square" text="Сайт"/>
				</a>

				{{--Аккаунт--}}
				<form method="POST" action="{{ route('admin.auth.logout') }}" class="btn-group">

					{{--Профиль--}}
					<a
						class="btn btn-secondary"
						href="{{ route('admin.account') }}"
						@disabled(Route::is('admin.account'))
						wire:navigate
					>
						<x-admin.icon icon="user" text="Аккаунт"/>
					</a>

					{{--Стоит в середине, иначе у первой кнопки углы не скруглённые--}}
					@csrf

					{{--Выход--}}
					<button type="submit" class="btn btn-secondary">
						<x-admin.icon icon="sign-out" text="Выйти"/>
					</button>

				</form>
			</div>
		</div>
	</div>
</nav>

{{--Контент--}}
<section class="section is-flex-grow-1">
	<div class="container">{{ $slot }}</div>
</section>

{{--Футер--}}
<footer class="navbar navbar-expand bg-body-tertiary">
	<div class="container-fluid">
		<ul class="list-unstyled hstack column-gap-3 small">

			{{--Метка--}}
			<li class="text-secondary">
				<x-admin.icon bold text="Связь с кьюФрейм"/>
			</li>

			{{--Чат в Телеграме--}}
			<li>
				<a href="https://t.me/m/76kTC2bzZjcy" target="_blank" class="link-secondary link-opacity-50-hover">
					<x-admin.icon icon="telegram" collection="fa-brands" text="Написать в Telegram"/>
				</a>
			</li>

			{{--Канал в Телеграме--}}
			<li>
				<a href="https://t.me/+JMz_sAYCA_cwYWJi" target="_blank" class="link-secondary link-opacity-50-hover">
					<x-admin.icon icon="telegram" collection="fa-brands" text="Канал в Telegram"/>
				</a>
			</li>

			{{--Группа в VK--}}
			<li>
				<a href="https://t.me/+JMz_sAYCA_cwYWJi" target="_blank" class="link-secondary link-opacity-50-hover">
					<x-admin.icon icon="vk" collection="fa-brands" text="Группа в VK"/>
				</a>
			</li>

			{{--Сайт--}}
			<li>
				<a href="https://qframe.ru" target="_blank" class="link-secondary link-opacity-50-hover">
					<x-admin.icon icon="arrow-up-right-from-square" text="Сайт"/>
				</a>
			</li>

			{{--Электронная почта--}}
			<li>
				<a href="mailto:qframe.ru@ya.ru" target="_blank" class="link-secondary link-opacity-50-hover">
					<x-admin.icon icon="envelope" text="qframe.ru@ya.ru"/>
				</a>
			</li>

			{{--Позвонить--}}
			<li>
				<a href="tel:+79953336025" target="_blank" class="link-secondary link-opacity-50-hover">
					<x-admin.icon icon="phone" text="+7 995 333 60 25"/>
				</a>
			</li>

		</ul>
	</div>
</footer>

@vite('resources/js/admin/app.js')
@livewireScriptConfig
</body>
</html>
