<!doctype html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Вход в админцентр</title>
	@vite('resources/sass/admin/app.scss')
</head>
<body>
<section class="section is-large">
	<div class="container">
		<div class="columns">
			<div class="column is-4 is-offset-4">
				<form method="POST" action="{{ route('admin.auth.login') }}">
					@csrf

					{{--Электронный адрес--}}
					<div class="field">
						<label class="label">Электронный адрес</label>
						<div class="control">
							<input name="email" type="email" class="input" required>
						</div>
					</div>

					{{--Пароль--}}
					<div class="field">
						<label class="label">Пароль</label>
						<div class="control">
							<input name="password" type="password" class="input" required>
						</div>
					</div>

					{{--Кнопка--}}
					<div class="field">
						<div class="control">
							<x-admin.inputs.submit text="Войти"/>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
</section>
</body>
</html>
