<div
	@class([
		'alert',
		'mt-2',
		'alert-danger' => $error ?? false
	])>
	{{ $message }}
</div>
