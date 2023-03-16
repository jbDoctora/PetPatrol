<x-trainer-layout>
    <h2 class="font-bold text-2xl p-5">Manage Services</h2>
    <div x-data="{ price: '' }">
        <div class="m-5 bg-white p-5">
            <div class="flex justify-end m-5">
                <label for="my-modal"
                    class="tracking-wide rounded-md px-5 py-4 bg-yellow-400 text-black text-sm font-bold border border-black hover:rounded-3xl transition-all duration-400">
                    Add new training service</label>
            </div>
            <table id="myTable" class="compact cell-border hover p-3 text-sm text-left">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Training service</th>
                        <th>Pet type</th>
                        <th>Availability</th>
                        <th>Weeks of training</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($training as $trainings)
                    <tr>
                        <th>{{$trainings->id}}</th>
                        <th>{{$trainings->course}}</th>
                        <th>{{$trainings->pet_type}}</th>
                        <th>{{$trainings->availability}}</th>
                        <th>{{$trainings->weeks}}</th>
                        <th>{{$trainings->price}}</th>
                        <th>{{$trainings->status}}</th>
                        <th class="flex justify-between gap-1">
                            <button
                                class="tracking-wide w-full p-1 bg-yellow-400 rounded-sm text-black text-xs font-bold border border-black"><a
                                    href="/trainer/service/add-service/{{ $trainings->id }}">View
                                    plan</a></button>
                            <button
                                class="tracking-wide w-full py-2 text-black rounded-sm text-xs font-bold border border-black">Edit</button>
                            <button
                                class="tracking-wide w-full py-2 bg-red-500 rounded-sm text-white text-xs font-medium border border-black">Delete</button>
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