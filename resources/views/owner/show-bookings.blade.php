<x-dash-layout>
    <div class="bg-white my-5 mx-14 shadow-lg h-screen rounded">
        <h1 class="text-2xl font-extrabold p-4 border-b border-slate-300 text-blue-700">Booking Manager</h1>
        <div class="flex flex-row justify-start gap-3 text-xs py-3 px-4 border-b border-slate-300">
            <div class="shrink border border-slate-300 bg-base-300 rounded flex items-center">
                <i class="fa-solid fa-magnifying-glass ml-2"></i>
                <input type="text" placeholder="Search"
                    class="px-6 py-2 bg-base-300 rounded-sm h-full text-xs w-80 md:w-52" />
            </div>
            <div>
                <select class="border border-slate-300 h-full px-3 py-2 text-left w-64 sm:w-40 rounded" name="" id="">
                    <option disabled selected>Status</option>
                    <option value="">Pending</option>
                    <option value="">Approved</option>
                    <option value="">Declined</option>
                    <option value="">Completed</option>
                </select>
            </div>
            <div>
                <select class="border border-slate-300 h-full rounded px-3 py-2 text-left w-56" name="" id="">
                    <option disabled selected>Pet type</option>
                    <option value="">Dog</option>
                    <option value="">Cat</option>
                    <option value="">Parrot</option>
                    <option value="">Hamster</option>
                </select>
            </div>
            <div>
                <input type="date" class="border border-slate-300 h-full rounded px-3 py-2 text-left w-56">
            </div>
            <div>
                <button class="bg-blue-700 px-7 py-3 text-white font-bold rounded">
                    Search
                </button>
            </div>
        </div>

        <div class="flex justify-between items-center border-b border-slate-300">
            <div class="py-3 px-4 text-sm"><span class="font-bold text-sm">{{ \App\Models\Booking::where('client_id',
                    auth()->user()->id)->count() }}</span>
                bookings found
            </div>
            <div class="p-3 text-xs text-blue-700 cursor-pointer" x-on:click="window.location.reload()">
                <i class="fa-solid fa-arrows-rotate fa-xl mr-2"></i><span class="text-sm">Refresh</span>
            </div>
        </div>

        <div class="flex flex-col gap-3 my-3 py-3">
            @forelse($request as $requests)
            <div class="flex flex-row justify-between gap-2 border border-gray-300 rounded mx-4">
                <div class="flex flex-col gap-3 p-3 w-96">
                    <h2 class="font-bold text-xl">{{$requests->course}}</h2>
                    <p class="text-sm">Pet: {{$requests->pet_name}}</p>
                    <p class="text-sm">Trainer: {{$requests->trainer_name}}</p>
                    <p class="text-sm">Session: {{$requests->availability}}</p>
                    <p class="text-sm" x-data="{ formattedDate: '' }"
                        x-init="let date = new Date('{{ $requests->start_date }}'); formattedDate = date.toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' })">
                        Preferred start date: <span x-text="formattedDate"></span>
                    </p>
                </div>
                <div class="flex items-center justify-center w-80 gap-3">
                    @if ($requests->status == 'pending')
                    <span class="badge bg-amber-400 text-black text-xs border-none">{{
                        $requests->status }}</span> |
                    @elseif ($requests->status == 'approved')
                    <span class="badge bg-green-400 text-black text-xs border-none">{{
                        $requests->status }}</span> |
                    @elseif ($requests->status == 'declined')
                    <span class="badge bg-red-400 text-black text-xs">{{
                        $requests->status }}</span> |
                    @elseif ($requests->status == 'confirmed')
                    <span class="badge bg-blue-700 text-white text-xs">{{
                        $requests->status }}</span> |
                    @endif

                    @if ($requests->payment == 'unpaid')
                    <span class="badge bg-amber-400 text-black text-xs border-none">{{
                        $requests->payment }}</span>
                    @elseif ($requests->payment == 'paid')
                    <span class="badge bg-green-400 text-black text-xs border-none">{{
                        $requests->payment }}</span>
                    @endif
                </div>
                <div class="flex items-center justify-center px-5 text-xs w-80 gap-3">
                    <button class="bg-blue-700 py-2 px-3 rounded hover:bg-blue-800 text-white cursor-pointer"><i
                            class="fa-solid fa-pen-to-square pr-3"></i>View</button>
                    <button type="button" x-bind:disabled="['declined', 'pending'].includes('{{ $requests->status }}')"
                        x-bind:class="{'bg-gray-400 hover:bg-gray-400': ['declined', 'pending'].includes('{{ $requests->status }}')}"
                        class="bg-blue-700 py-2 px-3 rounded hover:bg-blue-800 text-white"
                        x-on:click="window.location.href='/checkout'">
                        <i class="fa-solid fa-cart-shopping pr-3"></i>Checkout
                    </button>
                </div>
            </div>
            @empty
            <div class="flex flex-col justify-center">
                <div><img src="{{asset('images/empty.png')}}" alt="empty" class="h-96 w-96 mx-auto"></div>
                <div>
                    <p class="text-base text-center font-bold">Empty bookings as of the moment.</p>
                </div>
            </div>
            @endforelse
        </div>
        <div class="flex justify-end p-5">
            {{ $request->links() }}
        </div>


    </div>
</x-dash-layout>