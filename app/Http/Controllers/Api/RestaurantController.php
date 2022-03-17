<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use App\Typology;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index(){
        $restaurants = User::where('open', true)->get();
        return response()->json($restaurants);
    }
    public function search($string) 
    {
        $array = explode(',',$string);
        $temp = User::all();
        foreach ($temp as $value) {
            $restaurants[] = Typology::where('name', $value)->with('users')->get();
        }
        // return response()->json($restaurants);
        dd($restaurants);
        return $restaurants;
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
