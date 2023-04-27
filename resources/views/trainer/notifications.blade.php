<x-trainer-layout>
    <div class="py-4 m-5 bg-white">
        <div class="flex justify-between items-center m-3 rounded">
            <h2 class="text-2xl font-bold mb-4 text-blue-700">Notifications</h2>
            <form action="{{ route('notifications.markAllAsRead') }}" method="POST">
                @csrf
                <button type="submit" class="text-sm hover:text-blue-700">Mark All as
                    Read</button>
            </form>
        </div>
        <div class="space-y-4">
            @foreach ($notifications as $notification)
            <div class="{{ $notification->read_at ? 'bg-gray-100' : 'bg-blue-200' }} p-4 rounded mx-20">
                <div class="flex items-start">
                    <div class="mr-4">

                    </div>
                    <div>
                        <h3 class="text-lg font-semibold">{{ $notification->title }}</h3>
                        <p class="text-gray-600">{{ json_decode($notification->data)->message }}</p>
                        <p class="text-sm text-gray-500">{{ $notification->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="m-4">
            {{ $notifications->links() }}
        </div>
    </div>


</x-trainer-layout>