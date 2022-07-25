<x-guest-layout>

    <x-slot name="title">
        {{ __('Nexday | Forgot Password')}}
    </x-slot>

    <nav class="bg-gray-100 flex flex-row justify-between p-2">
        <div class="flex items-start justify-center">
            <img src="{{ asset('images/Nexday-Logo.png') }}" alt="Nextday Logo" class="w-24 h-12" />
        </div>
        <div class="flex items-end justify-center">
            <a href="{{ url('/') }}" class="px-4 py-1 text-center rounded-md hover:bg-blue-600 hover:text-white text-gray-600">Home</a>
        </div>
    </nav>

    <x-auth-card class="bg-gray-100">
        <x-slot name="logo">
            <div class="relative w-full space-y-2">
                <div class="bg-blue-600 absolute -top-20 left-1/3 right-auto w-20 h-20 rounded-full border border-blue-700 shadow-2xl">
                    <x-generated-icons.icon-padlock class="relative w-12 h-12 fill-current text-white top-4 left-4" />
                </div>
                <h1 class="text-center text-gray-600 font-sora font-bold m-0 pt-2">Password Retrieval</h1>
            </div>
        </x-slot>
        <div class="mb-2 text-sm text-gray-600">
            <p class="m-0 p-0"><b>Forgot your password?</b> Enter your registered email to recover your password.</p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="flex flex-col space-y-2 mb-12" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}" class="mt-10">
            @csrf

            <!-- Email Address -->
            <div class="relative">
                <x-input id="email" class="peer h-9 w-full border-b-1 border-gray-300 text-sm text-gray-900 rounded placeholder-transparent" type="email" name="email" :value="old('email')" placeholder="Email Address" required autofocus />
                <x-label for="email" :value="__('Email')"
                    class="absolute left-0 -top-1/2 text-gray-800 
                        text-sm peer-placeholder-shown:text-base 
                        transition-all
                        peer-placeholder-shown:text-gray-400
                        peer-placeholder-shown:top-2
                        peer-placeholder-shown:left-3
                        peer-focus:-top-1/2
                        peer-focus:text-gray-600
                        peer-focus:text-sm
                        peer-focus:left-0
                        "/>
            </div>

            <div class="flex flex-col items-center mt-6">
                <div class="flex flex-row justify-between w-full">
                    <a class="text-sm text-gray-600 hover:text-gray-900 border rounded-md border-slate-300 hover:border-blue-500 hover:bg-blue-300 py-2 px-3" href="{{ route('login') }}">
                        {{ __('Login Instead') }}
                    </a>
                    <x-button type="submit" class="inline-flex text-sm items-center px-3 py-2 border-blue-700 bg-blue-600 text-white hover:bg-blue-700 hover:border-blue-800 shadow-xl drop-shadow-xl">
                       <x-generated-icons.icon-key class="mr-1 h-4 w-4 fill-current" />
                       <span class="font-normal">{{ __('Reset') }}</span>
                    </x-button>
                </div>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
