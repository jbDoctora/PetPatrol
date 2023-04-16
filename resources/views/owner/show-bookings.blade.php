<x-dash-layout>
    <div class="bg-white my-5 mx-14 shadow-lg h-full rounded">
        <h1 class="text-2xl font-extrabold p-4 border-b border-slate-300 text-blue-700">Booking Manager</h1>
        <form action="/bookings" method="GET">
            <div class="flex flex-row justify-start gap-3 text-xs py-3 px-4 border-b border-slate-300">
                <div class="shrink border border-slate-300 bg-base-300 rounded flex items-center">
                    <input type="text" placeholder="Search" name="search"
                        class="px-6 py-2 bg-base-300 rounded-sm h-full text-xs w-80 md:w-52"
                        value="{{ request('search') }}" />
                </div>
                <div>
                    <select class="border border-slate-300 h-full px-3 py-2 text-left w-64 sm:w-40 rounded"
                        name="status">
                        <option value="" {{ request('status')=='' ? 'selected' : '' }}>Status(All)</option>
                        <option value="pending" {{ request('status')=='pending' ? 'selected' : '' }}>Pending</option>
                        <option value="approved" {{ request('status')=='approved' ? 'selected' : '' }}>Approved</option>
                        <option value="declined" {{ request('status')=='declined' ? 'selected' : '' }}>Declined</option>
                        <option value="completed" {{ request('status')=='completed' ? 'selected' : '' }}>Completed
                        </option>
                    </select>
                </div>
                <div>
                    <select class="border border-slate-300 h-full rounded px-3 py-2 text-left w-56" name="pet_type"
                        value="{{ request('pet_type') }}">
                        <option value="">Pet type (All)</option>
                        <option value="Dog" {{request('pet_type')=='Dog' ? 'selected' : '' }}>Dog</option>
                        <option value="Cat" {{request('pet_type')=='Cat' ? 'selected' : '' }}>Cat</option>
                        <option value="Parrot" {{request('pet_type')=='Parrot' ? 'selected' : '' }}>Parrot</option>
                        <option value="Hamster" {{request('pet_type')=='Hamster' ? 'selected' : '' }}>Hamster</option>
                    </select>
                </div>
                <div>
                    <label class="mx-2">From</label><input type="date" name="start_date"
                        value="{{ request('start_date') }}"
                        class="border border-slate-300 h-full rounded px-3 py-2 text-left w-56" />
                </div>
                <div>
                    <label class="mx-2">To</label>
                    <input type="date" name="end_date"
                        class="border border-slate-300 h-full rounded px-3 py-2 text-left w-56"
                        value="{{ request('end_date') }}" />
                </div>
                <div>
                    <button type="submit" class="bg-blue-700 px-7 py-3 text-white rounded">
                        <i class="fa-solid fa-filter fa-lg pr-3"></i>Filter
                    </button>
                </div>
            </div>
        </form>

        <div class="flex justify-between items-center border-b border-slate-300">
            <div class="py-3 px-4 text-sm flex items-center gap-5">
                <div>
                    <p>
                        <span class="font-bold text-sm">
                            {{ $filteredCount}}
                        </span>
                        booking/s found
                    </p>
                </div>
            </div>
            <div class="p-3 text-xs text-blue-700 cursor-pointer" x-on:click="window.location.reload()">
                <i class="fa-solid fa-arrows-rotate fa-xl mr-2"></i><span class="text-sm">Refresh</span>
            </div>
        </div>

        <div class="flex flex-col gap-3 my-3 py-3">
            @forelse($request as $requests)
            <div class="flex flex-row justify-between gap-2 bg-gray-200 rounded mx-4">
                <div class="flex flex-col gap-3 p-3 w-96">
                    <a href="/bookings/{{$requests->book_id}}">
                        <h2 class="font-bold text-xl hover:text-blue-600">{{$requests->course}}</h2>
                    </a>
                    <p class="text-sm">Reference #: {{$requests->code}}</p>
                    <p class="text-sm">Pet: {{$requests->pet_name}}</p>
                    <p class="text-sm">Trainer: {{$requests->trainer_name}}</p>
                    <p class="text-sm">Session: {{$requests->availability}}</p>
                    <p class="text-sm">Schedule: {{$requests->start_date}} - {{$requests->end_date}}
                    </p>
                </div>
                <div class="flex items-center justify-center w-80 gap-3">
                    @if ($requests->status == 'pending')
                    <span class="badge bg-yellow-400 text-black text-xs border-none">
                        <i class="fa-solid fa-hourglass pr-1"></i>{{ $requests->status }}
                    </span> |
                    @elseif ($requests->status == 'approved')
                    <span class="badge bg-green-400 text-black text-xs border-none">
                        <i class="fa-solid fa-thumbs-up pr-1"></i>{{ $requests->status }}
                    </span> |
                    @elseif ($requests->status == 'declined')
                    <span class="badge bg-red-400 text-black text-xs">
                        <i class="fa-solid fa-times pr-1"></i>{{ $requests->status }}
                    </span> |
                    @elseif ($requests->status == 'in progress')
                    <span class="badge bg-blue-400 text-blue-800 text-xs">
                        <i class="fa-solid fa-hourglass-end pr-1"></i>{{ $requests->status }}
                    </span> |
                    @elseif ($requests->status == 'completed')
                    <span class="badge bg-green-400 text-green-800 text-xs">
                        <i class="fa-solid fa-check pr-1"></i>{{ $requests->status }}
                    </span> |
                    @elseif ($requests->status == 'confirmed')
                    <span class="badge bg-blue-700 text-white text-xs">
                        <i class="fa-solid fa-check pr-1"></i>{{ $requests->status }}
                    </span> |
                    @endif

                    @if ($requests->payment == 'unpaid')
                    <span class="badge bg-yellow-400 text-black text-xs border-none">
                        <i class="fa-solid fa-exclamation-triangle pr-1"></i>{{ $requests->payment }}
                    </span>
                    @elseif ($requests->payment == 'paid')
                    <span class="badge bg-green-400 text-black text-xs border-none">
                        <i class="fa-solid fa-check pr-1"></i>{{ $requests->payment }}
                    </span>
                    @endif
                </div>

                @if($requests->status == 'approved')
                <div class="flex items-center justify-center px-5 text-xs w-80 gap-3">
                    <a href="/bookings/{{$requests->book_id}}">
                        <button class="bg-blue-700 py-2 px-3 rounded hover:bg-blue-800 text-white cursor-pointer"><i
                                class="fa-solid fa-pen-to-square pr-3 fa-lg"></i>View</button>
                    </a>
                    <a href="/checkout/{{$requests->book_id}}">
                        <button type="button" class="bg-blue-700 py-2 px-3 rounded hover:bg-blue-800 text-white">
                            <i class="fa-solid fa-hand-holding-dollar fa-lg pr-3"></i>Pay
                        </button>
                    </a>
                </div>
                @elseif($requests->status == 'declined')
                <div class="flex items-center justify-center px-5 text-xs w-80 gap-3">

                </div>
                @elseif($requests->status == 'in progress' || $requests->status == 'pending')
                <div class="flex items-center justify-center px-5 text-xs w-80 gap-3">
                    <a href="/bookings/{{$requests->book_id}}">
                        <button class="bg-blue-700 py-2 px-3 rounded hover:bg-blue-800 text-white cursor-pointer"><i
                                class="fa-solid fa-pen-to-square pr-3 fa-lg"></i>View</button>
                    </a>
                    <a href="/checkout/{{$requests->book_id}}">
                        <button type="button" class="bg-blue-700 py-2 px-3 rounded hover:bg-blue-800 text-white">
                            <i class="fa-solid fa-hand-holding-dollar fa-lg pr-3"></i>Pay
                        </button>
                    </a>
                </div>
                {{-- Rating form --}}
                @elseif($requests->status == 'completed')

                @if($requests->isRated == 1)
                <div class="flex items-center justify-center px-5 text-xs w-80 gap-3">
                    <label class="hover:text-blue-700 text-sm">Done rating
                        Trainer</label>
                </div>
                @else
                <div class="flex items-center justify-center px-5 text-xs w-80 gap-3">
                    <label for="rating-modal-{{$requests->book_id}}" class="hover:text-blue-700 text-sm"><i
                            class="fa-solid fa-star fa-md pr-2"></i>Rate
                        Trainer</label>
                </div>
                @endif



                <input type="checkbox" id="rating-modal-{{$requests->book_id}}" class="modal-toggle" />
                <div class="modal">
                    <div class="modal-box relative rounded">
                        <label for="rating-modal-{{$requests->book_id}}"
                            class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                        <h3 class="text-lg font-bold">Rate Your Trainer</h3>
                        <p class="py-4 text-sm">Please give your trainer a rating and provide any feedback or comments
                            below:
                        </p>
                        <form class="flex flex-col" action="/bookings/add-rating" method="POST">
                            @csrf
                            <input type="hidden" name="service_id" value="{{$requests->service_id}}">
                            <input type="hidden" name="trainer_id" value="{{$requests->trainer_id}}">
                            <input type="hidden" name="client_id" value="{{$requests->client_id}}">
                            <input type="hidden" name="book_id" value="{{$requests->book_id}}">
                            {{-- <input type="hidden" name="date_created" id="date_created"> --}}
                            <div class="flex items-center mb-4">
                                <span class="text-sm mr-2">Rating:</span>
                                <div class="rating rating-md">
                                    <input type="radio" name="stars" value="1" class="mask mask-star-2 bg-orange-400" />
                                    <input type="radio" name="stars" value="2" class="mask mask-star-2 bg-orange-400" />
                                    <input type="radio" name="stars" value="3" class="mask mask-star-2 bg-orange-400" />
                                    <input type="radio" name="stars" value="4" class="mask mask-star-2 bg-orange-400" />
                                    <input type="radio" name="stars" value="5" class="mask mask-star-2 bg-orange-400" />
                                </div>
                            </div>
                            <div class="flex flex-col mb-4">
                                <label for="comment" class="text-sm">Comment:</label>
                                <textarea id="comment" name="comment" class="border rounded p-2"></textarea>
                            </div>
                            <div class="flex flex-col mb-4">
                                <label for="image" class="text-sm">Image:</label>
                                <input type="file" id="image" name="image" accept="image/*" class="border rounded p-2">
                            </div>
                            <button type="submit"
                                class="bg-blue-700 p-3 rounded text-sm text-white hover:bg-blue-800">Submit</button>
                            {{-- <script>
                                const now = new Date();
                                        const year = now.getFullYear();
                                        const month = String(now.getMonth() + 1).padStart(2, '0');
                                        const day = String(now.getDate()).padStart(2, '0');
                                        const datestamp = `${year}-${month}-${day}`;
                                        
                                        document.getElementById("date_created").value = datestamp;
                            </script> --}}
                        </form>
                    </div>
                </div>
                @endif

            </div>

            @empty
            <div class="flex flex-col justify-center">
                <div><img src="{{asset('images/empty-search.png')}}" alt="empty" class="h-96 w-96 mx-auto"></div>
                <div>
                    <p class="text-lg text-center font-normal">There are no bookings or the item you searched for cannot
                        be found.</p>
                </div>
            </div>
            @endforelse

        </div>
        <div class="flex justify-end p-3">
            {{ $request->links() }}
        </div>


    </div>


</x-dash-layout>