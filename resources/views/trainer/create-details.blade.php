<x-trainer-layout>
    <div class="bg-white p-3 my-5 mx-14 shadow-lg h-full rounded">
        <div class="flex justify-between items-center border-b border-slate-300">
            <div>
                <h1 class="text-2xl font-extrabold p-4 text-blue-700">Manage Training
                    Lesson
                </h1>
            </div>
            <div class="bg-blue-700 rounded px-4 py-2 text-sm text-white m-4 hover:bg-blue-800">
                <label for="lesson-modal">Add Lesson</label>
            </div>
        </div>

        @forelse($trainingDet as $details)
        <a class="block rounded bg-gray-100 p-4 sm:p-6 lg:p-8 mx-8 my-5" href="#">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-700" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M12 14l9-5-9-5-9 5 9 5z" />
                        <path
                            d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                    </svg>
                    <p class="font-bold text-base ml-3">Lesson</p>
                </div>
                <div class="flex gap-4">
                    <div>
                        <label for="edit-modal-{{$details->training_id}}"
                            class="p-1 text-sm hover:text-blue-700 cursor-pointer"><i
                                class="fa-regular fa-pen-to-square fa-lg mr-2"></i>Edit</label>
                        {{-- EDIT MODAL --}}
                        <form method="POST" action="/trainer/service/edit">
                            @csrf
                            @method('PUT')
                            <input type="checkbox" id="edit-modal-{{$details->training_id}}" class="modal-toggle" />
                            <div class="modal">
                                <div class="modal-box relative rounded">
                                    <label for="edit-modal-{{$details->training_id}}"
                                        class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                                    <h3 class="text-lg font-bold">Edit Lesson</h3>
                                    <input type="hidden" name="training_id" value="{{$details->training_id}}" required>
                                    <div class="flex flex-col">
                                        <div>
                                            <label class="text-sm">Lesson</label>
                                            <input type="text" name="lesson"
                                                class="rounded bg-gray-200 px-3 py-2 text-sm ml-8"
                                                value="{{$details->lesson}}" required>
                                        </div>
                                        <div class="flex flex-col mt-5">
                                            <label for="" class="text-xs text-justify">Description</label>
                                            <textarea cols="30" name="description"
                                                class="rounded bg-gray-200 text-sm px-3 py-2" rows="5"
                                                required>{{$details->description}}</textarea>
                                        </div>
                                        <div class="mt-5 flex justify-end">
                                            <button type="submit"
                                                class="rounded bg-blue-700 px-3 py-2 text-white text-sm hover:bg-blue-800">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div>
                        <label for="delete-modal-{{$details->training_id}}"
                            class="p-1 text-sm hover:text-blue-700 cursor-pointer"><i
                                class="fa-regular fa-trash-can fa-md mr-2"></i>Delete</label>
                        <form method="POST" action="/trainer/service_details/delete/{{$details->training_id}}">
                            @csrf
                            @method('DELETE')
                            <input type="checkbox" id="delete-modal-{{$details->training_id}}" class="modal-toggle" />
                            <div class="modal">
                                <div class="modal-box relative rounded">
                                    <label for="delete-modal-{{$details->training_id}}"
                                        class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                                    <h3 class="text-lg font-bold">Delete Lesson</h3>
                                    <p class="py-4">Are you sure you want to delete the lesson?</p>
                                    <div class="flex justify-end">
                                        <button type="submit"
                                            class="rounded bg-blue-700 px-3 py-2 text-white text-sm">Yes</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>

            <h3 class="mt-3 text-lg font-bold text-blue-700 sm:text-xl">
                {{$details->lesson}}
            </h3>

            <p class="mt-4 text-sm text-gray-800 text-justify">
                {{$details->description}}
            </p>
        </a>
        @empty
        <div class="flex flex-col justify-center items-center">
            <img src="{{asset('/images/empty-pet-training.png')}}" alt="Empty Pet Training"
                class="h-96 w-96 object-contain">
            <p class="p-5 text-lg text-gray-600">There are no pet training lessons available at the moment.</p>
        </div>
        @endforelse

    </div>


    <form method="POST" action="/trainer/service/{{ $service->id }}/add-service/add">
        @csrf
        <input type="hidden" name="service_id" value="{{ $service->id }}">

        <input type="checkbox" id="lesson-modal" class="modal-toggle" />
        <div class="modal">
            <div class="modal-box relative rounded">
                <label for="lesson-modal" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                <h3 class="text-lg font-bold">Create Lesson</h3>
                <div class="flex flex-col justify-start">
                    <div class="flex justify-between items-center my-2">
                        <p>Lesson Title</p>
                        <input type="text" name="lesson" class="rounded border border-gray-300 px-3 py-1 bg-gray-100"
                            required>
                    </div>
                    <div class="my-2">
                        <p>Description</p>
                        <textarea name="description" id="" cols="10" rows="5"
                            class="border border-gray-300 bg-gray-100 w-full p-3" required></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button class="bg-blue-700 text-white text-sm px-3 py-2 rounded" type="submit">Add
                            Lesson</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-trainer-layout>