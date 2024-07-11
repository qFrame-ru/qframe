<!doctype html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title', 'Админцентр')</title>
	@vite('resources/sass/admin/app.scss')
</head>
<body>
<section class="section">
	<div class="container">
		<form method="POST" action="{{ route('admin.auth.logout') }}">
			@csrf
			<button type="submit" class="button is-primary">Выход</button>
		</form>
		@yield('content')
	</div>
</section>
</body>
</html>
