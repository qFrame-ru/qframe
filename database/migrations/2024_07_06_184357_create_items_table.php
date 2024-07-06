<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	public function up():void {
		Schema::create('items', function (Blueprint $table) {
			$table->id();
			$table->string('name')->index()->comment('Название');
			$table->longText('description')->nullable()->comment('Описание');
			$table->integer('position')->unsigned()->index()->comment('Позиция');
			$table->timestamps();
		});
	}

	public function down():void {
		Schema::dropIfExists('items');
	}
};
