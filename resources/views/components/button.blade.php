<button {{ $attributes->merge(['type' => 'button', 'class' => 'px-4 py-2 rounded-md font-semibold tracking-widest disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
