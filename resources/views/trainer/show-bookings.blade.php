<x-trainer-layout>
    <div x-data="{ showModal: false }" x-on:keydown.window.escape="showModal = false">
        <div class="mx-9 my-5 flex flex-row justify-between">
            <div>
                <h1 class="text-4xl font-bold">My Bookings</h1>
            </div>
        </div>
        <div class="overflow-x-auto px-4">
            <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th
                                class="bg-gray-50 px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                Pet Name</th>
                            <th
                                class="bg-gray-50 px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                Client Name</th>
                            <th
                                class="bg-gray-50 px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                Status</th>
                            <th
                                class="bg-gray-50 px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                Payment Status</th>
                            <th class="bg-gray-50 px-6 py-3"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($request as $requests)
                        @php
                        $pet_info = DB::table('pet_info')
                        ->where('pet_id', $requests->pet_id)
                        ->value('name');
                        @endphp
                        <tr>
                            <td class="whitespace-nowrap px-6 py-4">{{ $pet_info }}</td>
                            <td class="whitespace-nowrap px-6 py-4">{{ $requests->client_name }}</td>
                            <td class="whitespace-nowrap px-6 py-4">
                                @if ($requests->status == 'on going')
                                <span
                                    class="inline-flex rounded-full bg-yellow-100 px-2 text-xs font-semibold leading-5 text-yellow-800">{{
                                    $requests->status }}</span>
                                @elseif ($requests->status == 'Approved')
                                <span
                                    class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">{{
                                    $requests->status }}</span>
                                @elseif ($requests->status == 'Declined')
                                <span
                                    class="inline-flex rounded-full bg-red-100 px-2 text-xs font-semibold leading-5 text-red-800">{{
                                    $requests->status }}</span>
                                @endif
                            </td>
                            <td class="whitespace-nowrap px-6 py-4">
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
                            <td class="whitespace-nowrap px-6 py-4 text-right text-sm font-medium">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900"
                                    x-on:click="showModal = !showModal">View</a>
                                <a href="#" class="ml-4 text-red-600 hover:text-red-900">Cancel</a>
                            </td>
                        </tr>

                        <div x-cloak x-show="showModal" x-transition.opacity class="fixed inset-0 bg-slate-900/75">
                        </div>
                        <div x-cloak x-show="showModal" x-transition
                            class="fixed inset-0 z-50 flex items-center justify-center h-auto">
                            <div x-on:click.away="showModal = false"
                                class="w-screen max-w-xl mx-auto bg-white rounded-lg h-auto">
                                <p class="text-center font-bold">Client Information</p>
                                <div class="grid grid-cols-2 grid-rows-3 p-5">
                                    <p>Client name:</p>
                                    <p>{{$requests->client_name}}</p>
                                    <p>Additional info about pet: </p>
                                    <p>{{$requests->info}}</p>
                                    <p>Pet type: </p>
                                    <p>{{$requests->pet_type}}</p>
                                </div>
                                <p class="pl-3">Update Status:</p>
                                <div class="flex flex-col p-5 gap-3">
                                    <div class="flex px-3">
                                        <input type="radio" name="status" class="radio radio-primary" />
                                        <p class="px-5">Approve</p>
                                    </div>
                                    <div class="flex px-3">
                                        <input type="radio" name="status" class="radio radio-primary" />
                                        <p class="px-5">Decline</p>
                                    </div>
                                </div>
                                <p class="p-4">Payment Status</p>
                                <div class="flex flex-col p-5 gap-3">
                                    <div class="flex px-3">
                                        <input type="radio" name="payment" class="radio radio-primary" />
                                        <p class="px-5">Paid</p>
                                    </div>
                                    <div class="flex px-3">
                                        <input type="radio" name="payment" class="radio radio-primary" checked />
                                        <p class="px-5">Unpaid</p>
                                    </div>
                                    <button class="mx-auto btn">Update</button>
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