@extends('layouts.main-app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Product List</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($products as $product)
            <x-product-card :product="$product" />
        @endforeach
    </div>
@endsection