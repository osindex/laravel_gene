<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Park extends Model {
	protected $table = "park";
	protected $guarded = [];
	protected $fillabe = [
		'number',
		'name',
		'rank',
		'position',
		'district',
		'zip',
		'lat',
		'lng',
		'area',
		'type',
		'divide',
		'create',
		'characteristic',
		'significance',
		'ratifier',
		'status_quo',
		'historical_type',
		'master',
	];
	protected $dates = ['deleted_at'];

	public function geologicals()
	{
		return $this->hasMany('App\Models\Geological');
	}

	public function ecosystem()
	{
		return $this->hasMany('App\Models\Ecosystem');
	}
}
