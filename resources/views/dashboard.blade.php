<x-app-layout>
    <x-slot name="title">
        {{ __('Nexday | Application Dashboard') }}
    </x-slot>

    <x-slot name="sidebarLeft">
        <x-sidebar-left :currentPage="$currentPage" :timeago="$timeago" />
    </x-slot>

    <x-slot name="header">
        <h2 class="flex flex-col space-x-0 font-semibold text-xl text-gray-800 leading-tight">
            <span class="font-heading font-bold">{{ __('Dashboard') }}</span>
            <span class="block text-gray-400 text-xs font-normal">Statistics on Sales, invoices, generated income, expenditure and site-wide activity logs</span>
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full grid lg:grid-cols-6 lg:gap-4 sm:gap-2 sm:grid-cols-1">
                <div class="bg-gray-100 lg:col-span-2 sm:col-span-1 rounded-md p-4">
                    <div class="flex items-start justify-start space-x-4">
                        <div class="bg-white text-blue-500 p-3 font-bold text-3xl rounded-md">
                            <i class="icofont-basket"></i>
                        </div>
                        <div class="flex flex-col items-start">
                            <p class="m-0 p-0 text-gray-500">Total In Sales</p>
                            <p class="m-0 p-0 text-gray-600 font-bold font-heading text-xl">NGN400,304.08</p>
                            <p class="text-xs text-gray-400">Incl. Value Added Tax</p>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-100 lg:col-span-2 rounded-md p-4">
                    <div class="flex items-start justify-start space-x-4">
                        <div class="bg-white text-pink-500 p-3 font-bold text-3xl rounded-md">
                            <i class="icofont-files-stack"></i>
                        </div>
                        <div class="flex flex-col items-start">
                            <p class="m-0 p-0 text-gray-500">Total Invoices</p>
                            <p class="m-0 p-0 text-gray-600 font-bold font-heading text-xl">400</p>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-100 lg:col-span-2 rounded-md p-4">
                    <div class="flex items-start justify-start space-x-4">
                        <div class="bg-white text-orange-500 p-3 font-bold text-3xl rounded-md">
                            <i class="icofont-handshake-deal"></i>
                        </div>
                        <div class="flex flex-col items-start">
                            <p class="m-0 p-0 text-gray-500">Total Completed Orders</p>
                            <p class="m-0 p-0 text-gray-600 font-bold font-heading text-xl">#1,400</p>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-100 lg:col-span-2 rounded-md p-4">
                    <div class="flex items-start justify-start space-x-4">
                        <div class="bg-white text-lime-500 p-3 font-bold text-3xl rounded-md">
                            <i class="icofont-pay"></i>
                        </div>
                        <div class="flex flex-col items-start">
                            <p class="m-0 p-0 text-gray-500">Total Expenditure</p>
                            <p class="m-0 p-0 text-gray-600 font-bold font-heading text-xl">NGN150,504.38</p>
                            <p class="text-xs text-gray-400">Incl. Value Added Tax</p>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-100 lg:col-span-2 rounded-md p-4">
                    <div class="flex items-start justify-start space-x-4">
                        <div class="bg-white text-emerald-800 p-3 font-bold text-3xl rounded-md">
                            <i class="icofont-building"></i>
                        </div>
                        <div class="flex flex-col items-start">
                            <p class="m-0 p-0 text-gray-500">Total Apartments</p>
                            <p class="m-0 p-0 text-gray-600 font-bold font-heading text-xl">#150</p>
                            <p class="text-xs text-gray-400">Incl. Value Added Tax</p>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-100 lg:col-span-2 rounded-md p-4">
                    <div class="flex items-start justify-start space-x-4">
                        <div class="bg-white text-cyan-600 p-3 font-bold text-3xl rounded-md">
                            <i class="icofont-shopping-cart"></i>
                        </div>
                        <div class="flex flex-col items-start">
                            <p class="m-0 p-0 text-gray-500">Merchant Shops</p>
                            <p class="m-0 p-0 text-gray-600 font-bold font-heading text-xl">#2100</p>
                            <p class="text-xs text-gray-400">Incl. Non-reviewed</p>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-100 lg:col-span-2 rounded-md p-4">
                    <div class="flex items-start justify-start space-x-4">
                        <div class="bg-white text-purple-700 p-3 font-bold text-3xl rounded-md">
                            <i class="icofont-users-alt-5"></i>
                        </div>
                        <div class="flex flex-col items-start">
                            <p class="m-0 p-0 text-gray-500">Total Registered Users</p>
                            <p class="m-0 p-0 text-gray-600 font-bold font-heading text-xl">#{{ $totalUsers }}</p>
                            <p class="text-xs text-gray-400">Incl. Suspended</p>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-100 lg:col-span-2 rounded-md p-4">
                    <div class="flex items-start justify-start space-x-4">
                        <div class="bg-white text-rose-700 p-3 font-bold text-3xl rounded-md">
                            <i class="icofont-credit-card"></i>
                        </div>
                        <div class="flex flex-col items-start">
                            <p class="m-0 p-0 text-gray-500">Total Subscriptions</p>
                            <p class="m-0 p-0 text-gray-600 font-bold font-heading text-xl">#50</p>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-100 lg:col-span-2 rounded-md p-4">
                    <div class="flex items-start justify-start space-x-4">
                        <div class="bg-white text-yellow-600 p-3 font-bold text-3xl rounded-md">
                            <i class="icofont-box"></i>
                        </div>
                        <div class="flex flex-col items-start">
                            <p class="m-0 p-0 text-gray-500">Total Products</p>
                            <p class="m-0 p-0 text-gray-600 font-bold font-heading text-xl">#5000</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-row sm:flex-wrap justify-around items-start mt-12">
                <div class="bg-gray-200 flex flex-col space-y-2 lg:w-2/3 sm:w-full rounded-md">
                    <h2 class="text-gray-800  lg:p-4 sm:p-2">
                        <span class="font-bold font-heading text-xl">Sales Analytics</span>
                        <p class="text-gray-500 text-xs">Graphical representation of sales for the given period</p>
                    </h2>
                    <canvas id="salesGraph" class="w-full h-64 bg-white border border-gray-300 rounded-b-md m-0"></canvas>
                </div>
                <div class="bg-gray-100 flex flex-col space-x-2 lg:w-1/3 sm:w-full rounded-md">
                    <h2 class=" text-gray-800  lg:p-4 sm:p-2">
                        <span class="font-bold font-heading text-xl">Recent Transactions</span>
                        <p class="text-gray-500 text-xs">Graphical representation of sales for the given period</p>
                    </h2>
                </div>
            </div>


        </div>
    </div>
</x-app-layout>

<script type="text/javascript">
    const ctx = document.getElementById('salesGraph').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
