<?php

namespace App\Http\Controllers;

use App\Models\CustomerInformation;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Product $product)
    {
        return view('product', ["product"=>$product]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(int $id)
    {
        $product = product::create_function($id);
        return view('product',["product"=>$product]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       return view ('request', ["request"=>$request]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $product = Product::findOrFail($id);
        return view('product',["product"=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
       return view('product', ["product"=>$product]); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        return view('product', ["reqest"=>$product]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        return view('product', ["product"=>$product]); 
    }
}
