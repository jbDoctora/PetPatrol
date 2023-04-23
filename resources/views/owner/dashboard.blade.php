<x-dash-layout>
    <div class="bg-blue-500 rounded shadow-md p-6 my-3 mx-5 mt-5 flex justify-between">
        <div class="text-3xl font-bold text-white mb-3" x-data="{ firstName: '' }">
            Welcome back,
            <div class="text-xl font-medium text-white">{{auth()->user()->name}}
            </div>
        </div>

        <div class="inline-block align-baseline text-white text-sm mb-auto">
            <a href="/profile" class="hover:text-yellow-300"><i class="fa-solid fa-gear pr-2"></i>Settings</a>
        </div>

    </div>
    <div class="grid grid-cols-12 gap-6 mx-5 mb-5 bg-gray-20 p-5">
        <div class="col-span-12 md:col-span-8 xl:col-span-9">

            <!-- Bookings Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 mt-6">
                <!-- Total Completed Bookings Card -->
                <a href="/bookings?search=&status=completed&pet_type=&start_date=&end_date=">
                    <div class="bg-green-100 rounded shadow-md p-6">
                        <div class="text-sm font-medium text-gray-800"><i
                                class="fa-solid fa-calendar-check pr-3"></i>Total
                            Completed Bookings</div>
                        <div class="mt-4 flex items-center justify-between">
                            <div class="text-4xl font-bold text-gray-800">{{$completed}}</div>
                            <div class="text-sm font-medium text-gray-500">Total</div>
                        </div>
                    </div>
                </a>

                <!-- Pending Bookings Card -->
                <a href="/bookings?search=&status=pending&pet_type=&start_date=&end_date=">
                    <div class="bg-yellow-100 rounded shadow-md p-6">
                        <div class="text-sm font-medium text-gray-800"><i class="fa-solid fa-calendar pr-3"></i>Pending
                            Bookings
                        </div>
                        <div class="mt-4 flex items-center justify-between">
                            <div class="text-4xl font-bold text-gray-800">{{$pending}}</div>
                            <div class="text-sm font-medium text-gray-500">Total</div>
                        </div>
                    </div>
                </a>

                <!-- In Progress Bookings Card -->
                <a href="/bookings?search=&status=in+progress&pet_type=&start_date=&end_date=">
                    <div class="bg-blue-100 rounded shadow-md p-6">
                        <div class="text-sm font-medium text-gray-800"><i class="fa-solid fa-calendar-days pr-3"></i>In
                            Progress
                            Bookings</div>
                        <div class="mt-4 flex items-center justify-between">
                            <div class="text-4xl font-bold text-gray-800">{{$inprogress}}</div>
                            <div class="text-sm font-medium text-gray-500">Total</div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Calendar -->
            <div class="mt-6 bg-white rounded shadow-md p-6">
                <div id="calendar"></div>
            </div>
        </div>

        <!-- Recent Bookings -->
        <div class="col-span-12 md:col-span-4 xl:col-span-3">
            <div class="bg-white rounded shadow-md p-6">
                <div class="text-lg font-medium text-gray-800">Pending Request</div>
                <div class="mt-4 space-y-4">
                    @forelse($request as $req)
                    <div class="flex items-center justify-between">
                        <div class="text-xs font-medium text-gray-500">{{$req->pet_name}}</div>
                        <div class="text-xs font-medium text-green-500">{{$req->course}}</div>
                    </div>
                    @empty
                    <div class="flex items-center justify-center text-sm">No Pending request</div>
                    @endforelse
                    <div class="flex justify-end">
                        <a href="/request" class="text-sm font-medium text-gray-500 hover:text-blue-700">
                            See all
                        </a>
                    </div>
                </div>
            </div>


        </div>
    </div>
</x-dash-layout>