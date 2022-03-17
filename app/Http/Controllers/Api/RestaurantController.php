<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use App\Typology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RestaurantController extends Controller
{
    public function index(){
        $restaurants = User::where('open', true)->get();
        return response()->json($restaurants);
    }


    public function search($string) 
    {
        $array = explode(',',$string);
        foreach ($array as $value) {
            $restaurants[] = User::join('typology_user', 'users.id', '=', 'typology_user.user_id')
            ->join('typologies', 'typology_user.typology_id', '=', 'typologies.id')
            ->where('typologies.name', '=', $value)
            ->get();
        }
        return response()->json($restaurants);
    }


    public function show($slug)
    {
        $restaurant = User::where('slug', $slug)->with(['typologies', 'products'])->first();
        // 404
        if (empty($restaurant)) {
            return response()->json(["message" => "Ristorante non trovato"], 404);
        }
        return response()->json($restaurant);
    }

    
}
