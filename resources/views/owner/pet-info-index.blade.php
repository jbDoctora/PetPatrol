<x-dash-layout>

    <div class="mx-3 my-5 flex flex-row items-center justify-between rounded-md bg-white p-2">
        <div>
            <h1 class="align-middle text-lg font-bold">Your Request</h1>
        </div>
        <div>
            <a href="/pet/add-info"><button
                    class="inline-block rounded-full border border-cyan-400 bg-cyan-400 px-2 py-1 text-sm font-medium text-black hover:bg-transparent hover:text-cyan-400 focus:outline-none focus:ring active:text-cyan-500 md:px-4 md:py-3">Add
                    Pet<i class="fa-solid fa-circle-plus mx-2"></i></button></a>
        </div>
    </div>

    <p class="ml-4 p-2 text-lg font-bold">Your Pets</p>
    <div class="grid grid-cols-1 gap-6 px-3 md:grid-cols-3">
        @forelse($petinfo as $petinfos)
            <div class="overflow-hidden rounded-md bg-white shadow-md">
                <figure class="h-48">
                    <img src="{{ $petinfos->image ? asset('storage/' . $petinfos->image) : asset('/images/no-image.png') }}"
                        alt="Pet image" class="h-full w-full object-cover">
                </figure>
                <div class="p-4">
                    <h2 class="text-lg font-bold">{{ $petinfos->name }}</h2>
                    <p class="mt-2 text-gray-500">{{ $petinfos->type }} - {{ $petinfos->breed }}</p>
                    <div class="mt-4 flex justify-end">
                        <a href="#" class="mr-4 text-cyan-500 hover:text-cyan-600">View</a>
                        <a href="#" class="text-gray-500 hover:text-gray-600">Edit</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center">
                <p class="text-lg font-bold">No pet added yet</p>
                <p class="mt-2 text-gray-500">Click the button above to add!</p>
            </div>
        @endforelse
    </div>

    <div class="pagination m-4 mb-9 justify-center">
        {{ $petinfo->links() }}
    </div>
</x-dash-layout>
