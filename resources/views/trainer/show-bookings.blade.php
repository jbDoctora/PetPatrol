<x-trainer-layout>
    <div x-data="{ showModal: false }" x-on:keydown.window.escape="showModal = false">
        <div class="mx-9 my-5 flex flex-row justify-between">
            <div>
                <h1 class="text-4xl font-bold">My Bookings</h1>
            </div>
        </div>
        <div class="m-5 h-screen overflow-x-auto rounded-lg bg-white px-4">
            <div class="mx-auto mt-5 inline-block min-w-full overflow-hidden rounded-lg shadow-lg">
                <table class="min-w-full leading-normal bg-base-300">
                    <thead>
                        <tr>
                            <th
                                class="bg-yellow-400 px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-black">
                                Pet Name</th>
                            <th
                                class="bg-yellow-400 px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-black">
                                Client Name</th>
                            <th
                                class="bg-yellow-400 px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-black">
                                Status</th>
                            <th
                                class="bg-yellow-400 px-6 py-3 text-left text-xs font-medium uppercase tracking-widertext-black">
                                Payment Status</th>
                            <th class="bg-yellow-400 px-6 py-3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($request as $requests)
                        {{-- @php
                        $pet_info = DB::table('pet_info')
                        ->where('pet_id', $requests->pet_id)
                        ->value('pet_name');
                        @endphp --}}
                        <tr>
                            <td class="whitespace-nowrap px-6 py-4 border-b border-black">{{ $request->pet_name}}</td>
                            <td class="whitespace-nowrap px-6 py-4 border-b border-black">{{ $requests->client_name }}
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 border-b border-black">
                                @if ($requests->status == 'pending')
                                <span
                                    class="inline-flex rounded-full bg-yellow-100 px-2 text-xs font-semibold leading-5 text-yellow-800">{{
                                    $requests->status }}</span>
                                @elseif ($requests->status == 'approved')
                                <span
                                    class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">{{
                                    $requests->status }}</span>
                                @elseif ($requests->status == 'declined')
                                <span
                                    class="inline-flex rounded-full bg-red-100 px-2 text-xs font-semibold leading-5 text-red-800">{{
                                    $requests->status }}</span>
                                @endif
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 border-b border-black">
                                @if ($requests->payment == 'unpaid')
                                <span
                                    class="inline-flex rounded-full bg-red-100 px-2 text-xs font-semibold leading-5 text-yellow-800">{{
                                    $requests->payment }}</span>
                                @elseif ($requests->payment == 'paid')
                                <span
                                    class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">{{
                                    $requests->payment }}</span>
                                @endif
                            </td>
                            <td
                                class="whitespace-nowrap px-6 py-4 text-right text-sm font-medium border-b border-black">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900"
                                    x-on:click="showModal = { course: '{{ $requests->course }}', availability: '{{ $requests->availability }}', name: '{{ $requests->client_name }}' }">View</a>
                                <a href="#" class="ml-4 text-red-600 hover:text-red-900">Cancel</a>
                            </td>
                        </tr>

                        <div x-cloak x-show="showModal" x-transition
                            class="fixed inset-0 z-50 flex items-center justify-center bg-gray-800 bg-opacity-75">
                            <div x-on:click.away="showModal = false"
                                class="w-full max-w-md bg-white rounded-lg shadow-lg">
                                <div class="px-6 py-4">
                                    <h2 class="text-2xl font-bold mb-2">Client Information</h2>
                                    <div class="grid grid-cols-2 gap-4 mb-4 bg-base-300 rounded-lg p-5">
                                        <div class="font-bold">Client name:</div>
                                        <div x-text="showModal.name"></div>
                                        <div class="font-bold">Training service:</div>
                                        <div x-text="showModal.course"></div>
                                        <div class="font-bold">Sessions:</div>
                                        <div x-text="showModal.availability"></div>
                                    </div>
                                    <form>
                                        <div class="mb-4">
                                            <h3 class="text-lg font-bold mb-2">Update Status:</h3>
                                            <div>
                                                <label class="inline-flex items-center">
                                                    <input type="radio" name="status" value="approve"
                                                        class="radio radio-primary">
                                                    <span class="ml-2">Approve</span>
                                                </label>
                                                <label class="inline-flex items-center ml-6">
                                                    <input type="radio" name="status" value="decline"
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
                                                <label class="inline-flex items-center ml-6">
                                                    <input type="radio" name="payment" value="unpaid"
                                                        class="radio radio-primary" checked>
                                                    <span class="ml-2">Unpaid</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="flex justify-end">
                                            <button type="submit"
                                                class="tracking-wide rounded-md px-5 py-4 bg-yellow-400 text-black text-sm font-bold border border-black hover:rounded-3xl transition-all duration-400">Update</button>
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
    </div>
</x-trainer-layout>