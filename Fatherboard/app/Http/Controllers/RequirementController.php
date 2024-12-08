<?php

namespace App\Https\Controllers;
use App\Models\Product;
use Illuminate\Http\Request; 

class RequirementController extends Controller
{


    public function filterProducts(Request $request)
    {
        $priceRanges = ['0-100' => [0, 100], '100-200' => [100, 200], '200-300' => [200, 300], '400-500' => [400, 500],
        ];

        
        $filteredProducts = [];
        foreach ($priceRanges as $key => $range) {
            $filteredProducts[$key] = Product::whereBetween('price', [$range[0], $range[1]])->get();
        }

        return view('filteredProducts', ['filteredProducts' => $filteredProducts]);

    }
}




