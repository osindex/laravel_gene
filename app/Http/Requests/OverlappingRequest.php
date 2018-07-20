<?php

namespace App\Http\Requests;

class OverlappingRequest extends Request
{

    public function rules()
    {
        return [
            "othername" => "required",
            "othertype" => "required",
            "othersupervisor" => "required",
            "othermatter" => "required",
            "overposition" => "required",
            "overarea" => "required",
            "overinstruction" => "required",
            "note" => "required",
        ];
    }

    public function attributes()
    {
        return [
            "othername" => "其他景区名称",
            "othertype" => "其他景区类型",
            "othersupervisor" => "其他景区主管部门",
            "othermatter" => "其他景区开发建设情况",
            "overposition" => "重叠区域位置",
            "overarea" => "重叠区域面积",
            "overinstruction" => "重叠区管理情况说明",
            "note" => "备注",
      ];
    }
}
