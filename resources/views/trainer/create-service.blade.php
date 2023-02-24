<x-trainer-layout>
    <div class="flex flex-col gap-4">
        @forelse($training as $trainings)
            <div class="mx-auto flex w-full max-w-screen-xl items-center rounded-lg bg-white px-4 py-6 shadow-md">
                <div class="w-1/2 pr-8">
                    <h2 class="text-3xl font-semibold text-gray-800">{{ $trainings->course }}</h2>
                    <p class="mt-2 text-gray-600">{{ $trainings->pet_type }}</p>
                    <p class="mt-2 text-gray-600">{{ $trainings->availability }}</p>
                    <p class="mt-2 text-gray-600">{{ $trainings->weeks }}</p>
                </div>
                <div class="flex w-1/2 justify-end">
                    <button class="mr-2 rounded-md bg-blue-500 px-4 py-2 text-white"><a
                            href="/trainer/service/add-service/{{ $trainings->id }}">Create training plan</a></button>
                    <button class="mr-2 rounded-md bg-green-500 px-4 py-2 text-white">Button 2</button>
                    <button class="rounded-md bg-red-500 px-4 py-2 text-white">Button 3</button>
                </div>
            </div>
        @empty
            <p>Empty Service!</p>
        @endforelse
    </div>
    <div class="flex flex justify-center">
        <label for="my-modal" class="btn btn-circle mt-4"><i class="fa-sharp fa-regular fa-plus fa-2xl"></i></label>
    </div>

    {{-- Modal that asks user input --}}
    <form method="POST" action="/trainer/service/add-service/addService">
        @csrf
        <input type="checkbox" id="my-modal" class="modal-toggle flex items-center justify-center" />
        <div class="modal">
            <div class="modal-box">
                <h1 class="mb-3 text-xl font-bold">Input course details:</h1>
                <div class="flex flex-col gap-4">
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
</x-trainer-layout>
