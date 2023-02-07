<x-layout>
    <h1 class="text-3xl font-bold mb-9 mt-4 ml-4">User Profile</h1>
    <form class="m-7">
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2" for="name">Name</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="Enter your name" value="{{$user->name}}">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2" for="age">Age</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="age" type="number" value="{{$user->age}}" placeholder="Enter your age">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2" for="birthday">Birthday</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="birthday" value="{{$user->birthday}}" type="date">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2" for="sex">Sex</label>
            <div class="inline-block relative w-64">
                <select class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" value="{{$user->sex}}" id="sex">
                    <option>Male</option>
                    <option>Female</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293l-3. 991 3. 991-1. 409 1. 409L16. 7 7. 293 10. 202z"/></svg>
                </div>
            </div>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2"></label>
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2" for="address">Address</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="address" type="text" value="{{$user->address}}" placeholder="Enter your address">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2" for="phone">Phone Number</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="phone" type="text" placeholder="Enter your phone number" value="{{$user->phone_number}}">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2" for="email">Email</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="Enter your email" value="{{$user->email}}">
            </div>
            <div class="flex justify-center gap-3 mb-6">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Update
                </button>
                <button class="bg-red-500 hover:bg-red-700 text-white font-medium py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Change Password
                </button>
            </div>
            </form>
</x-layout>