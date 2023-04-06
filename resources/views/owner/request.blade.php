<x-dash-layout>

    <div class="bg-white rounded m-5 h-full">
        <div class="flex items-center justify-between text-xl font-medium p-4 border-b border-slate-300 text-blue-700">
            <h3>Request Manager</h3>
            <div>
                <button
                    class="bg-blue-700 px-4 py-3 text-white font-bold rounded hover:bg-blue-800 transition-all text-xs">
                    <a href="/book-trainer" target="_parent"><span class="hidden md:inline-block">Request Trainer
                        </span></a>
                </button>
            </div>
        </div>

        <div class="flex items-center justify-between text-xl font-medium p-4 border-b border-slate-300 text-blue-700">
            <div class="grid grid-cols-1 gap-6 rounded px-3 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($requestinfo as $info)
                <div class="m-5 overflow-hidden rounded-lg border border-slate-400 shadow-lg text-xs w-96">
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
                        </div>
                        <div class="my-4 border-t border-gray-200"></div>
                        <div class="my-4">
                            <p class="text-left text-xs font-bold text-gray-700">Status:</p>
                            @if (!$matchedservices->isEmpty())
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
                                    <i class="fa-solid fa-circle-info fa-xl"></i>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="mt-6 flex flex-row justify-end gap-2">
                            <button
                                class="tracking-wide rounded px-5 py-2 bg-blue-700 text-white text-xs font-medium hover:bg-blue-800"><a
                                    href="/show-matched/{{ $info->request_id }}"><i
                                        class="fa-solid fa-binoculars fa-lg"></i></a></button>
                            <button
                                class="tracking-wide rounded px-5 py-2 bg-white text-black text-xs font-medium border border-gray-300 hover:bg-red-700 hover:text-white"><i
                                    class="fa-solid fa-trash fa-lg"></i></button>
                            <button
                                class="tracking-wide rounded px-5 py-2 bg-white text-black text-xs font-medium border border-gray-300 hover:bg-gray-300"><i
                                    class="fa-solid fa-pen-to-square fa-lg"></i></button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</x-dash-layout>