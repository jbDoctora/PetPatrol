<x-trainer-layout>
    <div x-data="{ showModal: false }" x-on:keydown.window.escape="showModal = false"
        class="bg-white my-5 mx-14 shadow-lg h-screen rounded">
        <h1 class="text-2xl font-extrabold p-4 border-b border-slate-300 text-blue-700">Booking Manager</h1>
        <div class="flex flex-row justify-start gap-3 text-xs py-3 px-4 border-b border-slate-300">
            <div class="shrink border border-slate-300 bg-base-300 rounded flex items-center">
                <i class="fa-solid fa-magnifying-glass ml-2"></i>
                <input type="search" placeholder="Search Keyword"
                    class="px-6 py-2 bg-base-300 rounded-sm h-full text-xs w-80 md:w-52" />
            </div>
            <div>
                <select class="border border-slate-300 h-full px-3 py-2 text-left w-64 sm:w-40 rounded" name="" id="">
                    <option disabled selected>Status</option>
                    <option value="">Pending</option>
                    <option value="">Approved</option>
                    <option value="">Declined</option>
                    <option value="">Completed</option>
                </select>
            </div>
            <div>
                <select class="border border-slate-300 h-full rounded px-3 py-2 text-left w-56" name="" id="">
                    <option disabled selected>Pet type</option>
                    <option value="">Dog</option>
                    <option value="">Cat</option>
                    <option value="">Parrot</option>
                    <option value="">Hamster</option>
                </select>
            </div>
            <div>
                <input type="date" class="border border-slate-300 h-full rounded px-3 py-2 text-left w-56 sm:w-44">
            </div>
            <div>
                <button class="bg-blue-700 px-7 py-3 text-white font-bold rounded">
                    Search
                </button>
            </div>
        </div>

        <div class="flex justify-between items-center border-b border-slate-300">
            <div class="py-3 px-4 text-sm"><span class="font-bold text-sm">{{ \App\Models\Booking::where('trainer_id',
                    auth()->user()->id)->count() }}</span>
                bookings found
            </div>
            <div class="p-3 text-xs text-blue-700 cursor-pointer" x-on:click="window.location.reload()">
                <i class="fa-solid fa-arrows-rotate fa-xl mr-2"></i><span class="text-sm">Refresh</span>
            </div>
        </div>

        <div class="mt-2 min-w-full overflow-hidden rounded-none">
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
                        <th class="text-xs font-normal">
                            Appointment Date</th>
                        <th class="text-xs font-normal">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="text-center text-xs">
                    @if(count($request) == 0)
                    <tr>
                        <td colspan="7">
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
                                for="pet-modal" class="cursor-pointer">{{
                                $requests->pet_name}}</label></td>
                        <!-- Put this part before </body> tag -->
                        <input type="checkbox" id="pet-modal" class="modal-toggle" />
                        <div class="modal">
                            <div class="modal-box rounded w-max-4xl">
                                <label for="pet-modal" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
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
                        <td class="whitespace-nowrap border-b border-slate-200">{{$requests->gcash_refnum}}</td>
                        <td class="whitespace-nowrap border-b border-slate-200" x-data="{ formattedDate: '' }"
                            x-init="let date = new Date('{{ $requests->start_date }}'); formattedDate = date.toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' })">
                            <span x-text="formattedDate"></span>
                        </td>
                        <td class="whitespace-nowrap border-b border-slate-200">
                            <div class="flex justify-center"><a href="#"><button
                                        class="bg-blue-700 text-white px-3 py-1 rounded" x-on:click.prevent="showModal = { course: '{{ $requests->course }}', availability:
                                    '{{ $requests->availability }}', name: '{{ $requests->client_name }}', book_id:
                                    '{{$requests->book_id}}', service_id: '{{$requests->service_id}}', payment:
                                    '{{$requests->payment}}' }">Update</button></a>
                            </div>
                        </td>
                    </tr>
                </tbody>
                <form method="POST" action="/trainer/bookings/update">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="book_id" x-bind:value="showModal.book_id">
                    <input type="hidden" name="service_id" x-bind:value="showModal.service_id">

                    <div class="fixed z-50 inset-0 overflow-y-auto" x-show="showModal" x-transition>
                        <div
                            class="flex items-center justify-center min-h-screen px-4 pt-6 pb-20 text-center sm:block sm:p-0">
                            <!-- Background overlay -->
                            <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"></div>

                            <!-- Modal content -->
                            <div
                                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg">
                                <div class="px-4 py-6">
                                    <!-- Close button -->
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

                                    <!-- Modal content -->
                                    <div>
                                        <div class="flex items-center justify-start gap-3 my-3">
                                            <div>
                                                <i class="fa-solid fa-wrench fa-lg"></i>
                                            </div>
                                            <div>
                                                <h3 class="text-lg font-bold">Action</h3>
                                            </div>
                                        </div>
                                        {{-- <div
                                            class="grid grid-cols-2 gap-4 mb-4 bg-base-300 text-sm rounded-lg p-5">
                                            <div class="font-bold">Client name:</div>
                                            <div x-text="showModal.name"></div>
                                            <div class="font-bold">Training service:</div>
                                            <div x-text="showModal.course"></div>
                                            <div class="font-bold">Sessions:</div>
                                            <div x-text="showModal.availability"></div>
                                        </div> --}}

                                        <div x-data="{ isApproved: false }">
                                            {{-- <p class="mb-4 italic">Action:</p> --}}
                                            <div class="flex flex-col justify-center gap-3 mb-3 text-xs">
                                                <div>
                                                    <input type="radio" name="status" class="mx-2" value="approved"
                                                        @click="isApproved = true" />
                                                    Approve
                                                </div>
                                                <div>
                                                    <input type="radio" name="status" class="mx-2" value="declined"
                                                        @click="isApproved = false" />
                                                    Decline
                                                </div>
                                            </div>
                                            <p class="mb-4 text-sm">Reason for decline:</p>
                                            <textarea name="reason_reject" id="" cols="50" rows="5"
                                                x-bind:disabled="isApproved || !document.querySelector('input[name=status]:checked')"
                                                class="border border-slate-300"></textarea>
                                        </div>

                                        {{-- <div class="flex items-center">
                                            <div class="tooltip tooltip-right"
                                                data-tip="You can't revert your decision once marked as paid">
                                                <input type="checkbox" name="payment" value="paid" class="mr-3"
                                                    x-bind:checked="showModal.payment === 'paid' ? true : false"
                                                    x-bind:disabled="showModal.payment === 'paid' ? true : false">
                                            </div>
                                            <p class="mr-5"
                                                x-text="showModal.payment === 'paid' ? 'Marked as paid' : 'Mark as paid'">
                                                Mark as paid
                                            </p>
                                        </div> --}}
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
                @endforeach
                @endif
            </table>
        </div>


    </div>
</x-trainer-layout>