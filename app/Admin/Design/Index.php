<?php namespace App\Admin\Design;

use App\Models\Logo;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class Index extends Component
{
	use WithFileUploads;

	public Logo $logoModel;
	public Logo $faviconModel;
	public $logoFile;
	public $faviconFile;

	public function mount() {
		$this->logoModel = Logo::getLogoModel();
		$this->faviconModel = Logo::getFaviconModel();
	}

	/**
	 * Обновление логотипа
	 *
	 * @return void
	 * @throws FileDoesNotExist
	 * @throws FileIsTooBig
	 */
	public function updateLogo():void {
		if ($this->logoFile) {
			$this
				->logoModel
				->clearMediaCollection(Logo::TYPE_LOGO);

			$this
				->logoModel
				->addMedia($this->logoFile->getPathname())
				->toMediaCollection(Logo::TYPE_LOGO);

			$this->reset('logoFile');
		}
	}

	/**
	 * Обновление фавиконки
	 *
	 * @return void
	 * @throws FileDoesNotExist
	 * @throws FileIsTooBig
	 */
	public function updateFavicon():void {
		if ($this->faviconFile) {
			$this
				->faviconModel
				->clearMediaCollection(Logo::TYPE_FAVICON);

			$this
				->faviconModel
				->addMedia($this->faviconFile->getPathname())
				->toMediaCollection(Logo::TYPE_FAVICON);

			$this->reset('faviconFile');
		}
	}

	/**
	 * Обновление цветов
	 *
	 * @return void
	 */
	public function updateColors():void {
		$this->dispatch('design-colors-updated');
	}

	public function render() {
		return view('admin.design.index')
			->title('Дизайн');
	}
}
