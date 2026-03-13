<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutController extends Controller
{

    public function index()
    {
        $cart = session()->get('cart', []);

        return view('store.checkout', compact('cart'));
    }


    public function store(Request $request)
    {

        $cart = session()->get('cart');

        if(!$cart){
            return redirect('/');
        }

        $total = 0;

        foreach($cart as $item){
            $total += $item['price'] * $item['quantity'];
        }


        $order = Order::create([
            'status' => 'new',
            'payment_status' => 'pending',
            'payment_method' => 'manual',
            'total_net' => $total,
            'total_vat' => 0,
            'total_gross' => $total,
            'currency' => 'PLN'
        ]);


        foreach($cart as $id => $item){

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'name' => $item['name'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'vat_rate' => 23
            ]);

        }


        session()->forget('cart');

        return redirect('/')->with('success','Zamówienie zostało złożone');

    }

}