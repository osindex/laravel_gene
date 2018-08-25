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
		// dd($request->uploadfile, $request->files);
		if ($file = $request->file('uploadfile')) {
			$resize = $request->resize;
			$type = $request->type ?? 'file';
			$path = $request->path ?? false;
			$folderName = '/uploads/' . $type . '/' . $request->user()->id . '/' . date('Ymd') . '/';

			$fileName = $file->getClientOriginalName();
			$extension = $file->getClientOriginalExtension() ?: 'jpg';
			$destinationPath = public_path($folderName);
			$safeName = microtime(1) . '_' . str_random(10) . '.' . $extension;
			$file->move($destinationPath, $safeName);
			$imgPath = $destinationPath . $safeName;
			if ($file->getClientOriginalExtension() != 'gif' && in_array($type, ['avatar', 'img', 'picture'])) {
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
			$res = ['name' => $fileName, 'type' => $type, 'state' => true, 'msg' => null, 'url' => $imgUrl, 'path' => $path ? $imgPath : null];
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
