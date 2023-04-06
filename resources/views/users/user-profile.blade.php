<x-dash-layout>

    <form method="POST" action="/profile/{{auth()->user()->id}}" enctype="multipart/form-data"
        class="m-5 rounded-lg bg-white p-5 text-xs">
        @csrf
        @method('PUT')
        <h3 class="text-blue-700 text-xl">Profile Manager</h3>
        <div class="text-xs breadcrumbs">
            <ul>
                <li class="text-blue-700 font-bold"><i class="fa-solid fa-pen-to-square mr-2"></i><a
                        href="/profile">Edit
                        Profile</a></li>
                <li><i class="fa-solid fa-lock mr-2"></i><a href="/profile/change-password">Change Password</a></li>
            </ul>
        </div>
        <div class="flex flex-col items-center justify-center mb-5">
            <img src="{{$user->profile_photo ? asset('storage/' . auth()->user()->profile_photo) : asset('/images/placeholder.png') }}"
                alt="Profile photo" class="h-24 w-24 rounded-full bg-white object-cover">
            <div class="mx-auto flex flex-col gap-3 items-center mt-5">
                <i class="fa-solid fa-cloud-arrow-up fa-xl"></i>
                <p>Upload a new profile photo</p>
                <input type="file" name="profile_photo" class="border-dashed border border-gray-300 p-2 rounded" />
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="mb-5"> <label class="mb-2 block font-medium text-gray-700" for="name">Name</label>
                <input
                    class="focus:shadow-outline w-full appearance-none rounded border py-2 px-3 leading-tight text-gray-700 shadow focus:outline-none"
                    type="text" placeholder="Enter your name" value="{{ $user->name }}" name="name">
            </div>
            <div class="mb-5"> <label class="mb-2 block font-medium text-gray-700" for="sex">Sex</label>
                <div class="relative inline-block w-full">
                    <select
                        class="focus:shadow-outline block w-full appearance-none rounded border border-gray-400 bg-white px-4 py-2 pr-8 leading-tight shadow hover:border-gray-500 focus:outline-none"
                        name="sex">
                        <option value="Male" {{ $user->sex == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ $user->sex == 'Female' ? 'selected' : '' }}>Female</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293l-3. 991 3. 991-1. 409 1. 409L16. 7 7. 293 10. 202z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="mb-5"> <label class="mb-2 block font-medium text-gray-700" for="address">Address</label> <input
                    class="focus:shadow-outline w-full appearance-none rounded border py-2 px-3 leading-tight text-gray-700 shadow focus:outline-none"
                    id="address" type="text" value="{{ $user->address }}" placeholder="Enter your address"
                    name="address"> </div>
            <div class="mb-5"> <label class="mb-2 block font-medium text-gray-700" for="phone">Phone Number</label>
                <input
                    class="focus:shadow-outline w-full appearance-none rounded border py-2 px-3 leading-tight text-gray-700 shadow focus:outline-none"
                    id="phone" type="text" placeholder="Enter your phone number" value="{{ $user->phone_number }}"
                    name="phone_number">
            </div>
            <div class="mb-5"> <label class="mb-2 block font-medium text-gray-700" for="email">Email</label> <input
                    class="focus:shadow-outline w-full appearance-none rounded border py-2 px-3 leading-tight text-gray-700 shadow focus:outline-none bg-gray-100"
                    id="email" type="email" placeholder="Enter your email" value="{{ $user->email }}" name="email"
                    disabled>
            </div>
        </div>
        <div class="flex justify-center mt-8">
            <button
                class="focus:shadow-outline rounded bg-blue-700 py-2 px-4 font-medium text-white hover:bg-blue-700 focus:outline-none"
                type="submit"> Update </button>
        </div>
    </form>

</x-dash-layout>