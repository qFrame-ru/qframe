<!doctype html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Вход в админцентр</title>
	@vite('resources/sass/admin/app.scss')
</head>
<body class="vstack justify-content-center">
<main class="container-fluid">
	<div class="row">
		<form
			method="POST"
			class="col-2 mx-auto row-gap-2"
			action="{{ route('admin.auth.login') }}"
		>
			@csrf

			{{--Электронный адрес--}}
			<div class="mb-3">
				<label class="form-label">Электронный адрес</label>
				<input name="email" type="email" class="form-control" required>
			</div>

			{{--Пароль--}}
			<div class="mb-3">
				<label class="form-label">Пароль</label>
				<input name="password" type="password" class="form-control" required>
			</div>

			{{--Кнопка--}}
			<x-admin.inputs.submit text="Войти"/>

		</form>
	</div>
</main>
</body>
</html>
