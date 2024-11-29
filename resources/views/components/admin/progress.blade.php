<div
	class="progress my-3" style="height: 4px"
	x-show="{{ $flag ?? 'uploading' }}"
>
	<div
		class="progress-bar"
		x-bind:style="progressBarStyle"
	></div>
</div>
