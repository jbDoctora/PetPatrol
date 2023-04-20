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
                    <th>Id</th>
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
                    <td>
                        <div class="my-2">{{$train->id}}</div>
                    </td>
                    <td><img src="{{$train->profile_photo ? asset('storage/' . auth()->user()->profile_photo) : asset('/images/placeholder.png') }}"
                            alt="Profile photo" class="h-14 w-14 rounded-full bg-white object-cover"></td>
                    <td>{{$train->name}}</td>
                    <td>{{$train->email}}</td>
                    <td>
                        @if($train->stars == 1)
                        <div class="rating rating-sm">
                            <input type="radio" name="rating-6"
                                class="mask mask-star-2 bg-orange-400 pointer-events-none" checked />
                            <input type="radio" name="rating-6"
                                class="mask mask-star-2 bg-orange-400 pointer-events-none" />
                            <input type="radio" name="rating-6"
                                class="mask mask-star-2 bg-orange-400 pointer-events-none" />
                            <input type="radio" name="rating-6"
                                class="mask mask-star-2 bg-orange-400 pointer-events-none" />
                            <input type="radio" name="rating-6"
                                class="mask mask-star-2 bg-orange-400 pointer-events-none" />
                        </div>
                        @elseif($train->stars == 2)
                        <div class="rating rating-sm">
                            <input type="radio" name="rating-6"
                                class="mask mask-star-2 bg-orange-400 pointer-events-none" />
                            <input type="radio" name="rating-6"
                                class="mask mask-star-2 bg-orange-400 pointer-events-none" checked />
                            <input type="radio" name="rating-6"
                                class="mask mask-star-2 bg-orange-400 pointer-events-none" />
                            <input type="radio" name="rating-6"
                                class="mask mask-star-2 bg-orange-400 pointer-events-none" />
                            <input type="radio" name="rating-6"
                                class="mask mask-star-2 bg-orange-400 pointer-events-none" />
                        </div>
                        @elseif($train->stars == 3)
                        <div class="rating rating-sm">
                            <input type="radio" name="rating-6"
                                class="mask mask-star-2 bg-orange-400 pointer-events-none" />
                            <input type="radio" name="rating-6"
                                class="mask mask-star-2 bg-orange-400 pointer-events-none" />
                            <input type="radio" name="rating-6"
                                class="mask mask-star-2 bg-orange-400 pointer-events-none" checked />
                            <input type="radio" name="rating-6"
                                class="mask mask-star-2 bg-orange-400 pointer-events-none" />
                            <input type="radio" name="rating-6"
                                class="mask mask-star-2 bg-orange-400 pointer-events-none" />
                        </div>
                        @elseif($train->stars == 4)
                        <div class="rating rating-sm">
                            <input type="radio" name="rating-6"
                                class="mask mask-star-2 bg-orange-400 pointer-events-none" />
                            <input type="radio" name="rating-6"
                                class="mask mask-star-2 bg-orange-400 pointer-events-none" />
                            <input type="radio" name="rating-6"
                                class="mask mask-star-2 bg-orange-400 pointer-events-none" />
                            <input type="radio" name="rating-6"
                                class="mask mask-star-2 bg-orange-400 pointer-events-none" checked />
                            <input type="radio" name="rating-6"
                                class="mask mask-star-2 bg-orange-400 pointer-events-none" />
                        </div>
                        @elseif($train->stars == 5)
                        <div class="rating rating-sm">
                            <input type="radio" name="rating-6"
                                class="mask mask-star-2 bg-orange-400 pointer-events-none" />
                            <input type="radio" name="rating-6"
                                class="mask mask-star-2 bg-orange-400 pointer-events-none" />
                            <input type="radio" name="rating-6"
                                class="mask mask-star-2 bg-orange-400 pointer-events-none" />
                            <input type="radio" name="rating-6"
                                class="mask mask-star-2 bg-orange-400 pointer-events-none" />
                            <input type="radio" name="rating-6"
                                class="mask mask-star-2 bg-orange-400 pointer-events-none" checked />
                        </div>
                        @endif
                    </td>
                    <td>{{$train->comment}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin-layout>