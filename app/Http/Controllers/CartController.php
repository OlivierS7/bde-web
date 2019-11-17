<?php

namespace App\Http\Controllers;

use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Mail\MailTrap;
use Illuminate\Support\Facades\Mail;
use App\order;
use App\Contain;

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
            if(!empty($cart[0])){
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

    public function deleteProduct($id){
        $time = 60*2;
        $cart = Cookie::get('panier');
        $cart = json_decode($cart, true);
        foreach($cart as $key=>$product){
            if($product['id'] == $id){
                $cart[$key]['quantity'] = $product['quantity'] - 1;
                if($cart[$key]['quantity'] == 0){
                    array_splice($cart, $key, 1);
                }
            }
        }
        $cookie = json_encode($cart);
        return redirect()->back()->cookie('panier', $cookie, $time);
    }

    public function validateCart(){
        $cart = Cookie::get('panier');
        $cart = json_decode($cart, true);
        $order = Order::create(['user_id'=>session()->get('id'), 'order_date' => Carbon::now()->year . '-' . Carbon::now()->month . '-' . Carbon::now()->day]);
        foreach ($cart as $product){
            Contain::create(['product_id' => $product['id'], 'order_id' => $order->order_id, 'quantity' => $product['quantity']]);
        }
        //Mail::to('bde-cesi-saint-nazaire@viacesi.fr')->send(new MailTrap());
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
