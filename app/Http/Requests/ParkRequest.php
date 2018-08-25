<?php

namespace App\Http\Requests;

class ParkRequest extends Request
{

    public function rules()
    {
        return [
        "number" => "required",
        "name" => "required",
        "rank" => "required",
        "position" => "required",
        "district" => "required",
        "zip" => "required",
        "lat" => "required",
        "lng" => "required",
        "area" => "required",
        "type" => "required",
        "divide" => "required",
        "create" => "required",
        "characteristic" => "required",
        "significance" => "required",
        "ratifier" => "required",
        "status_quo" => "required",
        "historical_type" => "required",
        "master" => "required",
        ];
    }

    public function attributes()
    {
        return [
        "number" => "地质公园编码",
        "name" => "地质公园名称",
        "rank" => "级别",
        "position" => "位置",
        "district" => "行政区",
        "zip" => "邮政编码",
        "lat" => "经度",
        "lng" => "纬度",
        "area" => "面积",
        "type" => "公园类型",
        "divide" => "保护区划分情况",
        "create" => "建立时间",
        "characteristic" => "公园地质遗迹景观特色",
        "significance" => "重要意义",
        "ratifier" => "批准单位",
        "status_quo" => "保护现状",
        "historical_type" => "主要地质遗迹类型",
        "master" => "公园主管部门",
      ];
    }
}
