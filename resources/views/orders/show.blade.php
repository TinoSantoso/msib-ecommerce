<!-- resources/views/orders/show.blade.php -->
@extends('layouts.main-app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Order Details</h1>

        <div class="bg-white shadow rounded-lg p-4 mb-6">
            <p><strong>Order ID:</strong> {{ $data->id }}</p>
            <p><strong>Date:</strong> {{ $data->created_at->format('M d, Y') }}</p>
            <p><strong>Grand Total:</strong> Rp {{ number_format($data->total_amount, 2) }}</p>
            <p><strong>Status:</strong> {{ ucfirst($data->status) }}</p>
        </div>

        <h2 class="text-xl font-semibold mb-2">Items in Order</h2>
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Product</th>
                        <th class="py-2 px-4 border-b">Quantity</th>
                        <th class="py-2 px-4 border-b">Price</th>
                        <th class="py-2 px-4 border-b">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data->orderItems as $item)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $item->product->product_name }}</td>
                            <td class="py-2 px-4 border-b">{{ $item->quantity }}</td>
                            <td class="py-2 px-4 border-b">Rp {{ number_format($item->price, 2) }}</td>
                            <td class="py-2 px-4 border-b">Rp {{ number_format($item->price * $item->quantity, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            <a href="{{ route('orders.index') }}" class="text-blue-500 hover:text-blue-700">
                &larr; Back to Orders
            </a>
        </div>
    </div>
@endsection