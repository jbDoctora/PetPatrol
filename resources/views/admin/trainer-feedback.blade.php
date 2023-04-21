<x-admin-layout>
    <div class="bg-white rounded m-3 p-5">
        <div class="flex justify-between items-center p-3 border-b border-gray-300">
            <div>
                <h2 class="text-blue-700 text-xl">Trainer Ratings</h2>
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
                    <th>Trainer Name</th>
                    <th>Email</th>
                    <th>Rating</th>
                    <th>Comment</th>
                </tr>
            </thead>
            <tbody class="text-xs text-gray-600">
                @foreach($trainer as $train)
                <tr>
                    <td><img src="{{$train->profile_photo ? asset('storage/' . $train->profile_photo) : asset('/images/placeholder.png') }}"
                            alt="Profile photo" class="h-14 w-14 rounded-full bg-white object-cover"></td>
                    <td>{{$train->name}}</td>
                    <td>{{$train->email}}</td>
                    <td>
                        <i class="fa-solid fa-star fa-lg pr-3 text-yellow-400"></i>{{$train->stars}}
                    </td>
                    <td>{{$train->comment}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin-layout>