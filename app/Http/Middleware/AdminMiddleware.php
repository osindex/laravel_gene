<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Spatie\Permission\Models\Role;

// use Spatie\Permission\Models\Permission;

class AdminMiddleware {
	/**
	 * Handle an incoming request.
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {
		$user = User::get(); //->count();
		// dd($user);
		switch ($user->count()) {
		case '0':
			User::create(['email' => 'admin@admin.com', 'password' => 'password', 'name' => 'admin']);
			break;
		case '1':
			// dd($user);
			// $exitCode = \Artisan::call('permission:create-role', [
			// 	'name' => 'super',
			// ]);
			// dd($user->first());
			$role = Role::firstOrCreate(['name' => 'super']);
			$role2 = Role::firstOrCreate(['name' => 'back']);
			if (!$user->first()->hasRole('back')) {
				$user->first()->roles()->sync([$role->id, $role2->id]);
				// $user->first()->assignRole('back');
			}
			break;
		default:
			if (!\Auth::user()->hasRole('back')) // 用户是否具备此权限
			{
				abort('401');
			}
			break;
		}

		return $next($request);
	}
}
