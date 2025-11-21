<button
    {{ $attributes->merge([
        'type' => 'button',
        'class' =>
            'inline-flex items-center px-5 py-2 bg-gray-200 text-gray-700 font-semibold rounded-xl 
            shadow hover:bg-gray-300 active:bg-gray-400 focus:outline-none focus:ring-2 
            focus:ring-gray-300 focus:ring-offset-2 transition-all duration-200'
    ]) }}
>
    {{ $slot }}
</button>
