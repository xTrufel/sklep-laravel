<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Models\Coupon;


Route::get('/', function () {

    $products = \App\Models\Product::where('status','published')
        ->latest()
        ->take(4)
        ->get();

    $categories = \App\Models\Category::all();

    return view('store.home', compact('products','categories'));

});



Route::get('/produkt/{slug}', function ($slug) {

    $product = Product::where('slug',$slug)->firstOrFail();

    return view('store.product', compact('product'));

});



Route::post('/cart/coupon', function () {

    $code = request('coupon');

    $coupon = Coupon::where('code', $code)
        ->where('active', 1)
        ->first();

    if(!$coupon){
        return back()->with('error','Nieprawidłowy kod rabatowy');
    }

    if($coupon->usage_limit && $coupon->usage_limit <= 0){
        return back()->with('error','Kod rabatowy został wykorzystany');
    }

    session(['coupon' => $coupon]);

    return back()->with('success','Kod rabatowy zastosowany');

});

Route::get('/kategoria/{slug}', function ($slug) {

    $category = Category::where('slug',$slug)->firstOrFail();

    $products = Product::where('category_id',$category->id)
        ->where('status','published')
        ->get();

    return view('store.category', compact('category','products'));

});



Route::get('/cart',[CartController::class,'index']);
Route::get('/cart/add/{id}',[CartController::class,'add']);
Route::get('/cart/increase/{id}',[CartController::class,'increase']);
Route::get('/cart/decrease/{id}',[CartController::class,'decrease']);
Route::get('/cart/remove/{id}',[CartController::class,'remove']);
Route::get('/cart/clear',[CartController::class,'clear']);



Route::get('/checkout',[CheckoutController::class,'index']);
Route::post('/checkout',[CheckoutController::class,'store']);



Route::get('/checkout/shipping', function () {
    return view('store.shipping');
});



Route::get('/checkout/summary', function () {

    return view('store.summary');

});

Route::post('/checkout/summary', function () {

    $shipping = request('shipping');

    $price = 0;

    if($shipping == 'dpd'){
        $price = 15;
    }

    if($shipping == 'inpost'){
        $price = 12;
    }

    if($shipping == 'pickup'){
        $price = 0;
    }

    session([
        'shipping_method' => $shipping,
        'shipping_price' => $price
    ]);

    return redirect('/checkout/summary');

});


Route::get('/checkout/pay', function () {

    $cart = session('cart', []);

    $total = 0;

    foreach ($cart as $item) {
        $total += $item['price'] * $item['quantity'];
    }

    $discount = 0;

    if(session('coupon')){

        $coupon = session('coupon');

        if($coupon->type == 'percent'){
            $discount = $total * ($coupon->value / 100);
        }

        if($coupon->type == 'fixed'){
            $discount = $coupon->value;
        }

    }

    $total_after_discount = $total - $discount;

    $vat_rate = 23;

    $total_net = $total_after_discount / (1 + $vat_rate / 100);
    $total_vat = $total_after_discount - $total_net;



    $order = Order::create([

        'user_id' => auth()->id(),

        'name' => 'Test klient',
        'email' => 'test@test.pl',
        'address' => 'Adres',
        'city' => 'Miasto',

        'total_net' => round($total_net,2),
        'total_vat' => round($total_vat,2),
        'total_gross' => round($total_after_discount,2),

        'total' => round($total_after_discount,2),

        'discount' => round($discount,2),

        'shipping_method' => session('shipping_method'),
        'shipping_price' => session('shipping_price',0),


        'status' => 'paid'

    ]);



    foreach ($cart as $id => $item) {

        OrderItem::create([

            'order_id' => $order->id,
            'product_id' => $id,

            'name' => $item['name'],

            'quantity' => $item['quantity'],
            'price' => $item['price'],

            'vat_rate' => 23

        ]);

    }



    session()->forget('cart');
    session()->forget('coupon');

    return view('store.payment-success');

});


Route::get('/orders', function(){

    $orders = Order::where('user_id', auth()->id())
        ->with('items')
        ->latest()
        ->get();

    return view('store.orders', compact('orders'));

})->middleware('auth');



Route::view('/regulamin','pages.regulamin');
Route::view('/polityka-prywatnosci','pages.privacy');



require __DIR__.'/auth.php';
