<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	public function up():void {
		Schema::create('metatags', function(Blueprint $table) {
			$table->id();
			$table->string('type')->index()->comment('Тип');
			$table->string('value')->nullable()->comment('Значение');
			$table->timestamps();
		});
	}

	public function down():void {
		Schema::dropIfExists('metatags');
	}
};
