@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-16">

<h1 class="text-3xl font-bold mb-12">
{{ $category->name }}
</h1>

<div class="grid grid-cols-4 gap-8">

@foreach($products as $product)

<div class="bg-white rounded-xl shadow-sm hover:shadow-lg transition overflow-hidden">

@if($product->image)

<img
src="{{ asset('storage/'.$product->image) }}"
class="h-48 w-full object-cover">

@else

<div class="h-48 bg-gray-100"></div>

@endif

<div class="p-6">

<h3 class="font-semibold mb-2">

<a href="/produkt/{{ $product->slug }}" class="hover:text-blue-500">
{{ $product->name }}
</a>

</h3>

<p class="text-gray-500 text-sm mb-4">
{{ $product->description }}
</p>

<div class="flex justify-between items-center">

<span class="text-blue-500 font-bold text-lg">
{{ $product->price_gross }} zł
</span>

<a
href="/cart/add/{{ $product->id }}"
class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">

Dodaj

</a>

</div>

</div>

</div>

@endforeach

</div>

</div>

@endsection
