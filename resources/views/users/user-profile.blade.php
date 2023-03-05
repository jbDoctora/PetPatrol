<x-dash-layout>

    <form class="m-5 rounded-lg bg-white p-5">
        <img src="{{ auth()->user()->profile_photo ? asset('storage/' . auth()->user()->profile_photo) : asset('/images/placeholder.png') }}"
            class="mx-auto h-24 w-24 rounded-full bg-white">
        <div class="mt-4 flex flex-row items-center justify-center gap-3">
            <div>
                <input type="file" name="profile_photo" class="file-input file-input-bordered mx-auto w-full max-w-xs"
                    value="{{ $user->profile_photo }}" />
            </div>
            <div class="tooltip" data-tip="You can put your profile photo here">
                <i class="fa-solid fa-circle-info fa-xl" class="hover:text-yellow-500"></i>
            </div>
        </div>
        <div class="mb-4">
            <label class="mb-2 block font-medium text-gray-700" for="name">Name</label>
            <input
                class="focus:shadow-outline w-full appearance-none rounded border py-2 px-3 leading-tight text-gray-700 shadow focus:outline-none"
                id="name" type="text" placeholder="Enter your name" value="{{ $user->name }}">
        </div>

        <div class="mb-4">
            <label class="mb-2 block font-medium text-gray-700" for="sex">Sex</label>
            <div class="relative inline-block w-64">
                <select
                    class="focus:shadow-outline block w-full appearance-none rounded border border-gray-400 bg-white px-4 py-2 pr-8 leading-tight shadow hover:border-gray-500 focus:outline-none"
                    value="{{ $user->sex }}" id="sex">
                    <option>Male</option>
                    <option>Female</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M9.293l-3. 991 3. 991-1. 409 1. 409L16. 7 7. 293 10. 202z" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="mb-4">
            <label class="mb-2 block font-medium text-gray-700"></label>
            <div class="mb-4">
                <label class="mb-2 block font-medium text-gray-700" for="address">Address</label>
                <input
                    class="focus:shadow-outline w-full appearance-none rounded border py-2 px-3 leading-tight text-gray-700 shadow focus:outline-none"
                    id="address" type="text" value="{{ $user->address }}" placeholder="Enter your address">
            </div>
            <div class="mb-4">
                <label class="mb-2 block font-medium text-gray-700" for="phone">Phone Number</label>
                <input
                    class="focus:shadow-outline w-full appearance-none rounded border py-2 px-3 leading-tight text-gray-700 shadow focus:outline-none"
                    id="phone" type="text" placeholder="Enter your phone number"
                    value="{{ $user->phone_number }}">
            </div>
            <div class="mb-4">
                <label class="mb-2 block font-medium text-gray-700" for="email">Email</label>
                <input
                    class="focus:shadow-outline w-full appearance-none rounded border py-2 px-3 leading-tight text-gray-700 shadow focus:outline-none"
                    id="email" type="email" placeholder="Enter your email" value="{{ $user->email }}">
            </div>
            <div class="mb-4">
                <label class="mb-2 block font-medium text-gray-700" for="email">New password</label>
                <input
                    class="focus:shadow-outline w-full appearance-none rounded border py-2 px-3 leading-tight text-gray-700 shadow focus:outline-none"
                    id="email" type="email" placeholder="Enter your new password">
            </div>
            <div class="mb-4">
                <label class="mb-2 block font-medium text-gray-700" for="email">Confirm new password</label>
                <input
                    class="focus:shadow-outline w-full appearance-none rounded border py-2 px-3 leading-tight text-gray-700 shadow focus:outline-none"
                    id="email" type="email" placeholder="Confirm new password">
            </div>
            <div class="flex justify-center gap-3 p-5">
                <button
                    class="focus:shadow-outline rounded bg-blue-500 py-2 px-4 font-medium text-white hover:bg-blue-700 focus:outline-none"
                    type="submit">
                    Update
                </button>
            </div>
    </form>
</x-dash-layout>
