@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto px-6 py-16">

<h1 class="text-3xl font-bold mb-10">
Dane zamówienia
</h1>

<form method="POST" action="/checkout">

@csrf

<div class="grid gap-6">

<input
type="text"
name="name"
placeholder="Imię i nazwisko"
class="border p-3 rounded-lg w-full"
required>

<input
type="email"
name="email"
placeholder="Email"
class="border p-3 rounded-lg w-full"
required>

<input
type="text"
name="address"
placeholder="Adres"
class="border p-3 rounded-lg w-full"
required>

<input
type="text"
name="city"
placeholder="Miasto"
class="border p-3 rounded-lg w-full"
required>

</div>
<div class="mt-4">

<label class="flex items-center">
<input type="checkbox" required class="mr-2">
Akceptuję <a href="/regulamin" class="text-blue-500">regulamin</a>
</label>

</div>

<div class="mt-2">

<label class="flex items-center">
<input type="checkbox" required class="mr-2">
Zapoznałem się z <a href="/polityka-prywatnosci" class="text-blue-500">polityką prywatności</a>
</label>

</div>
<br>
<a href="/checkout/shipping"
class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600">
Złóż zamówienie
</a>

</form>

</div>

@endsection
