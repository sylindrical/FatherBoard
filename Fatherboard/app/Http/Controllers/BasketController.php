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

        $basket = Basket::firstOrCreate(['user_id' => $user->id]);

$items = json_decode($basket->items, true) ?? [];

if(isset($items[$product->id])){
    $items[$product->id]['quantity']+=$quantity;
}else{

                $items[$product->id]=[
                'product_id' => $product->id,
                'name' => $product->Title,
                'price'=> $product->Price->price,
                'quantity' => $quantity,];
                }

            $basket->items = json_encode($items);
            $basket->save();

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
            $basket=session()->get('basket',[]);
                return view('checkout',compact('basket'));
        }
}
