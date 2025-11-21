<button
    {{ $attributes->merge([
        'type' => 'submit',
        'class' =>
            'inline-flex items-center px-5 py-2 bg-orange-600 text-white font-semibold rounded-xl 
            shadow-md hover:bg-orange-700 active:bg-orange-800 focus:outline-none focus:ring-2 
            focus:ring-orange-300 focus:ring-offset-2 transition-all duration-200'
    ]) }}
>
    {{ $slot }}
</button>
