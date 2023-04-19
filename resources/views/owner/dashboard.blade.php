<x-dash-layout>
    <div class="grid grid-cols-12 gap-6 m-5 bg-gray-20 p-5">
        <div class="col-span-12 md:col-span-8 xl:col-span-9">

            <!-- Bookings Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 mt-6">
                <!-- Total Completed Bookings Card -->
                <a href="/trainer/bookings?search=&status=completed&pet_type=&start_date=&end_date=">
                    <div class="bg-green-100 rounded shadow-md p-6">
                        <div class="text-sm font-medium text-gray-800"><i
                                class="fa-solid fa-calendar-check pr-3"></i>Total
                            Completed Bookings</div>
                        <div class="mt-4 flex items-center justify-between">
                            <div class="text-4xl font-bold text-gray-800">2</div>
                            <div class="text-sm font-medium text-gray-500">Total</div>
                        </div>
                    </div>
                </a>

                <!-- Pending Bookings Card -->
                <a href="/trainer/bookings?search=&status=pending&pet_type=&start_date=&end_date=">
                    <div class="bg-yellow-100 rounded shadow-md p-6">
                        <div class="text-sm font-medium text-gray-800"><i class="fa-solid fa-calendar pr-3"></i>Pending
                            Bookings
                        </div>
                        <div class="mt-4 flex items-center justify-between">
                            <div class="text-4xl font-bold text-gray-800">2</div>
                            <div class="text-sm font-medium text-gray-500">Total</div>
                        </div>
                    </div>
                </a>

                <!-- In Progress Bookings Card -->
                <a href="/trainer/bookings?search=&status=in+progress&pet_type=&start_date=&end_date=">
                    <div class="bg-blue-100 rounded shadow-md p-6">
                        <div class="text-sm font-medium text-gray-800"><i class="fa-solid fa-calendar-days pr-3"></i>In
                            Progress
                            Bookings</div>
                        <div class="mt-4 flex items-center justify-between">
                            <div class="text-4xl font-bold text-gray-800">2</div>
                            <div class="text-sm font-medium text-gray-500">Total</div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Calendar -->
            <div class="mt-6 bg-white rounded shadow-md p-6">
                <div id="owner-calendar"></div>
            </div>
        </div>

        <!-- Recent Bookings -->
        <div class="col-span-12 md:col-span-4 xl:col-span-3">
            <div class="bg-white rounded shadow-md p-6">
                <div class="text-lg font-medium text-gray-800">Recent Bookings</div>
                <div class="mt-4 space-y-4">
                    <div class="flex items-center justify-between">
                        <div class="text-sm font-medium text-gray-500">April 14, 2023</div>
                        <div class="text-sm font-medium text-green-500">$120</div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="text-sm font-medium text-gray-500">April 12, 2023</div>
                        <div class="text-sm font-medium text-green-500">$80</div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="text-sm font-medium text-gray-500">April 10, 2023</div>
                        <div class="text-sm font-medium text-green-500">$50</div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="text-sm font-medium text-gray-500">April 8, 2023</div>
                        <div class="text-sm font-medium text-green-500">$90</div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="text-sm font-medium text-gray-500">April 6, 2023</div>
                        <div class="text-sm font-medium text-green-500">$75</div>
                    </div>
                    <div class="flex justify-end">
                        <a href="#" class="text-sm font-medium text-gray-500 hover:text-gray-700">
                            See all
                        </a>
                    </div>
                </div>
            </div>
            <!-- Total Money Card -->
            <div class="bg-white rounded shadow-md p-6 mt-6">
                <div class="text-lg font-medium text-gray-800">Total Money to be Collected</div>
                <div class="mt-4 flex items-center justify-between">
                    <div class="text-4xl font-bold text-gray-800">$1,475</div>
                    <div class="text-sm font-medium text-gray-500">This Month</div>
                </div>
            </div>


        </div>
    </div>
</x-dash-layout>