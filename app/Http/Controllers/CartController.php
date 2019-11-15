<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Mail\MailTrap;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Cookie::get('panier');
        if($cart) {
            if(!isset(json_decode($cart, true)[0])){
                $cart = '[' . $cart . ']';
            }
            $cart = json_decode($cart, true);
            $ids = array();
            foreach ($cart as $product) {
                array_push($ids, $product['id']);
            }
            $products = Product::whereIn('product_id', $ids)->get();
            $price = 0;
            foreach ($products as $product) {
                $product->quantity = 0;
                foreach ($cart as $cartProduct) {
                    if ($cartProduct['id'] == $product->product_id) {
                        $product->quantity = $cartProduct['quantity'];
                        $price += $product->quantity * $product->product_price;
                    }
                }
            }
            return view('panier', ['products' => $products, 'totalPrice' => $price]);
        }
        return view('panier', ['products' => null, 'totalPrice' => 0]);
    }

    public function checkId($id, $panier){
        foreach ($panier as $key=>$product){
            if($product->id == $id){
                return $key+1;
            }
        }
        return false;
    }

    public function validateCart(){
        Mail::to('bde-cesi-saint-nazaire@viacesi.fr')->send(new MailTrap());
        return redirect('boutique')->withCookie(Cookie::forget('panier'));
    }

    public function addProductToCart($id){
        $time = 60*2;
        $product = Product::find($id);
        $panier = Cookie::get('panier');
        if($panier != null && is_array(json_decode($panier))){
            $panier = json_decode($panier);
            $action = $this->checkId($id, $panier);
            if($action == false){
                $cookie = array('id' => $id,'quantity' => 1);
                $panier[sizeof($panier)] = $cookie;
            } else {
                $panier[$action-1]->quantity++;
            }
            $cookie = json_encode($panier);
        } else if($panier != null) {
            $panier = '[' . $panier . ']';
            $panier = json_decode($panier);
            $action = $this->checkId($id, $panier);
            if($action == false) {
                $this->checkId($id, $panier);
                $cookie = array('id' => $id, 'quantity' => 1);
                $panier[1] = $cookie;
            } else {
                $panier[$action-1]->quantity++;
            }
            $cookie = json_encode($panier);
        } else {
            $cookie = array(array('id' => $id,'quantity' => 1));
            $cookie = json_encode($cookie);
        }
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
