<x-trainer-layout>
    <nav class="flex border-b border-gray-100 text-sm font-medium">
        <a href="" class="-mb-px border-b border-transparent p-4 hover:text-cyan-500">
            Profile
        </a>
        <a href="" class="-mb-px border-b border-current p-4 text-cyan-500">
            Password
        </a>
    </nav>
    <div>
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

    </div>
</x-trainer-layout>