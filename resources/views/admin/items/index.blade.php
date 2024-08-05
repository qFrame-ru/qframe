<div>

	<h1 class="title is-1">Объекты</h1>

	<div class="my-6">
		<a href="{{ route('admin.items.create') }}" class="button is-primary">
			<x-admin.icon icon="plus" text="Новый объект" />
		</a>
	</div>

	<div class="fixed-grid has-4-cols">
		<div class="grid">
			@foreach($items as $item)
				<div class="cell">
					<div class="card">
						<div class="card-image">
							<figure class="image">
								<img src="">
							</figure>
						</div>
						<div class="card-content">{{ $item->name }}</div>
						<div class="card-footer">
							<a href="{{ route('admin.items.edit', $item) }}" class="card-footer-item">
								<x-admin.icon icon="pencil" text="Редактировать"/>
							</a>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</div>
