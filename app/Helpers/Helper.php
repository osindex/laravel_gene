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
function user($object = null) {
	$user = Auth::user();
	if ($object) {
		return $user->{$object};
	}
	return $user;
}
function authenticate($roles = [], $user, $any = true) {
	if ($any) {
		return $user->hasAnyRole($roles);
	} else {
		return $user->hasAllRoles($roles);
	}
}
function menuAuth($menu = '', ...$other) {
	if (isset($menu['role'])) {
		return authenticate($menu['role'], ...$other);
	} else {
		return true;
	}
}
function parks($type = 'collect', $reCache = false) {
	$key = 'cache.park.' . $type;
	if (!\Cache::has($key) || $reCache) {
		switch ($type) {
		case 'collect':
			$return = \App\Models\Park::get();
			break;
		case 'select':
			$return = \App\Models\Park::pluck('name', 'id');
			break;

		default:
			$return = \App\Models\Park::pluck('name', 'id');
			break;
		}
		// 60mins * 8
		\Cache::put($key, $return, 60 * 8);
	}
	return \Cache::get($key);
}