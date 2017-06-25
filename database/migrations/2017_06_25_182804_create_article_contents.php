<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleContents extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('article_contents', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('article_id')->unsigned();;
			$table->text('content');
			$table->timestamps();
			$table->softDeletes();

			$table->index('article_id');
			$table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('article_contents');
	}
}
