<?php

namespace App\Http\Requests;

class GeologicalRequest extends Request
{

    public function rules()
    {
        return [
            "number" => "required",
            "position" => "required",
            "stratum" => "required",
            "magmatic" => "required",
            "metamorphic" => "required",
            "geostructure" => "required",
            "mineral" => "required",
            "evolutionary" => "required",
        ];
    }

    public function attributes()
    {
        return [
            "number" => "公园编号",
            "position" => "大地构造位置",
            "stratum" => "地层",
            "magmatic" => "岩浆岩",
            "metamorphic" => "变质岩",
            "geostructure" => "地质构造",
            "mineral" => "矿产",
            "evolutionary" => "地质发展演化史",
      ];
    }
}
