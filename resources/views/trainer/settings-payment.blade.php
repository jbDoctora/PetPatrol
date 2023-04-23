<x-trainer-layout>
    <form x-data="{ autoPopulate: false }" method="POST" action="/settings/payment/{{auth()->user()->id}}"
        enctype="multipart/form-data" class="m-5 rounded-lg bg-white p-5 text-xs">
        @csrf
        @method('PUT')
        <h3 class="text-blue-700 text-xl">Settings</h3>

        <div class="tabs my-3">
            <a class="tab tab-bordered text-xs" href="/trainer/profile"><i
                    class="fa-solid fa-pen-to-square mr-2"></i>Profile</a>
            <a class="tab tab-bordered text-xs" href="/trainer/profile/change-password"><i
                    class="fa-solid fa-lock mr-2"></i>Change
                Password</a>
            <a class="tab tab-bordered tab-active text-xs" href="/settings/payment"><i
                    class="fa-solid fa-cash-register mr-2"></i>Edit
                Gcash Details</a>
        </div>

        <div class="flex bg-gray-200 text-gray-800 rounded p-3 mx-2 my-3 gap-3">
            <div class="flex items-center">
                <i class="fa-solid fa-info fa-lg"></i></i>
            </div>
            <div>
                <p>Disclaimer: Please note that our system does not integrate a payment gateway. You need to confirm the
                    payment
                    using the GCash reference number provided by the client. Thank you for your understanding.</p>
            </div>
        </div>

        @if(empty($user->gcash_number) && empty($user->gcash_qr))
        <div class="flex bg-yellow-300 text-gray-800 rounded p-3 mx-2 my-3 gap-3">
            <div class="flex items-center">
                <i class="fa-solid fa-triangle-exclamation fa-lg"></i>
            </div>
            <div>
                <p>Please add your gcash number or qr code for client payment</p>
            </div>
        </div>
        @endif

        <div class="flex flex-col justify-start my-7">
            <div class="mb-5">
                <label class="mb-2 block font-medium text-gray-700" for="gcash_number">GCash Number</label>
                <input
                    class="focus:shadow-outline w-80 appearance-none rounded border py-2 px-3 leading-tight text-gray-700 shadow focus:outline-none"
                    type="text" name="gcash_number" value="{{$user->gcash_number}}">
            </div>
            @error('gcash_number')
            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror

            <div class="mb-5">
                <label class="mb-2 block font-medium text-gray-700" for="gcash_qr_code">GCash QR Code</label>
                <input
                    class="focus:shadow-outline w-80 appearance-none rounded border py-2 px-3 leading-tight text-gray-700 shadow focus:outline-none"
                    type="file" name="gcash_qr">
            </div>
            @error('gcash_qr_code')
            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror

            <div class="mb-5">
                <label for="qr-modal" class="bg-blue-700 rounded text-white text-sm px-3 py-2 hover:bg-blue-800">View
                    Current QR
                    Code</label>
            </div>
        </div>

        <div class="flex justify-center mt-8">
            <button
                class="focus:shadow-outline rounded bg-blue-700 py-2 px-4 font-medium text-white hover:bg-blue-700 focus:outline-none"
                type="submit"> Upload </button>
        </div>
    </form>
    <input type="checkbox" id="qr-modal" class="modal-toggle" />
    <div class="modal">
        <div class="modal-box relative rounded">
            <label for="qr-modal" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
            <h3 class="text-lg font-bold">Current QR Code</h3>
            <div>
                <img src="{{$user->gcash_qr ? asset('storage/' . $user->gcash_qr) : asset('/images/placeholder.png') }}"
                    alt="gcash-qr code">
            </div>
        </div>
    </div>
</x-trainer-layout>