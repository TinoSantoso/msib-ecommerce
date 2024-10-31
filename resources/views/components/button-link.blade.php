<div>
    <a {{ $attributes->merge(['class' => 'inline-block px-4 py-2 text-blue-600 hover:bg-blue-700 hover:text-white']) }}>
        {{ $slot }}
    </a>
</div>