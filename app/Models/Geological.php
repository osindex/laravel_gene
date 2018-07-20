<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Geological extends Model
{
    protected $table = "geological";
    protected $guarded = [];
    protected $dates = ['deleted_at'];

    public function park()
    {
        return $this->belongsTo('App\Models\Park');
    }
}
