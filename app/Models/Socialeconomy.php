<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Socialeconomy extends Model
{
    protected $table = "socialeconomy";
    protected $guarded = [];
    protected $dates =['deleted_at'];
}
