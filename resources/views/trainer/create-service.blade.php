<x-trainer-layout>
    <div class="mr-5 flex items-center justify-end rounded-sm p-3">
        <input type="text" class="input input-bordered bg-base-500 w-96" placeholder="Search">
        <button class="btn ml-2 h-full border-blue-600 bg-blue-600 text-white hover:border-0 hover:bg-blue-700"><i
                class="fa-solid fa-magnifying-glass"></i></button>
    </div>
    <div x-data="{ price: '' }">
        {{-- <div class="mt-3 grid auto-cols-max grid-flow-col gap-4 px-3"> md:grid-cols-2 lg:grid-cols-3 --}}
        @forelse($training as $trainings)
            <div class="mb-4 flex flex-col overflow-hidden rounded-lg bg-white shadow-md">
                <div class="h-40 flex-shrink-0 bg-gray-200"
                    style="background-image: url('/images/vector.jpg'); background-size: cover;">
                </div>
                <div class="flex-grow p-6">
                    <h2 class="mb-2 text-3xl font-semibold text-gray-800">{{ $trainings->course }}</h2>
                    <p class="mb-2 text-gray-600">Pet Type: {{ $trainings->pet_type }}</p>
                    <p class="mb-2 text-gray-600">Availability: {{ $trainings->availability }}</p>
                    <p class="mb-2 text-gray-600">Weeks: {{ $trainings->weeks }}</p>
                    <p class="mt-4 text-2xl font-bold text-gray-600">Price: {{ $trainings->price }}</p>
                </div>
                <div class="flex justify-end bg-gray-100 p-4">
                    <button class="mr-2 rounded-md bg-blue-500 px-4 py-2 text-white"><a
                            href="/trainer/service/add-service/{{ $trainings->id }}">Create training
                            plan</a></button>
                    <button class="mr-2 rounded-md bg-green-500 px-4 py-2 text-white">Button 2</button>
                    <button class="rounded-md bg-red-500 px-4 py-2 text-white">Button 3</button>
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
            <label for="my-modal" class="btn btn-circle mt-4 border-0 bg-yellow-500"><i
                    class="fa-sharp fa-regular fa-plus fa-2xl"></i></label>
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
                            class="inline-block rounded-lg border border-indigo-600 bg-indigo-600 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">Create</button>
                        <label for="my-modal" class="btn mx-auto">Close</label>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-trainer-layout>
