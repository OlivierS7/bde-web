<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Image;

class ShopController extends Controller
{
    public function mainPage()
    {
        $products = DB::table('products')
            ->join('images', 'products.image_id', '=', 'images.image_id')
            ->get();
        return view('boutique', ['products' => $products]);
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

    public function getOneProduct($id){
        $product = DB::table('products')
            ->join('images', 'products.image_id', '=', 'images.image_id')
            ->where('product_id', '=', $id)->get();
        return view('produit', ['product' => $product]);
    }
}
