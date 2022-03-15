<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Typology;
use Illuminate\Http\Request;

class TypologyController extends Controller
{
    public function index()
    {
        $typologies = Typology::all();
        return response()->json($typologies);
    }
    public function show($slug)
    {
        $typology = Typology::where('slug', $slug)->with(['users'])->first();
        // 404
        if (empty($typology)) {
            return response()->json(["message" => "Categoria non trovata"], 404);
        }
        return response()->json($typology);
    }
}
