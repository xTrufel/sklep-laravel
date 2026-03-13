@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-12">

{{-- HERO --}}

<div class="bg-blue-50 rounded-2xl p-12 mb-16 text-center">

<h1 class="text-4xl font-bold mb-4">
Witaj w naszym sklepie
</h1>

<p class="text-gray-600 mb-6">
Najlepsze produkty w najlepszych cenach
</p>

<a href="#produkty"
class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600 transition">
Zobacz produkty </a>

</div>

{{-- KATEGORIE --}}

<h2 class="text-2xl font-semibold mb-6">
Kategorie
</h2>

<div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-16">

@foreach($categories as $category)

<a href="/kategoria/{{ $category->slug }}"
class="bg-white border rounded-xl p-6 text-center hover:shadow-md transition">

<p class="font-semibold">
{{ $category->name }}
</p>

</a>

@endforeach

</div>

{{-- PRODUKTY --}}

<h2 id="produkty" class="text-2xl font-semibold mb-6">
Najpopularniejsze produkty
</h2>

<div class="grid md:grid-cols-4 gap-8">

@foreach($products as $product)

<div class="bg-white border rounded-xl p-4 shadow-sm">

<img
src="{{ asset('storage/'.$product->image) }}"
class="w-full h-40 object-contain mb-4">

<h3 class="font-semibold mb-2">
{{ $product->name }}
</h3>

<p class="text-gray-500 text-sm mb-4">
{{ $product->description }}
</p>

<div class="flex justify-between items-center">

<span class="text-blue-600 font-bold">
{{ number_format($product->price_gross,2) }} zł
</span>

<a
href="/cart/add/{{ $product->id }}"
class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">

Dodaj

</a>

</div>

</div>

@endforeach

</div>

{{-- ZALETY --}}

<div class="grid md:grid-cols-3 gap-8 mt-20">

<div class="text-center">
<h3 class="font-semibold mb-2">
Szybka dostawa
</h3>
<p class="text-gray-500 text-sm">
Wysyłka w 24h na terenie całej Polski
</p>
</div>

<div class="text-center">
<h3 class="font-semibold mb-2">
Bezpieczne płatności
</h3>
<p class="text-gray-500 text-sm">
Twoje płatności są w pełni zabezpieczone
</p>
</div>

<div class="text-center">
<h3 class="font-semibold mb-2">
Zwrot do 14 dni
</h3>
<p class="text-gray-500 text-sm">
Możesz zwrócić produkt bez podania przyczyny
</p>
</div>

</div>

</div>

@endsection
