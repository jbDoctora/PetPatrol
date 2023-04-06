<x-dash-layout>
    <form method="POST" action="/profile/{{auth()->user()->id}}/change-password"
        class="m-5 rounded-lg bg-white p-5 text-xs">
        @csrf
        @method('PUT')
        <h3 class="text-blue-700 text-xl">Profile Manager</h3>
        <div class="text-xs breadcrumbs mt-2">
            <ul>
                <li><i class="fa-solid fa-pen-to-square mr-2"></i><a href="/profile">Edit
                        Profile</a></li>
                <li class="text-blue-700 font-bold"><i class="fa-solid fa-lock mr-2"></i><a
                        href="/profile/change-password">Change Password</a>
                </li>
            </ul>
        </div>
        <div class="flex flex-col justify-start my-7">
            <div class="mb-5"> <label class="mb-2 block font-medium text-gray-700" for="password">Password</label>
                <input
                    class="focus:shadow-outline w-80 appearance-none rounded border py-2 px-3 leading-tight text-gray-700 shadow focus:outline-none"
                    type="password" name="password">
            </div>
            @error('password')
            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror
            <div class="mb-5"> <label class="mb-2 block font-medium text-gray-700" for="password_confirmation">Confirm
                    Password</label>
                <input
                    class="focus:shadow-outline w-80 appearance-none rounded border py-2 px-3 leading-tight text-gray-700 shadow focus:outline-none"
                    type="password" name="password_confirmation">
            </div>
            @error('password_confirmation')
            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-center mt-8">
            <button
                class="focus:shadow-outline rounded bg-blue-700 py-2 px-4 font-medium text-white hover:bg-blue-700 focus:outline-none"
                type="submit"> Update Password </button>
        </div>
    </form>
</x-dash-layout>