<x-dash-layout>
    <h1 class="my-7 ml-5 text-xl font-bold">Your Matched Trainers</h1>
    <div class="grid grid-cols-3 px-1 bg-base-300 mx-5 rounded-lg" x-data="{checked: false}">
        @forelse ($matchedservices as $match)
        <div class="card-container m-3">
            <div class="card bg-base-100 w-96 shadow-xl">
                <div class="avatar">
                    <div class="mx-auto w-24 rounded-full">
                        <a href="/show-matched/trainerInfo/{{ $match->user_id }}"><img
                                src="/images/avatar/Avatar-9.png" /></a>
                    </div>
                </div>
                <div class="card-body items-center text-center">
                    @php
                    $matchName = DB::table('users')
                    ->where('id', $match->user_id)
                    ->value('name');
                    @endphp
                    <h2 class="card-title">{{ $matchName }}</h2>
                    <p class="text-xs">{{ $match->email }}</p>
                    <p class="text-xs">{{ $match->address }}</p>
                    <div class="card-actions">
                        <button
                            class="tracking-wide rounded-md px-5 py-4 bg-yellow-400 text-black text-sm font-bold border border-black hover:rounded-3xl transition-all duration-400"><a
                                href="/show-matched/training-plan/{{ $match->id }}" target="_blank">View Training
                                Info</a></button>
                        <label for="my-modal-{{ $match->id }}"
                            class="tracking-wide rounded-md px-5 py-4 text-black text-sm font-bold border border-black hover:rounded-3xl transition-all duration-400">Book
                            now<i class="fa-solid fa-arrow-right ml-2"></i></label>
                    </div>
                </div>
            </div>
            <form method="POST" action="/show-matched/book">
                @csrf
                <input type="checkbox" id="my-modal-{{ $match->id }}" class="modal-toggle h-fit" />
                <div class="modal">
                    <div class="modal-box w-5/6" x-data="{ today: '' }">
                        <div class="flex justify-center">
                            <h3 class="font-bold text-2xl tracking-wide p-2">Confirm Booking</h3>
                        </div>
                        <div class="flex flex-col">
                            <div class="bg-base-200 rounded-xl p-3">
                                <p>Service Package: {{ $match->course }}</p>
                                <p>Availabilty: {{ $match->availability }}</p>
                                <p>Pet name: {{ $match->name }}</p>
                            </div>
                        </div>
                        <div class="flex flex-row justify-center">
                            <div class="h-16 w-16 p-2"><img src="/images/warning.png" alt=""></div>
                            <h2 class="my-4 font-bold">Pet Patrol Booking Policy</h2>
                        </div>

                        <input type="hidden" name="pet_id" value="{{ $match->pet_id }}">
                        <input type="hidden" name="client_id" value="{{ auth()->id() }}">
                        <input type="hidden" name="trainer_id" value="{{ $match->user_id }}">
                        <input type="hidden" name="status" value="on going">
                        <input type="hidden" name="date" value="{{ date('Y-m-d') }}">
                        <input type="hidden" name="payment" value="unpaid">
                        <input type="hidden" name="client_name" value="{{auth()->user()->name}}" />

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

    <script>
        const today = new Date();
        const yyyy = today.getFullYear();
        let mm = today.getMonth() + 1; // Months start at 0!
        let dd = today.getDate();

        if (dd < 10) dd = '0' + dd;
        if (mm < 10) mm = '0' + mm;

        const formattedToday = dd + '/' + mm + '/' + yyyy;

        document.getElementById('DATE').value = formattedToday;
    </script>
</x-dash-layout>