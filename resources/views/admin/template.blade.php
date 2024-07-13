<!doctype html>
<html lang="ru" class="has-navbar-fixed-top">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title', 'Админцентр')</title>
	@vite('resources/sass/admin/app.scss')
</head>
<body class="is-flex is-flex-direction-column">

{{--Шапка--}}
<nav class="navbar is-fixed-top has-shadow">

	{{--Логотип и кнопка-бургер--}}
	<div class="navbar-brand">
		<a class="navbar-item" href="{{ route('admin.index') }}">
			<img src="{{ asset('a/i/logo_full.svg') }}">
		</a>
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

			{{--Каталог--}}
			<div class="navbar-item has-dropdown is-hoverable">
				<a class="navbar-link">Каталог</a>

				<div class="navbar-dropdown">
					<a class="navbar-item">Объекты</a>
					<a class="navbar-item">Параметры</a>
				</div>
			</div>

			{{--Контакты--}}
			<a class="navbar-item">Контакты</a>

			{{--Дизайн--}}
			<a class="navbar-item">Дизайн</a>

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
							<a href="#" class="button is-light">
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
	<div class="container">
		@yield('content')
	</div>
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

</body>
</html>
