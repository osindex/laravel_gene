<?php

namespace App\Http\Requests;

class SocialeconomyRequest extends Request
{

    public function rules()
    {
        return [
            "ethnic" => "required",
            "areaethnic" => "required",
            "economic" => "required",
            "areaeconomic" => "required",
            "develop" => "required",
            "note" => "required",
        ];
    }

    public function attributes()
    {
        return [
            "ethnic" => "公园内人口民族情况",
            "areaethnic" => "公园所在区域人口民族情况",
            "economic" => "公园内经济发展情况",
            "areaeconomic" => "公园所在区域经济发展情况",
            "develop" => "公园对于社区及区域经济可持续发展的贡献情况",
            "note" => "备注",
      ];
    }
}
