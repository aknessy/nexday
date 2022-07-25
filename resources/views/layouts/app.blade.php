<x-guest-layout>
    
    <x-slot:title>
        {{ $title }}
    </x-slot>

    <div class="min-h-screen bg-gray-100">
        <div class="flex flex-row w-full">
            <div class="flex flex-col md:w-1/4 lg:w-1/4 sm:w-0 lg:h-full lg:min-h-screen">
               {{ $sidebarLeft }}
            </div>
            <div class="bg-white flex flex-col md:w-3/4 lg:w-3/4 sm:w-full sm:h-full sm:min-h-screen">
                @include('layouts.navigation')

                <header class="bg-transparent">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>

                <main>
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>
</x-guest-layout>

