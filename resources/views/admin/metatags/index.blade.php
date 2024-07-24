<form wire:submit="update">

	<h1 class="title">Поисковая оптимизация</h1>

	<livewire:metatags.metatag type="{{ \App\Models\Metatag::TYPE_HOME_TITLE }}"/>
	<livewire:metatags.metatag type="{{ \App\Models\Metatag::TYPE_HOME_DESCRIPTION }}"/>
	<livewire:metatags.metatag type="{{ \App\Models\Metatag::TYPE_HOME_KEYWORDS }}"/>
	<livewire:metatags.metatag type="{{ \App\Models\Metatag::TYPE_HOME_H1 }}"/>

	<button type="submit" class="button is-primary">
		<x-admin.icon icon="check" text="Сохранить"/>
	</button>

</form>
