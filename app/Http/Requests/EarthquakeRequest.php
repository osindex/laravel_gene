<?php

namespace App\Http\Requests;

class EarthquakeRequest extends Request
{

    public function rules()
    {
        return [
            "disasternumber" => "required",
            "disastername" => "required",
            "type" => "required",
            "position" => "required",
            "coordinate" => "required",
            "scale" => "required",
            "stability" => "required",
            "dangerous" => "required",
            "description" => "required",
            "factor" => "required",
            "threat" => "required",
            "note" => "required",
        ];
    }

    public function attributes()
    {
        return [
            "disasternumber" => "灾害点编号",
            "disastername" => "灾害点名称",
            "type" => "类型",
            "position" => "地理位置",
            "coordinate" => "坐标",
            "scale" => "规模",
            "stability" => "稳定性",
            "dangerous" => "危险性",
            "description" => "特征描述",
            "factor" => "诱发因素",
            "threat" => "威胁对象",
            "note" => "备注",
      ];
    }
}
