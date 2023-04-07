<x-trainer-layout>
    <form method="POST" action="/trainer/{{ auth()->user()->id }}/update-profile" enctype="multipart/form-data"
        class="m-5 rounded-lg bg-white p-5 text-xs">
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

        <div class="flex flex-col justify-start my-7">
            <div class="mb-5">
                <label class="mb-2 block font-medium text-gray-700" for="gcash_number">GCash Number</label>
                <input
                    class="focus:shadow-outline w-80 appearance-none rounded border py-2 px-3 leading-tight text-gray-700 shadow focus:outline-none"
                    type="text" name="gcash_number">
            </div>
            {{-- @error('gcash_number')
            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror --}}

            <div class="mb-5">
                <label class="mb-2 block font-medium text-gray-700" for="gcash_qr_code">GCash QR Code</label>
                <input
                    class="focus:shadow-outline w-80 appearance-none rounded border py-2 px-3 leading-tight text-gray-700 shadow focus:outline-none"
                    type="file" name="gcash_qr_code">
            </div>
            {{-- @error('gcash_qr_code')
            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror --}}

            <div class="mb-5">
                <label class="mb-2 block font-medium text-gray-700" for="auto_populate_gcash_number">Auto Populate GCash
                    Number</label>
                <input class="mr-2" type="checkbox" name="auto_populate_gcash_number" value="1" {{
                    old('auto_populate_gcash_number') ? 'checked' : '' }}>
                <span class="text-gray-500 text-xs">Check this box to auto populate GCash number from user's phone
                    number.</span>
            </div>
        </div>

        <div class="flex justify-center mt-8">
            <button
                class="focus:shadow-outline rounded bg-blue-700 py-2 px-4 font-medium text-white hover:bg-blue-700 focus:outline-none"
                type="submit"> Upload </button>
        </div>
    </form>
</x-trainer-layout>

{{-- ({{$trainer->phone_number}}) --}}