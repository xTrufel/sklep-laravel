<nav class="bg-white border-b sticky top-0 z-50">

<div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

<a href="/" class="text-2xl font-bold text-blue-500">
Sklep
</a>

<div class="flex items-center gap-8 text-gray-700 font-medium">

<a href="/" class="hover:text-blue-500 transition">
Strona główna
</a>

<div x-data="{ open:false }" class="relative">

<button
@click="open = !open"
class="hover:text-blue-500 transition flex items-center gap-1">

Kategorie

<svg xmlns="http://www.w3.org/2000/svg"
class="w-4 h-4"
fill="none"
viewBox="0 0 24 24"
stroke="currentColor">

<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
d="M19 9l-7 7-7-7"/>

</svg>

</button>

<div
x-show="open"
@click.away="open=false"
class="absolute mt-4 w-48 bg-white border rounded-lg shadow-lg">

@foreach($categories as $category)

<a
href="/kategoria/{{ $category->slug }}"
class="block px-4 py-2 hover:bg-gray-100">

{{ $category->name }}

</a>

@endforeach

</div>

</div>

</div>

<div class="flex items-center gap-6">

<a href="/cart" class="relative text-xl text-gray-700 hover:text-blue-500 transition">

🛒

@php
$count = 0;

if(session('cart')){
foreach(session('cart') as $item){
$count += $item['quantity'];
}
}
@endphp

@if($count > 0)

<span class="absolute -top-2 -right-3 bg-blue-500 text-white text-xs w-5 h-5 flex items-center justify-center rounded-full">
{{ $count }}
</span>

@endif

</a>

@guest

<a href="/login"
class="text-blue-500 border border-blue-500 px-4 py-2 rounded-lg hover:bg-blue-500 hover:text-white transition">
Login </a>

<a href="/register"
class="text-gray-700 hover:text-blue-500">
Rejestracja </a>

@endguest

@auth

<a href="/orders" class="text-gray-700 hover:text-blue-500">
Moje zamówienia
</a>

<span class="text-gray-700">
{{ Auth::user()->name }}
</span>

@if(Auth::user()->is_admin)
<a href="/admin" class="text-gray-700 hover:text-blue-500">
Panel admina
</a>
@endif

<form method="POST" action="/logout">
@csrf

<button
class="text-blue-500 border border-blue-500 px-4 py-2 rounded-lg hover:bg-blue-500 hover:text-white transition">

Wyloguj

</button>

</form>

@endauth

</div>

</div>

</nav>
