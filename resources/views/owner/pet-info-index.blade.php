<x-dash-layout>
    <div class="bg-white my-5 mx-14 shadow-lg h-full rounded">
        <div class="flex items-center justify-between text-2xl font-bold p-4 border-b border-slate-300 text-blue-700">
            <h3>Pet Profile</h3>
            <div>
                <button
                    class="bg-blue-700 px-4 py-3 text-white font-bold rounded hover:bg-blue-800 transition-all text-xs">
                    <a href="/pet/add-info" target="_parent"><span class="hidden md:inline-block">Add
                            Pet</span></a>
                    <i class="fa-solid fa-circle-plus mx-2"></i>
                </button>
            </div>
        </div>
        <div class="flex justify-start p-5 gap-4 text-xs mx-8">
            <div class="shrink border border-slate-300 bg-base-300 rounded flex items-center">
                <i class="fa-solid fa-magnifying-glass ml-2"></i>
                <input type="text" placeholder="Search"
                    class="px-6 py-2 bg-base-300 rounded-sm h-full text-xs w-80 md:w-52" />
            </div>
            <div>
                <select class="border border-slate-300 h-full px-3 py-2 text-left w-64 sm:w-40 rounded" name="" id="">
                    <option disabled selected>Pet type</option>
                    <option value="">Cat</option>
                    <option value="">Dog</option>
                    <option value="">Hamster</option>
                    <option value="">Parrot</option>
                </select>
            </div>
            <div>
                <button class="bg-blue-700 px-7 py-3 text-white font-bold rounded">
                    Search
                </button>
            </div>
        </div>
        <div class="mx-5 grid grid-cols-1 md:grid-cols-3 gap-3 rounded-lg px-3 text-xs">
            @forelse($petinfo as $petinfos)
            <div class="bg-gray-100 m-5 overflow-hidden rounded-md shadow-md">
                <div class="flex justify-end m-5 hover:bg">
                    <div class="dropdown dropdown-end rounded">
                        <label tabindex="0" class="cursor-pointer"><i
                                class="fa-solid fa-ellipsis-vertical fa-xl"></i></label>
                        <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded w-52">
                            <li class="p-2 hover:bg-blue-700 hover:text-white">Delete</li>
                            <li class="p-2 hover:bg-blue-700 hover:text-white">Edit</li>
                        </ul>
                    </div>
                </div>
                <div class="flex justify-center avatar p-3">
                    <div class="w-24 rounded-full ring ring-blue-700 ring-offset-base-100 ring-offset-2">
                        <img src="{{ $petinfos->image ? asset('storage/' . $petinfos->image) : asset('/images/no-image.png') }}"
                            alt="Pet image" class="h-full w-full object-cover">
                    </div>
                </div>
                <div class="text-center py-4">
                    <h2 class="text-lg font-bold">{{ $petinfos->pet_name }}</h2>
                    <p class="text-gray-500">{{ $petinfos->breed }}</p>
                </div>
                <div class="grid grid-cols-2 gap-4 px-4 mb-4">
                    <div class="col-span-2 bg-gray-200 p-4 rounded-md">
                        <i class="fa-solid fa-calendar-day fa-md text-gray-500"></i>
                        <span class="ml-2 text-gray-500">{{ $petinfos->years }} years {{ $petinfos->months }}
                            months</span>
                    </div>
                    <div class="col-span-2 bg-gray-200 p-4 rounded-md">
                        <i class="fa-solid fa-paw fa-md text-gray-500"></i>
                        <span class="ml-2 text-gray-500">{{ $petinfos->type }}</span>
                    </div>
                    <div class="col-span-2 bg-gray-200 p-4 rounded-md">
                        <i class="fa-solid fa-scale-balanced fa-md text-gray-500"></i>
                        <span class="ml-2 text-gray-500">{{ $petinfos->weight }} kgs.</span>
                    </div>
                    <div class="col-span-2 bg-gray-200 p-3 rounded-md">
                        <i class="fa-solid fa-syringe fa-md text-gray-500"></i>
                        <span class="ml-2 text-gray-500">{{ $petinfos->vaccine }}</span>
                    </div>
                    <div class="col-span-2 bg-gray-200 p-4 rounded-md">
                        <i class="fa-regular fa-rectangle-list fa-md text-gray-500"></i>
                        <span class="ml-2 text-gray-500"
                            x-data="{ vaccines: '{{ $petinfos->vaccine_list }}'.split(',') }">
                            <template x-for="(vaccine, index) in vaccines" :key="index">
                                <span
                                    class="inline-block bg-blue-700 text-white rounded-full px-3 py-1 text-xs font-semibold mr-2 mb-2">
                                    <span x-text="vaccine.trim()"></span>
                                </span>
                            </template>
                        </span>
                    </div>
                    <div class="col-span-2 bg-gray-200 p-4 rounded-md">
                        <i class="fa-solid fa-person-circle-exclamation fa-md text-gray-500"></i>
                        <span class="ml-2 text-gray-500">{{ $petinfos->info }}</span>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-3 mx-auto grid grid-cols-none">
                <div>
                    <img src="{{asset('images/empty-pet.png')}}" alt="" class="h-96 w-96 mx-auto">
                </div>
                <div>
                    <p class="text-base text-center font-bold mb-3">Your pet is excited, create your pet info now.</p>
                </div>
            </div>

            @endforelse
        </div>
    </div>

    <div class="pagination m-4 mb-9 justify-center">
        {{ $petinfo->links() }}
    </div>
</x-dash-layout>


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

{{-- <div class="mx-5 grid grid-cols-1 md:grid-cols-3 gap-2 rounded-lg bg-white px-3">
    @forelse($petinfo as $petinfos)

    <div class="bg-gray-100 m-5 overflow-hidden rounded-md shadow-md">
        <div class="flex justify-center avatar p-3">
            <div class="w-24 rounded-full ring ring-blue-700 ring-offset-base-100 ring-offset-2">
                <img src="{{ $petinfos->image ? asset('storage/' . $petinfos->image) : asset('/images/no-image.png') }}"
                    alt="Pet image" class="h-full w-full object-cover">
            </div>
        </div>
        <p class="text-center">{{$petinfos->pet_name}}</p>
        <div class="grid grid-cols-2 grid-rows-7 gap-4">
            <div class="bg-gray-200 p-4"><i class="fa-solid fa-calendar-day fa-md"></i></div>
            <div class="bg-gray-200 p-4">{{$petinfos->years}} years {{$petinfos->months}} months</div>

            <div class="bg-gray-200 p-4"><i class="fa-solid fa-paw fa-md"></i></div>
            <div class="bg-gray-200 p-4">{{$petinfos->type}}</div>

            <div class="bg-gray-200 p-4"><i class="fa-solid fa-dog fa-md"></i></div>
            <div class="bg-gray-200 p-4">{{$petinfos->breed}}</div>

            <div class="bg-gray-200 p-4"><i class="fa-solid fa-scale-balanced fa-md"></i></div>
            <div class="bg-gray-200 p-4">{{$petinfos->weight}}</div>

            <div class="bg-gray-200 p-4"><i class="fa-solid fa-syringe"></i></div>
            <div class="bg-gray-200 p-4">{{$petinfos->vaccine}}</div>

            <div class="bg-gray-200 p-4"><i class="fa-regular fa-rectangle-list fa-md"></i></div>
            <div class="bg-gray-200 p-4">{{$petinfos->vaccine_list}}</div>

            <div class="bg-gray-200 p-4"><i class="fa-solid fa-person-circle-exclamation fa-md"></i></div>
            <div class="bg-gray-200 p-4">{{$petinfos->info}}</div>
        </div>
    </div>
    @empty
    <div class="mx-auto grid grid-cols-none">
        <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_pkkire0h.json" background="transparent"
            speed="1" style="width: 300px; height: 300px;" loop autoplay> </lottie-player>
    </div>
    <p class="mt-4 text-center text-lg font-bold">Your pet is excited, Request a trainer now.</p> @endforelse

</div> --}}