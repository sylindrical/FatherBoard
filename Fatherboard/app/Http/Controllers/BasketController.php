<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class BasketController extends Controller
{
    public function add(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);

$product = Product::findOrFail($productId);

        $basket = session()->get('basket',[]);
if(isset($basket[$product->id])){
    $basket[$product->id]['quantity']+=$quantity;
}else{

                $basket[$productId->id]=[
                'product_id' => $productId->id,
                'name' => $product->name,
                'price'=> $product->price,
                'quantity' => $quantity,];
                }

            session()->put('basket',$basket);

    return redirect()->route('basketIndex')->with(['success','Product added!']);
    }

//display the basket
    public function index(){

        $basket = session()->get('basket',[]);
        return view('basket',compact('basket'));
        }


        public function update(Request $request){
            $productId = $request->input('product_id');
            $quantity = $request->input('quantity');

                $basket = session()->get('basket',[]);
                if(isset($basket[$productId])){
                    $basket[$productId]['quantity'] = $quantity;
                }

session()->put('basket',$basket);

return redirect()->route('basketIndex')->with('success','Basket Updated!');
        }


        public function remove(Request $request){

            $productId = $request->input('product_id');
            $basket=session()->get('basket',[]);
            if (isset($basket[$productId])){
                unset($basket[$productId]);
            }
            Session()->put('basket',$basket);
            return redirect()->route('basketIndex')->with('success','Product removed!');
        }
        public function checkout(){

                return view('checkout');

        }
}

