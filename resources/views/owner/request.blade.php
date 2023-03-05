<x-dash-layout>
    <div class="mx-3 my-5 flex flex-row items-center justify-between rounded-md bg-white p-2">
        <div>
            <h1 class="align-middle text-lg font-bold">Your Request</h1>
        </div>
        <div>
            <button
                class="inline-block rounded-full border border-blue-600 bg-blue-600 px-2 py-1 text-sm font-medium text-white hover:bg-transparent hover:text-blue-700 focus:outline-none focus:ring active:text-blue-700 md:px-4 md:py-3">
                <a href="/book-trainer" target="_parent"><span class="hidden md:inline-block">Create Appointment</span></a>
                <i class="fa-solid fa-circle-plus mx-2"></i>
            </button>
        </div>
    </div>

    <div class="mx-3 bg-white">
        <div class="flex items-center rounded-sm p-3">
            <input type="text" class="input input-bordered w-96" placeholder="Search">
            <button class="btn ml-3 h-full border-blue-600 bg-blue-600 text-white hover:border-0 hover:bg-blue-700"><i
                    class="fa-solid fa-magnifying-glass"></i></button>
        </div>
        <div x-show="header"><i class="fa-solid fa-house fa-lg mr-8"></i> Request</div>
        <div class="grid grid-cols-1 gap-6 rounded px-3 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($requestinfo as $info)
                <div class="overflow-hidden rounded border border-slate-300 shadow-lg">
                    <div class="p-6">
                        <div class="mb-4 flex items-center justify-between">
                            <h1 class="text-sm font-semibold text-gray-700">Your Request</h1>
                        </div>
                        <h2 class="text-lg font-bold text-gray-800">{{ $info->pet }}</h2>
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
                                    <i class="fas fa-info-circle fa-lg text-gray-600 hover:text-blue-600"></i>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6 flex flex-col justify-end gap-3">
                            <button
                                class="rounded-lg bg-blue-600 py-2 px-4 text-sm text-white hover:border-0 focus:outline-none"><a
                                    href="/show-matched/{{ $info->request_id }}">View Matched Trainers</a></button>
                            <button
                                class="rounded-sm bg-gray-200 py-2 px-4 text-sm hover:bg-gray-300 focus:outline-none">Cancel</button>
                            <button
                                class="rounded-sm bg-gray-200 py-2 px-4 text-sm hover:bg-gray-300 focus:outline-none">Update</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</x-dash-layout>
