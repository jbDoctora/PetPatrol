<x-noNavFoot>
    <input text="hidden" value="">
    <div class="flex flex-col gap-4">
        @forelse ($matchedservices as $match)
            <div class="bg-base-200 container">
                <p>ID of the service: {{ $match->id }}</p>
                <p>ID of the trainer: {{ $match->user_id }}</p>
                <p>{{ $match->course }}</p>
                <p>{{ $match->pet_type }}</p>
                <p>{{ $match->availability }}</p>
                <!-- Display other columns from the 'service' table as needed -->
            </div>
        @empty
            <p>No matched trainers yet!</p>
        @endforelse
    </div>
</x-noNavFoot>
