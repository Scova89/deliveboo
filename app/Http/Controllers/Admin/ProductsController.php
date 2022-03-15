<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductsController extends Controller
{

    protected $validationRule = [
        "name" => "required|string|max:100",
        "description" => "required",
        "price" => "required|numeric",
        "intolerance" => "nullable",
        "purchasable" => 'nullable',
        "image" => "nullable|max:2048|mimes:jpeg,bpm,png,jpg,webp",
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
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
        $newProduct = new Product();
        $newProduct->name = $data["name"];
        $newProduct->description = $data["description"];
        $newProduct->price = $data["price"];
        $newProduct->intolerance = $data["intolerance"];
        $newProduct->purchasable = isset($data['purchasable']);
        $newProduct->intolerance = $data["intolerance"];
        $newProduct->user_id = Auth::id();
        $newProduct->slug = $this->getSlug($newProduct->name);
        if (isset($data['image'])) {
            $path_image = Storage::put('uploads', $data['image']);
            $newProduct->image = $path_image;
        }
        $newProduct->save();

        return redirect()->route("products.show", $newProduct->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        if (Auth::id() == $product->user_id && $product->visible) {
            return view("admin.products.show", compact("product"));
        } else {
            return view("admin.pagenotfound");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        if (Auth::id() == $product->user_id && $product->visible) {
            return view("admin.products.edit", compact("product"));
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
    public function update(Request $request, Product $product)
    {
        if (Auth::id() == $product->user_id && $product->visible) {
            $request->validate($this->validationRule);
            $data = $request->all();
            $product->name = $data["name"];
            $product->description = $data["description"];
            $product->price = $data["price"];
            $product->intolerance = $data["intolerance"];
            $product->purchasable = isset($data['purchasable']);
            $product->intolerance = $data["intolerance"];
            $product->user_id = Auth::id();
            $product->slug = $this->getSlug($product->name);
            if (isset($data['image'])) {
                $path_image = Storage::put('uploads', $data['image']);
                $product->image = $path_image;
            }
            $product->save();
    
            return redirect()->route("products.show", $product->id);
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
    public function destroy(Product $product)
    {
        if (Auth::id() == $product->user_id && $product->visible) {
            $product->visible = false;
            $product->purchasable = false;
            $product->save();
            
            return redirect()->route("products.index");
        } else {
            return view("admin.pagenotfound");
        }
        
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
        while (Product::where("slug", $slug)->first()) {
            $slug = Str::of($title)->slug("-") . "-{$count}";
            $count++;
        }
        return $slug;
    }
}
