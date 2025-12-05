@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'block w-56 ps-3 pe-4 py-2 border-l-4 border-sky-400 dark:border-sky-600 text-start text-base font-medium text-black focus:outline-none focus:text-indigo-800 dark:focus:text-indigo-200 focus:border-indigo-700 dark:focus:border-indigo-300 transition duration-150 ease-in-out'
            : 'block w-56 ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-black hover:border-sky-300 dark:hover:border-sky-600 focus:outline-none focus:text-gray-800 dark:focus:text-gray-200 focus:border-gray-300 dark:focus:border-gray-600 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
