<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDirContentsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dir_contents', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('dir_id')->unsigned();;
			$table->string('dir_content_able_type');
			$table->integer('dir_content_able_id');
			$table->timestamps();
			$table->softDeletes();

			$table->index('dir_id');
			$table->index('dir_content_able_type');
			$table->index('dir_content_able_id');

			$table->foreign('dir_id')->references('id')->on('dirs')->onDelete('cascade');
		});
		//
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('dir_contents');
	}
}
