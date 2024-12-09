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

$priceRanges = $request->query('prices', '');
$priceM = Product::whereRaw("1=1");

if (!empty($priceRanges)) {
    $prices = explode(',', $priceRanges);

    foreach ($prices as $pri) {
        $priceM = $priceM->orWhereHas('price', function ($q) use ($pri) {
            $reg = "/(<=|>=|<|>)(\d+)(?:-(<=|>=|<|>)(\d+))?/";
            preg_match($reg, $pri, $matches);

            if (count($matches) == 5) {
                for ($i = 1; $i < 3; $i++) {
                    $q->where('price', $matches[$i * 2 - 1], $matches[$i * 2]);
                }
            } elseif (count($matches) == 3) {
                $q->where('price', $matches[1], $matches[2]);
            }
        });
    }
}

$all = $category_obj->get()->intersect($priceM->get());


$search = $request->query('search');

if ($search == null) {
    return view('filteredProducts', ['filteredProducts' => $all]);
} else {
    $queryString = sprintf("Title REGEXP '.*%s.*'", $search);
    $subQ = $all->intersect(Product::whereRaw($queryString)->get());

    return view('filteredProducts', ['filteredProducts' => $subQ]);
}



