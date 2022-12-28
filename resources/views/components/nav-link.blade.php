@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center bg-slate-600 px-5 pt-1 border-b-4 border-teal-500 text-sm font-medium leading-5 text-teal-400 focus:outline-none focus:border-teal-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-5 pt-1 border-b-4 border-transparent text-sm font-medium leading-5 text-gray-300 hover:text-teal-400 hover:border-teal-100 focus:outline-none focus:text-teal-600 focus:border-teal-100 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
