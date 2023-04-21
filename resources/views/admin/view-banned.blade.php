<x-admin-layout>
    <div class="bg-white rounded m-3 p-5">
        <div class="flex justify-between items-center p-3 border-b border-gray-300">
            <div>
                <h2 class="text-blue-700 text-xl">Banned Users</h2>
            </div>
            <div>
                <button
                    class="bg-blue-700 border border-gray-300 rounded text-white text-sm px-4 py-2 hover:bg-blue-800">
                    <i class="fa-solid fa-print mr-2"></i>Print
                </button>
            </div>
        </div>

        <table id="myTable">
            <thead class="bg-blue-700 text-white text-xs">
                <tr>
                    <th>Photo</th>
                    <th>User</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="text-xs text-gray-600">
                @foreach($banned_user as $ban)
                <tr>
                    <td><img src="{{$ban->profile_photo ? asset('storage/' . $ban->profile_photo) : asset('/images/placeholder.png') }}"
                            alt="Profile photo" class="h-12 w-12 rounded-full bg-white object-cover"></td>
                    <td>{{$ban->name}}</td>
                    <td>{{$ban->email}}</td>
                    <td>{{$ban->phone_number}}</td>
                    <td>
                        <form method="POST" action="/admin/monitor/users/update">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="user_id" value="{{$ban->id}}">
                            <input type="hidden" name="isBanned" value="0">
                            <button type="submit"
                                class="rounded bg-blue-700 px-3 py-2 text-sm text-white">Unban</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin-layout>