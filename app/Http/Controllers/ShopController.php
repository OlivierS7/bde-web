<?php

namespace App\Http\Controllers;

use App\Contain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Image;
use App\Product;
use stdClass;

class ShopController extends Controller
{
    public function mainPage()
    {
        $products = Product::all();
        $topProducts = Contain::selectRaw('product_id, SUM(quantity) as quantity')->groupBy('product_id')->orderByDesc('quantity')->take(3)->get();
        $product1 = $topProducts[0];
        $product2 = $topProducts[1];
        $product3 = $topProducts[2];
        $product1 = Product::find($product1->product_id);
        $product2 = Product::find($product2->product_id);
        $product3 = Product::find($product3->product_id);
        return view('boutique', ['products' => $products, 'product1' => $product1, 'product2' => $product2, 'product3' => $product3]);
    }

    public function getOneProduct($id)
    {
        $product = Product::find($id);
        return view('produit', ['product' => $product]);
    }

    public function sortDescPrice(){
        $products = Product::all()->sortByDesc('product_price');
        return view('boutique', ['products' => $products]);
    }

    public function sortASCPrice(){
        $products = Product::all()->sortBy('product_price');
        return view('boutique', ['products' => $products]);
    }

    public function sortChoiceCategory(Request $request){
        $category = request('product_category');
        $products = Product::all()->where('product_category', '=', $category);
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

        if ($this->validateRequest()) {
            $imageName = $request->file('product_image');
            $imageId = Image::storeImageProduct($image);
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

    public function deleteProduct(Request $request){
        $idProduct = request('id_product');
        $idImage = request('id_image');
        $product = Product::where('product_id', '=', $idProduct)->delete();
        $image = Image::where('image_id', '=', $idImage)->delete();
        return redirect('/boutique');
    }

    public function listProduct(){
        $products = Product::all();
        $tableau = array();
        foreach($products as $product){
            $tab = new stdClass;
            $tab->name = $product->product_name;
            $tab->url = route('boutique-produit', $product->product_id);
            $tableau[] = $tab;
        }
        return $tableau;
    }
}
