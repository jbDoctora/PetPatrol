<x-dash-layout>

    <div class="mx-3 my-5 p-2">
        <div>
            <a href="/pet/add-info"><button
                    class="inline-block rounded-lg border border-cyan-400 bg-cyan-400 px-2 py-1 text-sm font-medium text-black hover:bg-transparent hover:text-cyan-400 focus:outline-none focus:ring active:text-cyan-500 md:px-4 md:py-3">Add
                    Pet<i class="fa-solid fa-circle-plus mx-2"></i></button></a>
        </div>
    </div>

    {{-- <p class="ml-4 p-2 text-lg font-bold">Your Pets</p> --}}
    <div class="grid grid-flow-col px-3 md:grid-flow-row">
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
            <div class="mx-auto grid grid-cols-none">
                <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_pkkire0h.json"
                    background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay>
                </lottie-player>
            </div>
            <p class="mt-4 text-center text-lg font-bold">Your pet is excited, Request a trainer now.</p>
        @endforelse
    </div>

    <div class="pagination m-4 mb-9 justify-center">
        {{ $petinfo->links() }}
    </div>
</x-dash-layout>
