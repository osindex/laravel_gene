<?php

namespace App\Http\Controllers\BasicInfo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ecosystem;
use Illuminate\Support\Facades\Schema;

class EcosystemController extends Controller
{
    //
    public function create(Request $request)
    {
        $input = $request->except(['_token','created_at','updated_at','deleted_at','id']);
        $r = Ecosystem::create($input);
        if ($r) {
            return ['status', '1'];
        }
    }

    public function index()
    {
        $cols = [
            ['地质公园编号', 'number'],
            ['公园地貌类型','type'],
            ['公园年平均气温','averagetempera'],
            ['公园年最高气温','toptempera'],
            ['公园年最低气温','bottomtempera'],
            ['公园年平均降雨量','averagerain'],
            ['植被、绿地覆盖率','plantcover'],
            ['珍稀动物','animal'],
            ['珍稀植物','plant'],
            ['水资源概况','water'],
            ['气候特征','climate'],
            ['公园内灾害情况','disaster'],
            ['备注','note'],
        ];
        $fields = Schema::getColumnListing('ecosystem');
        $table = 'ecosystem';
        $table_name = "生态环境";
        return view('admin.park', ['cols'=>$cols, 'table_name'=>$table_name, 'table'=>$table]);
    }
}
