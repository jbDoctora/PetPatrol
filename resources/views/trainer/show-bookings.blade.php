<x-trainer-layout>
    <div x-data="{ showModal: false }" x-on:keydown.window.escape="showModal = false"
        class="bg-white my-5 mx-14 shadow-lg h-screen rounded">
        <h1 class="text-xl font-extrabold p-4 border-b border-slate-300 text-blue-700">Booking Manager</h1>
        <div class="flex flex-row justify-start gap-3 text-xs py-3 px-4 border-b border-slate-300">
            <div class="shrink border border-slate-300 bg-base-300 rounded flex items-center">
                <i class="fa-solid fa-magnifying-glass ml-2"></i>
                <input type="text" placeholder="Search"
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
                <input type="date" class="border border-slate-300 h-full rounded px-3 py-2 text-left w-56">
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
                <thead class="text-center bg-blue-100">
                    <tr>
                        <th class="py-3 text-xs font-semibold">Id
                        </th>
                        <th class="text-xs font-semibold">
                            Pet Name</th>
                        <th class="text-xs font-semibold">
                            Client Name</th>
                        <th class="text-xs font-semibold">
                            Status</th>
                        <th class="text-xs font-semibold">
                            Payment Status
                        </th>
                        <th class="text-xs font-semibold">
                            Appointment Date</th>
                        <th class="text-xs font-semibold">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="text-left text-xs">
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
                        <td class="whitespace-nowrap text-xs border-b border-slate-200 px-2 py-7">
                            {{$requests->book_id}}
                        </td>
                        <td class="whitespace-nowrap text-blue-700 underline border-b border-slate-200"><a href="#">{{
                                $requests->pet_name}}</a></td>
                        <td class="whitespace-nowrap  border-b border-slate-200">{{ $requests->client_name }}
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
                                    <div class="text-left">
                                        <div class="flex flex-row items-center justify-start gap-3">
                                            <div><i class="fa-solid fa-wrench fa-lg"></i></div>
                                            <div>
                                                <h3 class="text-lg font-bold mb-4">Action</h3>
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
                                            <div class="flex flex-col justify-center gap-3 mb-3">
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
                                            <p class="mb-4">Reason for decline:</p>
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
                                            <h3>Payment status</h3>
                                            <select name="payment"
                                                class="border border-slate-300 w-full px-3 py-2 text-left w-64 sm:w-40 rounded">
                                                <option value="unpaid">unpaid</option>
                                                <option value="paid">paid</option>
                                            </select>
                                        </div>

                                        <div class=" flex justify-end">
                                            <button type="submit"
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded text-sm">Update
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