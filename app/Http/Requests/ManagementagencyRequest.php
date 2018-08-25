<?php

namespace App\Http\Requests;

class ManagementagencyRequest extends Request
{

    public function rules()
    {
        return [
            "number" => "required",
            "managename" => "required",
            "level" => "required",
            "maincharge" => "required",
            "secondarycharge" => "required",
            "job" => "required",
            "list" => "required",
            "responsibility" => "required",
            "phone" => "required",
        ];
    }

    public function attributes()
    {
        return [
            "number" => "管理机构设置人数",
            "managename" => "管理机构（科室）名称",
            "level" => "管理机构级别",
            "maincharge" => "主要负责人姓名",
            "secondarycharge" => "次要负责人姓名",
            "job" => "负责人职务",
            "list" => "机构工作人员名单",
            "responsibility" => "机构职责与分工",
            "phone" => "负责人联系电话",
      ];
    }
}
