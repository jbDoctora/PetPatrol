<x-trainer-layout>
    <div x-data="{ showModal: false }" x-on:keydown.window.escape="showModal = false">
        <h2 class="font-bold text-2xl p-5">Manage Bookings</h2>
        <div class="mx-auto px-3 mt-5 min-w-full overflow-hidden rounded-none">
            <table class="table w-full rounded-none">
                <thead>
                    <tr>
                        <th class="">id
                        </th>
                        <th class="">
                            Pet Name</th>
                        <th class="">
                            Client Name</th>
                        <th class="">
                            Status</th>
                        <th class="">
                            Appointment Date</th>
                        <th class="">
                            Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($request as $requests)
                    <tr>
                        <td class="whitespace-nowrap px-6 py-4">{{$requests->book_id}}</td>
                        <td class="whitespace-nowrap px-6 py-4">{{ $requests->pet_name}}</td>
                        <td class="whitespace-nowrap px-6 py-4">{{ $requests->client_name }}
                        </td>
                        <td class="whitespace-nowrap px-6 py-4">
                            @if ($requests->status == 'pending')
                            <span class="badge bg-yellow-300 text-yellow-800">{{
                                $requests->status }}</span>
                            @elseif ($requests->status == 'approved')
                            <span class="badge bg-green-300 text-green-800">{{
                                $requests->status }}</span>
                            @elseif ($requests->status == 'declined')
                            <span class="badge bg-red-300 text-red-800">{{
                                $requests->status }}</span>
                            @endif

                            @if ($requests->payment == 'unpaid')
                            <span class="badge bg-yellow-300 text-yellow-800">{{
                                $requests->payment }}</span>
                            @elseif ($requests->payment == 'paid')
                            <span class="badge bg-green-300 text-green-800">{{
                                $requests->payment }}</span>
                            @endif
                        </td>
                        <td class="whitespace-nowrap px-6 py-4 ">{{$requests->start_date}}</td>
                        <td class="whitespace-nowrap px-6 py-4 text-sm flex justify-center gap-3">
                            <a href="#"
                                class="bg-yellow-400 px-3 py-2 rounded-sm text-black w-full text-center text-sm font-bold"
                                x-on:click.prevent="showModal = { course: '{{ $requests->course }}', availability: '{{ $requests->availability }}', name: '{{ $requests->client_name }}', book_id: '{{$requests->book_id}}', service_id: '{{$requests->service_id}}', payment: '{{$requests->payment}}' }">Update</a>
                        </td>
                    </tr>

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
                                                <svg class="w-6 h-6 text-gray-700" viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M12.293 10l4.146-4.147a1 1 0 1 0-1.414-1.414L10.88 8.586 6.733 4.44a1 1 0 1 0-1.414 1.414L9.46 10l-4.147 4.147a1 1 0 1 0 1.414 1.414L10.88 11.414l4.147 4.147a1 1 0 1 0 1.414-1.414L12.293 10z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </div>

                                        <!-- Modal content -->
                                        <div class="text-left">
                                            <h3 class="text-lg font-bold mb-4">Booking Information</h3>
                                            <div class="grid grid-cols-2 gap-4 mb-4 bg-base-300 text-sm rounded-lg p-5">
                                                <div class="font-bold">Client name:</div>
                                                <div x-text="showModal.name"></div>
                                                <div class="font-bold">Training service:</div>
                                                <div x-text="showModal.course"></div>
                                                <div class="font-bold">Sessions:</div>
                                                <div x-text="showModal.availability"></div>
                                            </div>

                                            <div x-data="{ isApproved: false }">
                                                <p class="mb-4 italic">Action:</p>
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
                                                    x-bind:class="cursor-not-allowed"
                                                    class="border border-slate-300"></textarea>
                                            </div>

                                            <div class="flex items-center">
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
                </tbody>
            </table>
        </div>
    </div>
</x-trainer-layout>