<x-admin-layout>
    <div class="bg-white rounded m-3 p-5">
        <div class="flex justify-between items-center p-3 border-b border-gray-300">
            <div>
                <h2 class="text-blue-700 text-xl">Trainer Applications</h2>
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
                    <th>Id</th>
                    <th></th>
                    <th>Trainer Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Birthday</th>
                    <th>Sex</th>
                    <th>Phone Number</th>
                    <th>ID Photo</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="text-xs text-gray-600">
                @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td><img src="{{$user->profile_photo ? asset('storage/' . auth()->user()->profile_photo) : asset('/images/placeholder.png') }}"
                            alt="Profile photo" class="h-14 w-14 rounded-full bg-white object-cover"></td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->address}}</td>
                    <td>{{$user->birthday}}</td>
                    <td>{{$user->sex}}</td>
                    <td>{{$user->phone_number}}</td>
                    <td>
                        <label for="id-modal-{{$user->id}}"
                            class="bg-gray-300 rounded text-gray-600 text-sm md:text-xs md:p-2 px-1 py-2 hover:bg-gray-700 hover:text-white">View
                            ID</label>
                    </td>
                    <td>
                        <form method="POST" action="/admin/trainer-approval/{{$user->id}}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="admin_approve" value="1" />
                            <button
                                class="bg-green-700 rounded text-sm text-white px-2 py-2 md:p-2 md:text-xs hover:bg-green-800"
                                type="submit">Approve</button>
                        </form>
                    </td>
                </tr>
                <input type="checkbox" id="id-modal-{{$user->id}}" class="modal-toggle" />
                <div class="modal">
                    <div class="modal-box relative rounded">
                        <label for="id-modal-{{$user->id}}"
                            class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                        <div class="flex justify-center items-center">
                            <img src="{{$user->id_verify ? asset('storage/' . $user->id_verify) : asset('/images/placeholder.png') }}"
                                alt="id photo">
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin-layout>