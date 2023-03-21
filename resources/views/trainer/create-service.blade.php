<x-trainer-layout>
    <div x-data="{ price: '' }">
        <div class="m-3 bg-white p-3 border-t-4 border-blue-500">
            <div class="flex justify-start m-3">
                <label for="my-modal"
                    class="tracking-wide rounded-sm px-4 py-3 bg-yellow-400 text-black text-sm font-bold border border-black hover:rounded-3xl transition-all duration-400">
                    Add new training service</label>
            </div>
            <table id="myTable" class="stripe nowrap hover border border-gray-300 text-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Training service</th>
                        <th>Pet type</th>
                        <th>Availability</th>
                        <th>Weeks of training</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th><span class="material-icons-outlined">
                                settings_applications
                            </span></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($training as $trainings)
                    <tr>
                        <th class="border-b border-gray-300 text-left text-xs">{{$trainings->id}}</th>
                        <th class="border-b border-gray-300 text-left text-xs">{{$trainings->course}}</th>
                        <th class="border-b border-gray-300 text-left text-xs">{{$trainings->pet_type}}</th>
                        <th class="border-b border-gray-300 text-left text-xs">{{$trainings->availability}}</th>
                        <th class="border-b border-gray-300 text-left text-xs">{{$trainings->weeks}}</th>
                        <th class="border-b border-gray-300 text-left text-xs">{{$trainings->price}}</th>
                        <th class="border-b border-gray-300 text-left text-xs">{{$trainings->status}}</th>
                        <th class="flex justify-center gap-1 border-b border-gray-300 text-left text-sm">
                            <button class="px-2 bg-base-300 rounded-sm text-black text-xs shadow-lg"><a
                                    href="/trainer/service/add-service/{{ $trainings->id }}"><span
                                        class="material-icons-outlined text-lg">
                                        visibility
                                    </span></a></button>
                            <button class="px-2 bg-base-300 text-black rounded-sm text-sm shadow-lg"><span
                                    class="material-icons-outlined text-lg">
                                    edit
                                </span></button>
                            <button class="px-2 bg-red-300 rounded-sm text-black text-sm shadow-lg"><span
                                    class="material-icons-outlined text-lg">
                                    delete
                                </span></button>
                        </th>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-4">No service created yet</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
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