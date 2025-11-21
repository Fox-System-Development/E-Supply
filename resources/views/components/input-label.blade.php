<label {{ $attributes->merge(['class' => 'block font-semibold text-gray-800 text-sm']) }}>
    {{ $value ?? $slot }}
</label>
