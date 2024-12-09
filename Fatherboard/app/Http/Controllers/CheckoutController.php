<?php

namespace App\Http\Controllers;
use App\Http\Controllers\AuthController;
use App\Models\order_details;
use App\Models\Orders;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\AddressInformation;
use Symfony\Component\Console\Input\Input;

class CheckoutController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $AuthController = new AuthController;//Not sure if this works, attempts to check if the user is logged in.
        if(($user = $AuthController->loggedIn()) == false){
            return view('login');
        }
        $basket=session()->get('basket',[]);
        
        $basketDetails = [];
        foreach ($basket as $item) {
            $product = Product::find($item['product_id']);
            if ($product) {
                $basketDetails[] = [
                    'product_id' => $product->id,
                    'name' => $product->Title,
                    'price' => $product->Price->price,
                    'quantity' => $item['quantity'],
                ];
            }
        }
        return view('checkout',compact('basketDetails'));
    }
    public function process(Request $request)
    {
        $address = AddressInformation::create([
            'Address Line' =>$request->input('Address_Line_1'),
            'Country'=>$request->input('Country'),
            'PostCode'=>$request->input('Postcode'),
            'City'=>$request->input('City')
        ]);
        $basket=session()->get('basket',[]);

            $basketDetails = [];
            foreach ($basket as $item) {
                $product = Product::find($item['product_id']);
                if ($product) {
                    $basketDetails[] = [
                        'product_id' => $product->id,
                        'name' => $product->Title,
                        'price' => $product->Price->price,
                        'quantity' => $item['quantity'],
                    ];
                }
            }
            $AuthController = new AuthController;
            if(($user = $AuthController->loggedIn()) == false){//Redirects to login if the user doesn't have an account
                return redirect('/login');
            }
        $order = Orders::create([
            'customer_id'=> $user['id'], //Replace 1 with $user=>id
            'address_id'=>$address['id'],
            'order_status' => 'Pending'
        ]);

        foreach ($basketDetails as $item)
        {
            order_details::create([
                'order_id'=> $order->id,
                'products_id'=>$item['product_id'],
                'quantity'=>$item['quantity'],
            ]);
        }
        session()->forget('basket'); //Removes basket data after checkout finishes(?)

        return redirect()->route('checkout_success');
    }
    public function success(){
        return view('checkout_success');
    }
}
