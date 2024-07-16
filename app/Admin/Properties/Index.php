<?php namespace App\Admin\Properties;

use Livewire\Component;

class Index extends Component
{
	public function render() {
		return view('admin.properties.index')
			->title('Свойства');
	}
}
