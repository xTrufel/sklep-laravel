@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto px-6 py-16">

<div class="grid grid-cols-2 gap-16">

<!-- ZDJĘCIE -->

<div>

@if($product->image)

<img
src="{{ asset('storage/'.$product->image) }}"
class="w-full rounded-xl shadow">

@else

<div class="h-96 bg-gray-100 rounded"></div>

@endif

</div>

<!-- INFORMACJE -->

<div>

<h1 class="text-3xl font-bold mb-4">
{{ $product->name }}
</h1>

<p class="text-gray-600 mb-8">
{{ $product->description }}
</p>

<div class="text-3xl font-bold text-blue-500 mb-8">
{{ $product->price_gross }} zł
</div>

<a
href="/cart/add/{{ $product->id }}"
class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition">

Dodaj do koszyka

</a>

</div>

</div>

</div>

@endsection
