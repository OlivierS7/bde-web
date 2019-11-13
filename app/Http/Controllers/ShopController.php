<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Image;

class ShopController extends Controller
{
    public function mainPage()
    {
        $products = Product::all();
        return view('boutique', ['products' => $products]);
    }

    public function getOneProduct($id){
        $product = Product::find($id);
        return view('produit', ['product' => $product]);
    }

    public function getInfoOnCategory()
    {
        $categories = DB::table('categories')
            ->get();
        return view('insertProduct', ['categories' => $categories]);
    }

    public function insertProduct(Request $request)
    {
        $category = request('product_category');
        $name = request('product_name');
        $description = request('product_description');
        $price = request('product_price');
        $image = request('product_image');

        $imageName = $request->file('product_image');
        dd($request);
        $imageId = Image::storeImage($image);
        $product = DB::table('products')::create($this->validateRequest());
    }

    private function validateRequest()
    {
        return request()->validate([
            'product_image' => 'required|image|file|max:10000'
        ]);
    }
}
