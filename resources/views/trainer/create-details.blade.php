<x-trainer-layout>


    <div class="bg-white my-5 mx-14 shadow-lg h-full rounded">
        <div class="flex justify-between items-center border-b border-slate-300">
            <div>
                <h1 class="text-2xl font-extrabold p-4 text-blue-700">Create Training
                    Details
                </h1>
            </div>
            <div class="bg-blue-700 rounded px-4 py-2 text-sm text-white m-4 hover:bg-blue-800">
                <label for="lesson-modal">Add Lesson</label>
            </div>
        </div>

        <div class="flex flex-col w-full h-full">
            @forelse($trainingDet as $details)
            <div class="border border-gray-400 p-3 mx-5 my-1 bg-gray-100 rounded">
                <div class="flex flex-col">
                    <div class="flex justify-between items-center">
                        <h3 class="text-xl mb-5">Lesson: <span class="font-bold">{{$details->lesson}}</span></h3>
                        <div class="flex gap-3 items-center">
                            <label for="edit-modal-{{$details->training_id}}"
                                class="text-sm rounded bg-blue-700 py-2 px-3 text-white"><i
                                    class="fa-regular fa-pen-to-square fa-lg mr-3"></i>Edit</label>
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
                                        <input type="hidden" name="training_id" value="{{$details->training_id}}">
                                        <div class="flex flex-col">
                                            <div>
                                                <label class="text-sm">Lesson</label>
                                                <input type="text" name="lesson"
                                                    class="rounded bg-gray-200 px-3 py-2 text-sm ml-8"
                                                    value="{{$details->lesson}}">
                                            </div>
                                            <div class="flex flex-col mt-5">
                                                <label for="" class="text-sm">Description</label>
                                                <textarea cols="30" name="description"
                                                    class="rounded bg-gray-200 text-sm px-3 py-2"
                                                    rows="4">{{$details->description}}</textarea>
                                            </div>
                                            <div class="mt-5 flex justify-end">
                                                <button type="submit"
                                                    class="rounded bg-blue-700 px-3 py-2 text-white text-sm hover:bg-blue-800">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <label for="delete-modal-{{$details->training_id}}"
                                class="text-sm rounded bg-blue-700 py-2 px-2 text-white"><i
                                    class="fa-solid fa-trash fa-lg mr-3"></i>Delete</label>

                            {{-- DELETE MODAL --}}
                            <form method="POST" action="/trainer/service_details/delete/{{$details->training_id}}">
                                @csrf
                                @method('DELETE')
                                <input type="checkbox" id="delete-modal-{{$details->training_id}}"
                                    class="modal-toggle" />
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
                    <div class="text-justify indent-8 text-sm tracking-wide">
                        {{$details->description}}
                    </div>
                </div>
            </div>
            @empty
            <div class="flex flex-col justify-center items-center">
                <img src="{{asset('/images/empty-pet-training.png')}}" alt="" class="h-96 w-96">
                <p class="p-5 text-lg">Pet Training Lesson is currently empty</p>
            </div>
            @endforelse
        </div>

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
                        <input type="text" name="lesson" class="rounded border border-gray-300 px-3 py-1 bg-gray-100">
                    </div>
                    <div class="my-2">
                        <p>Description</p>
                        <textarea name="description" id="" cols="10" rows="5"
                            class="border border-gray-300 bg-gray-100 w-full"></textarea>
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