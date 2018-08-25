<?php

namespace App\Http\Requests;

class HumanlandscapeRequest extends Request
{

    public function rules()
    {
        return [
            "humanitnumber" => "required",
            "name" => "required",
            "position" => "required",
            "traffic" => "required",
            "lat" => "required",
            "lng" => "required",
            "altitude" => "required",
            "feature" => "required",
            "level" => "required",
            "approvedtime" => "required",
            "status" => "required",
            "img" => "required",
        ];
    }

    public function attributes()
    {
        return [
            "humanitnumber" => "人文景观编号",
            "name" => "景观名称",
            "position" => "地理位置",
            "traffic" => "交通状况",
            "lat" => "经度",
            "lng" => "纬度",
            "altitude" => "海拔高度",
            "feature" => "景观特色",
            "level" => "文物保护单位（级别）",
            "approvedtime" => "批准时间",
            "status" => "保护现状",
            "img" => "照片",
      ];
    }
}
