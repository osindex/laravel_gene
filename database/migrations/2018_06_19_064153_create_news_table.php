<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('news', function (Blueprint $table) {
			$table->increments('id');
			$table->string('title')->comment('标题');
			$table->text('auther')->nullable()->comment('作者');
			$table->string('keyword')->nullable()->comment('关键词');
			$table->string('img')->nullable()->comment('图片');

			$table->text('content')->nullable()->comment('内容');
			$table->date('published_at')->nullable()->comment('发布时间');
			$table->text('note')->nullable()->comment('备注');
			$table->softDeletes();
			$table->timestamps();
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('news');
	}
}
