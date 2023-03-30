<x-trainer-layout>
    <div x-data="{ price: '' }">
        <div class="mx-10 bg-white p-3">
            <div class="flex justify-end m-3">
                <label for="my-modal"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-2 rounded text-sm">
                    <i class="fa-solid fa-plus fa-lg mr-2"></i>Add new training service</label>
            </div>
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="text-left border-b-2 border-blue-700">#</th>
                        <th class="text-left">Training service</th>
                        <th class="text-left">Pet type</th>
                        <th class="text-left">Availability</th>
                        <th class="text-left">Weeks of training</th>
                        <th class="text-left">Price</th>
                        <th class="text-left">Status</th>
                        <th><i class="fa-solid fa-gears fa-lg"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($training as $trainings)
                    <tr>
                        <th class="border-b border-gray-300 text-left text-xs divide-y bg-slate-500">{{$trainings->id}}
                        </th>
                        <th class="border-b border-gray-300 text-left text-xs">{{$trainings->course}}</th>
                        <th class="border-b border-gray-300 text-left text-xs">{{$trainings->pet_type}}</th>
                        <th class="border-b border-gray-300 text-left text-xs">{{$trainings->availability}}</th>
                        <th class="border-b border-gray-300 text-left text-xs">{{$trainings->weeks}}</th>
                        <th class="border-b border-gray-300 text-left text-xs">{{$trainings->price}}</th>
                        <th class="border-b border-gray-300 text-left text-xs">{{$trainings->status}}</th>
                        <th class="flex justify-center gap-1 border-b border-gray-300 text-left text-sm">
                            <button
                                class="px-3 bg-blue-100 py-2 rounded-sm text-blue-700 text-xs shadow-lg hover:bg-blue-500 hover:text-white tooltip"
                                data-tip="view training plan"><a
                                    href="/trainer/service/add-service/{{ $trainings->id }}"><i
                                        class="fa-solid fa-eye mr-2"></i>View plan</a></button>
                            <button
                                class="px-3 bg-blue-100 py-2 rounded-sm text-blue-700 text-xs shadow-lg hover:bg-blue-500 hover:text-white"><i
                                    class="fa-solid fa-pen-to-square mr-2"></i>Edit</button>
                            <button
                                class="px-3 bg-blue-100 py-2 rounded-sm text-blue-700 text-xs shadow-lg hover:bg-blue-500 hover:text-white"><i
                                    class="fa-solid fa-trash mr-2"></i>Delete</button>
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