<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Park;
use Illuminate\Support\Facades\Schema;
use App\Models\Geological;
use Illuminate\Support\Facades\DB;


class ViewController extends Controller
{
    public function index($table)
    {
        $cols = Schema::getColumnListing($table);
        return view('test',['cols'=>$cols,'table'=>$table]);
    }

    public function parkInfo() {
        return view('admin.park_info');
    }

    public function test1()
    {
        $cols = [
            // [中文名称，属性名称，是否为必填项，是否为长字段]
            ['其他景区名称', 'othername', 1, 0],
            ['其他景区类型', 'othertype', 1, 0],
            ['其他景区主管部门', 'othersupervisor',1, 0],
            ['其他景区开发建设情况', 'othermatter', 1, 0],
            ['重叠区域位置', 'overposition', 1, 0],
            ['重叠区域面积', 'overarea', 1, 0],
            ['重叠区管理情况说明', 'overinstruction', 1, 0],
            ['备注', 'note', 1, 0],
        ];

        $arr = [];
        $arr1 = [];
        foreach($cols as $col) {
            $arr[] = $col[1];
        }

        $len = count($arr);
        for ($i = 0; $i < $len; $i++) {
            $r = $arr[$i];
            $arr[$r] = $cols[$i][0];
        };

        for ($j=0; $j<$len; $j++) {
            $r = $arr[$j];
            $arr1[$r] = 'required'; 
        }
        echo '<pre>';
        dd($arr);
    }
}
