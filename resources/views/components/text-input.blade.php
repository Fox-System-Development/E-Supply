@props(['disabled' => false])

<input
    {{ $disabled ? 'disabled' : '' }}
    {!! $attributes->merge([
        'class' =>
            'border-gray-300 focus:border-orange-500 focus:ring-orange-500 rounded-xl shadow-sm 
            bg-white px-3 py-2 text-gray-800 transition-all duration-200'
    ]) !!}
/>
