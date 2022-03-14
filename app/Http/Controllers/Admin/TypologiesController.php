<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Typology;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class TypologiesController extends Controller
{
    protected $validationRule = [
        "name" => "required|string|max:100",
        "image" => "required|max:2048|mimes:jpeg,bpm,png,jpg,webp",
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->admin){
            $typologies = Typology::all();
            return view('admin.typologies.index', compact('typologies'));
        }else{
            return view("admin.pagenotfound");
        } 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->admin){
            return view('admin.typologies.create');
        }else{
            return view("admin.pagenotfound");
        } 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validationRule);
        $data = $request->all();
        $newTypology = new Typology();
        $newTypology->name = $data["name"];
        $newTypology->slug = $this->getSlug($newTypology->name);
        if (isset($data['image'])) {
            $path_image = Storage::put('uploads', $data['image']);
            $newTypology->image = $path_image;
        }
        $newTypology->save();

        return redirect()->route("typologies.show", $newTypology->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Typology $typology)
    {
        if (Auth::user()->admin){
            return view('admin.typologies.show', compact('typology'));
        }else{
            return view("admin.pagenotfound");
        } 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Typology $typology)
    {
        if (Auth::user()->admin) {
            return view('admin.typologies.edit', compact('typology'));
        } else {
            return view("admin.pagenotfound");
        } 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Typology $typology)
    {
        if (Auth::user()->admin) {
            $request->validate($this->validationRule);
            $data = $request->all();
            $typology->name = $data["name"];
            $typology->slug = $this->getSlug($typology->name);
            $path_image = Storage::put('uploads', $data['image']);
            $typology->image = $path_image;
            $typology->save();

            return redirect()->route("typologies.show", $typology->id);
        } else {
            return view("admin.pagenotfound");
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Typology $typology)
    {
        if ($typology->image) {
            Storage::delete($typology->image);
        }

        $typology->delete();

        return redirect()->route("typologies.index");
    }
    /**
     * getSlug
     *
     * @param  mixed $title
     * @return void
     */
    private function getSlug($title)
    {
        $slug = Str::of($title)->slug("-");
        $count = 1;
        while (Typology::where("slug", $slug)->first()) {
            $slug = Str::of($title)->slug("-") . "-{$count}";
            $count++;
        }
        return $slug;
    }
}