<?php

namespace App\Http\Controllers;

use App\Models\CustomerInformation;
use App\Models\Product;
use App\Utility\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request("search");
        if ($search == null)
        {
        $data = Product::all();
        return view("products", ["data"=>$data] );
        }
        else
        {
            $queryString = sprintf("description REGEXP '.*%s.*'", $search);
            $data = Product::whereRaw($queryString)->get();
            return view("products", ["data"=>$data] );
        }
    }


    public function indexSpecific(Request $rq)
    {
        $user_cat = $rq->input("category");
        $user_price = $rq->input("price");

        $search = $rq->input("params");



        $curData = Product::whereRaw("1=0");
        if ((count($user_cat) == 0) && (count($user_price) ==0))
        {
            return json_encode(Product::query()->get());

        };
        foreach($user_price as $cond)
        {
 
  
            $curData = $curData->orWhereHas("price",function ($q) use ($cond) {
                foreach($cond as $x)
                {
                $exp = explode(" ",$x );

                if (count($exp) > 1)
                {
                $q->where("price", $exp[0], $exp[1]);
                }

                else
                {
                    $q->where("price",">=",$exp[0]);
                }

                    
                };
                });
            }

                
        $query2 = Product::whereRaw("1=0");
        if (count($user_cat) == 1)
        {
        $query2 = Product::where("Type",$user_cat);
        }
        else if (count($user_cat) >1)
        {
            $query2 = Product::where(function ($x) use ($user_cat){
            
                foreach ($user_cat as $category)
                {
                    $x->orWhere("Type","=",$category);
                };
            });

        }
        $combinedQuery = $curData->union($query2);

        $queryString = sprintf("description REGEXP '.*%s.*'", $search);
        $data = Product::whereRaw($queryString);


        $finalQuery = Product::fromSub($combinedQuery, 'sub')->whereRaw("description REGEXP ?", [".*{$search}.*"]);


        return json_encode($finalQuery->get());

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
        $product = Product::with('reviews')->findOrFail($id);
        $curRating = DB::table("reviews")->where("product_id",$id)->select(DB::raw("avg(rating) as avg_rating"))->first();
        $image = "rtx2070.png";
        $amountStar = Utility::numberClosest($curRating->avg_rating, [1,2,3,4,5]);
        return view('product',["product"=>$product,"image"=>$image, "rating"=>$curRating->avg_rating, "amount"=>$amountStar]);
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
