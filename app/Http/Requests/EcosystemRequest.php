<?php

namespace App\Http\Requests;

class EcosystemRequest extends Request
{

    public function rules()
    {
        return [
            "number" => "required",
            "type" => "required",
            "averagetempera" => "required",
            "toptempera" => "required",
            "bottomtempera" => "required",
            "averagerain" => "required",
            "plantcover" => "required",
            "animal" => "required",
            "plant" => "required",
            "water" => "required",
            "climate" => "required",
            "disaster" => "required",
            "note" => "required",
        ];
    }

    public function attributes()
    {
        return [
            "number" => "地质公园编号",
            "type" => "公园地貌类型",
            "averagetempera" => "公园年平均气温",
            "toptempera" => "公园年最高气温",
            "bottomtempera" => "公园年最低气温",
            "averagerain" => "公园年平均降雨量",
            "plantcover" => "植被、绿地覆盖率",
            "animal" => "珍稀动物",
            "plant" => "珍稀植物",
            "water" => "水资源概况",
            "climate" => "气候特征",
            "disaster" => "公园内灾害情况",
            "note" => "备注",
      ];
    }
}
