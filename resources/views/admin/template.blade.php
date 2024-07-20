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
						<span class="icon-text">
							<span class="icon">
								<i class="fas fa-arrow-up-right-from-square"></i>
							</span>
							<span>Сайт</span>
						</span>
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
								<span class="icon-text">
									<span class="icon">
										<i class="fas fa-user"></i>
									</span>
									<span>Аккаунт</span>
								</span>
							</a>
						</p>

						{{--Стоит в середине, иначе у первой кнопки углы не скруглённые--}}
						@csrf

						{{--Выход--}}
						<p class="control">
							<button type="submit" class="button is-light">
								<span class="icon-text">
									<span class="icon">
										<i class="fas fa-sign-out"></i>
									</span>
									<span>Выйти</span>
								</span>
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
	<span class="icon-text">
		<span class="has-text-weight-bold">Связь с&nbsp;кьюФрейм</span>
	</span>

	{{--Чат в Телеграме--}}
	<a href="https://t.me/m/76kTC2bzZjcy" target="_blank" class="icon-text ml-4">
		<span class="icon">
			<i class="fa-brands fa-telegram"></i>
		</span>
		<span>Написать в&nbsp;Telegram</span>
	</a>

	{{--Канал в Телеграме--}}
	<a href="https://t.me/+JMz_sAYCA_cwYWJi" target="_blank" class="icon-text ml-4">
		<span class="icon">
			<i class="fa-brands fa-telegram"></i>
		</span>
		<span>Канал в&nbsp;Telegram</span>
	</a>

	{{--Группа в VK--}}
	<a href="https://t.me/+JMz_sAYCA_cwYWJi" target="_blank" class="icon-text ml-4">
		<span class="icon">
			<i class="fa-brands fa-vk"></i>
		</span>
		<span>Группа в&nbsp;VK</span>
	</a>

	{{--Сайт--}}
	<a href="https://qframe.ru" target="_blank" class="icon-text ml-4">
		<span class="icon">
			<i class="fas fa-arrow-up-right-from-square"></i>
		</span>
		<span>Сайт</span>
	</a>

	{{--Электронная почта--}}
	<a href="mailto:qframe.ru@ya.ru" target="_blank" class="icon-text ml-4">
		<span class="icon">
			<i class="fas fa-envelope"></i>
		</span>
		<span>qframe.ru@ya.ru</span>
	</a>

	{{--Позвонить--}}
	<a href="tel:+79953336025" target="_blank" class="icon-text ml-4">
		<span class="icon">
			<i class="fas fa-phone"></i>
		</span>
		<span>+7&nbsp;995&nbsp;333&nbsp;60&nbsp;25</span>
	</a>

</footer>

@livewireScripts
</body>
</html>
