<x-dash-layout>
    <div class="bg-white my-5 mx-14 shadow-lg h-full rounded border border-gray-300">
        <div class="flex items-center justify-between">
            <h3 class="text-blue-700 text-xl font-bold p-5 border-b border-slate-300"><i
                    class="fa-solid fa-store fa-lg mr-2"></i>Trainer Marketplace</h3>
            <div class="p-3 mr-4 text-xs text-blue-700 cursor-pointer" x-on:click="window.location.reload()">
                <i class="fa-solid fa-arrows-rotate fa-xl mr-2"></i><span class="text-sm">Refresh</span>
            </div>
        </div>

        <div class="bg-blue-600 w-full px-5 py-8">
            <form action="/show-matched/{{ $request_id }}" method="GET">
                <div class="flex justify-center gap-5">
                    <div class="flex flex-col text-xs">
                        <label for="search" class="text-white">Search Trainer</label>
                        <input type="search" id="search" name="search" class="rounded px-3 py-2 w-96"
                            value="{{ $search ?? '' }}">
                    </div>
                    <div class="flex flex-col text-white text-xs items-center">
                        <label for="submit" class="bg-blue-600 text-blue-600">a</label>
                        <button type="submit" id="submit"
                            class="rounded px-3 py-2 w-40 text-gray-900 bg-yellow-400 font-normal hover:bg-yellow-500">Search</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="grid grid-flow-col auto-cols-max px-1 my-4 rounded" x-data="{checked: false}">
            @foreach ($matchedservices as $match)

            <div class="card-container m-3 rounded">
                <div class="w-96 bg-gray-200 rounded-lg shadow-lg overflow-hidden">
                    <div class="p-4">
                        <div class="flex flex-row justify-between">
                            <div>
                                <a href="/show-matched/trainerInfo/{{$match->user_id}}">
                                    <h2
                                        class="text-xl font-bold mb-2 hover:underline hover:text-blue-700 cursor-pointer">
                                        {{ $match->trainer_name }}</h2>
                                </a>
                            </div>
                            <div class="w-20 h-20 rounded-full">
                                <img src="{{ $match->profile_photo ? asset('storage/' . $match->profile_photo) : asset('/images/placeholder.png') }}"
                                    class="rounded-full">
                            </div>
                        </div>
                        <p class="text-xs mb-4"><i class="fa-solid fa-envelope"></i> {{ $match->email }}</p>
                        <p class="text-xs mb-4"><i class="fa-solid fa-location-dot"></i> {{ $match->address }}</p>
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div class="flex justify-start items-center">
                                <i class="text-gray-700 fas fa-chalkboard-teacher mr-2"></i>
                                <p class="text-xs">{{ $match->course }}</p>
                            </div>
                            <div class="flex justify-start items-center">
                                <i class="text-gray-700 fas fa-paw mr-2"></i>
                                <p class="text-xs">{{ $match->pet_type }}</p>
                            </div>
                            <div class="flex justify-start items-center">
                                <i class="fa-solid fa-calendar mr-2"></i>
                                <p class="text-xs">{{ $match->availability }}</p>
                            </div>
                        </div>
                        <div class="flex justify-between items-center mb-4">
                            <p class="text-xs font-bold text-gray-700">Price:</p>
                            <p class="text-xs font-bold text-green-500"><span class="text-xl">₱ {{ $match->price
                                    }}</span></p>
                        </div>
                        <div class="mt-4">
                            <h3 class="text-blue-400 font-bold text-sm">Reviews</h3>
                            <div class="mt-2 flex items-center">
                                <template x-for="i in 5">
                                    <i class="fa-solid fa-star fa-sm text-gray-400"
                                        :class="{'text-yellow-500': (i <= {{$match->avg_rating}})}"></i>
                                </template>
                                <p class="text-xs text-blue-500 mr-3">({{$match->avg_rating}})</p>

                                <div class="text-green-600 text-xs px-2">
                                    @if($match->completedBooking == null)
                                    <i class="fa-solid fa-calendar-check"></i> (0) completed
                                    booking
                                    @else
                                    <i class="fa-solid fa-calendar-check"></i> ({{$match->completedBooking}})
                                    completed
                                    bookings
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="mt-6 flex justify-end gap-3">
                            <a href="/show-matched/training-plan/{{ $match->service_id }}"
                                class="text-xs rounded px-3 py-2 bg-blue-700 text-white my-auto hover:bg-blue-800">View
                                Training Plan</a>
                            <label class="text-xs rounded px-3 py-2 bg-blue-700 text-white my-auto hover:bg-blue-800"
                                for="my-modal-{{ $match->service_id }}">
                                Book now <i class="fa-solid fa-arrow-right ml-2"></i>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            {{-- HERE --}}
            <form method="POST" action="/show-matched/book"
                x-data="{ days: {{ $match->days ?? 0 }}, startDate: '', endDate: '' }">
                @csrf
                <input type="checkbox" id="my-modal-{{ $match->service_id }}" class="modal-toggle h-fit" />
                <div class="modal">
                    <div class="modal-box w-11/12 max-w-2xl rounded">
                        <h3 class="font-bold text-sm tracking-wide p-2 text-left bg-blue-200 text-black rounded">
                            Booking Summary</h3>
                        <div class="flex flex-col text-sm gap-4 m-3">
                            <div class="flex flex-col md:flex-row md:justify-between">
                                <div class="mb-2 md:mb-0">Pet name:</div>
                                <div class="font-bold">{{$match->pet_name}}</div>
                            </div>
                            <div class="flex flex-col md:flex-row md:justify-between">
                                <div class="mb-2 md:mb-0">Client name:</div>
                                <div class="font-bold">{{auth()->user()->name}}</div>
                            </div>
                            <div class="flex flex-col md:flex-row md:justify-between">
                                <div class="mb-2 md:mb-0">Preferred start date:</div>
                                <div><input type="date" name="start_date"
                                        class="border border-gray-300 rounded py-1 px-3 w-full md:w-auto"
                                        x-model="startDate"
                                        x-on:change="endDate = days ? new Date(new Date(startDate).getTime() + days * 24 * 60 * 60 * 1000).toISOString().split('T')[0] : ''" />
                                </div>
                            </div>
                            <div class="flex flex-col md:flex-row md:justify-between items-center">
                                <div class="mb-2 md:mb-0">End date:</div>
                                <div>
                                    <p x-text="endDate" class="py-1 px-3 w-full"></p>
                                </div>
                            </div>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm">
                                <thead class="bg-blue-100">
                                    <tr>
                                        <th class="px-4 py-2 text-left">Trainer name</th>
                                        <th class="px-4 py-2 text-left">Course package</th>
                                        <th class="px-4 py-2 text-left">Availability</th>
                                        <th class="px-4 py-2 text-left">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="px-4 py-2">{{$match->trainer_name}}</td>
                                        <td class="px-4 py-2">{{$match->course}}</td>
                                        <td class="px-4 py-2">{{$match->availability}}</td>
                                        <td class="px-4 py-2">{{$match->price}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="flex flex-col md:flex-row md:justify-between items-center p-5">
                            <div class="font-bold mb-2 md:mb-0">Total Price:</div>
                            <div class="font-bold">{{$match->price}}</div>
                        </div>
                        <div class="flex flex-col gap-4 p-5">
                            <div class="flex items-center">
                                <input type="checkbox" class="border border-blue-700 mr-3" x-model="checked" />
                                <label class="cursor-pointer label whitespace-nowrap text-sm">
                                    I agree to the <a class="text-blue-600 px-2">Terms and Conditions</a> and <a
                                        class="text-blue-600 px-2">Cancellation Policy</a>
                                </label>
                            </div>
                            <div class="text-red-500 text-xs" x-show="!checked">
                                Please agree to the Terms and Conditions and Cancellation Policy to proceed.
                            </div>
                        </div>
                        <div class="modal-action flex justify-end p-4">
                            <label for="my-modal-{{ $match->service_id }}"
                                class="tracking-wide rounded px-5 py-2 border border-gray-300 text-sm text-black font-normal hover:bg-gray-300">Cancel</label>
                            <button type="submit" :disabled="!checked"
                                :class="{ 'bg-gray-400 hover:bg-gray-400': !checked }"
                                class="tracking-wide rounded px-6 py-2 bg-blue-700 text-white text-sm font-normal hover:bg-blue-800">
                                Book Now
                            </button>
                        </div>
                        <input type="hidden" name="pet_id" value="{{ $match->pet_id }}">
                        <input type="hidden" name="client_id" value="{{ auth()->id() }}">
                        <input type="hidden" name="trainer_id" value="{{ $match->user_id }}">
                        <input type="hidden" name="status" value="pending">
                        <input type="hidden" name="end_date" x-model="endDate" />
                        <input type="hidden" name="payment" value="unpaid">
                        <input type="hidden" name="service_id" value="{{$match->service_id}}" />
                        <input type="hidden" name="request_id" value="{{$request_id}}" />
                        <input type="hidden" name="client_name" value="{{auth()->user()->name}}" />
                        <input type="hidden" name="trainer_name" value="{{$match->trainer_name}}" />
                    </div>
                </div>
            </form>

            @endforeach
        </div>
    </div>
</x-dash-layout>