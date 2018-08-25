<?php

namespace App\Http\Requests;

class GeolandscapeRequest extends Request
{

    public function rules()
    {
        return [
            "unitenumber" => "required",
            "originalnumber" => "required",
            "name" => "required",
            "originalname" => "required",
            "type" => "required",
            "position" => "required",
            "traffic" => "required",
            "lat" => "required",
            "lng" => "required",
            "altitude" => "required",
            "background" => "required",
            "feature" => "required",
            "evaluation" => "required",
            "protection" => "required",
            "value" => "required",
            "causes" => "required",
            "note" => "required",
            "img" => "required",
        ];
    }

    public function attributes()
    {
        return [
            "unitenumber" => "地质遗迹统一编号",
            "originalnumber" => "原编号",
            "name" => "地质遗迹名称",
            "originalname" => "地质遗迹原名称",
            "type" => "地质遗迹类型",
            "position" => "地质遗迹地理位置",
            "traffic" => "地质遗迹交通状况",
            "lat" => "经度",
            "lng" => "纬度",
            "altitude" => "海拔高度",
            "background" => "地质遗迹地质背景",
            "feature" => "地质遗迹特征",
            "evaluation" => "评价级别",
            "protection" => "保护级别",
            "value" => "观赏价值",
            "causes" => "遗迹成因类型",
            "note" => "备注",
            "img" => "照片",
      ];
    }
}
