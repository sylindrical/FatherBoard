<?php

namespace App\Http\Controllers;

use App\Utility\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use App\Models\Product;
use App\Models\ProductPrice;
use Dotenv\Parser\Value;

class AdminProductController extends Controller
{
    public function index()
    {
        $AuthController = new AuthController;//Not sure if this works, attempts to check if the user is logged in.
        if(($user = $AuthController->loggedIn()) == false){
            return view('login');
        }
        if($user['Admin'] == 1) {
            $search = request("search");
            if ($search == null)
            {
            $data = Product::all();
            return view("admin.products.index", ["data"=>$data] );
            }
            else
            {
                $queryString = sprintf("description REGEXP '.*%s.*'", $search);
                $data = Product::whereRaw($queryString)->get();
                return view("admin.products.index", ["data"=>$data] );
            }
        }
        else {
            abort(403, "Admin only.");
        }
    }

    public function create()
    {
        return view('admin.products.add');
    }
    public function show(int $id)
    {
        $product = Product::with('reviews')->findOrFail($id);
        $curRating = DB::table("reviews")->where("product_id",$id)->select(DB::raw("avg(rating) as avg_rating"))->first();
        $image = "rtx2070.png";
        $amountStar = Utility::numberClosest($curRating->avg_rating, [1,2,3,4,5]);
        return view('admin.products.edit',["product"=>$product,"image"=>$image, "rating"=>$curRating->avg_rating, "amount"=>$amountStar]);
    }
    public function destroy($id) {//Currently does not work on all products as the foreign constraint for the product tables is not set to cascade on delete.
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('adminIndex');
    }

    public function Created(Request $request) {
        $product = Product::create([
            'Title'=>$request->Title,
            'Description'=>$request->Description,
            'Manufacturer'=>$request->Manufacturer,
            'Type'=>$request->Type,
        ]);

        $product->price()->create([
            'price'=>$request->Price
        ]);

        return redirect()->route('adminIndex');
    }
    public function Update(Request $request, $product_id) {
        $data = $request->all();
        $changes = Arr::whereNotNull($data);
        $product = Product::findOrFail($product_id);
        $product->Update($changes);
        return redirect()->route('adminIndex');
    }



}
