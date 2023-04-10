<x-dash-layout>
    <div class="bg-white rounded m-5 h-full">
        <div class="container mx-auto py-10">
            <div class="flex flex-col md:flex-row gap-10">
                <div class="w-full md:w-2/3 bg-white rounded p-5 text-sm border border-gray-300">
                    <div class="flex gap-4 items-center justify-start">
                        <div>
                            <i class="fa-solid fa-cart-shopping fa-lg"></i>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold">Order Summary</h2>
                        </div>
                    </div>
                    @foreach($request as $requests)
                    <div class="flex flex-col gap-2 mt-5">
                        <div class="flex justify-between">
                            <span class="font-bold">Course Package:</span>
                            <span class="text-gray-600">{{$requests->course}}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="font-bold">Trainer:</span>
                            <span class="text-gray-600">{{$requests->trainer_name}}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="font-bold">Price:</span>
                            <span class="text-gray-600">₱ {{$requests->price}}</span>
                        </div>
                    </div>

                </div>
                <div class="w-full md:w-1/3 bg-white rounded p-5 text-xs border border-gray-300">
                    <h2 class="text-xl font-bold mb-5">Payment Details</h2>
                    <div class="my-2 flex justify-start">
                        <label for="gcash-modal-{{$requests->book_id}}"
                            class="rounded bg-blue-700 px-4 py-2 text-white text-sm text-center w-48 hover:bg-blue-800 cursor-pointer">
                            <i class="fa-solid fa-qrcode fa-lg pr-3"></i>View QR Code</label>
                    </div>
                    <div class="my-2">
                        <label for="gcash-ref" class="font-bold mb-3">GCash Number</label>
                        <input type="text" value="{{$requests->gcash_number}}"
                            class="border border-gray-300 rounded py-2 px-3 w-full " disabled>
                    </div>

                    <form method="POST" action="/checkout/{{$requests->book_id}}/pay">
                        @csrf
                        @method('PUT')

                        @if(!empty(trim($requests->gcash_refnum)))
                        <div class="flex bg-yellow-100 text-gray-600 p-2 text-justify">
                            <div class="flex items-center">
                                <i class="fa-solid fa-triangle-exclamation fa-2xl px-3"></i>
                            </div>
                            <div class="inline-block">
                                Your Gcash Reference Number has already been posted;
                                if you submit another reference number, the current one will be replaced.
                            </div>
                        </div>
                        @endif

                        <div class="my-2">
                            <label for="gcash-ref" class="font-bold mb-3">GCash Reference Number <span
                                    class="text-red-600 text-xs ml-2">*</span></label>
                            <input type="text" name="gcash_refnum"
                                class="border border-gray-300 rounded py-2 px-3 w-full" required>
                        </div>
                </div>
                <input type="checkbox" id="gcash-modal-{{$requests->book_id}}" class="modal-toggle" />
                <div class="modal">
                    <div class="modal-box relative">
                        <label for="gcash-modal-{{$requests->book_id}}"
                            class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                        <h3 class="text-lg font-bold">Image</h3>
                        <div>
                            <img
                                src="{{ $requests->gcash_qr ? asset('storage/' . $requests->gcash_qr) : asset('/images/placeholder.png') }}">

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="flex justify-end mt-5">
                <button type="submit"
                    class="bg-blue-700 text-white rounded px-5 py-2 font-medium hover:bg-blue-800 text-sm">Pay
                    Now</button>
                </form>
            </div>
        </div>
    </div>

</x-dash-layout>