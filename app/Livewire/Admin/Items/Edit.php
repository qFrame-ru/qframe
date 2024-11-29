<?php namespace App\Livewire\Admin\Items;

use App\Models\Item;
use App\Models\Property;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
	use WithFileUploads;

	public Item $item;
	public $name;
	public $description;
	public $values = [];
	#[Validate(['images.*' => 'image'])]
	public $images = [];

	public function mount():void {
		$this->name = $this->item->name;
		$this->description = $this->item->description;

		$pairs = $this->item->getPropertiesWithValues();
		foreach ($pairs as $pair) {
			$this->values[$pair['property_id']] = $pair['value'];
		}
	}

	/**
	 * Сохранение объекта
	 *
	 * @return void
	 */
	public function save():void {

		// Подготовка данных
		$data = [
			'name' => trim($this->name),
			'description' => $this->description
		];

		// Обновление объекта
		$this->item->update($data);

		// Сохранение значений свойств
		foreach ($this->values as $property_id => $value) {
			$this->item->updateValue($property_id, $value);
		}

		foreach ($this->images as $image) {
			$this
				->item
				->addMedia($image->getPathname())
				->toMediaCollection('images');
		}

		$this->reset('images');

	}

	/**
	 * Сортировка изображений
	 *
	 * @param Media $sortedImage
	 * @param int $newPosition
	 * @return Redirector
	 */
	public function sortImages(Media $sortedImage, int $newPosition):Redirector {
		// Добавляем к переданной позиции единичку, так как плагин считает с нуля
		$newPosition++;

		// Текущая позиция отсорированного изображения
		$sorted_image_position = $sortedImage->order_column;

		// Проходимся по изображениям объекта
		$images = $this->item->getImages();
		foreach ($images as $image) {
			// Позиция изображения
			$image_position = $image->order_column;

			// Если перебираемое изображение — это не то, что отсортированное
			if ($image->isNot($sortedImage)) {

				if ($sorted_image_position)

				// Если изображение находится на выбранной позиции или выше,
				// а также до текущей позиции подвинутого изображения,
				// то её нужно сдвинуть в конец
				if ($image_position >= $newPosition && $image_position < $sorted_image_position) {
					$image->order_column++;
				}

				// Если изображение находится на выбранной позиции или ниже,
				// а также после текущей позиции подвинутого изображения,
				// то её нужно сдвинуть в начало
				if ($image_position <= $newPosition && $image_position > $sorted_image_position) {
					$image->order_column--;
				}

				$image->save();
			}


			// а также его позиция
			if (
				$image->isNot($sortedImage)
				&& $image_position >= $newPosition

			) {

			}
		}

		$sortedImage->order_column = $newPosition;
		$sortedImage->save();

		return redirect(request()->header('Referer'));
	}

	/**
	 * Удаление изображения
	 *
	 * @param Media $image
	 * @return void
	 */
	public function deleteImage(Media $image):void {
		$image->delete();
		$this->resetImagesPositions();
	}

	/**
	 * Сброс позиций изображений, так как
	 * Medialibrary не обновляет позиции после удаления
	 *
	 * @return void
	 */
	protected function resetImagesPositions():void {
		$images_ids = $this
			->item
			->media()
			->pluck('id')
			->toArray();
		Media::setNewOrder($images_ids);
	}

	/**
	 * Удаление объекта
	 *
	 * @return void
	 */
	public function delete():void {
		$this->item->delete();
		$this->redirectRoute('admin.items.index');
	}

	public function render() {
		$properties = Property::orderByPosition()->get();

		return view('livewire.admin.items.edit')
			->layout('livewire.admin.template')
			->title($this->item->name)
			->with('properties', $properties);
	}
}
