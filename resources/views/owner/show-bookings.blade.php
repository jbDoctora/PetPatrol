<x-dash-layout>
    <div class="m-5 overflow-x-auto">
        {{-- <div class="mx-auto mt-5 inline-block min-w-full overflow-hidden rounded-lg shadow-lg"> --}}
            <table class="min-w-full leading-normal bg-base-300">
                <thead>
                    <tr class="text-left font-bold bg-yellow-700 text-white">
                        <th class="px-6 py-4">
                            Pet Name</th>
                        <th class="px-6 py-4">
                            Trainer Name</th>
                        <th class="px-6 py-4">
                            Status</th>
                        <th class="px-6 py-4">
                            Payment Status</th>
                        <th class="px-6 py-4"></th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($request as $requests)
                    <tr>
                        <td class="px-6 py-4">{{ $requests->pet_name }}</td>
                        <td class="px-6 py-4">{{ $requests->trainer_name }}</td>
                        <td class="px-3 py-4">
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
                        <td class="px-6 py-4">
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
                        <td class="px-6 py-4">
                            <a href="#" class="text-indigo-600 hover:text-indigo-900">View</a>
                            <a href="#" class="ml-4 text-red-600 hover:text-red-900">Cancel</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{--
        </div> --}}

    </div>
</x-dash-layout>