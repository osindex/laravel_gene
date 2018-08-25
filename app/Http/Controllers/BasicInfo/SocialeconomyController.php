<?php

namespace App\Http\Controllers\BasicInfo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Socialeconomy;

class SocialeconomyController extends Controller
{
    public function create(Request $request)
    {
        $input = $request->except(['_token','created_at','updated_at','deleted_at','id']);
        $r = Socialeconomy::create($input);
        if ($r) {
            return ['status', '1'];
        }
    }
}
