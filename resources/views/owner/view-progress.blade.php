<x-dash-layout>
    <div class="bg-white my-5 mx-14 shadow-lg h-screen rounded">
        <div class="flex flex-col gap-3 my-3 py-3">
            @foreach($request as $requests)
            <div class="flex flex-row justify-between gap-2 border border-gray-300 rounded mx-4">
                <div class="flex flex-col gap-3 p-3 w-96">
                    <h2 class="font-semibold text-xl">{{$requests->course}}</h2>
                    <p class="text-sm">Reference Code: {{$requests->code}}</p>
                    <p class="text-sm">Pet: {{$requests->pet_name}}</p>
                    <p class="text-sm">Trainer: {{$requests->trainer_name}}</p>
                    <p class="text-sm">Session: {{$requests->availability}}</p>
                    <p class="text-sm">Date: {{$requests->start_date}} - {{$requests->end_date}}</p>
                </div>
                <div class="flex items-center justify-center w-80 gap-3">
                    @if ($requests->status == 'pending')
                    <span class="badge bg-yellow-400 text-black text-xs border-none">
                        <i class="fa-solid fa-hourglass-start pr-1"></i>{{ $requests->status }}
                    </span> |
                    @elseif ($requests->status == 'approved')
                    <span class="badge bg-green-400 text-black text-xs border-none">
                        <i class="fa-solid fa-check pr-1"></i>{{ $requests->status }}
                    </span> |
                    @elseif ($requests->status == 'declined')
                    <span class="badge bg-red-400 text-black text-xs">
                        <i class="fa-solid fa-times pr-1"></i>{{ $requests->status }}
                    </span> |
                    @elseif ($requests->status == 'confirmed')
                    <span class="badge bg-blue-700 text-white text-xs">
                        <i class="fa-solid fa-check pr-1"></i>{{ $requests->status }}
                    </span> |
                    @endif

                    @if ($requests->payment == 'unpaid')
                    <span class="badge bg-yellow-400 text-black text-xs border-none">
                        <i class="fa-solid fa-exclamation-triangle pr-1"></i>{{ $requests->payment }}
                    </span>
                    @elseif ($requests->payment == 'paid')
                    <span class="badge bg-green-400 text-black text-xs border-none">
                        <i class="fa-solid fa-check pr-1"></i>{{ $requests->payment }}
                    </span>
                    @endif
                </div>
            </div>

            @endforeach
        </div>


        <div class="my-3 py-3">
            <div class="overflow-x-auto mx-9">
                <table class="w-full border border-gray-300 rounded">
                    <thead class="bg-blue-500 text-white text-sm font-bold">
                        <tr>
                            <th>
                                <div class="my-3">Day</div>
                            </th>
                            <th>Lesson</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                        </tr>
                    </thead>
                    <tbody class="text-center text-xs">
                        @forelse($trainingDetails as $det)
                        <tr class="border border-gray-300">
                            <td>
                                <div class="my-5">{{$det->day}}</div>
                            </td>
                            <td>{{$det->lesson}}</td>
                            <td>{{$det->start_time}}</td>
                            <td>{{$det->end_time}}</td>
                        </tr>
                        @empty
                        <div class=""></div>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>


    </div>
</x-dash-layout>