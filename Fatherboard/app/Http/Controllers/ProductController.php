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
    public function index()
    {
        $data = Product::all();
        return view("products", ["data"=>$data] );
    }


    public function indexSpecific(Request $rq)
    {
        $user_cat = $rq->input("category");
        
        if (count($user_cat) == 1)
        {
        $data = Product::where("Type",$user_cat)->get();
        return json_encode($data);
        }
        else if (count($user_cat) >1)
        {
            $data = Product::where(function ($x) use ($user_cat){
            
                foreach ($user_cat as $category)
                {
                    $x->orWhere("Type","=",$category);
                };
            })->get();
            return json_encode($data);

        }
        return json_encode("");

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $product = Product::findOrFail($id);
        $image = "rtx2070.png";
        return view('product',["product"=>$product,"image"=>$image]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
