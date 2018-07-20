<?php

namespace App\Models;

use App\FilterAndSorting;
use Illuminate\Database\Eloquent\Model;

class User extends Model {
	use FilterAndSorting;
	protected $fillable = [
		'name', 'email', 'password',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];
}
