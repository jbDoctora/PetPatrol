<x-dash-layout>

    <div class="bg-white my-5 mx-14 shadow-lg h-full rounded border border-gray-300">
        <div class="flex items-center justify-between text-2xl font-bold p-4 border-b border-slate-300 text-blue-700">
            <h3>Request Manager</h3>
            <div>
                <button
                    class="bg-blue-700 px-4 py-3 text-white font-medium rounded hover:bg-blue-800 transition-all text-sm">
                    <a href="/book-trainer" target="_parent"><span class="hidden md:inline-block">Request Trainer
                        </span></a>
                </button>
            </div>
        </div>
        {{-- <div class="flex items-center justify-between text-xl font-medium p-4"> --}}
            <div class="grid grid-cols-1 gap-3 rounded px-3 md:grid-cols-2 lg:grid-cols-3">
                @forelse ($requestinfo as $info)
                <div class="m-5 overflow-hidden rounded-lg bg-gray-200 shadow-lg text-xs w-96">
                    <div class="p-6">
                        <div class="mb-4 flex items-center justify-between">
                            <h1 class="text-sm font-semibold text-blue-700">Your Request</h1>
                        </div>
                        <h2 class="text-lg font-bold text-gray-800">{{ $info->pet_name }}</h2>
                        <h3 class="text-sm font-medium text-gray-800">{{$info->pet_type}}</h3>
                        <div class="my-4 flex flex-row items-center justify-center">
                            <div class="w-1/2 text-center">
                                <p class="font-medium text-gray-600">Preferred Course</p>
                                <p class="font-semibold text-gray-900">{{ $info->course }}</p>
                            </div>
                            <div class="w-1/2 text-center">
                                <p class="font-medium text-gray-600">Sessions</p>
                                <p class="font-semibold text-gray-900">{{ $info->sessions }}</p>
                            </div>
                            <div class="w-1/2 text-center">
                                <p class="font-medium text-gray-600">Sessions</p>
                                @if($info->location == 'public')
                                <p class="font-semibold text-gray-900">In House</p>
                                @else
                                <p class="font-semibold text-gray-900">Group Session</p>
                                @endif
                            </div>
                        </div>
                        <div class="my-4 border-t border-gray-200"></div>
                        {{--
                        <div class="my-4">
                            <p class="text-left text-xs font-bold text-gray-700">Status:</p>
                            @if (!$match_count >= 1)
                            <div class="flex flex-row justify-between">
                                <p class="text-center text-xs font-bold text-green-500">Active Match</p>
                                <div class="tooltip tooltip-left"
                                    data-tip="Trainer matched, check your email for updates">
                                    <i class="fa-solid fa-circle-info fa-lg"></i>
                                </div>
                            </div>
                            @else
                            <div class="flex flex-row justify-between">
                                <p class="text-center text-xs font-bold text-red-500">No Active Match</p>
                                <div class="tooltip tooltip-left" data-tip="No active trainer matched, come back later">
                                    <i class="fa-solid fa-circle-info" style="font-size: 1.25rem;"></i>
                                </div>
                            </div>
                            @endif
                        </div> --}}


                        <div class="mt-6 flex flex-row justify-end gap-2">
                            <button
                                class="tracking-wide rounded px-5 py-2 bg-blue-700 text-white text-xs font-medium hover:bg-blue-800 tooltip"
                                data-tip="View matched trainers"><a href="/show-matched/{{ $info->request_id }}"><i
                                        class="fa-solid fa-binoculars fa-lg"></i></a></button>

                            <label
                                class="tracking-wide rounded px-5 py-2 bg-white text-black text-xs font-medium border border-gray-300 hover:bg-red-700 hover:text-white"
                                for="delete-modal-{{$info->request_id}}"><i class="fa-solid fa-trash fa-lg"></i></label>

                            <input type="checkbox" id="delete-modal-{{$info->request_id}}" class="modal-toggle" />
                            <div class="modal">
                                <div class="modal-box">
                                    <h3 class="font-bold text-lg">Confirm Deletion</h3>
                                    <p class="py-4 text-sm">Are you sure you want to delete the request?</p>
                                    <div class="modal-action">
                                        <form method="POST" action="/request/delete/{{$info->request_id}}">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="request_status" value="disabled">
                                            <input type="hidden" name="pet_id" value="{{$info->pet_id}}">
                                            <button class="bg-blue-700 px-4 py-2 rounded text-xs text-white"
                                                type="submit">Yes</button>

                                        </form>

                                        <label class="bg-neutral-800 px-4 py-2 rounded text-xs text-white"
                                            for="delete-modal-{{$info->request_id}}">No</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-3 flex justify-center items-center">
                    <div class="flex flex-col items-center">
                        <img src="{{asset('images/empty-request.png')}}" alt="" class="mx-auto h-96 w-96">
                        <p class="font-normal text-lg text-center ">Empty Request</p>
                    </div>
                </div>
                @endforelse
            </div>
            {{--
        </div> --}}
    </div>

</x-dash-layout>