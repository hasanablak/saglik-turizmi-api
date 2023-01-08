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
		Schema::create('cars', function (Blueprint $table) {
			$table->id();
			$table->string("plate");
			$table->integer("seats_count");
			$table->timestamps();
			//$table->unsignedBigInteger("driver_id");
			//$table->foreign('driver_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreignId("driver_id")->constrained("users");
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('cars');
	}
};
