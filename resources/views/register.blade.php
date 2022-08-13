<x-guest-layout>
    <div class="bg-gray-100">
        <div class="flex justify-between items-center p-3 bg-white drop-shadow-sm shadow-sm">
            <div class="flex items-center justify-start">
                <img src="{{ asset('images/Nexday-Logo.png') }}" alt="Nextday Logo" class="w-24 h-12" />
            </div>
            <div class="flex align-center justify-end space-x-3">
                <a href="{{ url('/') }}" class="flex align-center space-x-1 text-lg text-gray-700 p-2 hover:rounded-md hover:bg-blue-600 hover:shadow-lg hover:border-blue-900 hover:text-white focus:text-white active:bg-blue-600 ">
                    <x-generated-icons.icon-home class="w-4 h-4 fill-current"/>
                    <span class="text-sm font-sans">Home</span>
                </a>
                <a href="#" class="flex align-center space-x-1 text-lg text-gray-700 p-2 hover:rounded-md hover:bg-blue-600 hover:shadow-lg hover:border-blue-900 hover:text-white focus:text-white active:bg-blue-600 ">
                    <x-generated-icons.icon-app class="w-4 h-4 fill-current"/>
                    <span class="text-sm font-sans">App Download</span>
                </a>
                <a href="{{ route('register') }}" class="flex align-center space-x-1 text-lg p-2 rounded-md bg-blue-600 shadow-lg text-white">
                    <x-generated-icons.icon-account class="w-4 h-4 fill-current"/>
                    <span class="text-sm font-sans">Register</span>
                </a>
                <a href="{{ route('login') }}" class="flex align-center space-x-1 text-lg text-gray-700 p-2 hover:rounded-md hover:bg-blue-600 hover:shadow-lg hover:border-blue-900 hover:text-white focus:text-white active:bg-blue-600 ">
                    <x-generated-icons.icon-person-add class="w-4 h-4 fill-current"/>
                    <span class="text-sm font-sans">Sign In</span>
                </a>
            </div>
        </div>
        <div class="w-full flex flex-row items-center justify-between">
            <div class="flex bg-white flex-row w-full p-1 space-x-1">
                <a href="{{ url('register') }}" class="p-2 text-sm {{ session('basicInformation') ? 'bg-blue-300 border-b-transparent cursor-not-allowed' : 'border-b-4 border-b-blue-700 hover:border-b-blue-700 cursor-not-allowed' }}">Basic Information</a>
                <a href="{{ url('register/location') }}" class="p-2 text-sm {{ isset(session('basicInformation')['longitudeLatitude']) ? 'bg-blue-300' : 'border-b-4 border-b-transparent hover:border-b-blue-700' }}">Location (Longitude/Latitude)</a>
                <a href="{{ url('register') }}" class="p-2 text-sm {{ isset(session('basicInformation')['terms']) ? 'bg-blue-300' : 'border-b-4 border-b-transparent hover:border-b-blue-700' }}">Terms & Conditions</a>
            </div>
            <div class="md:hidden sm:visible sm:flex sm:flex-col sm:items-center sm:justify-center">
                <lord-icon src="https://cdn.lordicon.com/qfzvbrrn.json" trigger="morph" class="w-8 h-8"></lord-icon>
            </div>
        </div>
        <div class="min-h-screen flex w-full">
            <div class="flex flex-col w-5/12 max-w-sm space-y-3 p-6">
                <img src="{{ asset('images/urban-mobile-shopping.png') }}" alt="A Gift That Helps You Grow" class="w-auto h-auto" />
                <h1 class="font-sora text-3xl text-gray-700 font-bold">Create a free account</h1>
                <p class="font-sans text-md">Start your online presence by creating a free user account. This will grant you access to a whole stack of tools to enable you set up your new business. Don't worry, it will only take you a couple of minutes!</p>
            </div>
            <div class="w-full items-center justify-center">
                <div class="flex flex-col items-center justify-center p-8">
                    <form method="POST" action="{{ route('process-basic') }}" class="min-w-min bg-white/70 backdrop-blur-sm shadow-2xl p-5 border border-solid border-gray-30 rounded-md">
                         @csrf

                        <x-auth-validation-errors class="bg-rose-500 flex flex-row p-2 rounded shadow-2xl border border-rose-600 mb-4" :errors="$errors" />

                        @if(session('registrationProgressStatusCode') != NULL && session('registrationProgressStatusCode') == 0)
                            <div class="bg-rose-500 flex flex-row p-2 rounded shadow-2xl border border-rose-600 mb-4">
                                <p class="p-0 m-0 font-sans text-white text-sm">{{ session('registrationProgressStatusMessage') }}</p>
                            </div>
                        @else
                            <div class="flex flex-col space-x-0 mb-10 pb-5 border-b border-b-slate-100">
                                <h3 class="font-bold text-md text-slate-500">Provide your basic information by filling the form below.</h3>
                                <p class="p-0 m-0 font-sans text-sm text-slate-500">This is a mandatory step and all form fields are required!</p>
                            </div>
                        @endif

                        <div class="flex flex-wrap -mx-3">
                            <div class="w-full md:w-1/2 px-3 mb-3 md:mb-0">
                                <x-label for="firstname" :value="__('First Name')" />
                                <x-input id="firstname" type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 bg-opacity-30 border border-gray-200 focus:outline-none focus:bg-opacity-40 text-xs" name="firstname" :value="old('firstname')" required autofocus />
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-3 md:mb-0">
                                <x-label for="middlename" :value="__('Middle name')" />
                                <x-input id="middlename" type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 bg-opacity-30 border border-gray-200 focus:outline-none focus:bg-opacity-40 text-xs" name="middlename" :value="old('middlename')" required />
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-3 md:mb-0">
                                <x-label for="lastname" :value="__('Last name')" />
                                <x-input id="lastname" type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 bg-opacity-30 border border-gray-200 focus:outline-none focus:bg-opacity-40 text-xs" name="lastname" :value="old('lastname')" required />
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <x-label for="gender" :value="__('Gender')" />
                                <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-2.5 px-4 pr-8 rounded leading-tight bg-opacity-30 focus:outline-none focus:bg-opacity-40 text-xs" id="gender" name="gender">
                                    <option value="">Select Gender</option>
                                    <option value="female">Female</option>
                                    <option value="male">Male</option>
                                </select>
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <x-label for="phone-num" :value="__('Phone Number')" />
                                <x-input id="phone-num" name="phonenumber" type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 bg-opacity-30 border border-gray-200 focus:outline-none focus:bg-opacity-40 text-xs" />
                            </div>
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <x-label for="email" :value="__('Email')" />
                                <x-input id="email" type="email" class="appearance-none block w-full bg-gray-200 text-gray-700 bg-opacity-30 border border-gray-200 focus:outline-none focus:bg-opacity-40 text-xs" name="email" :value="old('email')" required placeholder="Email Address" />
                            </div>
                            <div class="w-full md:w-1/3 px-3 mb-3">
                                <x-label for="country" :value="__('Country')" />
                                <select id="country" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-2.5 px-4 pr-8 rounded leading-tight bg-opacity-30 focus:outline-none focus:bg-opacity-40 text-xs" name="country">
                                    <option value="">Select Country</option>
                                    @foreach ($countries as $option)
                                     <option value="{{ $option['code'] }}">{{ $option['name'] }}</option>   
                                    @endforeach
                                </select>
                            </div>
                             <div class="w-full md:w-1/3 px-3 mb-3">
                                <x-label for="states" :value="__('State')" />
                                <select id="state" disabled class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-2.5 px-4 pr-8 rounded leading-tight bg-opacity-30 focus:outline-none focus:bg-opacity-40 text-xs" name="state">
                                    <option value="">Select City</option>
                                </select>
                            </div>
                            <div class="w-full md:w-1/3 px-3 mb-3">
                                <x-label for="city" :value="__('City')" />
                                <select id="city" disabled class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-2.5 px-4 pr-8 rounded leading-tight bg-opacity-30 focus:outline-none focus:bg-opacity-40 text-xs" name="province">
                                    <option value="">Select Province</option>
                                </select>
                            </div>
                            <div class="w-full px-3 mb-6 md:mb-0">
                                <x-label for="address" :value="__('Address')" />
                                <x-input id="address" type="text" name="address" class="appearance-none block w-full bg-gray-200 text-gray-700 bg-opacity-30 border border-gray-200 focus:outline-none focus:bg-opacity-40 text-xs" :value="old('address')" />
                            </div>
                            <div class="w-full px-3 mb-6 md:mb-0">
                                <x-label for="date-of-birth" :value="__('Date of Birth')" />
                                <x-input id="date-of-birth" type="date" name="dateofbirth" class="appearance-none block w-full bg-gray-200 text-gray-700 bg-opacity-30 border border-gray-200 focus:outline-none focus:bg-opacity-40 text-xs" :value="old('dateofbirth')" />
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6 px-3">
                            <div class="w-full">
                                <x-label for="user-category" :value="__('I am a?')" />
                                <select id="user-category" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-2.5 px-4 pr-8 rounded leading-tight bg-opacity-30 focus:outline-none focus:bg-opacity-40 text-xs" name="usercategory">
                                    <option value=""></option>
                                    <option value="user">User</option>
                                    <option value="merchant">Merchant</option>
                                    <option value="landlord">Landlord</option>
                                    <option value="hotelier">Hotelier</option>
                                </select>
                            </div>
                        </div>

                        <div class="flex items-center justify-between mt-10">
                            <a class="text-sm text-gray-600 hover:text-gray-900 border rounded-md border-slate-300 hover:border-blue-500 hover:bg-blue-300 py-2 px-4" 
                                href="{{ route('login') }}">
                                    {{ __('Already registered?') }}
                            </a>

                            <x-button type="submit" class="ml-4 border border-blue-700 bg-blue-600 text-white hover:bg-blue-700 hover:border-blue-800 shadow-xl drop-shadow-xl">
                                {{ __('Save & Continue') }}
                            </x-button>
                        </div>
                    </div>
                </form>

                <div class="flex mt-5 items-center justify-around">
                    <div class="flex flex-row justify-between items-center space-x-5 text-gray-500">
                        <a href="{{  url('/') }}" class="text-xs hover:underline">Home</a>
                        <a href="#" class="text-xs hover:underline">Privacy Policy</a>
                        <a href="#" class="text-xs hover:underline">Terms of Service</a>
                        <a href="#" class="text-xs hover:underline">About</a>
                    </div>
                    <div class="flex justify-center items-center p-6 text-gray-500">
                        <p class="text-gray-300 text-xs">All rights reserved. &copy;{{ date('Y') }} Aknessy Resources</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
<div id="activityLoader" class="hidden inset-0 bg-gray-600 bg-opacity-50 fixed top-0 left-0 w-full h-full outline-none overflow-x-hidden overflow-y-auto">
    <div class="relative w-48 h-48 top-1/2 left-1/2 pointer-events-none rounded-full">
        <div class="border-2 bg-blue-500 border-blue-600 shadow-lg relative flex flex-col w-1/5 h-1/5 rounded-xl pointer-events-auto bg-clip-padding outline-none text-current">
            <x-generated-icons.infinity-loader class="w-full h-full text-white"  :stroke="__('ffffff')" />
        </div>
    </div>
</div>
</x-guest-layout>

<script type="text/javascript">
    $(document).ready(function(){
        var countryTag = $('#country')
        var statesTag = $('#state')
        var LgasTag = $('#city')
        var activityLoader = $('#activityLoader')
        var timeout = 3000

        countryTag.on('change', function(e){
            if($(this).val() != '')
            {
                $(activityLoader).show()
                
                var countryCode = $(this).val()
                var html = '<option value="">Select State</option>'

                setTimeout(() => {
                    $.ajax({
                        method : 'GET',
                        url : "register/fetchStates/" + countryCode
                    }).done(function(result)
                    {
                        if(result.name.length > 0 && result.code.length > 0)
                        {
                            for(let i = 0; i < result['name'].length; i++){
                                html += '<option value="' + result['code'][i] + '">' + result['name'][i] + '</option>';
                            }

                            statesTag.empty().append(html);
                            statesTag.attr('disabled', false);

                            $(activityLoader).hide()
                        }else{
                            html += '<option value="">No States Found</option>'
                            $(activityLoader).hide()
                        }
                    })
                }, timeout)
            }
        })

        statesTag.on('change', function(){
            if(countryTag.val() != '' && $(this).val() != '')
            {
                $(activityLoader).show()

                var country = countryTag.val()
                var selectedState = $(this).val()
                var html = '<option value="">Select Province</option>'

                setTimeout(() => {
                    $.ajax({
                        method : 'GET',
                        url : "register/fetchProvinces/" + country + "/" + selectedState
                    }).done(function(result)
                    {
                        if(result.length > 0)
                        {
                            for(let i = 0; i < result.length; i++){
                                html += '<option value="' + result[i] + '">' + result[i] + '</option>';
                            }

                            LgasTag.empty().append(html);
                            LgasTag.attr('disabled', false);
                            
                            $(activityLoader).hide()
                        }else{
                            html += '<option value="">No City/Cities Found</option>'
                            $(activityLoader).hide()
                        }
                    })
                }, timeout)
            }
        })
    })
</script>