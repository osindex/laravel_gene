<?php
function locationName($name) {
	switch ($name) {
	case 'index':
		return '列表';
		break;
	case 'show':
		return '查看';
		break;
	case 'edit':
		return '编辑';
		break;

	default:
		return '';
		break;
	}
}
function getToken($user = null) {
	if (!$user) {
		$user = Auth::user();
	}
	// var_dump($user->id, $user->name);
	// dd(new \Laravel\Passport\Bridge\AccessToken($user->id));
	// dd($user->createToken("api"));
	return $user->createToken("api")->accessToken;
}
function apiAuth() {
	return Auth::guard('api')->user();
}