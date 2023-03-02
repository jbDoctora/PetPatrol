<x-dash-layout>
    <div class="mx-9 my-5 flex flex-row justify-between">
        <div>
            <h1 class="text-4xl font-bold">My Bookings</h1>
        </div>
        <div>
            <a href="#"
                class="inline-flex items-center justify-center rounded-md border border-transparent bg-cyan-400 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-cyan-500 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2">New
                Booking</a>
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
                            Trainer Name</th>
                        <th
                            class="bg-gray-50 px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                            Status</th>
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
                            <td class="whitespace-nowrap px-6 py-4">{{ $requests->name }}</td>
                            <td class="whitespace-nowrap px-6 py-4">
                                @if ($requests->status == 'Under review')
                                    <span
                                        class="inline-flex rounded-full bg-yellow-100 px-2 text-xs font-semibold leading-5 text-yellow-800">{{ $requests->status }}</span>
                                @elseif ($requests->status == 'Approved')
                                    <span
                                        class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">{{ $requests->status }}</span>
                                @elseif ($requests->status == 'Declined')
                                    <span
                                        class="inline-flex rounded-full bg-red-100 px-2 text-xs font-semibold leading-5 text-red-800">{{ $requests->status }}</span>
                                @endif
                            </td>
                            <td class="whitespace-nowrap px-6 py-4 text-right text-sm font-medium">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900">View</a>
                                <a href="#" class="ml-4 text-red-600 hover:text-red-900">Cancel</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-dash-layout>
