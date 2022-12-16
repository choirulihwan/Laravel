@props(['type'])

@php

switch ($type) {
    case 'primary':
        $classes = 'bg-blue-300 hover:bg-blue-400 text-white py-2 px-3 rounded uppercase inline-flex items-center font-semibold text-sm';
        break;
    case 'warning':
        $classes = 'bg-yellow-300 hover:bg-yellow-400 text-black py-2 px-3 rounded-md uppercase inline-flex items-center font-semibold text-sm';
        break;  
    case 'danger':
        $classes = 'bg-red-300 hover:bg-red-400 text-white py-2 px-3 rounded-md uppercase inline-flex items-center font-semibold text-sm';
        break;    
    case 'success':
        $classes = 'bg-green-300 hover:bg-green-400 text-white py-2 px-3 rounded-md uppercase inline-flex items-center font-semibold text-sm';
        break;    
    default:
        $classes = 'bg-gray-300 hover:bg-gray-400 text-white py-2 px-3 rounded uppercase inline-flex items-center font-semibold text-sm';
        break;
}


@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
