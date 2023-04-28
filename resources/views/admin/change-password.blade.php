<x-admin-layout>
    <form method="POST" action="/admin/{{auth()->user()->id}}/change-password">
        @csrf
        @method('PUT')
        <div class="bg-white m-5 p-5">
            <h3 class="text-lg text-blue-700 p-3">Change Password</h3>
            <div class="flex flex-col gap-3">
                <div class="flex flex-col gap-2">
                    <label for="" class="text-sm">Old Password</label>
                    <input type="password" name="old_password"
                        class="border border-gray-200 rounded px-3 py-1 text-sm w-64" />
                    @error('old_password')
                    <p class="text-red-500 text-xs">{{$message}}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-2">
                    <label for="" class="text-sm">New Password</label>
                    <input type="password" name="password"
                        class="border border-gray-200 rounded px-3 py-1 text-sm w-64" />
                    @error('password')
                    <p class="text-red-500 text-xs">{{$message}}</p>
                    @enderror
                </div>
                <div class="flex flex-col gap-2">
                    <label for="" class="text-sm">Confirm New Password</label>
                    <input type="password" name="password_confirmation"
                        class="border border-gray-200 rounded px-3 py-1 text-sm w-64" />
                    @error('password_confirmation')
                    <p class="text-red-500 text-xs">{{$message}}</p>
                    @enderror
                </div>
                <div class="mx-auto">
                    <button class="bg-blue-700 text-white text-sm px-3 py-2 rounded" type="submit">Submit</button>
                </div>
            </div>
        </div>
    </form>
</x-admin-layout>