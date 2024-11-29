<?php namespace App\Livewire\Admin\Metatags;

use App\Models\Metatag as MetatagModel;
use Livewire\Attributes\On;
use Livewire\Component;
use function App\Livewire\Metatags\mb_strlen;

class Metatag extends Component
{
	public MetatagModel $metatag;
	public string $type = '';
	public string|NULL $value = '';

	public function mount($type):void {
		$this->metatag = MetatagModel::get($type);
		$this->type = $type;
		$this->value = $this->metatag->value;
	}

	/**
	 * Обновление
	 *
	 * @return void
	 */
	#[On('metatags-updated')]
	public function update():void {
		$value = trim($this->value);
		$this->value = mb_strlen($value) ? $value : NULL;
		$this->metatag->value = $this->value;
		$this->metatag->save();
	}
}
