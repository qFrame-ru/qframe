<div
	@class([
		'notification',
		'is-light',
		'mt-2',
		'is-danger' => $error ?? false
	])>
	{{ $message }}
</div>
