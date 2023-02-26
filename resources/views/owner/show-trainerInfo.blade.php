<x-dash-layout>
    <div class="flex justify-center">

        @forelse ($showInfo as $showInfos)
            <div class="bg-base-200 mx-auto h-96 w-96 rounded shadow-xl">
                <h2 class="text">{{ $showInfos->name }}</h2>
                <p class="text-xs">{{ $showInfos->email }}</p>
                <p class="text-xs">{{ $showInfos->address }}</p>
                <p class="text-xs">{{ $showInfos->birthday }}</p>
                <p class="text-xs">{{ $showInfos->age }}</p>
                <p class="text-xs">{{ $showInfos->sex }}</p>
                <p class="text-xs">{{ $showInfos->phone_number }}</p>
                <div class="card-actions">
                    {{-- <button class="btn btn-primary"><a target="_blank">View Training Info</a></button>
                    <button class="btn btn-primary"><a href="#">Book</a></button> --}}
                </div>
            </div>
    </div>

@empty
    <p>No matched trainers yet!</p>
    @endforelse
    </div>
</x-dash-layout>
