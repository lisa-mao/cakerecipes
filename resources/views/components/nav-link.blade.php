@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'inline-flex items-center px-1 pt-1 border-b-2 border-[#CBDCEB] dark:border-[#CBDCEB] text-sm font-medium leading-5 text-[#CBDCEB] dark:text-[#CBDCEB] focus:outline-none focus:border-[#CBDCEB] transition duration-150 ease-in-out'
                : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-[#6D94C5] dark:text-[#6D94C5] hover:text-[#CBDCEB] dark:hover:text-[#6D94C5] hover:border-[#6D94C5] dark:hover:border-[#6D94C5] focus:outline-none focus:text-[#6D94C5] dark:focus:text-[#6D94C5] focus:border-#6D94C5 dark:focus:border-#6D94C5 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
