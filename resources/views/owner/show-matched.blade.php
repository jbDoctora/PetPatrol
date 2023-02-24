<x-noNavFoot>
    <div class="grid grid-cols-4 grid-rows-4 gap-4">
        @forelse ($matchedservices as $match)
            <div class="rounded-lg bg-white p-6 shadow-lg">
                <p>ID of the service: {{ $match->id }}</p>
                <p>ID of the trainer: {{ $match->user_id }}</p>
                <p>{{ $match->course }}</p>
                <p>{{ $match->pet_type }}</p>
                <p>{{ $match->availability }}</p>
                <div class="row flex flex justify-center gap-4">
                    <button class="btn btn-primary"><a href="/show-matched/training-plan/{{ $match->id }}"
                            target="_blank">View
                            Training
                            Info</a></button>
                    <button class="btn btn-primary">Book</button>
                </div>
                <!-- Display other columns from the 'service' table as needed -->
            </div>

        @empty
            <p>No matched trainers yet!</p>
        @endforelse
    </div>
</x-noNavFoot>
