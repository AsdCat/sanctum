<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        return response()->json($product);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        if(auth()->user()->cannot('create',Product::class)){
            return response()->json(['message'=> 'Unauthorized'],403);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        if(auth()->user()->cannot('update',$product)){
            return response()->json(['message'=> 'Unauthorized'],403);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // if(auth()->user()->role !='admin'){
        //     return response()->json(['message'=> 'Unauthorized'],403);
        // }
        if(auth()->user()->cannot('delete',$product)){
            return response()->json(['message'=> 'Unauthorized'],403);
        }
        $product->delete();
        return response()->noContent();
    }
}
