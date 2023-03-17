<x-dash-layout>
    <h1 class="my-7 ml-5 text-xl font-bold">Your Matched Trainers</h1>
    <div class="grid grid-cols-3 px-1 bg-base-300 mx-5 rounded-lg" x-data="{checked: false}">
        @forelse ($matchedservices as $match)

        <div class="card-container m-3">
            <div class="w-96 bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-6">

                    <p>User id:{{$match->user_id}}</p>
                    <p>pet_id: {{$match->pet_id}}</p>
                    <h2 class="text-2xl font-bold mb-2">{{ $match->user_name }}</h2>
                    <p class="text-sm mb-4">{{ $match->email }}</p>
                    <p class="text-sm mb-4">{{ $match->address }}</p>
                    <div class="flex justify-between items-center">
                        <p class="text-sm font-bold text-gray-700">Course:</p>
                        <p class="text-sm">{{ $match->course }}</p>
                    </div>
                    <div class="flex justify-between items-center">
                        <p class="text-sm font-bold text-gray-700">Pet type:</p>
                        <p class="text-sm">{{ $match->pet_type }}</p>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <p class="text-sm font-bold text-gray-700">Price:</p>
                        <p class="text-sm font-bold text-green-500"><span class="text-xl">₱ {{ $match->price }}</span>
                        </p>
                    </div>
                    <div class="mt-6 flex justify-end">
                        <button
                            class="px-4 py-2 rounded-full text-white font-bold bg-yellow-400 hover:bg-yellow-500 transition-colors duration-300">
                            <a href="/show-matched/training-plan/{{ $match->service_id }}" target="_blank">View Training
                                Plan</a>
                        </button>
                        <label
                            class="ml-4 px-4 py-2 rounded-full text-black font-bold border border-black hover:bg-gray-200 transition-colors duration-300"
                            for="my-modal-{{ $match->user_id }}">
                            Book now <i class="fa-solid fa-arrow-right ml-2"></i>
                        </label>
                    </div>
                </div>
            </div>

            <form method="POST" action="/show-matched/book">
                @csrf
                <input type="checkbox" id="my-modal-{{ $match->user_id }}" class="modal-toggle h-fit" />
                <div class="modal">
                    <div class="modal-box w-5/6">
                        <div class="flex justify-center">
                            <h3 class="font-bold text-2xl tracking-wide p-2">Confirm Booking</h3>
                        </div>
                        <div class="flex flex-col">
                            <div class="bg-base-200 rounded-xl p-3">
                                {{-- <p class="text-yellow-500">Request ID: {{$request_id}}</p> --}}
                                <p>Service Package: {{ $match->course }}</p>
                                <p>Availabilty: {{ $match->availability }}</p>
                                <p>Pet name: {{ $match->pet_name }}</p>
                            </div>
                            <p>Start date:</p><input type="date" name="start_date"
                                class="border border-gray-300 rounded-lg" />
                        </div>
                        <div class="flex flex-row justify-center">
                            <div class="h-16 w-16 p-2"><img src="/images/warning.png" alt=""></div>
                            <h2 class="my-4 font-bold">Pet Patrol Booking Policy</h2>
                            {{-- <p>Request_id: {{$match->request_id}}</p> --}}
                        </div>

                        <input type="hidden" name="pet_id" value="{{ $match->pet_id }}">
                        <input type="hidden" name="client_id" value="{{ auth()->id() }}">
                        <input type="hidden" name="trainer_id" value="{{ $match->user_id }}">
                        <input type="hidden" name="status" value="pending">
                        <input type="hidden" name="payment" value="unpaid">
                        <input type="hidden" name="service_id" value="{{$match->service_id}}" />
                        <input type="hidden" name="request_id" value="{{$request_id}}" />
                        <input type="hidden" name="client_name" value="{{auth()->user()->name}}" />
                        <input type="hidden" name="trainer_name" value="{{$match->user_name}}" />


                        <ol type="1" style="font-size: 13.5px">
                            <li class="p-2 tracking-wider">1. After the pet trainer's approve
                                training request,
                                cancellation is
                                allowed up to
                                48
                                hours
                                prior to the scheduled training session without penalty.</li>
                            <li class="p-2 tracking-wider">2. Cancellation within 48 hours of the scheduled training
                                session will result in a penalty fee equivalent to 50% of the total cost of the
                                session. If the penalty fee is not paid within 7 days, we reserve the right to take
                                appropriate action, which may include legal action or suspension of services.</li>
                            <li class="p-2 tracking-wider">3. After the pet trainer's approve training request,
                                cancellation within
                                24 hours of
                                the
                                scheduled training session will not be permitted, and the full cost of the
                                session
                                will
                                be
                                charged.</li>
                        </ol>
                        <div class="flex flex-row">
                            <label class="cursor-pointer label">
                                <input type="checkbox" class="checkbox checkbox-warning" x-model="checked" />
                                <span class="label-text ml-5">I agree to the cancellation policy</span>
                            </label>
                        </div>
                        <div class="modal-action flex justify-center">

                            <label for="my-modal-{{ $match->id }}" class="tracking-wide rounded-md px-5 py-4 hover:rounded-3xl border border-black text-sm text-black font-bold
                            transition-all duration-400">Cancel</label>
                            <button type="submit" :disabled="!checked" :class="{'bg-gray-400': !checked}"
                                class="tracking-wide rounded-md px-5 py-4 bg-yellow-400 text-black text-sm font-bold border border-black hover:rounded-3xl transition-all duration-400">Confirm</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        {{-- <label for="my-modal-{{ $match->id }}" class="modal-close"></label> --}}


        @empty
        <p>No matched trainers yet!</p>
        @endforelse
    </div>
</x-dash-layout>