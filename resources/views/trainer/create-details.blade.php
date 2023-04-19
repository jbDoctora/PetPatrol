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

        <div class="flex flex-col w-full">
            @forelse($trainingDet as $details)
            <div class="border border-gray-400 p-5 mx-5 my-3 bg-gray-100">
                <div class="flex flex-col">
                    <h3 class="text-xl mb-5">Lesson: <span class="font-bold">{{$details->lesson}}</span></h3>
                    <div class="text-justify indent-8 text-sm tracking-wide">
                        {{$details->description}}
                    </div>
                </div>
            </div>
            @empty
            <p>Empty</p>
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