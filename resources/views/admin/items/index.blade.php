<div>

	<h1 class="mb-5">Объекты</h1>

	<a href="{{ route('admin.items.create') }}" class="btn btn-primary">
		<x-admin.icon icon="plus" text="Новый объект" />
	</a>

	<div class="row mt-4">
		@foreach($items as $item)
			<div class="col-3 mb-4">
				<div class="card">
					<img src="{{ $item->getFirstMediaUrl('images', 'image') }}" class="card-img-top">
					<div class="card-body vstack row-gap-2">
						<div>{{ $item->name }}</div>
						<a href="{{ route('admin.items.edit', $item) }}" class="btn btn-primary">
							<x-admin.icon icon="pencil" text="Редактировать"/>
						</a>
					</div>
				</div>
			</div>
		@endforeach
	</div>
</div>
