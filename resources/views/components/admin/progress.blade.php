<div class="my-3" x-show="{{ $flag ?? 'uploading' }}">
	<progress class="progress is-small" max="100" x-bind:value="{{ $progress ?? 'progress' }}"></progress>
</div>
