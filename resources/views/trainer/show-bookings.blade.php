<x-trainer-layout>
    <div x-data="{ showModal: false }" x-on:keydown.window.escape="showModal = false"
        class="bg-white my-9 mx-14 sm:mx-4 shadow-lg h-full rounded border border-gray-300">
        <form action="/trainer/bookings">
            <h1 class="text-2xl font-extrabold p-4 border-b border-slate-300 text-blue-700">Booking Manager</h1>
            <div class="flex flex-row justify-start gap-3 text-xs py-3 px-4 border-b border-slate-300">
                <div class="shrink border border-slate-300 bg-base-300 rounded flex items-center">
                    <input type="text" placeholder="Search" name="search"
                        class="px-6 py-2 bg-base-300 rounded-sm h-full text-xs w-80 md:w-52 sm:w-28"
                        value="{{ request('search') }}" />
                </div>
                <div>
                    <select class="border border-slate-300 h-full px-3 py-2 text-left w-64 sm:w-32 rounded"
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
                    <select class="border border-slate-300 h-full rounded px-3 py-2 text-left w-56 sm:w-32"
                        name="pet_type" value="{{ request('pet_type') }}">
                        <option value="">Pet type (All)</option>
                        @foreach($admin_pet as $type)
                        <option value="{{$type->admin_petType}}" {{ request('pet_type')==$type->admin_petType ?
                            'selected' : '' }}>{{$type->admin_petType}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="" class="mx-2">From</label>
                    <input type="date" name="start_date"
                        class="border border-slate-300 h-full rounded px-3 py-2 text-left w-56 sm:w-32"
                        value="{{ request('start_date') }}" />
                </div>
                <div>
                    <label for="" class="mx-2">To</label>
                    <input type="date" name="end_date" value="{{ request('end_date') }}"
                        class="border border-slate-300 h-full rounded px-3 py-2 text-left w-56 sm:w-32" />
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

        <div class="mt-2 rounded-none">
            <table class="w-full text-xs">
                <thead class="text-center bg-gray-200 text-gray-800">
                    <tr>
                        <th class="py-3 text-xs font-normal">Id
                        </th>
                        <th class="text-xs font-normal">
                            Pet Name</th>
                        <th class="text-xs font-normal">
                            Client Name</th>
                        <th class="text-xs font-normal">
                            Status</th>
                        <th class="text-xs font-normal">
                            Payment Status
                        </th>
                        <th class="text-xs font-normal">Gcash Reference Number</th>
                        <th class="text-xs font-normal">Venue</th>
                        <th class="text-xs font-normal">
                            Start Date</th>
                        <th class="text-xs font-normal">End Date</th>
                        <th class="text-xs font-normal">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="text-center text-xs">
                    @if(count($request) == 0)
                    <tr>
                        <td colspan="10">
                            <lottie-player class="mx-auto"
                                src="https://assets6.lottiefiles.com/private_files/lf30_e3pteeho.json"
                                background="transparent" speed="0.5" style="width: 400px; height: 400px;" loop autoplay>
                            </lottie-player>
                        </td>
                    </tr>
                    @else
                    @foreach ($request as $requests)
                    <tr>
                        <td class="whitespace-nowrap text-xs border-b border-slate-200 px-2 py-7 font-semibold">
                            {{$requests->code}}
                        </td>
                        <td class="whitespace-nowrap hover:text-blue-700 border-b border-slate-200"><label
                                for="pet-modal-{{$requests->book_id}}" class="cursor-pointer">{{
                                $requests->pet_name}}</label></td>
                        <input type="checkbox" id="pet-modal-{{$requests->book_id}}" class="modal-toggle" />
                        <div class="modal">
                            <div class="modal-box rounded w-max-4xl">
                                <label for="pet-modal-{{$requests->book_id}}"
                                    class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                                <h3 class="my-5 text-lg font-bold">Pet Information</h3>
                                <div class="flex justify-center avatar bg-gray-300 py-3">
                                    <div class="w-24 rounded-full">
                                        <img src="{{ $requests->image ? asset('storage/' . $requests->image) : asset('/images/no-image.png') }}"
                                            alt="Pet image">
                                    </div>
                                </div>
                                <div class="m-3">
                                    <p class="text-sm">Pet Name</p>
                                    <div class="rounded border border-gray-300 px-3 py-2 w-full text-xs">
                                        {{$requests->pet_name}}
                                    </div>
                                </div>
                                <div class="m-3">
                                    <p class="text-sm">Pet Name</p>
                                    <div class="rounded border border-gray-300 px-3 py-2 w-full text-xs">
                                        {{$requests->years}} years and {{$requests->months}} months
                                    </div>
                                </div>
                                <div class="m-3">
                                    <p class="text-sm">Breed</p>
                                    <div class="rounded border border-gray-300 px-3 py-2 w-full text-xs">
                                        {{$requests->breed}}
                                    </div>
                                </div>
                                <div class="m-3">
                                    <p class="text-sm">Weight</p>
                                    <div class="rounded border border-gray-300 px-3 py-2 w-full text-xs">
                                        {{$requests->weight}} kgs.
                                    </div>
                                </div>
                                <div class="m-3">
                                    <p class="text-sm">List of Vaccines</p>
                                    <div class="rounded border border-gray-300 px-3 py-2 w-full text-xs">
                                        {{$requests->vaccine_list}}
                                    </div>
                                </div>
                                <div class="m-3">
                                    <p class="text-sm">More Infos</p>
                                    <div class="rounded border border-gray-300 px-3 py-2 w-full h-32 text-xs">
                                        {{$requests->info}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <td class="whitespace-nowrap border-b border-slate-200">
                            <label for="client-modal" class="hover:text-blue-700 cursor-pointer">{{
                                $requests->client_name }}</label>
                            <input type="checkbox" id="client-modal" class="modal-toggle" />
                            <div class="modal">
                                <div class="modal-box rounded w-max-4xl">
                                    <label for="client-modal"
                                        class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                                    <h3 class="my-5 text-lg font-bold text-left">Client Information</h3>
                                    <div class="text-left">
                                        <div class="flex justify-center avatar bg-gray-300 py-3">
                                            <div class="w-24 rounded-full">
                                                <img src="{{ $requests->image ? asset('storage/' . $requests->image) : asset('/images/no-image.png') }}"
                                                    alt="Pet image">
                                            </div>
                                        </div>
                                        <div class="m-3">
                                            <div class="flex items-center gap-2 my-2">
                                                <i class="fa-solid fa-user fa-sm"></i>
                                                <p class="text-sm">Client Name</p>
                                            </div>
                                            <div class="rounded border border-gray-300 px-3 py-2 w-full text-xs">
                                                {{$requests->client_name}}
                                            </div>
                                        </div>
                                        <div class="m-3">
                                            <div class="flex items-center gap-2 my-2">
                                                <i class="fa-solid fa-envelope fa-sm"></i>
                                                <p class="text-sm">Email</p>
                                            </div>
                                            <div class="rounded border border-gray-300 px-3 py-2 w-full text-xs">
                                                {{$requests->email}}
                                            </div>
                                        </div>
                                        <div class="m-3">
                                            <div class="flex items-center gap-2 my-2">
                                                <i class="fa-solid fa-phone fa-sm"></i>
                                                <p class="text-sm">Phone Number</p>
                                            </div>
                                            <div class="rounded border border-gray-300 px-3 py-2 w-full text-xs">
                                                {{$requests->phone_number}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="whitespace-nowrap border-b border-slate-200">
                            @if ($requests->status == 'pending')
                            <span class="badge bg-yellow-300 text-yellow-800 text-xs">{{
                                $requests->status }}</span>
                            @elseif ($requests->status == 'approved')
                            <span class="badge bg-green-300 text-green-800 text-xs">{{
                                $requests->status }}</span>
                            @elseif ($requests->status == 'declined')
                            <span class="badge bg-red-300 text-red-800 text-xs">{{
                                $requests->status }}</span>
                            @elseif ($requests->status == 'in progress')
                            <span class="badge bg-blue-300 text-blue-800 text-xs">{{
                                $requests->status }}</span>
                            @elseif ($requests->status == 'cancelled')
                            <span class="badge bg-red-400 text-slate-100 text-xs">{{
                                $requests->status }}</span>
                            @elseif ($requests->status == 'completed')
                            <span class="badge bg-green-300 text-green-800 text-xs">{{
                                $requests->status }}</span>
                            @endif

                        </td>
                        <td class="whitespace-nowrap border-b border-slate-200">
                            @if ($requests->payment == 'unpaid')
                            <span class="badge bg-yellow-300 text-yellow-800 text-xs">{{
                                $requests->payment }}</span>
                            @elseif ($requests->payment == 'paid')
                            <span class="badge bg-green-300 text-green-800 text-xs">{{
                                $requests->payment }}</span>
                            @endif
                        </td>
                        <td class="whitespace-nowrap border-b border-slate-200">
                            @if(empty($requests->gcash_refnum))
                            <p>payment not uploaded</p>
                            @else
                            <p class="font-bold">{{$requests->gcash_refnum}}</p>
                            @endif
                        </td>
                        <td class="whitespace-nowrap border-b border-slate-200">
                            @if($requests->location == "public")
                            <p>Trainer's House</p>
                            @else
                            <p>Home Service</p>
                            @endif
                        </td>
                        <td class="whitespace-nowrap border-b border-slate-200">{{ $requests->start_date }}</td>
                        <td class="whitespace-nowrap border-b border-slate-200">{{ $requests->end_date }}</td>
                        <td class="whitespace-nowrap border-b border-slate-200">

                            {{-- IF APPROVED --}}
                            @if($requests->status == 'approved')
                            <div class="flex justify-center items-center gap-4">
                                <form method="POST" action="/trainer/bookings/startTraining/{{$requests->book_id}}">
                                    @csrf
                                    @method('PUT')
                                    <div class="dropdown dropdown-left">
                                        <label tabindex="0" class=""><i class="fa-solid fa-ellipsis fa-2xl"></i></label>
                                        <ul tabindex="0"
                                            class="dropdown-content menu shadow bg-gray-200 rounded w-52 overflow-visible ">

                                            <input type="hidden" name="status" value="in progress" />
                                            <li>
                                                <button type="submit">Start
                                                    training</button>
                                            </li>
                                            <li><label for="update-modal-{{$requests->book_id}}">Update Payment</label>
                                            </li>
                                            <li><a href="/help-center">Report</a></li>
                                        </ul>
                                    </div>
                                </form>

                                {{-- UPDATE PAYMENT IN PENDING MODAL --}}
                                <input type="checkbox" id="update-modal-{{$requests->book_id}}" class="modal-toggle" />
                                <div class="modal">
                                    <div class="modal-box relative rounded">
                                        <label for="update-modal-{{$requests->book_id}}"
                                            class=" btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                                        <h3 class="text-lg font-bold text-left">Update Payment Status
                                        </h3>
                                        <form method="POST"
                                            action="/trainer/bookings/updatePayment/{{$requests->book_id}}">
                                            @csrf
                                            @method('PUT')
                                            <div class="flex flex-col text-sm gap-5">
                                                <div class="mr-auto mt-5">
                                                    <input type="radio" name="payment" value="unpaid"
                                                        class="mr-2" />Unpaid
                                                </div>
                                                <div class="mr-auto">
                                                    <input type="radio" name="payment" value="paid" class="mr-2" />Paid
                                                </div>
                                                <div class="flex justify-end">
                                                    <button type="submit"
                                                        class="rounded bg-blue-700 px-3 py-2 text-white text-sm">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>




                            {{-- IF IN PROGRESS --}}
                            @elseif($requests->status == 'in progress')

                            <div class="dropdown dropdown-left dropdown-end">
                                <label tabindex="0" class="p-1"><i class="fa-solid fa-ellipsis fa-2xl"></i></label>
                                <ul tabindex="0" class="dropdown-content menu shadow bg-base-100 rounded w-52">
                                    <li><label for="done-modal-{{$requests->book_id}}">Mark as done</label></li>
                                    <li><label for="update-inprogress-modal-{{$requests->book_id}}">Update
                                            Payment</label></li>
                                    <li><a href="/help-center">Report</a></li>
                                </ul>
                            </div>

                            {{-- UPDATE PAYMENT IN "IN PROGRESS" MODAL --}}
                            <input type="checkbox" id="update-inprogress-modal-{{$requests->book_id}}"
                                class="modal-toggle" />
                            <div class="modal">
                                <div class="modal-box relative rounded">
                                    <label for="update-inprogress-modal-{{$requests->book_id}}"
                                        class=" btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                                    <h3 class="text-lg font-bold text-left">Update Payment Status
                                    </h3>
                                    <form method="POST" action="/trainer/bookings/updatePayment/{{$requests->book_id}}">
                                        @csrf
                                        @method('PUT')
                                        <div class="flex flex-col text-sm gap-5">
                                            <div class="mr-auto mt-5">
                                                <input type="radio" name="payment" value="unpaid" class="mr-2" />Unpaid
                                            </div>
                                            <div class="mr-auto">
                                                <input type="radio" name="payment" value="paid" class="mr-2" />Paid
                                            </div>
                                            <div class="flex justify-end">
                                                <button type="submit"
                                                    class="rounded bg-blue-700 px-3 py-2 text-white text-sm">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>



                            {{-- IF DECLINED --}}
                            @elseif($requests->status == 'declined')
                            <input type="hidden" name="status" value="in progress" />
                            <div class="dropdown dropdown-left dropdown-end flex justify-center items-center">
                                <label tabindex="0" class=""><i class="fa-solid fa-ellipsis fa-2xl"></i></label>
                                <ul tabindex="0" class="dropdown-content menu shadow bg-gray-200 rounded w-52">
                                    <li><a href="/help-center">Report</a></li>
                                </ul>
                            </div>

                            {{-- IF COMPLETED --}}
                            @elseif($requests->status == 'completed')
                            <input type="hidden" name="status" value="in progress" />
                            <div class="dropdown dropdown-left dropdown-end">
                                <label tabindex="0" class=""><i class="fa-solid fa-ellipsis fa-2xl"></i></label>
                                <ul tabindex="0" class="dropdown-content menu shadow bg-gray-200 rounded w-52">
                                    <li><a href="/help-center">Report</a></li>
                                </ul>
                            </div>

                            {{-- IF CANCELLED --}}
                            @elseif($requests->status == 'cancelled')
                            <input type="hidden" name="status" value="in progress" />
                            <div class="dropdown dropdown-left">
                                <label tabindex="0" class=""><i class="fa-solid fa-ellipsis fa-2xl"></i></label>
                                <ul tabindex="0" class="dropdown-content menu shadow bg-gray-200 rounded w-52">
                                    <li><a href="/help-center">Report</a></li>
                                </ul>
                            </div>

                            {{-- IF PENDING --}}
                            @elseif($requests->status == 'pending')
                            <div class="flex justify-center items-center">
                                <div class="dropdown dropdown-left dropdown-end">
                                    <label tabindex="0" class="cursor-pointer"><i
                                            class="fa-solid fa-ellipsis fa-2xl"></i></label>
                                    <ul tabindex="0" class="dropdown-content menu shadow bg-gray-200 rounded w-52">
                                        <li>
                                            <a href="/help-center">Report</a>
                                        </li>
                                        <li>
                                            <button
                                                x-on:click.prevent="showModal = { course: '{{ $requests->course }}', pet_id: '{{ $requests->pet_id }}',availability:
                                    '{{ $requests->availability }}', name: '{{ $requests->client_name }}', book_id:
                                    '{{$requests->book_id}}', service_id: '{{$requests->service_id}}', payment:
                                    '{{$requests->payment}}', start_date:'{{$requests->start_date}}', end_date:'{{$requests->end_date}}', trainer_id:'{{$requests->trainer_id}}' }">Update</button>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            @endif

                        </td>
                    </tr>

                    {{-- MODAL FOR CONFIRM MARK AS DONE --}}
                    <form method="POST" action="/trainer/bookings/startTraining/{{$requests->book_id}}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="completed" />
                        <input type="hidden" name="service_id" value="{{$requests->service_id}}">
                        <input type="hidden" name="pet_id" value="{{$requests->pet_id}}">
                        <input type="hidden" name="trainer_id" value="{{$requests->trainer_id}}">
                        <input type="checkbox" id="done-modal-{{$requests->book_id}}" class="modal-toggle" />
                        <div class="modal">
                            <div class="modal-box relative">
                                <label for="done-modal-{{$requests->book_id}}"
                                    class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                                <h3 class="text-lg font-bold">Confirm</h3>
                                <p class="py-4">Please confirm that the training is done. This cannot be undone.
                                    Proceed?
                                </p>
                                <div class="flex justify-end">
                                    <button
                                        class="rounded bg-blue-700 text-white text-sm px-3 py-2 hover:bg-blue-800">Confirm</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    @endforeach
                    @endif
                </tbody>

                <form method="POST" action="/trainer/bookings/update">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="book_id" x-bind:value="showModal.book_id">
                    <input type="hidden" name="service_id" x-bind:value="showModal.service_id">
                    <input type="hidden" name="start_date" x-bind:value="showModal.start_date">
                    <input type="hidden" name="end_date" x-bind:value="showModal.end_date">
                    <input type="hidden" name="trainer_id" x-bind:value="showModal.trainer_id">
                    <input type="hidden" name="pet_id" x-bind:value="showModal.pet_id">

                    <div class="fixed z-50 inset-0 overflow-y-auto" x-show="showModal" x-transition>
                        <div
                            class="flex items-center justify-center min-h-screen px-4 pt-6 pb-20 text-center sm:block sm:p-0">
                            <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"></div>

                            <div
                                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg">
                                <div class="px-4 py-6">
                                    <div class="absolute top-0 right-0 p-2">
                                        <button class="bg-gray-300 hover:bg-gray-400 rounded-full p-2"
                                            @click.prevent="showModal = false">
                                            <svg class="w-6 h-6 text-gray-700" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M12.293 10l4.146-4.147a1 1 0 1 0-1.414-1.414L10.88 8.586 6.733 4.44a1 1 0 1 0-1.414 1.414L9.46 10l-4.147 4.147a1 1 0 1 0 1.414 1.414L10.88 11.414l4.147 4.147a1 1 0 1 0 1.414-1.414L12.293 10z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>


                                    <div>
                                        <div class="flex items-center justify-start gap-3 my-3">
                                            <div>
                                                <i class="fa-solid fa-wrench fa-lg"></i>
                                            </div>
                                            <div>
                                                <h3 class="text-lg font-bold">Action</h3>
                                            </div>
                                        </div>

                                        <div x-data="{ isApproved: false }">
                                            <div class="flex flex-col justify-center gap-3 mb-3 text-xs">
                                                <div>
                                                    <input type="radio" name="status" class="mx-2" value="approved"
                                                        x-model="isApproved" />
                                                    Approve
                                                </div>
                                                <div>
                                                    <input type="radio" name="status" class="mx-2" value="declined"
                                                        x-model="isApproved" />
                                                    Decline
                                                </div>
                                            </div>
                                            <p class="mb-4 text-sm">Reason for decline:</p>
                                            <textarea name="reason_reject" id="" cols="50" rows="5"
                                                x-bind:disabled="!isApproved || (isApproved === 'approved')"
                                                class="border border-slate-300 p-3 text-xs"></textarea>
                                        </div>

                                        <div>
                                            <h3 class="my-4 text-sm">Payment status</h3>
                                            <select name="payment"
                                                class="border border-slate-300 px-3 py-2 text-left w-64 sm:w-40 rounded text-xs">
                                                <option value="unpaid">unpaid</option>
                                                <option value="paid">paid</option>
                                            </select>
                                        </div>

                                        <div class=" flex justify-end">
                                            <button type="submit"
                                                class="bg-blue-700 hover:bg-blue-800 text-white py-2 px-3 rounded text-sm">Update
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </table>
        </div>


    </div>
</x-trainer-layout>