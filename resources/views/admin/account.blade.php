<form wire:submit="update">

	<h1 class="title">Аккаунт</h1>

	{{--Электронный адрес--}}
	<div class="field">
		<label class="label">Электронный адрес</label>
		<div class="control">
			<input
				type="email"
				autocomplete="off"
				required
				class="input"

				wire:model="email"
			>
		</div>
		<x-admin.notifications.error field="email"/>
	</div>

	{{--Пароль--}}
	<div class="field">
		<label class="label">Пароль</label>
		<div class="control">
			<input
				type="password"
				autocomplete="off"
				class="input"

				wire:model="password"
			>
		</div>
		<x-admin.notifications.error field="password"/>
	</div>

	{{--Кнопка--}}
	<button
		type="submit"
		class="button is-primary"
	>Сохранить</button>

</form>
