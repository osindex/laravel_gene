<?php

namespace App\Http\Requests;

class LegalRequest extends Request
{

    public function rules()
    {
        return [
            "number" => "required",
            "filename" => "required",
            "unit" => "required",
            "time" => "required",
            "keyword" => "required",
            "summary" => "required",
            "note" => "required",
        ];
    }

    public function attributes()
    {
        return [
            "number" => "文件编号",
            "filename" => "文件名称",
            "unit" => "发布单位",
            "time" => "发布时间",
            "keyword" => "关键字",
            "summary" => "摘要",
            "note" => "备注",
      ];
    }
}
