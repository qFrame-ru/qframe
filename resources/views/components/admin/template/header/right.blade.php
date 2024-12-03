{{--Правая часть хидера--}}
<div class="hstack column-gap-2">

	{{--Ссылка на сайт--}}
	<a class="btn btn-primary" href="{{ route('site.index') }}" target="_blank">
		<x-admin.icon icon="arrow-up-right-from-square" text="Сайт"/>
	</a>

	{{--Аккаунт--}}
	<form method="POST" action="{{ route('admin.auth.logout') }}" class="btn-group">

		{{--Профиль--}}
		<a
			class="btn btn-secondary"
			href="{{ route('admin.account') }}"
			@disabled(Route::is('admin.account'))
			wire:navigate
		>
			<x-admin.icon icon="user" text="Аккаунт"/>
		</a>

		{{--Стоит в середине, иначе у первой кнопки углы не скруглённые--}}
		@csrf

		{{--Выход--}}
		<button type="submit" class="btn btn-secondary">
			<x-admin.icon icon="sign-out" text="Выйти"/>
		</button>

	</form>
</div>
