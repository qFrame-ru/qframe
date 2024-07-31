<?php namespace Database\Seeders;

use App\Models\Logo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LogoSeeder extends Seeder
{
	public function run():void {
		Logo::create(['type' => 'logo']);
		Logo::create(['type' => 'favicon']);
	}
}
