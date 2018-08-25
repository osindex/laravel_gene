<?php

namespace App\Http\Requests;

class NewRequest extends Request {

	public function rules() {
		return [
			"title" => "required",
			"auther" => "required",
			"content" => "required",
		];
	}

	public function attributes() {
		return [
			"title" => "通讯稿名称",
			"auther" => "作者",
			"content" => "内容",
		];
	}
}
