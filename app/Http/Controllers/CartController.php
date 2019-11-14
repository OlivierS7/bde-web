<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Cookie::get('cart');
        json_decode($cart);
        return view('panier', ['product' => $cart]);
    }

    public function addProductToCart($id){
        $time = 60*24;
        $product = Product::find($id);
        $panier = Cookie::get('panier');
        $cookie = [($product->product_id), 1];
        return redirect('boutique')->cookie('panier', $cookie, $time);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
