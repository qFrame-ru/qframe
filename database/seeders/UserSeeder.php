<?php namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
	public function run():void {
		$protocols = ['https://', 'http://'];
		$app_url = env('APP_URL');
		$app_url = str_replace($protocols, NULL, $app_url);

		$users = [
			[
				'name' => 'Разработчик',
				'email' => 'qframe.ru@ya.ru',
				'password' => 'vPbIWK9w'
			],
			[
				'name' => 'Администратор',
				'email' => 'admin@' . $app_url,
				'password' => '000000'
			]
		];

		foreach ($users as $user) {
			User::create($user);
		}
	}
}
