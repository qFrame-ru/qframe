<?php namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
	public function run():void {
		$types = [
			Contact::TYPE_COMPANY_NAME,
			Contact::TYPE_PHONE,
			Contact::TYPE_ADDRESS,
			Contact::TYPE_SCHEDULE
		];

		foreach ($types as $type) {
			Contact::create(['type' => $type]);
		}
	}
}
