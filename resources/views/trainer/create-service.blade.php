<x-trainer-layout>
    <div class="flex items-center justify-end rounded-sm p-3">
        <x-searchbar />
    </div>

    <div x-data="{ price: '' }">
        {{-- <div class="mt-3 grid auto-cols-max grid-flow-col gap-4 px-3"> md:grid-cols-2 lg:grid-cols-3 --}}
            @forelse($training as $trainings)
            <div class="rounded-lg overflow-hidden shadow-md bg-white mx-5 border border-slate-400">
                <div class="p-4">
                    <div class="flex items-center mb-4">
                        <svg class="h-8 w-8 text-gray-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                            </path>
                        </svg>
                        <h2 class="text-2xl font-semibold text-gray-800">{{ $trainings->course }}</h2>
                    </div>
                    <ul class="text-gray-600 mb-4">
                        <li><span class="font-semibold">Pet Type:</span> {{ $trainings->pet_type }}</li>
                        <li><span class="font-semibold">Availability:</span> {{ $trainings->availability }}</li>
                        <li><span class="font-semibold">Weeks:</span> {{ $trainings->weeks }}</li>
                    </ul>
                    <p class="text-2xl font-bold text-gray-600 mb-4">Price: {{ $trainings->price }}</p>
                    <div class="flex justify-end gap-3">
                        <button
                            class="tracking-wide rounded-md px-5 py-2 bg-yellow-400 text-black text-sm font-bold border border-black hover:rounded-3xl transition-all duration-400"><a
                                href="/trainer/service/add-service/{{ $trainings->id }}">Create training
                                plan</a></button>
                        <button
                            class="tracking-wide rounded-md px-5 py-2 text-black text-sm font-bold border border-black hover:rounded-3xl transition-all duration-400">Edit</button>
                        <button
                            class="tracking-wide rounded-md px-5 py-2 bg-red-500 text-white text-sm font-medium border border-black hover:rounded-3xl transition-all duration-400">Delete</button>
                    </div>
                </div>
            </div>
            @empty
            <div class="flex justify-center">
                <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_ysrn2iwp.json"
                    background="transparent" speed="1" style="width: 350px; height: 350px;" loop autoplay>
                </lottie-player>
            </div>
            <p class="mt-4 text-center text-lg font-medium">No service created yet</p>
            @endforelse

            <div class="flex flex justify-center">
                <label for="my-modal"
                    class="tracking-wide rounded-3xl m-3 py-2 px-3 bg-yellow-400 text-black text-sm font-bold border border-black hover:rounded-md transition-all duration-400"><span
                        class="material-icons-outlined">
                        add
                    </span></label>
            </div>

            {{-- Modal that asks user input --}}
            <form method="POST" action="/trainer/service/add-service/addService"
                x-on:submit="price = price.replace(/,/g, '')">
                @csrf
                <input type="checkbox" id="my-modal" class="modal-toggle flex items-center justify-center" />
                <div class="modal">
                    <div class="modal-box">
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