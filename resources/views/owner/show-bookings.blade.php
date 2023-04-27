<x-dash-layout>
    <div class="bg-white my-5 mx-14 shadow-lg h-full rounded border border-gray-300">
        <h1 class="text-2xl font-extrabold p-4 border-b border-slate-300 text-blue-700">Booking Manager</h1>
        <form action="/bookings" method="GET">
            <div class="flex flex-row justify-start gap-3 text-xs py-3 px-4 border-b border-slate-300">
                <div class="shrink border border-slate-300 bg-base-300 rounded flex items-center">
                    <input type="search" placeholder="Search" name="search"
                        class="px-6 py-2 rounded-sm h-full text-xs w-80 md:w-52" value="{{ request('search') }}" />
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
                        <option value="in progress" {{ request('status')=='in progress' ? 'selected' : '' }}>In Progress
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
                        class="border border-slate-300 h-full rounded px-3 py-2 text-left w-56 sm:w-40" />
                </div>
                <div>
                    <label class="mx-2">To</label>
                    <input type="date" name="end_date"
                        class="border border-slate-300 h-full rounded px-3 py-2 text-left w-56 sm:w-40"
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
            <div class="flex flex-row justify-between gap-2 border border-gray-300 rounded mx-4">
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
                    <span class="badge bg-yellow-400 text-yellow-900 text-xs border-none">
                        <i class="fa-solid fa-hourglass pr-1"></i>{{ $requests->status }}
                    </span> |
                    @elseif ($requests->status == 'approved')
                    <span class="badge bg-green-400 text-slate-900 text-xs border-none">
                        <i class="fa-solid fa-thumbs-up pr-1"></i>{{ $requests->status }}
                    </span> |
                    @elseif ($requests->status == 'declined')
                    <span class="badge bg-red-400 text-red-900 text-xs">
                        <i class="fa-solid fa-times pr-1"></i>{{ $requests->status }}
                    </span> |
                    @elseif ($requests->status == 'in progress')
                    <span class="badge bg-blue-500 text-blue-900 text-xs">
                        <i class="fa-solid fa-hourglass-end pr-1"></i>{{ $requests->status }}
                    </span> |
                    @elseif ($requests->status == 'completed')
                    <span class="badge bg-green-400 text-slate-900 text-xs">
                        <i class="fa-solid fa-check pr-1"></i>{{ $requests->status }}
                    </span> |
                    @elseif ($requests->status == 'cancelled')
                    <span class="badge bg-red-500 text-slate-200 text-xs">
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

                {{-- IF APPROVED STATUS --}}
                @if($requests->status == 'approved')
                <div class="flex items-center justify-center px-5 text-xs w-80 gap-3">
                    <a href="/bookings/{{$requests->book_id}}">
                        <button class="bg-blue-700 py-2 px-3 rounded hover:bg-blue-800 text-white cursor-pointer"><i
                                class="fa-solid fa-pen-to-square pr-3 fa-lg"></i>View</button>
                    </a>
                    <div class="dropdown dropdown-end">
                        <label tabindex="0" class="p-5 cursor-pointer"><i
                                class="fa-solid fa-ellipsis-vertical fa-xl"></i></label>
                        <ul tabindex="0"
                            class="dropdown-content menu p-1 shadow bg-base-100 rounded w-52 text-sm bg-gray-200">
                            <li><a href="/checkout/{{$requests->book_id}}">Pay</a></li>
                        </ul>
                    </div>
                </div>

                {{-- IF DECLINED STATUS --}}
                @elseif($requests->status == 'declined')
                <div class="flex items-center justify-center px-5 text-xs w-80 gap-3">

                </div>

                {{-- IF IN PROGRESS STATUS --}}
                @elseif($requests->status == 'in progress')
                <div class="flex items-center justify-center px-5 text-xs w-80 gap-3">
                    <a href="/bookings/{{$requests->book_id}}">
                        <button
                            class="bg-blue-700 py-2 px-3 rounded hover:bg-blue-800 text-white cursor-pointer w-42"><i
                                class="fa-solid fa-pen-to-square pr-3 fa-lg"></i>View</button>
                    </a>
                    <div class="dropdown dropdown-end">
                        <label tabindex="0" class="p-5 cursor-pointer"><i
                                class="fa-solid fa-ellipsis-vertical fa-xl"></i></label>
                        <ul tabindex="0"
                            class="dropdown-content menu p-1 shadow bg-base-100 rounded w-52 text-sm bg-gray-200">
                            <li><a href="/checkout/{{$requests->book_id}}">Pay</a></li>
                        </ul>
                    </div>
                </div>

                {{-- IF CANCELLED STATUS --}}
                @elseif($requests->status == 'cancelled')
                <div class="flex items-center justify-center px-5 text-xs w-80 gap-3">
                    <div class="flex items-center justify-center px-5 text-xs w-80 gap-3">
                        {{-- <label class="text-xs px-3 py-2 bg-green-600 text-white rounded"><i
                                class="fa-solid fa-print pr-3"></i>Print</label> --}}
                    </div>
                </div>

                {{-- IF PENDING STATUS --}}
                @elseif($requests->status == 'pending')
                <div class="flex items-center justify-center px-5 text-xs w-80 gap-3">
                    <a href="/bookings/{{$requests->book_id}}">
                        <button
                            class="bg-blue-700 py-2 px-3 rounded hover:bg-blue-800 text-white cursor-pointer w-42"><i
                                class="fa-solid fa-pen-to-square pr-3 fa-lg"></i>View</button>
                    </a>
                    <div class="dropdown dropdown-end">
                        <label tabindex="0" class="p-5 cursor-pointer"><i
                                class="fa-solid fa-ellipsis-vertical fa-xl"></i></label>
                        <ul tabindex="0"
                            class="dropdown-content menu shadow bg-base-100 rounded w-52 text-sm bg-gray-200">
                            {{-- <li><a href="/checkout/{{$requests->book_id}}">Pay</a></li> --}}
                            <li>
                                <label for="confirm-modal-{{$requests->book_id}}">
                                    Cancel
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- IF COMPLETED STATUS --}}
                @elseif($requests->status == 'completed')
                @if($requests->isRated == 1)
                <div class="flex items-center justify-center px-5 text-xs w-80 gap-3">
                    {{-- <label class="text-sm px-3 py-2 bg-green-600 text-white rounded"><i
                            class="fa-solid fa-print pr-3"></i></label> --}}
                </div>
                @else
                <div class="flex items-center justify-center px-5 text-xs w-80 gap-3">
                    <label for="rating-modal-{{$requests->book_id}}" class="hover:text-blue-700 text-sm"><i
                            class="fa-solid fa-star fa-md pr-2"></i>Rate
                        Trainer</label>
                </div>


                @endif
                {{-- MODAL RATING --}}
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
                            @error('stars')
                            <p class="text-red-500 text-sm font-normal">{{$message}}</p>
                            @enderror
                            <div class="flex flex-col mb-4">
                                <label for="comment" class="text-sm">Comment:</label>
                                <textarea id="comment" name="comment" class="border rounded p-2"></textarea>
                            </div>
                            @error('comment')
                            <p class="text-red-500 text-sm font-normal">{{$message}}</p>
                            @enderror
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
                {{-- END OF RATING MODAL --}}
                @endif

            </div>
            {{-- MODAL FOR CONFIRM DELETION --}}
            <form method="POST" action="/bookings/{{$requests->book_id}}/update">
                @csrf
                @method('PUT')
                <input type="hidden" name="service_id" value="{{$requests->service_id}}">
                <input type="hidden" name="pet_id" value="{{$requests->pet_id}}">
                <input type="hidden" name="status" value="cancelled">
                <input type="checkbox" id="confirm-modal-{{$requests->book_id}}" class="modal-toggle" />
                <div class="modal">
                    <div class="modal-box relative">
                        <label for="confirm-modal-{{$requests->book_id}}"
                            class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                        <h3 class="text-lg font-bold">Confirm Deletion</h3>
                        <p class="py-4">This action cannot be undone. Proceed?</p>
                        <div class="flex justify-end">
                            <button class="bg-red-700 text-white px-3 py-2 text-sm">Delete</button>
                        </div>
                    </div>
                </div>
            </form>
            {{-- END OF CONFIRM DELETION MODAL --}}

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