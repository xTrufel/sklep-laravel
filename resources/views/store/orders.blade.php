@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto px-6 py-16">

<h1 class="text-3xl font-bold mb-10">
Moje zamówienia
</h1>

@forelse($orders as $order)

<div class="bg-white border rounded-xl p-6 mb-6 shadow-sm">

<div class="flex justify-between items-center mb-4">

<div>
<h2 class="font-semibold text-lg">
Zamówienie #{{ $order->id }}
</h2>

<p class="text-gray-500 text-sm">
{{ $order->created_at->format('d.m.Y H:i') }}
</p>
</div>

<div class="text-right">
<p class="font-bold text-lg text-blue-600">
{{ number_format($order->total_gross,2) }} zł
</p>

<span class="text-sm text-gray-500">
Status: {{ $order->status }}
</span>
</div>

</div>

<div class="border-t pt-4">

<p class="font-semibold mb-2">
Produkty
</p>

<ul class="text-gray-700 space-y-1">

@foreach($order->items as $item)

<li>
{{ $item->name }} × {{ $item->quantity }}
</li>

@endforeach

</ul>

</div>

</div>

@empty

<p class="text-gray-500">
Nie masz jeszcze żadnych zamówień.
</p>

@endforelse

</div>

@endsection
