<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\ShortLink;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
    public function all_short_url_list(){
        $shortlink = ShortLink::all();

        return response()->json(['success' => true,"shortlink"=>$shortlink], 200);
    }

    public function short_url_by_user($user_id){
        $url_list = ShortLink::where('user_id', $user_id)->get();
        return response()->json(['success' => true,"url_list"=>$url_list], 200);
    }
}
