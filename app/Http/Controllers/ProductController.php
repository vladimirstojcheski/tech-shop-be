<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['getAll', 'getAllFiltered', 'getAllByCategory', 'getById']]);//login, register methods won't go through the api guard
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function createProduct(StoreProductRequest $request) {
        $user = auth()->user();
        if ($user == null) {
            response()->json(['error' => 'Unauthorized'], 401);
        }
        $validatedData = $request->validated();
        // Handle image upload and store the image path
        $imagePath = $request->file('img')->store('products', 'public');
        // Create the product
        $product = Product::create([
            'title' => $validatedData['title'],
            'img' => $imagePath, // Store the image path
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
            'category_id' => (int)$validatedData['category_id'],
            'manufacturer_id' => (int)$validatedData['manufacturer_id']
        ]);
        return response()->json(['message' => 'Product created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    public function getAll() {
        $allProducts = Product::get();
        foreach ($allProducts as $product) {
            $product->img = asset('storage/' . $product->img);
        }
        return $allProducts;
    }

    public function getAllFiltered(GetProductRequest $request)
    {
        $search = $request->search;
        $listMan = $search['manufacturers'];
        $cat = $search['category'];
        if (isset($cat) && $cat != 0) {
            if (sizeof($listMan) > 0) {
                $allProducts = Product::where("category_id", $cat)->whereIn("manufacturer_id", $listMan)->get();
            } else {
                $allProducts = Product::where("category_id", $cat)->get();
            }
        } else {
            $allProducts = Product::whereIn("manufacturer_id", $listMan)->get();
        }
        foreach ($allProducts as $product) {
            $product->img = asset('storage/' . $product->img);
        }
        return $allProducts;
    }

    public function getAllByCategory($id) {
        return $allProductsByCategory = Product::where("category_id", $id)->get();
    }

    public function getById($id) {
        $product = Product::where("id", $id)->get();
        foreach ($product as $p) {
            $p->img = asset('storage/' . $p->img);
        }
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
