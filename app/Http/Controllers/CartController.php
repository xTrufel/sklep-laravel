<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{

    public function index()
    {
        $cart = session()->get('cart', []);

        return view('store.cart', compact('cart'));
    }


    public function add($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
        } else {

            $cart[$id] = [
                "name" => $product->name,
                "price" => $product->price_gross,
                "quantity" => 1
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back();
    }


    public function increase($id)
    {
        $cart = session()->get('cart');

        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
        }

        session()->put('cart',$cart);

        return redirect()->back();
    }


    public function decrease($id)
    {
        $cart = session()->get('cart');

        if(isset($cart[$id])){

            if($cart[$id]['quantity'] > 1){
                $cart[$id]['quantity']--;
            }

        }

        session()->put('cart',$cart);

        return redirect()->back();
    }


    public function remove($id)
    {
        $cart = session()->get('cart');

        if(isset($cart[$id])){
            unset($cart[$id]);
        }

        session()->put('cart',$cart);

        return redirect()->back();
    }


    public function clear()
    {
        session()->forget('cart');

        return redirect()->back();
    }

}