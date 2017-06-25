<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tags', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('tag_able_type');
			$table->integer('tag_able_id');
			$table->string('title');
			$table->timestamps();
			$table->softDeletes();

			$table->index('user_id');
			$table->index('tag_able_type');
			$table->index('tag_able_id');

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
		Schema::dropIfExists('tags');
		//
	}
}
