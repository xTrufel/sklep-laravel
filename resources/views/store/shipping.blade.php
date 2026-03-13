@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto px-6 py-16">

<h1 class="text-3xl font-bold mb-10">
Dostawa i płatność
</h1>

<form method="POST" action="/checkout/summary">
@csrf

<div class="mb-10">

<h2 class="text-xl font-semibold mb-4">
Metoda dostawy
</h2>

<label class="block mb-2">
<input type="radio" name="shipping" value="dpd" required>
Kurier DPD — 15 zł
</label>

<label class="block mb-2">
<input type="radio" name="shipping" value="inpost">
Paczkomat InPost — 12 zł
</label>

<label class="block mb-6">
<input type="radio" name="shipping" value="pickup">
Odbiór osobisty — 0 zł
</label>

</div>

<div class="mb-10">

<h2 class="font-semibold mb-4 text-lg">
Wybierz płatność
</h2>

<label class="block mb-3">
<input type="radio" name="payment" value="blik" required>
BLIK
</label>

<label class="block mb-3">
<input type="radio" name="payment" value="card">
Karta płatnicza
</label>

<label class="block">
<input type="radio" name="payment" value="transfer">
Przelew online
</label>

</div>

<button class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-600">
Przejdź do podsumowania
</button>

</form>

</div>

@endsection
