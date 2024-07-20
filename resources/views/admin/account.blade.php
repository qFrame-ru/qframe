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
		@error('email')
			<livewire:components.notification error :message="$message" />
		@enderror
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
		@error('password')
			<livewire:components.notification error :message="$message" />
		@enderror
	</div>

	<button
		type="submit"
		class="button is-primary">Сохранить</button>

</form>
