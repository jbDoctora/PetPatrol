<x-trainer-layout>
    <div class="grid grid-cols-12 gap-6 md:gap-4 mx-5 mt-2 bg-gray-200 p-5 rounded">
        <div class="col-span-12 md:col-span-8 xl:col-span-9">

            <!-- Trainer Rating Card -->
            <div class="bg-white rounded shadow-md p-6"
                style="background-image: url('/images/rating.png'); background-position: left; background-size: contain; background-repeat: no-repeat; object-fit: fill; width: 400; height:400;">
                <div class="flex flex-col items-center justify-center">
                    <div class="text-2xl font-medium text-gray-800 mb-2">Overall Rating</div>
                    <div class="flex items-center justify-center mb-4">
                        <div class="flex items-center mr-2">
                            <template x-for="i in 5">
                                <i class="fa-solid fa-star fa-sm text-gray-400"
                                    :class="{'text-yellow-500': (i <= {{$avg_rating}})}"></i>
                            </template>
                        </div>
                        <span class="text-lg font-bold text-gray-800">{{$avg_rating}}</span>
                    </div>
                    <div class="text-gray-500 mb-2">Based on {{$count_ratings}} reviews</div>
                    <label for="reviews-modal" class="text-blue-500 hover:text-blue-700">View All Reviews</label>
                    <input type="checkbox" id="reviews-modal" class="modal-toggle" />
                    <div class="modal">
                        <div class="modal-box relative rounded">
                            <label for="reviews-modal" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                            <h3 class="text-lg font-bold">Trainer Reviews</h3>
                            <div class="flex flex-col gap-1">
                                @foreach($trainer as $rate)

                                <div class="p-3 m-3 border border-gray-300 rounded">
                                    <div class="flex items-center gap-5 my-2">
                                        <div class="w-9 h-9 rounded-full">
                                            <img
                                                src="{{ $rate->profile_photo ? asset('storage/' . $rate->profile_photo) : asset('/images/placeholder.png') }}">
                                        </div>
                                        <p>{{$rate->name}}</p>
                                    </div>
                                    <template x-for="i in 5" class="my-2">
                                        <i class="fa-solid fa-star fa-sm text-gray-400"
                                            :class="{'text-yellow-500': (i <= {{$rate->stars}})}"></i>
                                    </template>
                                    <p class="text-justify text-sm">{{$rate->comment}}</p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bookings Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 mt-6">
                <!-- Total Completed Bookings Card -->
                <a href="/trainer/bookings?search=&status=completed&pet_type=&start_date=&end_date=">
                    <div class="bg-green-100 rounded shadow-md p-6">
                        <div class="text-sm font-medium text-gray-800 sm:text-xs"><i
                                class="fa-solid fa-calendar-check pr-3"></i>Total
                            Completed Bookings</div>
                        <div class="mt-4 flex items-center justify-between">
                            <div class="text-4xl font-bold text-gray-800">{{$completed}}</div>
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
                            <div class="text-4xl font-bold text-gray-800">{{$pending}}</div>
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
                            <div class="text-4xl font-bold text-gray-800">{{$inprogress}}</div>
                            <div class="text-sm font-medium text-gray-500">Total</div>
                        </div>
                    </div>
                </a>
            </div>


            {{-- latest bookings --}}
            <div class="bg-white my-5 p-3">
                <div class="flex justify-between items-center">
                    <h3 class="text-lg">Bookings</h3>
                    <a href="/trainer/bookings" class="text-sm text-blue-600">View All bookings</a>
                </div>
                <table class="table w-full mt-3 text-xs">
                    <thead>
                        <tr>
                            <th>Reference Code</th>
                            <th>Client Name</th>
                            <th>Payment Status</th>
                            <th>Status</th>
                            <th>Schedule</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($all_pending as $pending)
                        <tr>
                            <td>{{$pending->code}}</td>
                            <td>{{$pending->client_name}}</td>
                            <td>{{$pending->payment}}</td>
                            <td>{{$pending->status}}</td>
                            <td>{{$pending->start_date}} - {{$pending->end_date}}</td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

        </div>

        <!-- Recent Bookings -->
        <div class="col-span-12 md:col-span-4 xl:col-span-3">
            <div class="bg-white rounded shadow-md p-6">
                <div class="text-lg font-medium text-gray-800">Training Class</div>
                <div class="mt-4 space-y-4">
                    <div class="flex flex-col items-center justify-center">
                        <div class="p-3 font-bold text-4xl">{{$services}}</div>
                        <div class="text-sm">Available Training Class</div>
                    </div>

                    <div class="flex justify-end">
                        <a href="/trainer/service/add" class="text-xs font-medium text-gray-500 hover:text-blue-700">
                            See all
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-trainer-layout>