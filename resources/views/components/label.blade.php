@props(['value'])

<label {{ $attributes->merge(['class' => 'capitalize tracking-wide text-gray-700 text-xs font-bold mb-2']) }}>
    {{ $value ?? $slot }}
</label>
