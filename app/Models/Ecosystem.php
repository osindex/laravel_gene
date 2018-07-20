<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ecosystem extends Model
{
    protected $table = "ecosystem";
    protected $dates = ['deleted_at'];
    protected $guarded = [];
    protected $fillabe=[
        'number',
        'type',
        'averagetempera',
        'toptempera',
        'bottomtempera',
        'averagerain',
        'plantcover',
        'animal',
        'plant',
        'water',
        'climate',
        'disaster',
        'note',
    ];

    
}
