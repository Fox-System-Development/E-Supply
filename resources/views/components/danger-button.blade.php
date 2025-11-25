<button
    {{ $attributes->merge([
        'type' => 'submit',
        'class' =>
            'inline-flex items-center px-5 py-2 bg-red-600 text-white font-semibold rounded-xl 
            shadow-md hover:bg-red-700 active:bg-red-800 focus:outline-none focus:ring-2 
            focus:ring-red-300 focus:ring-offset-2 transition-all duration-200'
    ]) }}
>
    {{ $slot }}
</button>
