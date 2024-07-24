<?php namespace Database\Seeders;

use App\Models\Metatag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MetatagSeeder extends Seeder
{
	public function run():void {
		$types = [
			Metatag::TYPE_HOME_TITLE,
			Metatag::TYPE_HOME_DESCRIPTION,
			Metatag::TYPE_HOME_KEYWORDS,
			Metatag::TYPE_HOME_H1
		];

		foreach ($types as $type) {
			Metatag::create(['type' => $type]);
		}
	}
}
