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
<body class="is-flex is-flex-direction-column">

{{--Шапка--}}
<nav class="navbar is-fixed-top has-shadow">

	{{--Логотип и кнопка-бургер--}}
	<div class="navbar-brand">
		@if(Route::is('admin.index'))
			<span class="navbar-item">
				<img src="{{ asset('a/i/logo_full.svg') }}">
			</span>
		@else
			<a class="navbar-item" href="{{ route('admin.index') }}" wire:navigate>
				<img src="{{ asset('a/i/logo_full.svg') }}">
			</a>
		@endif
		<a role="button" class="navbar-burger" data-target="navbarMenu">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</a>
	</div>

	{{--Меню--}}
	<div id="navbarMenu" class="navbar-menu">

		{{--Левая часть--}}
		<div class="navbar-start">
			@foreach($menu as $title => $value)
				@if (is_array($value))
					<livewire:components.nav.dropdown title="{{ $title }}" :items="$value" />
				@else
					<livewire:components.nav.item route="{{ $value }}" title="{{ $title }}" />
				@endif
			@endforeach
		</div>

		{{--Правая часть--}}
		<div class="navbar-end">
			<div class="navbar-item">
				<div class="buttons">

					{{--Ссылка на сайт--}}
					<a class="button is-primary" href="{{ route('site.index') }}" target="_blank">
						<x-admin.icon icon="arrow-up-right-from-square" text="Сайт"/>
					</a>

					{{--Аккаунт--}}
					<form method="POST" action="{{ route('admin.auth.logout') }}" class="field has-addons">

						{{--Профиль--}}
						<p class="control">
							<a
								class="button is-light"
								href="{{ route('admin.account') }}"
								@disabled(Route::is('admin.account'))
								wire:navigate
							>
								<x-admin.icon icon="user" text="Аккаунт"/>
							</a>
						</p>

						{{--Стоит в середине, иначе у первой кнопки углы не скруглённые--}}
						@csrf

						{{--Выход--}}
						<p class="control">
							<button type="submit" class="button is-light">
								<x-admin.icon icon="sign-out" text="Выйти"/>
							</button>
						</p>

					</form>

				</div>
			</div>
		</div>

	</div>

</nav>

{{--Контент--}}
<section class="section is-flex-grow-1">
	<div class="container">{{ $slot }}</div>
</section>

{{--Футер--}}
<footer class="footer py-4 is-size-7 is-flex">

	{{--Метка--}}
	<x-admin.icon bold text="Связь с кьюФрейм"/>

	{{--Чат в Телеграме--}}
	<a href="https://t.me/m/76kTC2bzZjcy" target="_blank" class="ml-4 has-text-text">
		<x-admin.icon icon="telegram" collection="fa-brands" text="Написать в Telegram"/>
	</a>

	{{--Канал в Телеграме--}}
	<a href="https://t.me/+JMz_sAYCA_cwYWJi" target="_blank" class="ml-4 has-text-text">
		<x-admin.icon icon="telegram" collection="fa-brands" text="Канал в Telegram"/>
	</a>

	{{--Группа в VK--}}
	<a href="https://t.me/+JMz_sAYCA_cwYWJi" target="_blank" class="ml-4 has-text-text">
		<x-admin.icon icon="vk" collection="fa-brands" text="Группа в VK"/>
	</a>

	{{--Сайт--}}
	<a href="https://qframe.ru" target="_blank" class="ml-4 has-text-text">
		<x-admin.icon icon="arrow-up-right-from-square" text="Сайт"/>
	</a>

	{{--Электронная почта--}}
	<a href="mailto:qframe.ru@ya.ru" target="_blank" class="ml-4 has-text-text">
		<x-admin.icon icon="envelope" text="qframe.ru@ya.ru"/>
	</a>

	{{--Позвонить--}}
	<a href="tel:+79953336025" target="_blank" class="ml-4 has-text-text">
		<x-admin.icon icon="phone" text="+7 995 333 60 25"/>
	</a>

</footer>

@vite('resources/js/admin/app.js')
@livewireScriptConfig
</body>
</html>
