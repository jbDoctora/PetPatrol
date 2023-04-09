<x-trainer-layout>
    <form x-data="{ autoPopulate: false }" method="POST" action="/settings/payment/{{auth()->user()->id}}"
        enctype="multipart/form-data" class="m-5 rounded-lg bg-white p-5 text-xs">
        @csrf
        @method('PUT')
        <h3 class="text-blue-700 text-xl">Settings</h3>
        <div class="text-xs breadcrumbs mt-2">
            <ul>
                <li><i class="fa-solid fa-pen-to-square mr-2"></i><a href="/trainer/profile">Edit
                        Profile</a></li>
                <li><i class="fa-solid fa-lock mr-2"></i><a href="/trainer/profile/change-password">Change Password</a>
                </li>
                <li class="text-blue-700 font-bold"><i class="fa-solid fa-cash-register mr-2"></i><a
                        href="/settings/payment">Edit
                        Payment Details</a></li>
            </ul>
        </div>

        <div class="text-xs text-gray-600 mt-4">
            <p>Disclaimer: Please note that our system does not integrate a payment gateway. It is up to the trainer to
                confirm the
                payment
                via GCash reference number. Thank you for your understanding.</p>
        </div>

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
                <label for="qr-modal" class="bg-blue-700 rounded text-white text-sm px-3 py-2 hover:bg-blue-800">View QR
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