<x-dash-layout>

    <div class="flex items-center justify-between rounded-sm p-5">
        <div>
            <button
                class="tracking-wide rounded-md px-5 py-4 bg-yellow-400 text-black text-sm font-bold border border-black hover:rounded-3xl transition-all duration-400">
                <a href="/pet/add-info" target="_parent"><span class="hidden md:inline-block">Add
                        Pet</span></a>
                <i class="fa-solid fa-circle-plus mx-2"></i>
            </button>
        </div>
        <x-searchbar />
    </div>

    {{-- <p class="ml-4 p-2 text-lg font-bold">Your Pets</p> --}}
    <div class="mx-5 grid grid-cols-3 gap-3 rounded-lg bg-white px-3 md:grid-flow-row">
        @forelse($petinfo as $petinfos)
        <div class="bg-base-200 m-5 overflow-hidden rounded-md shadow-md">
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
            <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_pkkire0h.json" background="transparent"
                speed="1" style="width: 300px; height: 300px;" loop autoplay>
            </lottie-player>
        </div>
        <p class="mt-4 text-center text-lg font-bold">Your pet is excited, Request a trainer now.</p>
        @endforelse
    </div>

    <div class="pagination m-4 mb-9 justify-center">
        {{ $petinfo->links() }}
    </div>
</x-dash-layout>