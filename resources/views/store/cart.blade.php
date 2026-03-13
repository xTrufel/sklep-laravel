@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto px-6 py-16">

<h1 class="text-3xl font-bold mb-10">
Koszyk
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

$final = $total - $discount;
@endphp

@if(count($cart) > 0)

<table class="w-full border mb-10">

<thead class="bg-gray-100">

<tr>
<th class="p-3 text-left">Produkt</th>
<th class="p-3">Cena</th>
<th class="p-3">Ilość</th>
<th class="p-3">Suma</th>
<th class="p-3"></th>
</tr>

</thead>

<tbody>

@foreach($cart as $id => $item)

<tr class="border-t">

<td class="p-3">
{{ $item['name'] }}
</td>

<td class="p-3 text-center">
{{ number_format($item['price'],2) }} zł
</td>

<td class="p-3 text-center">
{{ $item['quantity'] }}
</td>

<td class="p-3 text-center">
{{ number_format($item['price'] * $item['quantity'],2) }} zł
</td>

<td class="p-3 text-center">

<a href="/cart/remove/{{ $id }}" class="text-red-500">
Usuń
</a>

</td>

</tr>

@endforeach

</tbody>

</table>

<form method="POST" action="/cart/coupon" class="flex gap-3 mb-8">
@csrf

<input
type="text"
name="coupon"
placeholder="Kod rabatowy"
class="border rounded px-4 py-2 w-64">

<button class="bg-blue-500 text-white px-4 py-2 rounded">
Zastosuj
</button>

</form>

<div class="bg-white border rounded-xl p-6">

<p class="mb-2">
Suma: <b>{{ number_format($total,2) }} zł</b>
</p>

@if($discount > 0)

<p class="text-green-600 mb-2">
Rabat: -{{ number_format($discount,2) }} zł
</p>

<p class="text-xl font-bold mb-6">
Do zapłaty: {{ number_format($final,2) }} zł
</p>

@else

<p class="text-xl font-bold mb-6">
Do zapłaty: {{ number_format($total,2) }} zł
</p>

@endif

<a href="/checkout"
class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600">

Przejdź do zamówienia

</a>

</div>

@else

<p class="text-gray-500">
Twój koszyk jest pusty.
</p>

@endif

</div>

@endsection
