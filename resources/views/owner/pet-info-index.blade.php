<x-dash-layout>
    <!-- Hero -->
    <div class="hero min-h-10 bg-base-200 mb-4"
        style="background-image: url(/images/walking-dog.png); background-position: right center; background-repeat: no-repeat; background-size: contain;">
        <div class="hero-content text-center">
            <div class="max-w-md">
                <h1 class="text-4xl font-bold">Hello there</h1>
                <a href="/pet/add-info"><button class="btn btn-primary">Add Pet<i
                            class="fa-solid fa-circle-plus mx-2"></i></button></a>
            </div>
        </div>
    </div>
    <p class="ml-4 p-2 text-lg font-bold">Your Pets</p>
    <div class="grid grid-rows-4 gap-2 px-5 md:grid-cols-3">
        @forelse($petinfo as $petinfos)
            <div class="card card-side bg-white shadow-xl drop-shadow-xl">
                <figure class="h-32 w-32"><img
                        src="{{ $petinfos->image ? asset('storage/' . $petinfos->image) : asset('/images/no-image.png') }}" />
                </figure>
                <div class="card-body">
                    <h2 class="card-title text-base font-normal">Pet name: <span
                            class="font-bold">{{ $petinfos->name }}</span></h2>
                    <p class="font-normal">Pet type: <span class="font-bold">{{ $petinfos->type }}</span></p>
                    <p class="font-normal">Pet breed: <span class="font-bold">{{ $petinfos->breed }}</span></p>
                    <div class="card-actions justify-end">
                        <div class="flex flex-row gap-2">
                            <button class="btn btn-primary btn-sm">Edit</button>
                            <button class="btn btn-primary btn-sm">Delete</button>
                            <button class="btn btn-primary btn-sm">View</button>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="">
                No pet added yet, click the button above to add!
            </div>
        @endforelse
    </div>

    </div>
    <div class="pagination m-4 mb-9 justify-center">
        {{ $petinfo->links() }}
    </div>
</x-dash-layout>
