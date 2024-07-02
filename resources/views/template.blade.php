<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>qFrame</title>
    @vite('resources/sass/app.scss')
</head>
<body>
<header>
    <img src="https://placehold.co/320x80" alt="Логотип">
</header>
<main>
    @yield('content')
</main>
<footer>
    <div>© {{ date('Y') }} Компания</div>
    <div>Сайт работает на <a href="https://qframe.ru" target="_blank">платформе «кьюФрейм»</a></div>
</footer>

@vite('resources/js/app.js')
</body>
</html>
