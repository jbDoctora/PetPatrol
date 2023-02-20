<x-noNavFoot>
    <!-- Hero -->
    <div class="hero min-h-10 bg-base-200 mb-4"
        style="background-image: url(/images/animal-shelter.png); background-position: right center; background-repeat: no-repeat; background-size: contain;">
        <div class="hero-content text-center">
            <div class="max-w-md">
                <h1 class="text-4xl font-bold">Hello there</h1>
                <p class="py-6">Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi
                    exercitationem quasi. In deleniti eaque aut repudiandae et a id nisi.</p>
                <button class="btn btn-primary"><a href="/book-trainer" target="_parent">Create Appointment</a><i
                        class="fa-solid fa-circle-plus mx-2"></i></button>
            </div>
        </div>
    </div>
    <h1 class="ml-4 text-lg font-bold">Your request</h1>
    <div class="flex flex-col gap-4">

        @foreach ($requestinfo as $info)
            <div class="mx-auto flex w-full max-w-screen-xl items-center rounded-lg bg-white px-4 py-6 shadow-md">
                <div class="w-1/2 pr-8">
                    <h2 class="text-3xl font-semibold text-gray-800">{{ $info->pet }}</h2>
                    <p class="mt-2 text-gray-600">{{ $info->sessions }}</p>
                    <p class="mt-2 text-gray-600">{{ $info->course }}</p>
                    <p class="mt-2 text-gray-600">{{ $info->date }}</p>
                </div>
                <div class="flex w-1/2 justify-end">
                    <label class="mr-2 rounded-md bg-blue-500 px-4 py-2 text-white"><a
                            href="/show-matched/{{ $info->request_id }}" target="_blank">View Matched
                            trainers</a></label>
                    <button class="mr-2 rounded-md bg-green-500 px-4 py-2 text-white">Button 2</button>
                    <button class="rounded-md bg-red-500 px-4 py-2 text-white">Button 3</button>
                </div>
            </div>
        @endforeach

    </div>
</x-noNavFoot>
