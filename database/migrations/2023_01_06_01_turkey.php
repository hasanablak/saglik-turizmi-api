<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (!Schema::hasTable('provinces')) {
			Schema::create('provinces', function (Blueprint $table) {
				$table->increments('id');
				$table->string('province', 50);

				$table->engine = 'InnoDB';
			});
		}

		if (!Schema::hasTable('counties')) {
			Schema::create('counties', function (Blueprint $table) {
				$table->increments('id');
				$table->unsignedInteger('province_id');
				$table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade');
				$table->string('county', 75);

				$table->engine = 'InnoDB';
			});
		}


		if (!Schema::hasTable('districts')) {
			Schema::create('districts', function (Blueprint $table) {
				$table->increments('id');
				$table->unsignedInteger('county_id');
				$table->foreign('county_id')->references('id')->on('counties')->onDelete('cascade');
				$table->string('district', 75);

				$table->engine = 'InnoDB';
			});
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('districts');
		Schema::drop('counties');
		Schema::drop('provinces');
	}
};
