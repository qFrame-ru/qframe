<form wire:submit="update">

	<h1 class="mb-5">Аккаунт</h1>

	{{--Электронный адрес--}}
	<div class="mb-3">
		<label class="form-label">Электронный адрес</label>
		<input
			type="email" autocomplete="off" required class="form-control"
			wire:model="email"
		>
		<x-admin.notifications.error field="email"/>
	</div>

	{{--Пароль--}}
	<div class="mb-3">
		<label class="form-label">Пароль</label>
		<input
			type="password" autocomplete="off" class="form-control"
			wire:model="password"
		>
		<x-admin.notifications.error field="password"/>
	</div>

	{{--Кнопка--}}
	<x-admin.inputs.submit/>

</form>
