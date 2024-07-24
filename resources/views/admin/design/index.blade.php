<form wire:submit="update">
	<h4 class="subtitle is-4">Цвета</h4>
	<div class="grid is-col-min-12 is-row-gap-4">
		<livewire:design.color name="accent"/>
		<livewire:design.color name="accent-swipe"/>
		<livewire:design.color name="text"/>
		<livewire:design.color name="stroke"/>
		<livewire:design.color name="page-background"/>
		<livewire:design.color name="card-background"/>
		<livewire:design.color name="slider-bullet"/>
	</div>
	<button type="submit" class="button is-primary">
		<x-admin.icon icon="check" text="Сохранить"/>
	</button>
</form>
