<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDirsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dirs', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('parent_id')->default(0);
			$table->integer('user_id')->unsigned();;
			$table->string('name');
			$table->string('path');
			$table->timestamps();
			$table->softDeletes();
			$table->index('parent_id');
			$table->index('user_id');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('dirs');
	}
}
