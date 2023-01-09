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
		Schema::dropIfExists('transports');

		Schema::create('transports', function (Blueprint $table) {
			$table->id();
			$table->timestamps();

			$table->foreignId("car_id")->constrained("cars");

			$table->unsignedInteger('start_province_id');
			$table->foreign('start_province_id')->references('id')->on('provinces')->onDelete('cascade');

			$table->unsignedInteger('start_countie_id');
			$table->foreign('start_countie_id')->references('id')->on('counties')->onDelete('cascade');

			$table->unsignedInteger('start_district_id');
			$table->foreign('start_district_id')->references('id')->on('districts')->onDelete('cascade');

			$table->unsignedInteger('finish_province_id');
			$table->foreign('finish_province_id')->references('id')->on('provinces')->onDelete('cascade');

			$table->unsignedInteger('finish_countie_id');
			$table->foreign('finish_countie_id')->references('id')->on('counties')->onDelete('cascade');

			$table->unsignedInteger('finish_district_id');
			$table->foreign('finish_district_id')->references('id')->on('districts')->onDelete('cascade');

			$table->dateTime("start_date");
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('transports');
	}
};
