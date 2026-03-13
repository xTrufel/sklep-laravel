@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto px-6 py-16">

<h1 class="text-3xl font-bold mb-10">
Podsumowanie zamówienia
</h1>

@php

$cart = session('cart', []);

$total = 0;

foreach($cart as $item){
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

$shipping = session('shipping_price',0);

$final = $total - $discount + $shipping;

@endphp

<div class="mb-10">

@foreach($cart as $item)

@php
$sum = $item['price'] * $item['quantity'];
@endphp

<div class="flex justify-between mb-2">
<span>{{ $item['name'] }} x {{ $item['quantity'] }}</span>
<span>{{ number_format($sum,2) }} zł</span>
</div>

@endforeach

</div>

<div class="border-t pt-6">

<p class="flex justify-between mb-2">
<span>Suma</span>
<span>{{ number_format($total,2) }} zł</span>
</p>

@if($discount > 0)

<p class="flex justify-between text-green-600 mb-2">
<span>Rabat</span>
<span>-{{ number_format($discount,2) }} zł</span>
</p>

<p class="flex justify-between mb-2">
<span>Dostawa</span>
<span>{{ number_format($shipping,2) }} zł</span>
</p>

<p class="flex justify-between text-xl font-bold">
<span>Do zapłaty</span>
<span>{{ number_format($final,2) }} zł</span>
</p>

@else

<p class="flex justify-between text-xl font-bold">
<span>Do zapłaty</span>
<span>{{ number_format($total,2) }} zł</span>
</p>

@endif

</div>


<a href="/checkout/pay"
class="mt-10 inline-block bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600">
Zapłać </a>

</div>

@endsection
