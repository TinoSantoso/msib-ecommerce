<!-- resources/views/orders/index.blade.php -->
@extends('layouts.main-app')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Order History</h1>

        @if($orders->isEmpty())
            <p class="text-gray-600">You have no orders yet.</p>
        @else
            <div class="bg-white shadow rounded-lg overflow-hidden">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">Order ID</th>
                            <th class="py-2 px-4 border-b">Date</th>
                            <th class="py-2 px-4 border-b">Total</th>
                            <th class="py-2 px-4 border-b">Status</th>
                            <th class="py-2 px-4 border-b">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td class="py-2 px-4 border-b">{{ $order->id }}</td>
                                <td class="py-2 px-4 border-b">{{ $order->created_at->format('M d, Y') }}</td>
                                <td class="py-2 px-4 border-b">IDR {{ number_format($order->total_amount, 2) }}</td>
                                <td class="py-2 px-4 border-b">{{ ucfirst($order->status) }}</td>
                                <td class="py-2 px-4 border-b">
                                    <a href="{{ route('orders.show', $order->id) }}" 
                                       class="text-blue-500 hover:text-blue-700">
                                       View Details
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection