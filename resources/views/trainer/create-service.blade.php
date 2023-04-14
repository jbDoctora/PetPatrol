<x-trainer-layout>
    <div x-data="{ price: '' }">
        <div class="bg-white my-5 mx-14 shadow-lg h-screen rounded">
            <div class="flex justify-between text-2xl font-extrabold p-4 border-b border-slate-300 text-blue-700">
                <div>
                    <h3>Service Manager</h3>
                </div>
                <div><label for="my-modal"
                        class="bg-blue-700 px-5 py-3 text-white font-bold rounded text-xs hover:bg-blue-800 cursor-pointer">Add
                        training
                        service</label>
                </div>
            </div>

            <div class="mt-2 min-w-full overflow-hidden rounded-none">
                <table class="w-full text-xs">
                    <thead class="text-center bg-gray-200 text-gray-800">
                        <tr>
                            <th class="py-3 text-xs font-normal">Id</th>
                            <th class="text-xs font-normal">Training service</th>
                            <th class="text-xs font-normal">Pet type</th>
                            <th class="text-xs font-normal">Availability</th>
                            <th class="text-xs font-normal">Weeks of training</th>
                            <th class="text-xs font-normal">Price</th>
                            <th class="text-xs font-normal">Capacity</th>
                            <th class="text-xs font-normal">Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="text-center text-xs">
                        @forelse ($training as $trainings)
                        <tr>
                            <td class="whitespace-nowrap text-xs border-b border-slate-200 px-4 py-7">
                                {{$trainings->id}}
                            </td>
                            <td class="whitespace-nowrap  border-b border-slate-200">
                                {{$trainings->course}}</td>
                            <td class="whitespace-nowrap  border-b border-slate-200">
                                {{$trainings->pet_type}}</td>
                            <td class="whitespace-nowrap  border-b border-slate-200">
                                {{$trainings->availability}}</td>
                            <td class="whitespace-nowrap  border-b border-slate-200">
                                {{$trainings->days}} days</td>
                            <td class="whitespace-nowrap  border-b border-slate-200">
                                {{$trainings->price}}</td>
                            <td class="whitespace-nowrap  border-b border-slate-200">{{$trainings->capacity}}</td>
                            <td class="whitespace-nowrap  border-b border-slate-2000">
                                {{$trainings->status}}
                            </td>
                            <td class="whitespace-nowrap border-b border-slate-200">
                                <div class="flex items-center justify-center gap-2">
                                    <button class="bg-blue-700 text-white px-3 py-1 rounded"
                                        data-tip="view training plan"><a
                                            href="/trainer/service/add-service/{{ $trainings->id }}"><i
                                                class="fa-solid fa-pen-to-square mr-2"></i>Edit plan</a></button>
                                    <button class="bg-blue-700 text-white px-3 py-1 rounded"><i
                                            class="fa-solid fa-trash mr-2"></i>Delete</button>
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
            x-on:submit="price = price.replace(/,/g, '')" x-data="{ serviceType: 'private', capacity: 1, }">
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
                            <p class="text-sm">Session</p>
                            <select class="border border-gray-300 rounded px-4 py-3 w-full h-11 text-xs"
                                name="availability" required>
                                <option disabled selected>Choose availability</option>
                                <option>Weekdays mornings</option>
                                <option>Weekdays afternoon</option>
                                <option>Weekends</option>
                            </select>
                            @error('availability')
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
                        <div>
                            <p class="text-sm">Service Type</p>
                            <select class="border border-gray-300 rounded px-4 py-3 w-full h-11 text-xs"
                                name="service_type" x-model="serviceType" required>
                                <option value="private">Home Service(private)</option>
                                <option value="public">Group Session(public)</option>
                            </select>
                            @error('service_type')
                            <p class="mt-1 text-xs text-red-500">{{$message}}</p>
                            @enderror
                        </div>
                        <div x-show="serviceType === 'public'">
                            <p class="text-sm">Capacity</p>
                            <input type="number" class="border border-gray-300 rounded px-4 py-3 w-full h-11 text-xs"
                                name="capacity" value="1" min="1" x-model="capacity">
                            @error('capacity')
                            <p class="mt-1 text-xs text-red-500">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <input type="hidden" name="status" value="available" />
                    <input type="hidden" name="current_capacity" x-model="capacity" />
                    <div class="modal-action flex items-center justify-end">
                        <button type="submit"
                            class="bg-blue-700 text-white text-sm text-center rounded px-3 py-2 w-20 hover:bg-blue-800">Create</button>
                        <label for="my-modal"
                            class="bg-neutral-950 text-white text-sm text-center rounded px-3 py-2 w-20 hover:bg-neutral-800">Close</label>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-trainer-layout>