<form wire:submit="update">

	<h1 class="mb-5">Поисковая оптимизация</h1>

	<livewire:metatags.metatag type="{{ \App\Models\Metatag::TYPE_HOME_TITLE }}"/>
	<livewire:metatags.metatag type="{{ \App\Models\Metatag::TYPE_HOME_DESCRIPTION }}"/>
	<livewire:metatags.metatag type="{{ \App\Models\Metatag::TYPE_HOME_KEYWORDS }}"/>
	<livewire:metatags.metatag type="{{ \App\Models\Metatag::TYPE_HOME_H1 }}"/>

	<x-admin.inputs.submit/>

</form>
