<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function mainPage(){
        $products = DB::table('products')
            ->join('images', 'products.image_id', '=', 'images.image_id')
            ->get();
        return view('boutique', ['products' => $products]);
    }
}
