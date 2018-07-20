<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlankController extends Controller {
	private $location;
	function __construct() {
		// 此处只是示例 可按自己想法实现
		$basename = '空白';
		$route = \Route::current();
		// dd($route->parameters());
		// $names = \Route::currentRouteAction();
		if ($route) {
			$names = $route->getName() ?? null;
			$name = last(explode('.', $names));
			$rsname = locationName($name);
			$this->location = ['name' => $basename . $rsname, 'url' => route($names, $route->parameters())];
		} else {
			$this->location = ['name' => $basename, 'url' => '#'];
		}
		view()->share('location', $this->location);
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		// $location = $this->location;
		//       return view('admin.home', compact('location'));
		return view('admin.home');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		// dd($id);
		return view('admin.home');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}
}
