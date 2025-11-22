<a
    {{ $attributes->merge([
        'class' =>
            'block px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-700 
            rounded-lg transition-all duration-200'
    ]) }}
>
    {{ $slot }}
</a>
