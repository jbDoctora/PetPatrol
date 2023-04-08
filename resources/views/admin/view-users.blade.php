<x-admin-layout>
    <div class="bg-white rounded m-5 p-5">
        <div class="flex justify-between items-center p-3 border-b border-gray-300">
            <div>
                <h2 class="text-blue-700 text-xl">Manage Users</h2>
            </div>
            <div>
                <button
                    class="bg-blue-700 border border-gray-300 rounded text-white text-sm px-4 py-2 hover:bg-blue-800">
                    <i class="fa-solid fa-print mr-2"></i>Print
                </button>
            </div>
        </div>

        <table id="myTable" class="table-auto">
            <thead class="bg-blue-700 text-white text-xs">
                <tr>
                    <th>Id</th>
                    <th></th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Sex</th>
                    <th>Phone Number</th>
                    <th>Role</th>
                    <th>Date Created</th>
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
                    <td>{{$user->sex}}</td>
                    <td>{{$user->phone_number}}</td>
                    <td>{{ $user->role == 0 ? 'Client' : 'Trainer' }}</td>
                    <td>{{$user->created_at}}</td>
                    <td>
                        <label for="action-modal-{{$user->id}}"
                            class="bg-blue-700 border border-gray-300 rounded text-white text-xs px-4 py-2 hover:bg-blue-800">
                            View/Edit
                        </label>
                    </td>
                </tr>
                <input type="checkbox" id="action-modal-{{$user->id}}" class="modal-toggle" />
                <div class="modal">
                    <div class="modal-box relative rounded">
                        <label for="action-modal-{{$user->id}}"
                            class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                        <h3 class="text-lg font-bold border-b border-gray-200">Congratulations random Internet user!
                        </h3>
                        <p class="py-4">You've been selected for a chance to get one year of subscription to use
                            Wikipedia for free!</p>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin-layout>