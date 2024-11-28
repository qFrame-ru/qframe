<button
	type="submit"
	class="btn btn-primary"
	@isset($bind)
		x-bind="{{ $bind }}"
	@endif
>
	<x-admin.icon icon="{{ $icon ?? 'check' }}" text="{{ $text ?? 'Сохранить' }}"/>
</button>
