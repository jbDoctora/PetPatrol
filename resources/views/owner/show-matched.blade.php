{{-- <x-dash-layout>
    <h1 class="my-7 ml-5 text-xl font-bold">Your Matched Trainers</h1>

    <div class="grid grid-flow-col auto-cols-max px-1 bg-base-300 mx-5 rounded-lg" x-data="{checked: false}">
        @foreach ($matchedservices as $match)

        <div class="card-container m-3">
            <div class="w-96 bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-6">
                    <a href="/show-matched/trainerInfo/{{$match->user_id}}">
                        <h2 class="text-2xl font-bold mb-2">{{ $match->trainer_name }}</h2>
                    </a>
                    <p class="text-sm mb-4">{{ $match->email }}</p>
                    <p class="text-sm mb-4">{{ $match->address }}</p>
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div class="flex justify-start items-center">
                            <i class="text-gray-700 fas fa-chalkboard-teacher mr-2"></i>
                            <p class="text-sm">{{ $match->course }}</p>
                        </div>
                        <div class="flex justify-start items-center">
                            <i class="text-gray-700 fas fa-paw mr-2"></i>
                            <p class="text-sm">{{ $match->pet_type }}</p>
                        </div>
                    </div>
                    <div class="flex justify-between items-center mb-4">
                        <p class="text-sm font-bold text-gray-700">Price:</p>
                        <p class="text-sm font-bold text-green-500"><span class="text-xl">₱ {{ $match->price
                                }}</span></p>
                    </div>
                    <div class="mt-4">
                        <h3 class="text-blue-400 font-bold">Reviews</h3>
                        <div class="mt-2 flex items-center">
                            <div class="rating">
                                <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" />
                                <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" checked />
                                <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" />
                                <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" />
                                <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" />
                            </div>
                            <p class="text-sm text-blue-500 mr-2">(2)</p>
                        </div>
                    </div>
                    <div class="mt-6 flex justify-end">
                        <a href="/show-matched/training-plan/{{ $match->service_id }}"
                            class="px-4 py-2 rounded-full text-white font-bold bg-yellow-400 hover:bg-yellow-500 transition-colors duration-300">View
                            Training Plan</a>
                        <label
                            class="ml-4 px-4 py-2 rounded-full text-black font-bold border border-black hover:bg-gray-200 transition-colors duration-300"
                            for="my-modal-{{ $match->user_id }}">
                            Book now <i class="fa-solid fa-arrow-right ml-2"></i>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <form method="POST" action="/show-matched/book">
            @csrf
            <input type="checkbox" id="my-modal-{{ $match->user_id }}" class="modal-toggle h-fit" />
            <div class="modal">
                <div class="modal-box w-5/6">
                    <h3 class="font-bold text-2xl tracking-wide p-2 text-center">Confirm Booking</h3>
                    <div class="flex flex-col">
                        <div class="bg-base-200 rounded-xl p-3">
                            <p>Service Package: {{ $match->course }}</p>
                            <p>Availabilty: {{ $match->availability }}</p>
                            <p>Pet name: {{ $match->pet_name }}</p>
                        </div>
                        <p>Preferred start date:</p><input type="date" name="start_date"
                            class="border border-gray-300 rounded-lg py-2" />
                    </div>
                    <div class="flex flex-row justify-center">
                        <div class="h-16 w-16 p-2"><img src="/images/warning.png" alt=""></div>
                        <h2 class="my-4 font-bold">Pet Patrol Booking Policy</h2>
                    </div>

                    <input type="hidden" name="pet_id" value="{{ $match->pet_id }}">
                    <input type="hidden" name="client_id" value="{{ auth()->id() }}">
                    <input type="hidden" name="trainer_id" value="{{ $match->user_id }}">
                    <input type="hidden" name="status" value="pending">
                    <input type="hidden" name="payment" value="unpaid">
                    <input type="hidden" name="service_id" value="{{$match->service_id}}" />
                    <input type="hidden" name="request_id" value="{{$request_id}}" />
                    <input type="hidden" name="client_name" value="{{auth()->user()->name}}" />
                    <input type="hidden" name="trainer_name" value="{{$match->trainer_name}}" />

                    <div class="flex flex-row">
                        <label class="cursor-pointer label">
                            <input type="checkbox" class="checkbox checkbox-warning" x-model="checked" />
                            <span class="label-text ml-5">I agree to the cancellation policy</span>
                        </label>
                    </div>
                    <div class="modal-action flex justify-center">

                        <label for="my-modal-{{ $match->user_id }}" class="tracking-wide rounded-md px-5 py-4 hover:rounded-3xl border border-black text-sm text-black font-bold
                                    transition-all duration-400">Cancel</label>
                        <button type="submit" :disabled="!checked" :class="{'bg-gray-400': !checked}"
                            class="tracking-wide rounded-md px-5 py-4 bg-yellow-400 text-black text-sm font-bold border border-black hover:rounded-3xl transition-all duration-400">Confirm</button>
                    </div>
                </div>
            </div>
        </form>
        @endforeach
    </div>




</x-dash-layout> --}}
<x-dash-layout>
    <h1 class="my-7 ml-5 text-xl font-bold">Your Matched Trainers</h1>
    <div class="grid grid-flow-col auto-cols-max px-1 bg-base-300 mx-5 rounded-lg" x-data="{checked: false}">
        @foreach ($matchedservices as $match)

        <div class="card-container m-3">
            <div class="w-96 bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-6">
                    <a href="/show-matched/trainerInfo/{{$match->user_id}}">
                        <h2 class="text-2xl font-bold mb-2">{{ $match->trainer_name }}</h2>
                    </a>
                    <p class="text-sm mb-4">{{ $match->email }}</p>
                    <p class="text-sm mb-4">{{ $match->address }}</p>
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div class="flex justify-start items-center">
                            <i class="text-gray-700 fas fa-chalkboard-teacher mr-2"></i>
                            <p class="text-sm">{{ $match->course }}</p>
                        </div>
                        <div class="flex justify-start items-center">
                            <i class="text-gray-700 fas fa-paw mr-2"></i>
                            <p class="text-sm">{{ $match->pet_type }}</p>
                        </div>
                    </div>
                    <div class="flex justify-between items-center mb-4">
                        <p class="text-sm font-bold text-gray-700">Price:</p>
                        <p class="text-sm font-bold text-green-500"><span class="text-xl">₱ {{ $match->price
                                }}</span></p>
                    </div>
                    <div class="mt-4">
                        <h3 class="text-blue-400 font-bold">Reviews</h3>
                        <div class="mt-2 flex items-center">
                            <div class="rating">
                                <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" />
                                <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" checked />
                                <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" />
                                <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" />
                                <input type="radio" name="rating-2" class="mask mask-star-2 bg-orange-400" />
                            </div>
                            <p class="text-sm text-blue-500 mr-2">(2)</p>
                        </div>
                    </div>
                    <div class="mt-6 flex justify-end">
                        <a href="/show-matched/training-plan/{{ $match->service_id }}"
                            class="px-4 py-2 rounded-full text-white font-bold bg-yellow-400 hover:bg-yellow-500 transition-colors duration-300">View
                            Training Plan</a>
                        <label
                            class="ml-4 px-4 py-2 rounded-full text-black font-bold border border-black hover:bg-gray-200 transition-colors duration-300"
                            for="my-modal-{{ $match->user_id }}">
                            Book now <i class="fa-solid fa-arrow-right ml-2"></i>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <form method="POST" action="/show-matched/book">
            @csrf
            <input type="checkbox" id="my-modal-{{ $match->user_id }}" class="modal-toggle h-fit" />
            <div class="modal">
                <div class="modal-box w-5/6">
                    <h3 class="font-bold text-2xl tracking-wide p-2 text-center bg-yellow-400 text-white rounded-t-lg">
                        Confirm Booking</h3>
                    <div class="flex flex-col p-4">
                        <div class="bg-base-200 rounded-xl p-3 mb-4">
                            <p class="text-lg font-bold mb-2">Service Package:</p>
                            <p class="text-sm">{{ $match->course }}</p>
                        </div>
                        <div class="bg-base-200 rounded-xl p-3 mb-4">
                            <p class="text-lg font-bold mb-2">Availability:</p>
                            <p class="text-sm">{{ $match->availability }}</p>
                        </div>
                        <div class="bg-base-200 rounded-xl p-3 mb-4">
                            <p class="text-lg font-bold mb-2">Pet name:</p>
                            <p class="text-sm">{{ $match->pet_name }}</p>
                        </div>
                        <div class="mb-4"> <label for="start_date" class="text-lg font-bold mb-2">Preferred start
                                date:</label> <input type="date" name="start_date"
                                class="border border-gray-300 rounded-lg py-2 px-3 w-full" /> </div>
                        <div class="flex flex-row justify-center mb-4">
                            <div class="h-16 w-16 p-2"><img src="/images/warning.png" alt=""></div>
                            <h2 class="my-4 font-bold">Pet Patrol Booking Policy</h2>
                        </div>
                        <div class="mb-4">
                            <h3 class="text-lg font-bold mb-2">Cancellation Policy:</h3>
                            <p class="text-sm">Cancellations made less than 24 hours before the scheduled appointment
                                will be charged 50% of the total fee.</p>
                        </div>
                        <div class="flex flex-row"> <label class="cursor-pointer label"> <input type="checkbox"
                                    class="checkbox checkbox-warning" x-model="checked" /> <span
                                    class="label-text ml-5">I agree to the cancellation policy</span> </label> </div>
                    </div>
                    <div class="modal-action flex justify-center bg-gray-100 rounded-b-lg p-4"> <label
                            for="my-modal-{{ $match->user_id }}"
                            class="tracking-wide rounded-md px-5 py-4 hover:rounded-3xl border border-black text-sm text-black font-bold transition-all duration-400">Cancel</label>
                        <button type="submit" :disabled="!checked" :class="{'bg-gray-400': !checked}"
                            class="tracking-wide rounded-md px-5 py-4 bg-yellow-400 text-black text-sm font-bold border border-black hover:rounded-3xl transition-all duration-400">Confirm</button>
                    </div> <input type="hidden" name="pet_id" value="{{ $match->pet_id }}"> <input type="hidden"
                        name="client_id" value="{{ auth()->id() }}"> <input type="hidden" name="trainer_id"
                        value="{{ $match->user_id }}"> <input type="hidden" name="status" value="pending"> <input
                        type="hidden" name="payment" value="unpaid"> <input type="hidden" name="service_id"
                        value="{{$match->service_id}}" /> <input type="hidden" name="request_id"
                        value="{{$request_id}}" /> <input type="hidden" name="client_name"
                        value="{{auth()->user()->name}}" /> <input type="hidden" name="trainer_name"
                        value="{{$match->trainer_name}}" />
                </div>
            </div>
        </form> @endforeach
    </div>
</x-dash-layout>