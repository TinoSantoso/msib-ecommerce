@extends('layouts.main-app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Shopping Cart</h1>
    @foreach($cartItems as $item)
        <div class="flex justify-between bg-white shadow p-4 mb-4 rounded-lg">
            <div>
                <h2 class="text-lg font-semibold">{{ $item->product->product_name }}</h2>
                <p>Quantity: {{ $item->quantity }}</p>
                <p>Harga Satuan: {{ number_format($item->product->price, 0) }}</p>
            </div>
            @php
                $total = $item->product->price * $item->quantity;
            @endphp
            <span class="text-xl font-bold text-green-500">IDR - {{ number_format($total, 2) }}</span>
        </div>
    @endforeach
    
    <a href="{{ route('checkout.index') }}" 
    class="inline-block px-6 py-3 bg-green-500 text-white font-semibold rounded-md hover:bg-green-600 transition duration-200 mt-4">
        Proceed to Checkout
    </a>
@endsection