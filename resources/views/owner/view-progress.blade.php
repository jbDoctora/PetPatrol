<x-dash-layout>
    <div class="bg-white p-2 my-5 mx-14 shadow-lg h-full rounded">
        <div class="flex flex-col gap-3 my-3 py-3">
            @foreach($request as $requests)
            <div class="flex flex-row justify-between gap-2 border border-gray-300 rounded mx-4">
                <div class="flex flex-col gap-3 p-3 w-96">
                    <h2 class="font-semibold text-xl">{{$requests->course}}</h2>
                    <p class="text-sm">Reference Code: {{$requests->code}}</p>
                    <p class="text-sm">Pet: {{$requests->pet_name}}</p>
                    <p class="text-sm">Trainer: {{$requests->trainer_name}}</p>
                    <p class="text-sm">Session: {{$requests->description}}</p>
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
                    @elseif ($requests->status == 'in progress')
                    <span class="badge bg-blue-700 text-white text-xs">
                        <i class="fa-solid fa-check pr-1"></i>{{ $requests->status }}
                    </span> |
                    @elseif ($requests->status == 'completed')
                    <span class="badge bg-green-400 text-green-700 text-xs">
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

        @forelse($trainingDetails as $details)
        <a class="block rounded bg-gray-100 p-4 sm:p-6 lg:p-8 mx-8 my-5" href="#">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-700" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path d="M12 14l9-5-9-5-9 5 9 5z" />
                    <path
                        d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                </svg>
                <p class="font-bold text-base">Lesson</p>
            </div>

            <h3 class="mt-3 text-lg font-bold text-gray-800 sm:text-xl">
                {{$details->lesson}}
            </h3>

            <p class="mt-4 text-sm text-gray-800 text-justify">
                {{$details->description}}
            </p>
        </a>
        @empty
        <div class="flex flex-col justify-center items-center">
            <img src="{{asset('/images/empty-pet-training.png')}}" alt="Empty Pet Training"
                class="h-96 w-96 object-contain">
            <p class="p-5 text-lg text-gray-600">There are no pet training lessons available at the moment.</p>
        </div>
        @endforelse

    </div>
</x-dash-layout>