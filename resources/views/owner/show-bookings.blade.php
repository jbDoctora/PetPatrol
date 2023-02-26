<x-dash-layout>
    <h1 class="pl-3">My Bookings</h1>
    {{-- @foreach ($request as $requests)
        @php
            $pet_info = DB::table('pet_info')
                ->where('pet_id', $requests->pet_id)
                ->value('name');
        @endphp
        <div class="mx-auto flex w-full max-w-screen-xl items-center rounded-lg bg-white px-4 py-6 shadow-md">
            <div class="w-1/2 pr-8">
                <h2 class="text-3xl font-semibold text-gray-800">{{ $pet_info }}</h2>
                <p class="mt-2 text-gray-600">{{ $requests->name }}</p>

            </div>
            <div class="flex w-1/2 justify-end">
                <p class="mt-14 mr-6">Status: <span class="text-yellow-500">{{ $requests->status }}</span></p>
                <button><i class="fa-solid fa-rectangle-xmark fa-xl mb-20" style="color: red"></i></button>
            </div>
        </div>
    @endforeach --}}

    <div class="overflow-x-auto px-4">
        <table class="table w-full">
            <thead>
                <tr>
                    <th>Pet name</th>
                    <th>Pet Trainer</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            @foreach ($request as $requests)
                @php
                    $pet_info = DB::table('pet_info')
                        ->where('pet_id', $requests->pet_id)
                        ->value('name');
                @endphp
                <tbody>

                    <tr>

                        <th>{{ $pet_info }}</th>
                        <td>{{ $requests->name }}</td>
                        <td><span class="text-yellow-400">{{ $requests->status }}</span></td>
                        <td>
                            <div class="flex flex-row gap-4">
                                <button>
                                    <i class="fa-solid fa-circle-xmark fa-lg" style="color: red"></i>
                                </button>
                                <button>
                                    <i class="fa-solid fa-eye fa-lg" style="color: blue"></i>
                                </button>
                            </div>
                        </td>

                    </tr>

                </tbody>
            @endforeach
        </table>
    </div>

</x-dash-layout>
