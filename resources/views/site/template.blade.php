<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'кьюФрейм')</title>
	<link rel="stylesheet" href="{{ route('css-palette', time()) }}">
    @vite('resources/sass/site/app.scss')
</head>
<body class="body">
<div class="container">

	<header class="header">
		@if (Route::currentRouteName() == 'index')
			<img
				class="header__logo"
				src="{{ asset('i/logo.webp') }}"
				alt="{{ env('SITE_COMPANY_NAME') }}"
			>
		@else
			<a href="{{ route('index') }}">
				<img
					class="header__logo"
					src="{{ asset('i/logo.webp') }}"
					alt="{{ env('SITE_COMPANY_NAME') }}"
				>
			</a>
		@endif
	</header>

	<main class="content">
	    @yield('content')
	</main>

	<div class="contacts">
		<a href="tel:{{ env('SITE_CONTACTS_PHONE_VALUE') }}" class="contacts__phone">{{ env('SITE_CONTACTS_PHONE_TITLE') }}</a>
		<div class="contacts__address">{{ env('SITE_CONTACTS_ADDRESS') }}</div>
		<div class="contacts__schedule">{{ env('SITE_CONTACTS_SCHEDULE') }}</div>
	</div>

	<footer class="footer">
	    <p>© {{ date('Y') }} {{ env('SITE_COMPANY_NAME') }}</p>
	    <p>Сайт работает на <a href="https://qframe.ru" target="_blank">платформе «кьюФрейм»</a></p>
	</footer>

</div>

@vite('resources/js/site/app.js')
</body>
</html>
