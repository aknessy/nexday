@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded py-2 px-4 mb-3 focus:outline-none']) !!}>
