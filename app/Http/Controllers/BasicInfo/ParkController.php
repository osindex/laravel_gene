<?php

namespace App\Http\Controllers\BasicInfo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Park;
use Illuminate\Support\Facades\Schema;

class ParkController extends Controller
{
    
    public function create(Request $request)
    {
        $input = $request->except(['_token','created_at','updated_at','deleted_at','id']);
        $r = Park::create($input);
        if ($r) {
            return ['status', '1'];
        }
    }

    public function index(){
        $cols = [
            ['编码','number'],
            ['名称','name'],
            ['级别','rank'],
            ['位置','position'],
            ['行政区','district'],
            ['邮政编码','zip'],
            ['经度','lat'],
            ['纬度','lng'],
            ['面积','area'],
            ['公园类型','type'],
            ['保护区划分情况','divide'],
            ['建立时间','create'],
            ['公园地质遗迹景观特色','characteristic'],
            ['重要意义','significance'],
            ['批准单位','ratifier'],
            ['保护现状','status_quo'],
            ['主要地质遗迹类型','historical_type'],
            ['公园主管部门','master'],
        ];
        $table = 'park';
        $table_name = "公园概况";
        return view('admin.park', ['cols'=>$cols, 'table_name'=>$table_name, 'table'=>$table]);
    }
}
