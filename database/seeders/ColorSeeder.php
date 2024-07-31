<?php namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
	public function run():void {
		$colors = [
			'accent'            => '#52BD31',
			'accent-swipe'      => '#6CD84B',
			'stroke'            => '#EEEEEE',
			'page-text'         => '#222222',
			'page-background'   => '#F9F9F9',
			'card-text'         => '#222222',
			'card-background'   => '#FFFFFF',
			'slider-bullet'     => '#FFFFFF'
		];

		foreach ($colors as $name => $hex) {
			$data = compact('name', 'hex');
			Color::create($data);
		}
	}
}
