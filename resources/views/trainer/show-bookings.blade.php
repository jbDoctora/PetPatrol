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
                            <a href="#" class="bg-yellow-400 px-3 py-2 rounded-sm"
                                x-on:click.prevent="showModal = { course: '{{ $requests->course }}', availability: '{{ $requests->availability }}', name: '{{ $requests->client_name }}', book_id: '{{$requests->book_id}}', service_id: '{{$requests->service_id}}' }">Update</a>
                        </td>
                    </tr>


                    <div x-cloak x-show="showModal" x-transition
                        class="fixed inset-0 z-50 flex items-center justify-center bg-gray-800 bg-opacity-75">
                        <div class="max-w-md bg-white rounded-sm shadow-lg" style="width:400px">
                            <div class="flex justify-end pt-4 pr-4">
                                <button @click.prevent="showModal = false"
                                    class="text-gray-500 hover:text-gray-800 transition ease-in-out duration-150">
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                            <div class="px-6 py-4">
                                <h2 class="text-2xl font-bold mb-2">Client Information</h2>
                                <div class="grid grid-cols-2 gap-4 mb-4 bg-base-300 text-sm rounded-lg p-5">
                                    <div class="font-bold">Client name:</div>
                                    <div x-text="showModal.name"></div>
                                    <div class="font-bold">Training service:</div>
                                    <div x-text="showModal.course"></div>
                                    <div class="font-bold">Sessions:</div>
                                    <div x-text="showModal.availability"></div>
                                </div>
                                <form method="POST" action="/trainer/bookings/update">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="book_id" x-bind:value="showModal.book_id">
                                    <input type="hidden" name="service_id" x-bind:value="showModal.service_id">
                                    <div class="mb-4">
                                        <h3 class="text-lg font-bold mb-2">Update Status:</h3>
                                        <div>
                                            {{-- <p>Request ID: <span x-text="showModal.book_id"></span></p>
                                            <p>Service ID: <span x-text="showModal.service_id"></span></p> --}}
                                            <label class="inline-flex items-center">
                                                <input type="radio" name="status" value="approved"
                                                    class="radio radio-primary">
                                                <span class="ml-2">Approve</span>
                                            </label>
                                            <label class="inline-flex items-center ml-6">
                                                <input type="radio" name="status" value="declined"
                                                    class="radio radio-primary">
                                                <span class="ml-2">Decline</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <h3 class="text-lg font-bold mb-2">Payment Status:</h3>
                                        <div>
                                            <label class="inline-flex items-center">
                                                <input type="radio" name="payment" value="paid"
                                                    class="radio radio-primary">
                                                <span class="ml-2">Paid</span>
                                            </label>
                                            <label class="inline-flex items-center">
                                                <input type="radio" name="payment" value="unpaid"
                                                    class="radio radio-primary">
                                                <span class="ml-2">Unpaid</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="flex justify-end">
                                        <button
                                            class="tracking-wide rounded-md px-5 py-4 bg-yellow-400 text-black text-sm font-bold hover:rounded-3xl transition-all duration-400">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-trainer-layout>