<div {{ $attributes->merge(['class' => 'm-0 p-0']) }}>
    <div class="min-h-screen max-h-screen flex items-center justify-center">
        <div class="w-72 max-w-xs shadow-2xl">
            <div class='bg-white w-full p-5 flex justify-center rounded-t-xl border border-slate-200'>
                {{ $logo }}
            </div>
                
            <div class="bg-gradient-to-br from-gray-100 to-gray-200 border-2 border-slate-50 px-4 py-6 overflow-hidden">
                {{ $slot }}
            </div>
        </div>
    </div>  
</div>