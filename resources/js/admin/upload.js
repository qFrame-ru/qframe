export default () => ({
	uploading: false,
	progress: 0,
	startUpload: function() {
		this.uploading = true;
	},
	finishUpload: function() {
		this.uploading = false;
	},
	updateUploadProgress: function(event) {
		this.progress = event.detail.progress;
	},
	container: {
		['x-on:livewire-upload-start']: 'startUpload',
		['x-on:livewire-upload-finish']: 'finishUpload',
		['x-on:livewire-upload-cancel']: 'finishUpload',
		['x-on:livewire-upload-error']: 'finishUpload',
		['x-on:livewire-upload-progress']: 'updateUploadProgress'
	},
	submit: {
		['x-bind:disabled']() { return this.uploading }
	}
})
