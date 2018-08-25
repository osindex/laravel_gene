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
			$table->string('title', 40)->comment('通讯稿名称');
			$table->date('releasetime')->comment('发布时间');
			$table->text('auther')->comment('作者');
			$table->text('releasewebsite')->comment('发布的网站');
			$table->text('contentsummary')->comment('内容摘要');
			$table->text('note')->comment('备注');
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
