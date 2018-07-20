<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Handler extends ExceptionHandler {
	/**
	 * A list of the exception types that are not reported.
	 *
	 * @var array
	 */
	protected $dontReport = [
		HttpException::class,
		ModelNotFoundException::class,
		//
	];

	/**
	 * A list of the inputs that are never flashed for validation exceptions.
	 *
	 * @var array
	 */
	protected $dontFlash = [
		'password',
		'password_confirmation',
	];

	/**
	 * Report or log an exception.
	 *
	 * @param  \Exception  $exception
	 * @return void
	 */
	public function report(Exception $exception) {
		parent::report($exception);
	}

	/**
	 * Render an exception into an HTTP response.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Exception  $exception
	 * @return \Illuminate\Http\Response
	 */
	public function render($request, Exception $exception) {
		// \Log::error($exception);
		// \Log::error($exception->getStatusCode());
		if (method_exists($exception, 'getStatusCode')) {
			return redirect('/error/' . $exception->getStatusCode())->withErrors(['message' => $exception->getMessage(), 'code' => $exception->getStatusCode()]);
		}
		// if ($exception instanceof NotFoundHttpException) {
		// 	// $request->session()->flash('message', '您访问的页面不存在');
		// 	// $request->session()->flash('code', 404);
		// } elseif ($exception instanceof ModelNotFoundException) {
		// 	return redirect('/error')->with(['message' => '抱歉，您访问的资源异常。', 'code' => 500]);
		// } elseif ($exception instanceof TokenMismatchException) {
		// 	dd("Show me your hands!");
		// } elseif (!config('app.debug') && !$this->isHttpException($e)) {
		// 	return redirect('/error')->with(['message' => '系统异常，请稍候重试。', 'code' => 500]);
		// }
		//else {
		// 	return redirect('/error')->with('message', $exception->getMessage());
		// }
		return parent::render($request, $exception);
	}
}
