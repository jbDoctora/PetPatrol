<x-dash-layout>
    <div class="m-5 flex justify-end gap-3">
        <div>
            <p>Status</p>
            <select class="select w-full max-w-xs bg-base-300 border border-black">
                <option disabled selected></option>
                <option>On Going</option>
                <option>Approved</option>
                <option>Declined</option>
                <option>Completed</option>
            </select>
        </div>
        <div>
            <p>Date</p>
            <input type="date" class="h-12 rounded-lg border border-black bg-base-300 px-3">
        </div>
    </div>
    <div class="m-5 h-screen overflow-x-auto rounded-lg bg-white px-4">
        <div class="mx-auto mt-5 inline-block min-w-full overflow-hidden rounded-lg shadow-lg">
            <table class="min-w-full leading-normal bg-base-300">
                <thead>
                    <tr>
                        <th class="bg-yellow-400 px-6 py-3 text-left text-xs font-bold tracking-wider text-black">
                            Pet Name</th>
                        <th class="bg-yellow-400 px-6 py-3 text-left text-xs font-bold tracking-wider text-black">
                            Trainer Name</th>
                        <th class="bg-yellow-400 px-6 py-3 text-left text-xs font-bold tracking-wider text-black">
                            Status</th>
                        <th class="bg-yellow-400 px-6 py-3 text-left text-xs font-bold tracking-wider text-black">
                            Payment Status</th>
                        <th class="bg-yellow-400 px-6 py-3"></th>
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
                        <td class="whitespace-nowrap px-6 py-4 border-b border-black">{{ $pet_info }}</td>
                        <td class="whitespace-nowrap px-6 py-4 border-b border-black">{{ $requests->trainer_name }}</td>
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
                        <td class="whitespace-nowrap px-6 py-4 text-right text-sm font-medium border-b border-black">
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