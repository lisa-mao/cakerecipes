@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-[#CBDCEB]']) }}>
    {{ $value ?? $slot }}
</label>
