<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->where('purchasable', '1')->where('visible', '1')->first();
        if (empty($product)) {
            return response()->json(["message" => "Prodotto non trovato"], 404);
        }
        return response()->json($product);
    }
}
