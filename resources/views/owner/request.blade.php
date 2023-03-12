<x-dash-layout>

    <div class="flex items-center justify-between rounded-sm p-5">
        <div>
            <button
                class="tracking-wide rounded-md px-5 py-4 bg-yellow-400 text-black text-sm font-bold border border-black hover:rounded-3xl transition-all duration-400">
                <a href="/book-trainer" target="_parent"><span class="hidden md:inline-block">Create
                        Appointment</span></a>
                <i class="fa-solid fa-circle-plus mx-2"></i>
            </button>
        </div>
        <x-searchbar />
    </div>
    <div class="m-5 h-screen rounded-lg bg-base-300">
        <div class="grid grid-cols-1 gap-6 rounded px-3 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($requestinfo as $info)
            <div class="m-5 overflow-hidden rounded-lg border border-slate-400 shadow-lg">
                <div class="p-6">
                    <div class="mb-4 flex items-center justify-between">
                        <h1 class="text-sm font-semibold text-gray-700">Your Request</h1>
                    </div>
                    <h2 class="text-lg font-bold text-gray-800">{{ $info->pet_name }}</h2>
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
                        <p class="text-left text-lg font-bold text-gray-700">Status:</p>
                        <div class="flex flex-row justify-between">
                            <p class="text-center text-xl font-bold text-red-500">No Active Match</p>
                            <div class="tooltip tooltip-left" data-tip="No active trainer matched, come back later">
                                <span class="material-icons-outlined hover:text-blue-600">
                                    info
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 flex flex-col justify-end gap-3">
                        <button
                            class="tracking-wide rounded-md px-5 py-2 bg-yellow-400 text-black text-sm font-bold border border-black hover:rounded-3xl transition-all duration-300"><a
                                href="/show-matched/{{ $info->request_id }}">View Matched Trainers</a></button>
                        <button
                            class="tracking-wide rounded-md px-5 py-2 text-black text-sm font-bold border border-black hover:rounded-3xl transition-all duration-400">Cancel</button>
                        <button
                            class="tracking-wide rounded-md px-5 py-2 text-black text-sm font-bold border border-black hover:rounded-3xl transition-all duration-400">Update</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</x-dash-layout>