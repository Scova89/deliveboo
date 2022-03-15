<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index(){
        $restaurants = User::all();
        return response()->json($restaurants);
    }
    public function show($slug)
    {
        $restaurant = User::where('slug', $slug)->with(['typologies', 'products'])->first();
        // 404
        if (empty($restaurant)) {
            return response()->json(["message" => "Restaurant Not Found"], 404);
        }
        return response()->json($restaurant);
    }
}
