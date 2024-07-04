<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>qFrame</title>
	<link rel="stylesheet" href="{{ route('css-palette', time()) }}">
    @vite('resources/sass/app.scss')
</head>
<body class="body">
<div class="container">

	<header class="header">
	    <img
		    class="header__logo"
		    src="https://placehold.co/360x80"
		    alt="Логотип компании"
	    >
	</header>

	<main class="content">
	    @yield('content')
	</main>

	<div class="contacts">
		<a href="tel:+79000000000" class="contacts__phone">+7 900 000-00-00</a>
		<div class="contacts__address">Санкт-Петербург, Невский проспект, д. 107, оф.&nbsp;309</div>
		<div class="contacts__schedule">Пн-пт, с 9:00 до 18:00</div>
	</div>

	<footer class="footer">
	    <p>© {{ date('Y') }} Компания</p>
	    <p>Сайт работает на <a href="https://qframe.ru" target="_blank">платформе «кьюФрейм»</a></p>
	</footer>

</div>

@vite('resources/js/app.js')
</body>
</html>
