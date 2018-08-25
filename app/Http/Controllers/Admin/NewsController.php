<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewRequest;
use App\Models\News;
// todo1
use Illuminate\Http\Request;

// todo2
class NewsController extends Controller {

	private $table = 'news';
	private $tableName = '新闻';
	private $columns = [
		// [中文名称，属性名称，是否为必填项，textarea，是否为长字段(编辑器),时间选择,文件选择]
		['标题', 'title', 1, 0],
		['作者', 'auther', 1, 0],
		['关键词', 'keyword', 1, 0],
		['图片', 'img', 0, 0, 0, 0, 1],
		['内容', 'content', 1, 0, 1],
		['发布时间', 'published_at', 1, 0, 0, 1],
		['备注', 'note', 0, 1],
	];
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request) {
		// todo3
		$table = 'news';
		// todo4
		$tableName = '新闻通讯';
		// todo5
		$view = "admin." . $table . ".index";

		$tableList = News::setFilterAndRelationsAndSort($request)->page($request);
		// dd($tableList);
		return view($view, ['table' => $table, 'tableName' => $tableName, 'tableList' => $tableList, 'links' => true]);
	}
	public function create() {
		$table_zh = $this->tableName;
		$table_en = $this->table;

		// $parks = parks('select');

		$columns = $this->columns;

		return view('admin.temp.info_create', ['columns' => $columns, 'table_zh' => $table_zh, 'table_en' => $table_en]);
		// , 'parks' => $parks
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(NewRequest $request) {
		$res = new News();
		$data = collect($this->columns)->pluck('1')->toArray();
		// echo json_encode($data);
		// dd($request->only(['title']), $data, $request->only($data));
		$res->fill($request->only($data));
		$res->save();
		return redirect()->route('admin.' . $this->table . '.index')->with('success', '已新增 ' . $this->tableName);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$columns = $this->columns;
		$table_zh = $this->tableName;
		$table_en = $this->table;
		// $parks = parks('select');
		try {
			$item = News::findOrFail($id);
			return view('admin.temp.info_edit', ['columns' => $columns, 'table_zh' => $table_zh, 'table_en' => $table_en, 'item' => $item]);
		} catch (\Exception $e) {
			dd($e);
			return redirect()->route('admin.' . $this->table . '.index')->with('error', $this->tableName . '数据未发现:#' . $id);
		}

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		try {
			$item = News::findOrFail($id);
			$data = collect($this->columns)->pluck('1')->toArray();
			$item->update($request->only($data));
			return redirect()->route('admin.' . $this->table . '.index')->with('success', $this->tableName . '已修改:#' . $id);

		} catch (\Exception $e) {
			dd($e);
			return redirect()->route('admin.' . $this->table . '.index')->with('error', $this->tableName . '数据未发现:#' . $id);
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$res = News::find($id)->delete();
		if ($res) {
			return redirect()->route('admin.' . $this->table . '.index')->with('success', '已删除 ' . $this->tableName);
		} else {
			return redirect()->route('admin.' . $this->table . '.index')->with('error', '无法删除 ' . $this->tableName);
		}
	}

}
