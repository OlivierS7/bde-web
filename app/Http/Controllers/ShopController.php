<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Image;
use App\Product;

class ShopController extends Controller
{
    public function mainPage()
    {
        $products = Product::all();
        return view('boutique', ['products' => $products]);
    }

    public function getOneProduct($id)
    {
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
        if ($this->validateRequest()) {
            $imageName = $request->file('product_image');
            $imageId = Image::storeImage($image);
            $product = DB::table('products')->insert($request->only(['product_category', 'product_name', 'product_description', 'product_price']) + ['image_id' => $imageId]);
            return redirect('/boutique');
        } else {
            return back()->with('warning', 'Champ');
        }
    }

    private function validateRequest()
    {
        return request()->validate([
            'product_category' => 'required|integer',
            'product_name' => 'required|min:1',
            'product_description' => 'required|min:20',
            'product_price' => 'required|integer',
            'product_image' => 'required|image|file|max:10000',
        ]);
    }
}
