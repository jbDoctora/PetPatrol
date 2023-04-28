<x-trainer-layout>
    <div x-data="{ price: '' }">
        <div class="bg-white my-5 mx-14 sm:mx-9 shadow-lg h-screen rounded border border-gray-300">
            <div class="flex justify-between text-2xl font-extrabold p-4 border-b border-slate-300 text-blue-700">
                <div>
                    <h3>Training Class</h3>
                </div>
                <div>
                    @if($portfolio == 0)
                    <label for="error-modal"
                        class="bg-blue-700 px-5 py-3 text-white font-bold rounded text-xs hover:bg-blue-800 cursor-pointer">Add
                        training
                        service</label>
                    @elseif(empty(auth()->user()->gcash_number || auth()->user()->gcash_qr))
                    <label for="error-modal-2"
                        class="bg-blue-700 px-5 py-3 text-white font-bold rounded text-xs hover:bg-blue-800 cursor-pointer">Add
                        training
                        service</label>
                    @else
                    <label for="my-modal"
                        class="bg-blue-700 px-5 py-3 text-white font-bold rounded text-xs hover:bg-blue-800 cursor-pointer">Add
                        training
                        service</label>
                    @endif
                </div>
            </div>

            <div class="mt-2 min-w-full overflow-hidden rounded-none">
                <table class="w-full text-xs">
                    <thead class="text-center bg-gray-200 text-gray-800">
                        <tr>
                            <th class="text-xs font-normal py-3">Training service</th>
                            <th class="text-xs font-normal">Pet type</th>
                            <th class="text-xs font-normal">Description</th>
                            <th class="text-xs font-normal">Days of training</th>
                            <th class="text-xs font-normal">Price</th>
                            <th class="text-xs font-normal">Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="text-center text-xs">
                        @forelse ($training as $trainings)
                        <tr>
                            <td class="whitespace-nowrap  border-b border-slate-200 py-4">
                                {{$trainings->course}}</td>
                            <td class="whitespace-nowrap  border-b border-slate-200">
                                {{$trainings->pet_type}}</td>
                            <td class="whitespace-nowrap  border-b border-slate-200">
                                {{$trainings->description}}</td>
                            <td class="whitespace-nowrap  border-b border-slate-200">
                                {{$trainings->days}} days</td>
                            <td class="whitespace-nowrap  border-b border-slate-200">
                                {{$trainings->price}}</td>
                            <td class="whitespace-nowrap  border-b border-slate-2000">
                                @if($trainings->status == "available")
                                <p class="text-green-500 font-normal">{{$trainings->status}}</p>
                                @else
                                <p class="text-red-500 font-normal">unavailable</p>
                                @endif
                            </td>
                            <td class="whitespace-nowrap border-b border-slate-200">
                                <div class="flex items-center justify-center gap-2">
                                    <button class="bg-blue-700 text-white px-3 py-2 rounded hover:bg-blue-800"
                                        data-tip="view training plan"><a
                                            href="/trainer/service/add-service/{{ $trainings->id }}"><i
                                                class="fa-solid fa-eye"></i></a></button>

                                    @if($trainings->status == 'available')
                                    <label for="update-modal-{{$trainings->id}}"
                                        class="bg-blue-700 text-white px-3 py-2 rounded cursor-pointer hover:bg-blue-800"
                                        type="submit"><i class="fa-solid fa-edit"></i></label>
                                    {{-- DESTROY --}}
                                    <form method="POST" action="/trainer/service/delete/{{$trainings->id}}">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="bg-blue-700 text-white px-3 py-2 rounded cursor-pointer hover:bg-blue-800"
                                            type="submit"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                    @else
                                    <button class="bg-gray-300 text-gray-500 px-3 py-2 rounded tooltip tooltip-xs"
                                        data-tip="Service is Currently booked" disabled><i
                                            class="fa-solid fa-edit"></i></button>
                                    <button class="bg-gray-300 text-gray-500 px-3 py-2 rounded tooltip tooltip-xs"
                                        data-tip="Service is Currently booked" disabled><i
                                            class="fa-solid fa-trash"></i></button>
                                    @endif



                                    {{-- MODAL FOR UPDATE --}}
                                    <form method="POST" action="/trainer/service/update/{{$trainings->id}}">
                                        @csrf
                                        @method('PUT')
                                        <input type="checkbox" id="update-modal-{{$trainings->id}}"
                                            class="modal-toggle flex items-center justify-center" />
                                        <div class="modal">
                                            <div class="modal-box max-w-5xl rounded">
                                                <label for="update-modal-{{$trainings->id}}"
                                                    class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                                                <h1 class="my-5 text-lg text-left font-bold">Input course details:</h1>
                                                <div class="grid grid-cols-2 gap-6 items-center">
                                                    <div>
                                                        <p class="text-sm text-left">Price</p>
                                                        <input type="text" value="{{$trainings->price}}"
                                                            class="border border-gray-300 rounded px-4 py-3 w-full h-11 text-xs"
                                                            name="price" required>
                                                        @error('price')
                                                        <p class="mt-1 text-xs text-red-500">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                    <div>
                                                        <p class="text-sm text-left">Training Service</p>
                                                        <select
                                                            class="border border-gray-300 rounded px-4 py-3 w-full h-11 text-xs"
                                                            name="course" value="{{$trainings->course}}" required>
                                                            <option disabled selected>Choose training course</option>
                                                            @foreach($adminService as $service)
                                                            <option>{{$service->admin_service}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('course')
                                                        <p class="mt-1 text-xs text-red-500">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                    <div>
                                                        <p class="text-sm text-left">Pet Type</p>
                                                        <select
                                                            class="border border-gray-300 rounded px-4 py-3 w-full h-11 text-xs"
                                                            name="pet_type" value="{{$trainings->pet_type}}" required>
                                                            <option disabled selected>Choose pet type</option>
                                                            @foreach($adminPetType as $petType)
                                                            <option>{{$petType->admin_petType}}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('pet_type')
                                                        <p class="mt-1 text-xs text-red-500">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                    <div>
                                                        <p class="text-sm text-left">Session</p>
                                                        <textarea name="description" id="" cols="3" rows="3"
                                                            class="w-full rounded broder border-gray-200 p-2 text-sm"></textarea>
                                                        @error('description')
                                                        <p class="mt-1 text-xs text-red-500">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                    <div>
                                                        <p class="text-sm text-left">Days of Training</p>
                                                        <input type="number"
                                                            class="border border-gray-300 rounded px-4 py-3 w-full h-11 text-xs"
                                                            name="days" value="{{$trainings->days}}" required>
                                                        @error('days')
                                                        <p class="mt-1 text-xs text-red-500">{{$message}}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <input type="hidden" name="status" value="available" />
                                                <div class="modal-action flex items-center justify-end">
                                                    <button type="submit"
                                                        class="bg-blue-700 text-white text-sm text-center rounded px-3 py-2 w-20 hover:bg-blue-800">Update</button>
                                                    <label for="my-modal"
                                                        class="bg-neutral-900 text-white text-sm text-center rounded px-3 py-2 w-20 hover:bg-neutral-800">Close</label>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </td>
                        </tr>

                        @empty
                        <tr>
                            <td colspan="8" class="text-center py-4">No service created yet</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>


        {{-- Modal that asks user input --}}
        <form method="POST" action="/trainer/service/add-service/addService"
            x-on:submit="price = price.replace(/,/g, '')">
            @csrf
            <input type="checkbox" id="my-modal" class="modal-toggle flex items-center justify-center" />
            <div class="modal">
                <div class="modal-box max-w-5xl rounded">
                    <label for="my-modal" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                    <h1 class="my-5 text-lg font-bold">Input course details:</h1>
                    <div class="grid grid-cols-2 gap-6 items-center">
                        <div>
                            <p class="text-sm">Price</p>
                            <input type="text" x-model="price"
                                class="border border-gray-300 rounded px-4 py-3 w-full h-11 text-xs" name="price">
                            @error('price')
                            <p class="mt-1 text-xs text-red-500">{{$message}}</p>
                            @enderror
                        </div>
                        <div>
                            <p class="text-sm">Training Service</p>
                            <select class="border border-gray-300 rounded px-4 py-3 w-full h-11 text-xs" name="course"
                                required>
                                <option disabled selected>Choose training course</option>
                                @foreach($adminService as $service)
                                <option>{{$service->admin_service}}</option>
                                @endforeach
                            </select>
                            @error('course')
                            <p class="mt-1 text-xs text-red-500">{{$message}}</p>
                            @enderror
                        </div>
                        <div>
                            <p class="text-sm">Pet Type</p>
                            <select class="border border-gray-300 rounded px-4 py-3 w-full h-11 text-xs" name="pet_type"
                                required>
                                <option disabled selected>Choose pet type</option>
                                @foreach($adminPetType as $petType)
                                <option>{{$petType->admin_petType}}</option>
                                @endforeach
                            </select>
                            @error('pet_type')
                            <p class="mt-1 text-xs text-red-500">{{$message}}</p>
                            @enderror
                        </div>
                        <div>
                            <p class="text-sm">Training Service Description</p>
                            <textarea name="description" id="" cols="2" rows="3"
                                class="w-full rounded border border-gray-200"></textarea>
                            @error('description')
                            <p class="mt-1 text-xs text-red-500">{{$message}}</p>
                            @enderror
                        </div>
                        <div>
                            <p class="text-sm">Days of Training</p>
                            <input type="number" class="border border-gray-300 rounded px-4 py-3 w-full h-11 text-xs"
                                name="days">
                            @error('days')
                            <p class="mt-1 text-xs text-red-500">{{$message}}</p>
                            @enderror
                        </div>

                    </div>
                    <input type="hidden" name="status" value="available" />
                    <div class="modal-action flex items-center justify-end">
                        <button type="submit"
                            class="bg-blue-700 text-white text-sm text-center rounded px-3 py-2 w-20 hover:bg-blue-800">Create</button>
                        <label for="my-modal"
                            class="bg-neutral-900 text-white text-sm text-center rounded px-3 py-2 w-20 hover:bg-neutral-800">Close</label>
                    </div>
                </div>
            </div>
        </form>
    </div>

    {{-- MODAL FOR CREATING A PORTFOLIO --}}
    <input type="checkbox" id="error-modal" class="modal-toggle" />
    <div class="modal">
        <div class="modal-box relative rounded">
            <label for="error-modal" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
            <h3 class="text-lg font-bold">Create Portfolio</h3>
            <p class="py-4 text-sm">You need to create your portfolio first before creating a Training
                Package</p>
            <div class="flex justify-end">
                <a href="/trainer/portfolio">
                    <button class="rounded bg-blue-700 text-white text-sm px-3 py-2">Ok</button></a>
            </div>
        </div>
    </div>

    {{-- MODAL FOR CREATING A PORTFOLIO --}}
    <input type="checkbox" id="error-modal-2" class="modal-toggle" />
    <div class="modal">
        <div class="modal-box relative rounded">
            <label for="error-modal-2" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
            <h3 class="text-lg font-bold">Create Gcash Details</h3>
            <p class="py-4 text-sm">You need to create your gcash details</p>
            <div class="flex justify-end">
                <a href="/settings/payment">
                    <button class="rounded bg-blue-700 text-white text-sm px-3 py-2">Ok</button></a>
            </div>
        </div>
    </div>
</x-trainer-layout>