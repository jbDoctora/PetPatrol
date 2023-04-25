<x-dash-layout>
    <div class="bg-white my-5 mx-14 shadow-lg h-full rounded border border-gray-300">
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

        <div class="mx-5 grid grid-cols-1 md:grid-cols-3 gap-3 rounded-lg px-3 text-xs">
            @forelse($petinfo as $petinfos)
            <div class="bg-gray-100 m-5 overflow-hidden rounded-md shadow-md">
                <div class="flex justify-between items-center m-5 hover:bg">
                    @if($petinfos->book_status == "inactive")
                    <div class="m-2 tooltip tooltip-right" data-tip="available for training">
                        <div class="rounded-full bg-green-400 w-3 h-3"></div>
                    </div>
                    @elseif($petinfos->book_status == "pending")
                    <div class="m-2 tooltip tooltip-right" data-tip="unavailable for training">
                        <div class="rounded-full bg-red-400 w-3 h-3"></div>
                    </div>
                    @elseif($petinfos->book_status == "requested")
                    <div class="m-2 tooltip tooltip-right" data-tip="requested for training">
                        <div class="rounded-full bg-yellow-400 w-3 h-3"></div>
                    </div>
                    @endif
                    <div class="dropdown dropdown-end rounded">
                        <label tabindex="0" class="cursor-pointer"><i
                                class="fa-solid fa-ellipsis-vertical fa-xl"></i></label>
                        <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded w-52">
                            <li>
                                <label for="pet-modal-{{$petinfos->pet_id}}"
                                    class="p-2 hover:bg-blue-700 hover:text-white">Update</label>
                            </li>
                        </ul>
                    </div>
                </div>
                {{-- --modal --}}
                <input type="checkbox" id="pet-modal-{{$petinfos->pet_id}}" class="modal-toggle" />
                <div class="modal">
                    <form method="POST" action="/pet-info/{{$petinfos->pet_id}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-box relative rounded w-full max-w-4xl">
                            <label for="pet-modal-{{$petinfos->pet_id}}"
                                class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                            <h3 class="text-lg font-bold"><i class="fa-solid fa-pen-to-square pr-3"></i>Pet Info</h3>
                            <div class="flex flex-col gap-5">
                                <div class=" flex flex-col gap-4 my-2">
                                    <div class="flex items-center gap-5 justify-center">
                                        <div class="avatar">
                                            <div class="w-32 h-32 rounded-full bg-gray-100">
                                                <img src="{{ $petinfos->image ? asset('storage/' . $petinfos->image) : asset('/images/no-image.png') }}"
                                                    alt="Pet image" class="h-full w-full object-cover">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" flex flex-col gap-4 my-2 m-3 p-3 border border-gray-300 rounded">
                                    <div class="flex items-center gap-5 justify-between my-5">
                                        <label for="">Upload new pet picture</label>
                                        <input type="file"
                                            class="file-input file-input-sm sm:file-input-xs file-input-bordered"
                                            name="image" />
                                    </div>
                                </div>
                                <div class=" flex flex-col gap-4 my-2">
                                    <div class="flex items-center gap-5 justify-between">
                                        <label for="">Pet Name</label>
                                        <input type="text" class="border border-gray-200 rounded p-3 bg-gray-100"
                                            name="pet_name" value="{{$petinfos->pet_name}}">
                                    </div>
                                </div>
                                <div class=" flex flex-col gap-4 my-2">
                                    <div class="flex items-center gap-5 justify-between">
                                        <label for="">Years</label>
                                        <input type="text" class="border border-gray-200 rounded p-3 bg-gray-100"
                                            name="years" value="{{$petinfos->years}}">
                                    </div>
                                </div>
                                <div class=" flex flex-col gap-4 my-2">
                                    <div class="flex items-center gap-5 justify-between">
                                        <label for="">Months</label>
                                        <input type="text" class="border border-gray-200 rounded p-3 bg-gray-100"
                                            name="months" value="{{$petinfos->months}}">
                                    </div>
                                </div>
                                <div class=" flex flex-col gap-4 my-2">
                                    <div class="flex items-center gap-5 justify-between">
                                        <label for="">Breed</label>
                                        <input type="text" class="border border-gray-200 rounded p-3 bg-gray-100"
                                            name="breed" value="{{$petinfos->breed}}">
                                    </div>
                                </div>
                                <div class=" flex flex-col gap-4 my-2">
                                    <div class="flex items-center gap-5 justify-between">
                                        <label for="">Weight</label>
                                        <select type="text" class="border border-gray-200 rounded p-3 bg-gray-100 w-44"
                                            name="weight" value="{{$petinfos->weight}}">
                                            <option value="1-5">1-5 kgs.</option>
                                            <option value="5-10">5-10 kgs.</option>
                                            <option value="10-20">10-20 kgs.</option>
                                            <option value="10-35">20-35 kgs.</option>
                                            <option value="30+">30+ kgs.</option>
                                        </select>
                                    </div>
                                </div>
                                <div class=" flex flex-col gap-4 my-2">
                                    <div class="flex items-center gap-5 justify-between">
                                        <label for="">Vaccine</label>
                                        <select type="text" class="border border-gray-200 rounded p-3 bg-gray-100 w-44"
                                            name="weight" value="{{$petinfos->vaccine}}">
                                            <option value="Vaccinated">vaccinated</option>
                                            <option value="Unvaccinated">unvaccinated</option>
                                        </select>
                                    </div>
                                </div>
                                <div class=" flex flex-col gap-4 my-2">
                                    <div class="flex items-center gap-5 justify-between">
                                        <label for="">Vaccine List</label>
                                        <input type="text" class="border border-gray-200 rounded p-3 bg-gray-100"
                                            name="vaccine_list" value="{{$petinfos->vaccine_list}}">
                                    </div>
                                </div>
                                <div class="flex flex-col gap-2 my-2">
                                    <div class="">
                                        <label for="">More Info</label>
                                    </div>
                                    <div><textarea class="border border-gray-200 rounded p-3 bg-gray-100 w-full"
                                            name="info">{{$petinfos->info}}</textarea></div>
                                </div>
                            </div>
                            <div class="flex my-2 justify-end rounded">
                                <div class="">
                                    <button class="bg-blue-700 text-white px-4 py-2 hover:bg-blue-800"
                                        type="submit">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- end of modal --}}
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
                    <p class="text-lg text-center font-normal mb-3">Your pet is excited, create your pet info now.</p>
                </div>
            </div>
            @endforelse

        </div>

        <div class="p-5">
            {{ $petinfo->links() }}
        </div>

    </div>
</x-dash-layout>