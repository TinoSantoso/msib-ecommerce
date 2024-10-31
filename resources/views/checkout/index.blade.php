@extends('layouts.main-app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Checkout</h1>
    <div class="bg-white shadow rounded-lg p-4">
        <h2 class="text-lg font-semibold">Order Summary</h2>
        <ul class="mt-2">
            @foreach($cartItems as $item)
                <li class="flex justify-between">
                    <span>{{ $item->product->product_name }} x {{ $item->quantity }}</span>
                    <span>IDR {{ number_format(($item->product->price * $item->quantity), 0) }}</span>
                </li>
            @endforeach
        </ul>
        <div class="border-t mt-4 pt-4 flex justify-between font-bold">
            <span>Grand Total</span>
            <span>IDR {{ number_format($total, 2) }}</span>
        </div>
    </div>
    <form action="{{ route('checkout.process') }}" method="POST" class="mt-6">
        @csrf
        <button type="submit" class="px-6 py-3 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transition duration-200">
            Confirm Purchase
        </button>
    </form>
@endsection