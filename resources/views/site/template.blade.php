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

<footer class="footer">
    <div>© {{ date('Y') }} Компания</div>
    <div>Сайт работает на <a href="https://qframe.ru" target="_blank">платформе «кьюФрейм»</a></div>
</footer>

@vite('resources/js/app.js')
</body>
</html>
