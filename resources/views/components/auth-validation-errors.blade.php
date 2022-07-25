@props(['errors'])

@if ($errors->any())
    <div {{ $attributes->merge(['class' => 'bg-rose-500 flex flex-row p-2 rounded shadow-2xl border border-rose-600 mb-4']) }}>
        <div class="font-sora text-white font-bold">
            {{ __('Validation Error(s): ') }}
        </div>

        <ul class="list-disc list-inside p-0 m-0 font-sans text-white text-sm">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
