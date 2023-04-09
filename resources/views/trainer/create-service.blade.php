<x-trainer-layout>
    <div x-data="{ price: '' }">
        <div class="rounded-sm bg-white my-5 mx-14 shadow-lg h-screen rounded">
            <div class="flex justify-between text-2xl font-extrabold p-4 border-b border-slate-300 text-blue-700">
                <div>
                    <h3>Service Manager</h3>
                </div>
                <div><label for="my-modal" class="bg-blue-700 px-5 py-3 text-white font-bold rounded text-xs">Add
                        training
                        service</label>
                </div>
            </div>

            <div class="mt-2 min-w-full overflow-hidden rounded-none">
                <table class="w-full text-xs">
                    <thead class="text-center bg-blue-100">
                        <tr>
                            <th class="py-3 text-xs font-semibold">Id</th>
                            <th class="text-xs font-semibold">Training service</th>
                            <th class="text-xs font-semibold">Pet type</th>
                            <th class="text-xs font-semibold">Availability</th>
                            <th class="text-xs font-semibold">Weeks of training</th>
                            <th class="text-xs font-semibold">Price</th>
                            <th class="text-xs font-semibold">Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="text-left text-xs">
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
                                {{$trainings->weeks}}</td>
                            <td class="whitespace-nowrap  border-b border-slate-200">
                                {{$trainings->price}}</td>
                            <td class="whitespace-nowrap  border-b border-slate-2000">
                                {{$trainings->status}}</td>
                            <td class="whitespace-nowrap border-b border-slate-200">
                                <div class="flex items-center justify-center gap-2">
                                    <button class="bg-blue-700 text-white px-3 py-1 rounded"
                                        data-tip="view training plan"><a
                                            href="/trainer/service/add-service/{{ $trainings->id }}"><i
                                                class="fa-solid fa-eye mr-2"></i>View plan</a></button>
                                    <button class="bg-blue-700 text-white px-3 py-1 rounded"><i
                                            class="fa-solid fa-pen-to-square mr-2"></i>Edit</button>
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
            x-on:submit="price = price.replace(/,/g, '')">
            @csrf
            <input type="checkbox" id="my-modal" class="modal-toggle flex items-center justify-center" />
            <div class="modal">
                <div class="modal-box rounded-sm">
                    <h1 class="mb-4 text-xl font-medium">Input course details:</h1>
                    <div class="flex flex-col gap-4">
                        <input type="text" x-model="price" class="input input-bordered mx-auto w-full max-w-xs"
                            name="price" placeholder="₱ | Price of the package  ">
                        <select class="select select-bordered mx-auto w-full max-w-xs" name="course" required>
                            <option disabled selected>Choose training course</option>
                            <option>Potty Training</option>
                            <option>Obedience Training</option>
                            <option>Behavioral Training</option>
                            <option>Agility Training</option>
                            <option>Tricks Training</option>
                            <option>Theraphy</option>
                        </select>
                        <select class="select select-bordered mx-auto w-full max-w-xs" name="pet_type" required>
                            <option disabled selected>Choose pet type</option>
                            <option>Dog</option>
                            <option>Cat</option>
                            <option>Hamster</option>
                            <option>Parrot</option>
                        </select>
                        <select class="select select-bordered mx-auto w-full max-w-xs" name="availability" required>
                            <option disabled selected>Choose availability</option>
                            <option>Weekdays mornings</option>
                            <option>Weekdays afternoon</option>
                            <option>Weekends</option>
                        </select>
                        <select class="select select-bordered mx-auto w-full max-w-xs" name="weeks" required>
                            <option disabled selected>Weeks of training</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                    </div>
                    <input type="hidden" name="status" value="active">
                    <div class="modal-action flex items-center justify-center">
                        <button type="submit"
                            class="tracking-wide rounded-md px-5 py-4 bg-yellow-400 text-black text-sm font-bold border border-black hover:rounded-3xl transition-all duration-400">Create</button>
                        <label for="my-modal"
                            class="tracking-wide rounded-md px-5 py-4 text-black text-sm font-bold border border-black hover:rounded-3xl transition-all duration-400">Close</label>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-trainer-layout>