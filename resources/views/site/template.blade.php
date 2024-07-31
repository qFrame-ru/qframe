<!doctype html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title', 'кьюФрейм')</title>
	<meta name="description" content="@yield('description', '')">
	<meta name="keywords" content="@yield('keywords', '')">
	@if(\App\Models\Logo::hasFaviconMedia())
		<link rel="icon" href="{{ \App\Models\Logo::getFaviconUrl() }}">
	@endif
	<link rel="stylesheet" href="{{ route('site.css-palette', time()) }}">
	@vite('resources/sass/site/app.scss')
</head>
<body class="body">
<div class="container">

	<header class="header">
		@if (Route::currentRouteName() == 'index')
			<img
				class="header__logo"
				src="{{ asset('i/logo.webp') }}"
				alt="{{ \App\Models\Contact::getValue(\App\Models\Contact::TYPE_COMPANY_NAME) }}"
			>
		@else
			<a href="{{ route('site.index') }}">
				<img
					class="header__logo"
					src="{{ asset('i/logo.webp') }}"
					alt="{{ \App\Models\Contact::getValue(\App\Models\Contact::TYPE_COMPANY_NAME) }}"
				>
			</a>
		@endif
	</header>

	<main class="content">
		@yield('content')
	</main>

	@if(\App\Models\Contact::whereNot('type', \App\Models\Contact::TYPE_COMPANY_NAME)->whereNotNull('value')->count())
		<div class="contacts">

			@if(\App\Models\Contact::hasValue(\App\Models\Contact::TYPE_PHONE))
				<a
					href="tel:{{ \App\Models\Contact::getCleanPhoneValue() }}"
					class="contacts__phone"
				>{{ \App\Models\Contact::getValue(\App\Models\Contact::TYPE_PHONE) }}</a>
			@endif

			@if(\App\Models\Contact::hasValue(\App\Models\Contact::TYPE_ADDRESS))
				<div class="contacts__address">{{ \App\Models\Contact::getValue(\App\Models\Contact::TYPE_ADDRESS) }}</div>
			@endif

			@if(\App\Models\Contact::hasValue(\App\Models\Contact::TYPE_SCHEDULE))
				<div class="contacts__schedule">{{ \App\Models\Contact::getValue(\App\Models\Contact::TYPE_SCHEDULE) }}</div>
			@endif

		</div>
    @endif

	<footer class="footer">
		@if (\App\Models\Contact::hasValue(\App\Models\Contact::TYPE_COMPANY_NAME))
			<p>© {{ date('Y') }} {{ \App\Models\Contact::getValue(\App\Models\Contact::TYPE_COMPANY_NAME) }}</p>
		@endif
		<p>Сайт работает на <a href="https://qframe.ru" target="_blank">платформе «кьюФрейм»</a></p>
	</footer>

</div>

@vite('resources/js/site/app.js')
</body>
</html>
