<div class="bg-white shadow rounded-lg overflow-hidden">
    <img src="{{ $product->image }}" alt="{{ $product->product_name }}" class="w-full h-48 object-cover">
    <div class="p-4">
        <h2 class="text-lg font-semibold">{{ $product->product_name }}</h2>
        {{-- <p class="text-gray-600">{{ Str::limit($product->description, 100) }}</p> --}}
        <div class="mt-4 flex justify-between items-center">
            <span class="text-xl font-bold text-green-500">{{ $product->price }} IDR</span>

                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="inline-block">
                    @csrf
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transition duration-200">
                        Add to Cart
                    </button>
                </form>
        </div>
    </div>
</div>