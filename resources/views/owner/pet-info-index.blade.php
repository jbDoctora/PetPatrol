<x-dash-layout>

    <div class="flex items-center justify-between rounded-sm p-5">
        <div>
            <button
                class="tracking-wide rounded-md px-5 py-4 bg-yellow-400 text-black text-sm font-bold border border-black hover:rounded-3xl transition-all duration-400">
                <a href="/pet/add-info" target="_parent"><span class="hidden md:inline-block">Add
                        Pet</span></a>
                <i class="fa-solid fa-circle-plus mx-2"></i>
            </button>
        </div>
        <x-searchbar />
    </div>

    {{-- <p class="ml-4 p-2 text-lg font-bold">Your Pets</p> --}}
    {{-- <div class="mx-5 grid grid-cols-3 gap-3 rounded-lg bg-white px-3 md:grid-flow-row">
        @forelse($petinfo as $petinfos)
        <div class="bg-base-200 m-5 overflow-hidden rounded-md shadow-md">
            <figure class="h-48">
                <img src="{{ $petinfos->image ? asset('storage/' . $petinfos->image) : asset('/images/no-image.png') }}"
                    alt="Pet image" class="h-full w-full object-cover">
            </figure>
            <div class="p-4">
                <h2 class="text-lg font-bold">{{ $petinfos->name }}</h2>
                <p class="mt-2 text-gray-500">{{ $petinfos->type }} - {{ $petinfos->breed }}</p>
                <div class="mt-4 flex justify-end">
                    <a href="#" class="mr-4 text-cyan-500 hover:text-cyan-600">View</a>
                    <a href="#" class="text-gray-500 hover:text-gray-600">Edit</a>
                </div>
            </div>
        </div>
        @empty
        <div class="mx-auto grid grid-cols-none">
            <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_pkkire0h.json" background="transparent"
                speed="1" style="width: 300px; height: 300px;" loop autoplay>
            </lottie-player>
        </div>
        <p class="mt-4 text-center text-lg font-bold">Your pet is excited, Request a trainer now.</p>
        @endforelse
    </div> --}}
    <div class="mx-5 grid grid-cols-1 md:grid-cols-3 gap-2 rounded-lg bg-white px-3">
        @forelse($petinfo as $petinfos)
        {{-- <div class="bg-gray-100 m-5 overflow-hidden rounded-md shadow-md">
            <figure class="h-48">
                <img src="{{ $petinfos->image ? asset('storage/' . $petinfos->image) : asset('/images/no-image.png') }}"
                    alt="Pet image" class="h-full w-full object-cover">
            </figure>
            <div class="p-4">
                <h2 class="text-lg font-bold">{{ $petinfos->pet_name }}</h2>
                <p class="mt-2 text-gray-500">{{ $petinfos->pet_type }} - {{ $petinfos->breed }}</p>
                <div class="mt-4">
                    <div class="flex items-center mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-2" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path
                                d="M10 12a2 2 0 100-4 2 2 0 000 4zM3 10a7 7 0 1114 0 7 7 0 01-14 0zm7-8a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm8 1a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1z" />
                        </svg>
                        <span class="text-gray-500">{{ $petinfos->years }} years {{ $petinfos->months }} months
                            old</span>
                    </div>
                    <div class="flex items-center mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-2" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 2a8 8 0 100 16 8 8 0 000-16zM5.172 5.172a6 6 0 018.656 0l1.414-1.414a8 8 0 00-11.314 0l1.244 1.414zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="text-gray-500">{{ $petinfos->weight }} lbs</span>
                    </div>
                    <div class="flex items-center mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-2" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 2a8 8 0 100 16 8 8 0 000-16zM5.172 5.172a6 6 0 018.656 0l1.414-1.414a8 8 0 00-11.314 0l1.244 1.414zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="text-gray-500">{{ $petinfos->vaccine_list }}</span>
                    </div>
                    <div class="flex justify-end">
                        <a href="#" class="text-cyan-500 hover:text-cyan-600 mr-4">View</a>
                        <a href="#" class="text-gray-500 hover:text-gray-600">Edit</a>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="bg-gray-100 m-5 overflow-hidden rounded-md shadow-md">
            <div class="flex justify-center avatar p-3">
                <div class="w-24 rounded-full ring ring-blue-700 ring-offset-base-100 ring-offset-2">
                    <img src="{{ $petinfos->image ? asset('storage/' . $petinfos->image) : asset('/images/no-image.png') }}"
                        alt="Pet image" class="h-full w-full object-cover">
                </div>
            </div>
            <p class="text-center">{{$petinfos->pet_name}}</p>
            <div class="grid grid-cols-7 grid-rows-2 gap-4">
                <div class="bg-gray-200 p-4">1</div>
                <div class="bg-gray-200 p-4">2</div>
                <div class="bg-gray-200 p-4">3</div>
                <div class="bg-gray-200 p-4">4</div>
                <div class="bg-gray-200 p-4">5</div>
                <div class="bg-gray-200 p-4">6</div>
                <div class="bg-gray-200 p-4">7</div>
                <div class="bg-gray-200 p-4">8</div>
                <div class="bg-gray-200 p-4">9</div>
                <div class="bg-gray-200 p-4">10</div>
                <div class="bg-gray-200 p-4">11</div>
                <div class="bg-gray-200 p-4">12</div>
                <div class="bg-gray-200 p-4">13</div>
                <div class="bg-gray-200 p-4">14</div>
            </div>
        </div>
        @empty
        <div class="mx-auto grid grid-cols-none">
            <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_pkkire0h.json" background="transparent"
                speed="1" style="width: 300px; height: 300px;" loop autoplay> </lottie-player>
        </div>
        <p class="mt-4 text-center text-lg font-bold">Your pet is excited, Request a trainer now.</p> @endforelse

    </div>


    <div class="pagination m-4 mb-9 justify-center">
        {{ $petinfo->links() }}
    </div>
</x-dash-layout>