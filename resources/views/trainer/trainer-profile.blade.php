<x-trainer-layout>
    <h1 class="mb-9 mt-4 ml-4 text-3xl font-bold">User Profile</h1>

    <form method="POST" action="/trainer/{{ $user->id }}/update-profile" enctype="multipart/form-data" class="px-3">
        @csrf
        @method('PUT')
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
                id="name" type="text" placeholder="Enter your name" name="name" value="{{ $user->name }}">
        </div>
        <div class="mb-4">
            <label class="mb-2 block font-medium text-gray-700" for="age">Age</label>
            <input
                class="focus:shadow-outline w-full appearance-none rounded border py-2 px-3 leading-tight text-gray-700 shadow focus:outline-none"
                name="age" type="number" value="{{ $user->age }}" placeholder="Enter your age">
        </div>
        <div class="mb-4">
            <label class="mb-2 block font-medium text-gray-700" for="birthday">Birthday</label>
            <input
                class="focus:shadow-outline w-full appearance-none rounded border py-2 px-3 leading-tight text-gray-700 shadow focus:outline-none"
                name="birthday" value="{{ $user->birthday }}" type="date">
        </div>
        <div class="mb-4">
            <label class="mb-2 block font-medium text-gray-700" for="sex">Sex</label>
            <div class="relative inline-block w-64">
                <select
                    class="focus:shadow-outline block w-full appearance-none rounded border border-gray-400 bg-white px-4 py-2 pr-8 leading-tight shadow hover:border-gray-500 focus:outline-none"
                    value="{{ $user->sex }}" name="sex">
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
                    name="address" type="text" value="{{ $user->address }}" placeholder="Enter your address">
            </div>
            <div class="mb-4">
                <label class="mb-2 block font-medium text-gray-700" for="phone">Phone Number</label>
                <input
                    class="focus:shadow-outline w-full appearance-none rounded border py-2 px-3 leading-tight text-gray-700 shadow focus:outline-none"
                    name="phone_number" type="text" placeholder="Enter your phone number"
                    value="{{ $user->phone_number }}">
            </div>
            <div class="mb-4">
                <label class="mb-2 block font-medium text-gray-700" for="email">Email</label>
                <input
                    class="focus:shadow-outline w-full appearance-none rounded border py-2 px-3 leading-tight text-gray-700 shadow focus:outline-none"
                    name="email" type="email" placeholder="Enter your email" value="{{ $user->email }}" disabled>
            </div>
            <div class="mb-4">
                <label class="mb-2 block font-medium text-gray-700">New Password</label>
                <input
                    class="focus:shadow-outline w-full appearance-none rounded border py-2 px-3 leading-tight text-gray-700 shadow focus:outline-none"
                    name="password" type="password" placeholder="Enter your new password">
            </div>
            <div class="mb-4">
                <label class="mb-2 block font-medium text-gray-700" for="email">Password Confirmation</label>
                <input
                    class="focus:shadow-outline w-full appearance-none rounded border py-2 px-3 leading-tight text-gray-700 shadow focus:outline-none"
                    name="password_confirmation" type="password" placeholder="Enter your new password again">
            </div>
            <div class="mb-6 flex justify-center gap-3 p-5">
                <button
                    class="focus:shadow-outline rounded bg-blue-500 py-2 px-4 font-medium text-white hover:bg-blue-700 focus:outline-none"
                    type="submit">
                    Update
                </button>
            </div>
    </form>
</x-trainer-layout>
