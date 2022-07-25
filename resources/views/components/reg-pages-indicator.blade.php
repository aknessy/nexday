@props(['pages','saved'])

@php
  $explode = explode("/", request()->route()->uri);
  $uri = isset($explode[1]) ? $explode[1] : 'register';
@endphp

<div {{ $attributes->merge(['class' => 'flex items-center justify-start pt-5 space-x-2']) }}>
    @foreach ($pages as $page)
        @if($page == $uri)
            <a 
                href=""
                class="bg-sky-600 border border-white w-4 h-4 rounded-full text-center focus:bg-sky-600 cursor-not-allowed pointer-events-none hover:bg-sky-600 transition duration-150 ease-in-out">
            </a>
        @elseif(in_array($page, $saved))
            <a 
                href="{{ $page }}"
                class="bg-sky-600 border border-slate-50 w-4 h-4 rounded-full text-center focus:bg-sky-600 cursor-not-allowed pointer-events-none hover:bg-sky-600 transition duration-150 ease-in-out">
            </a>
        @else
            <a 
                href="register/{{ $page }}"
                class="bg-slate-300 border border-slate-50 w-4 h-4 rounded-full text-center focus:bg-sky-600 hover:bg-slate-400 transition duration-150 ease-in-out">
            </a>
        @endif
    @endforeach
</div>