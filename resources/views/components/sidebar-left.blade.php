<div class="flex flex-row w-full">
    <aside class="flex flex-col lg:w-14 h-screen sm:w-0 pt-5 border-r border-gray-200 overflow-x-hidden overflow-y-auto">
        <x-generated-icons.logo-placeholder class="w-10 h-10 fill-current m-1" />

        <nav class="flex flex-col w-full lg:pt-14">
            <ul class="flex flex-col">

                @if(strtolower(Auth::user()->userrole) == 'admin' || strtolower(Auth::user()->userrole) == 'administrator')

                    <li>
                        <a href="{{ route('dashboard') }}" class="block py-2 
                            text-center 
                            hover:bg-blue-600 
                            hover:text-white 
                            text-2xl 
                            font-sans 
                            text-gray-700 {{ Route::is('dashboard') ? 'bg-blue-600 text-white' : '' }}" 
                            title="Dashboard"
                        >
                            <i class="icofont-presentation-alt"></i>
                        </a>
                    </li>
                    <li class="list-item">
                        <a href="" class="block py-3 text-center 
                            hover:bg-blue-600 
                            hover:text-white 
                            text-2xl font-sans 
                            text-gray-600 {{ Route::is('dashboard/payments') ? 'bg-blue-600 text-white' : '' }}" 
                            title="Payments"
                        >
                            <i class="icofont-coins"></i>
                        </a>
                    </li>
                    <li class="list-item">
                        <a href="" class="block py-3 text-center hover:bg-blue-600 hover:text-white text-2xl font-sans text-gray-600" title="Orders History">
                            <i class="icofont-handshake-deal"></i>
                        </a>
                    </li>
                    <li class="list-item">
                        <a href="" class="block py-3 text-center hover:bg-blue-600 hover:text-white text-2xl font-sans text-gray-600" title="Users">
                            <i class="icofont-users"></i>
                        </a>
                    </li>
                    <li class="list-item">
                        <a href="" class="block py-3 text-center hover:bg-blue-600 hover:text-white text-2xl font-sans text-gray-600" title="Subscriptions">
                            <i class="icofont-credit-card"></i>
                        </a>
                    </li>
                    <li class="list-item">
                        <a href="" class="block py-3 text-center hover:bg-blue-600 hover:text-white text-2xl font-sans text-gray-600" title="Automation">
                            <i class="icofont-automation"></i>
                        </a>
                    </li>
                    <li class="list-item">
                        <a href="" class="block py-3 text-center hover:bg-blue-600 hover:text-white text-2xl font-sans text-gray-600" title="Reports/Logs">
                            <i class="icofont-bug"></i>
                        </a>
                    </li>
                    <li class="list-item mt-4 border-t border-t-gray-200">
                        <a href="" class="block py-2 text-center hover:bg-blue-600 hover:text-white text-2xl font-sans text-gray-600" title="Site Config">
                            </i><i class="icofont-tools-alt-2"></i>
                        </a>
                    </li>

                @endif

                <li class="list-item p-2 mt-2">
                    <a href="" class="block py-1 px-2 text-center bg-blue-700 text-white rounded-md shadow-md" title="Add action">
                        <i class="icofont-plus"></i>
                    </a>
                </li>
            </ul>
        </nav>
    </aside>
    <section class="flex flex-col lg:w-72">
        <aside class="flex flex-col w-full">
            <figure class="bg-gray-200 flex flex-row items-center p-4">
                <div class="shrink-0 flex bg-transparent w-14 h-14 rounded-full border-4 border-white shadow-lg">
                    <img class="w-full h-full" src="{{ asset('images/avatar-male.png') }}" />
                </div>
                <div class="flex flex-col items-start justify-start pl-3 cursor-default">
                    <h1 class="font-bold block 
                        font-heading capitalize 
                        text-gray-800 
                        p-0 m-0 
                        text-xl 
                        truncate lg:w-48 overflow-hidden" 
                        title="{{ Auth::user()->lastname . ', ' . Auth::user()->firstname . ' ' . Auth::user()->middlename }}"
                    >
                        {{ Auth::user()->lastname . ', ' . Auth::user()->firstname . ' ' . Auth::user()->middlename }}</h1>
                    <p class="font-semibold font-sora text-sm m-0 text-gray-500 capitalize">System {{ Auth::user()->userrole }}</p>
                    <p class="text-gray-400 font-sora text-xs">Joined {{ isset($timeago) ? $timeago : 'not long ago' }}</p>
                </div>
            </figure>
            <div class="flex flex-col space-y-8 lg:pt-10 pl-4 pr-4">
                <a href="" class="w-full flex flex-row items-center justify-between space-x-2 {{ Route::is('dashboard') ? 'text-blue-500' : 'text-gray-500 hover:text-blue-500' }}">
                    <div>
                        <span><i class="icofont-pie-chart"></i></span>
                        <span class="m-0">Statistics</span>
                    </div>
                    <div class="flex items-center p-2 h-8 w-8 rounded-md {{ Route::is('dashboard') ? 'text-white bg-blue-400 shadow-md' : 'text-gray-500 bg-white hover:bg-blue-200 hover:text-white' }}">
                        <i class="icofont-rounded-right"></i>
                    </div>
                </a>
                <a href="" class="flex flex-row items-center justify-between space-x-2 {{ Route::is('accomodation') ? 'text-blue-500' : 'text-gray-500 hover:text-blue-500' }}">
                    <div>
                        <span><i class="icofont-bricks"></i></span>
                        <span class="m-0">Apartments/Properties</span>
                    </div>
                    <div class="flex items-center p-2 h-8 w-8 rounded-md {{ Route::is('accomodation') ? 'text-white bg-blue-400 shadow-md' : 'text-gray-500 bg-white hover:bg-blue-200 hover:text-white' }}">
                        <i class="icofont-rounded-right"></i>
                    </div>
                </a>
                <a href="" class="flex flex-row items-center justify-between space-x-2 {{ Route::is('products') ? 'text-blue-500' : 'text-gray-500 hover:text-blue-500' }}">
                    <div>
                        <span><i class="icofont-cart"></i></span>
                        <span class="m-0">Products</span>
                    </div>
                    <div class="flex items-center p-2 h-8 w-8 rounded-md {{ Route::is('products') ? 'text-white bg-blue-400 shadow-md' : 'text-gray-500 bg-white hover:bg-blue-200 hover:text-white' }}">
                        <i class="icofont-rounded-right"></i>
                    </div>
                </a>
                <a href="" class="flex flex-row items-center justify-between space-x-2 {{ Route::is('user/notifications') ? 'text-blue-500' : 'text-gray-500 hover:text-blue-500' }}">
                    <div>
                        <span><i class="icofont-notification"></i></span>
                        <span class="m-0">Notifications</span>
                    </div>
                    <div class="flex items-center p-2 h-8 w-8 rounded-md {{ Route::is('user/notifications') ? 'text-white bg-blue-400 shadow-md' : 'text-gray-500 bg-white hover:bg-blue-200 hover:text-white' }}">
                        <i class="icofont-rounded-right"></i>
                    </div>
                </a>
                <a href="" class="flex flex-row items-center justify-between space-x-2 {{ Route::is('user/notification') ? 'text-blue-500' : 'text-gray-500 hover:text-blue-500' }}">
                    <div>
                        <span><i class="icofont-envelope"></i></span>
                        <span class="m-0">Messages</span>
                    </div>
                    <div class="flex items-center p-2 h-8 w-8 rounded-md {{ Route::is('user/messages') ? 'text-white bg-blue-400 shadow-md' : 'text-gray-500 bg-white hover:bg-blue-200 hover:text-white' }}">
                        <i class="icofont-rounded-right"></i>
                    </div>
                </a>
                <a href="" class="flex flex-row items-center justify-between space-x-2 {{ Route::is('user/contacts') ? 'text-blue-500' : 'text-gray-500 hover:text-blue-500' }}">
                    <div>
                        <span><i class="icofont-notebook"></i></span>
                        <span class="m-0">Contacts list</span>
                    </div>
                    <div class="flex items-center p-2 h-8 w-8 rounded-md {{ Route::is('user/contacts') ? 'text-white bg-blue-400 shadow-md' : 'text-gray-500 bg-white hover:bg-blue-200 hover:text-white' }}">
                        <i class="icofont-rounded-right"></i>
                    </div>
                </a>
                <a href="" class="flex flex-row items-center justify-between space-x-2 {{ Route::is('dashboard/accomodation') ? 'text-blue-500' : 'text-gray-500 hover:text-blue-500' }}">
                    <div>
                        <span><i class="icofont-options"></i></span>
                        <span class="m-0">User settings</span>
                    </div>
                    <div class="flex items-center p-2 h-8 w-8 rounded-md {{ Route::is('user/settings') ? 'text-white bg-blue-400 shadow-md' : 'text-gray-500 bg-white hover:bg-blue-200 hover:text-white' }}">
                        <i class="icofont-rounded-right"></i>
                    </div>
                </a>
            </div>
        </aside>
    </section>
</div>