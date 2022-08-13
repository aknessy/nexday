<style>
    input[type=text].mapboxgl-ctrl-geocoder--input{padding-left:30px!important;font-size:13px;color:rgb(145, 145, 145);border-radius:3px;}
    .mapboxgl-ctrl-top-right{display:flex;flex-direction:row;justify-content:flex-start;align-items:center;padding-top:30px}
</style>

<x-guest-layout>
    <div class="bg-gray-100">
        <div class="flex justify-between items-center p-3 bg-white drop-shadow-sm shadow-sm">
            <div class="flex align-center justify-start">
                <img src="{{ asset('images/Nexday-Logo.png') }}" alt="Nextday Logo" class="w-24 h-12" />
            </div>
            <div class="flex align-center justify-end space-x-3">
                <a href="{{ url('/') }}" class="flex align-center space-x-1 text-lg text-gray-700 p-2 hover:rounded-md hover:bg-blue-600 hover:shadow-lg hover:border-blue-900 hover:text-white focus:text-white active:bg-blue-600 ">
                    <x-generated-icons.icon-home class="w-4 h-4 fill-current"/>
                    <span class="text-sm font-sans">Home</span>
                </a>
                <a href="" class="flex align-center space-x-1 text-lg text-gray-700 p-2 hover:rounded-md hover:bg-blue-600 hover:shadow-lg hover:border-blue-900 hover:text-white focus:text-white active:bg-blue-600 ">
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
        <div class="bg-white w-full flex flex-row items-center justify-between">
            <div class="flex flex-row w-full p-1 space-x-1">
                <a href="{{ url('register') }}" class="p-2 text-sm {{ session('basicInformation') ? 'bg-blue-300 border-b-4 border-b-blue-300 cursor-not-allowed' : 'border-b-4 border-b-transparent hover:border-b-blue-700' }}">Basic Information</a>
                <a href="{{ url('register/location') }}" class="p-2 text-sm {{ isset(session('basicInformation')['longitudeLatitude']) ? 'bg-blue-300 cursor-not-allowed' : 'cursor-not-allowed border-b-4 hover:border-b-blue-700 border-b-blue-700' }}">Location (Longitude/Latitude)</a>
                <a href="{{ url('register/terms') }}" class="p-2 text-sm {{ isset(session('basicInformation')['terms']) ? 'bg-blue-300' : 'border-b-4 border-b-transparent hover:border-b-blue-700' }}">Terms & Conditions</a>
            </div>
            <div class="md:hidden sm:visible sm:flex sm:flex-col sm:items-center sm:justify-center">
                <lord-icon src="https://cdn.lordicon.com/qfzvbrrn.json" trigger="morph" class="w-8 h-8"></lord-icon>
            </div>
        </div>
        <div class="min-h-screen flex w-full">
            <div class="flex flex-col w-5/12 max-w-sm space-y-3 p-6">
                <img src="{{ asset('images/urban-delivery.png') }}" alt="A Gift That Helps You Grow" class="w-auto h-auto" />
                <h1 class="text-gray-700 font-bold font-sora text-3xl">Publish your current location and become an <em class="font-sans text-sky-700 bold">autodot</em></h1>
                <p class="text-neutral-700 font-sans text-md">The caveat of this is that you help others like you, to have better experience with vetting and shipping of products. It's a community of service, a government of some sort. Financially, it could be rewarding too, you'll see!</p>
                <div class="bg-sky-50 rounded-md text-justify text-neutral-500 font-sans text-sm p-3 space-y-2">
                    <p class="text-neutral-500 font-sans text-sm">Click on the <x-generated-icons.icon-map-locator-alt class="w-6 h-6 fill-current text-slate-600 inline" /> icon on the top-right corner of your browser screen, beside the textfield and grant the browser the required permissions needed  to geolocate your current position.</p>
                    <p class="text-neutral-500 font-sans text-sm">Or, you can simple type-in your address on the input field, select your address or somewhere closest to your location and click on the map marker <x-generated-icons.icon-map-locator class="w-6 h-6 fill-current text-sky-700 inline" /> to activate your current location.</p>
                </div>
                <a href="#" class="mt-6 pt-6 underline text-gray-400 hover:text-gray-500 text-sm font-sans italic">What is an <span class="text-sky-700">autodot</span>?</a>
            </div>
            <div class="w-full items-center justify-center">
                <div class="flex flex-col items-center justify-center p-8">
                    <form method="POST" action="{{ route('process-location') }}" class="relative min-w-min w-full h-full min-h-screen bg-white/70 backdrop-blur-sm shadow-2xl p-5 border border-solid border-gray-30 rounded-md">
                        @csrf

                         @if(session('registrationProgressStatusCode') != NULL && session('registrationProgressStatusCode') == 0)
                            <div class="bg-rose-500 flex flex-row w-full p-2 rounded shadow-2xl border border-rose-600 mb-4">
                                <p class="p-0 m-0 font-sans text-white text-sm">{{ session('registrationProgressStatusMessage') }}</p>
                            </div>
                        @endif

                        <div id="map" class="w-full min-h-screen min-w-min"></div>

                        <input type="hidden" id="lngLatInputField" name="lngLatInputField" />
                        
                        <x-auth-validation-errors class="bg-rose-500 flex flex-row p-2 rounded shadow-2xl border border-rose-600 mb-4" :errors="$errors" />

                        <div class="flex items-center bottom-0 left-0 justify-between mt-3 py-3 w-full basis-0">
                            <a 
                                class="text-sm text-gray-600 hover:text-gray-900 border rounded-md border-slate-300 hover:border-blue-500 hover:bg-blue-300 py-2 px-4" 
                                href="{{ route('login') }}">
                                    {{ __('Already registered?') }}
                            </a>

                            <x-button type="submit" class="ml-4 border border-blue-700 bg-blue-600 text-white hover:bg-blue-700 hover:border-blue-800 shadow-xl drop-shadow-xl">
                                {{ __('Save & Continue') }}
                            </x-button>
                        </div>
                    </form>
                </div>
                 <div class="flex mt-5 items-center justify-around">
                    <div class="flex flex-row justify-between items-center space-x-5 text-gray-500">
                        <a href="{{  url('/') }}" class="hover:underline text-xs">Home</a>
                        <a href="#" class="hover:underline text-xs">Privacy Policy</a>
                        <a href="#" class="hover:underline text-xs">Terms of Service</a>
                        <a href="#" class="hover:underline text-xs">About</a>
                    </div>
                    <div class="flex justify-center items-center p-6 text-gray-500">
                        <p class="text-gray-300 text-xs">All rights reserved. &copy;{{ date('Y') }} Aknessy Resources</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>

<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
<script>
	mapboxgl.accessToken = "{{ env('MAPBOX_ACCESS_TOKEN') }}";
    const map = new mapboxgl.Map(
        {
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [5.60, 3.62],
            zoom: 3
        }
    );

    map.addControl(
        new mapboxgl.GeolocateControl(
        {
            positionOptions: {
                enableHighAccuracy: true
            },
            trackUserLocation: true,
            showUserHeading: true
        }), 'top-right'
    );

    map.addControl(
            new MapboxGeocoder(
                {
                accessToken: mapboxgl.accessToken,
                mapboxgl: mapboxgl
            }
        ),
        'top-right'
    );

    map.on('click', function(e){
        document.getElementById('lngLatInputField').value = JSON.stringify(e.lngLat)
        console.log(document.getElementById('lngLatInputField').value)
    });
</script>