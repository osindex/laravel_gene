<?php

namespace App\Http\Requests;

class ParkinfoRequest extends Request
{

    public function rules()
    {
        return [
            "number" => "required",
            "org_code" => "required",
            "legal_person" => "required",
            "tenure" => "required",
            "security_supervisor" => "required",
            "mobile" => "required",
            "staffer" => "required",
            "website" => "required",
            "contact" => "required",
            "fax" => "required",
            "supervisor" => "required",
            "fund_provider" => "required",
            "mail" => "required",
            "remark" => "required",
        ];
    }

    public function attributes()
    {
        return [
            "number" => "公园编码",
            "org_code" => "组织机构代码",
            "legal_person" => "法人代表",
            "tenure" => "在任年限",
            "security_supervisor" => "公园安全责任人",
            "mobile" => "安全责任人联系电话",
            "staffer" => "在编职工",
            "website" => "公园网站地址",
            "contact" => "公园联系电话",
            "fax" => "传真",
            "supervisor" => "上级主管",
            "fund_provider" => "经费来源",
            "mail" => "邮箱",
            "remark" => "备注",
      ];
    }
}
