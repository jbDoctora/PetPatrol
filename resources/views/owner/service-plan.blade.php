<x-NoNav>


    <div class="grid grid-cols-2 gap-4 border border-gray-200 p-5 mt-5">

        <h3 class="font-bold text-lg col-span-2">Training Details</h3>
        <p class="text-sm">Trainer Name: {{$trainer_name->name}}</p>
        <p class="text-sm">Course Bundle: {{$service->course}}</p>
        <p class="text-sm">Training Days: {{$service->days}}</p>
        <p class="text-sm">Price: {{$service->price}}</p>
        <p class="text-sm">Pet Type: {{$service->pet_type}}</p>

    </div>


    @forelse($trainingDet as $details)
    <a class="block rounded bg-gray-200 p-4 sm:p-6 lg:p-8 mx-8 my-5">
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-700" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path d="M12 14l9-5-9-5-9 5 9 5z" />
                <path
                    d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
            </svg>
            <p class="font-bold text-base">Lesson</p>
        </div>

        <h3 class="mt-3 text-lg font-bold text-gray-800 sm:text-xl">
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
</x-NoNav>