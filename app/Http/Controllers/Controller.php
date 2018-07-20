<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController {
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	public function upload(Request $request) {
		// dd(apiAuth(),$request->user(), \Auth::user());
		// 以上3个一回事
		if ($file = $request->file('file')) {
			$resize = $request->resize;
			$type = $request->type ?? 'file';
			$realPath = $request->realpath ?? false;
			$folderName = '/uploads/' . $type . '/' . date('Y-m-d') . '/';

			$fileName = $file->getClientOriginalName();
			$extension = $file->getClientOriginalExtension() ?: 'jpg';
			$destinationPath = public_path($folderName);
			$safeName = microtime() . '_' . str_random(10) . '.' . $extension;
			$file->move($destinationPath, $safeName);
			$imgPath = $destinationPath . $safeName;
			if ($file->getClientOriginalExtension() != 'gif') {
				$img = \Image::make($imgPath)->orientate()->encode($extension, 80);
				if ($resize) {
					$resize = explode('*', $resize);
					$img->fit($resize[0], $resize[1], function ($constraint) {
						$constraint->upsize();
					});
				}
				$img->save();
			}
			$imgUrl = $folderName . $safeName;
			$res = ['state' => true, 'msg' => null, 'url' => $imgUrl, 'path' => $realPath ? $imgPath : null];
		} else {
			$res = ['state' => false, 'msg' => '没有上传文件!', 'url' => null];
		}
		return response()
			->json($res);
	}
	public function error(Request $request, $error = 500) {
		// dd($error);
		// is_numeric(var)
		return view('error', ['error' => $error]);
	}
}
