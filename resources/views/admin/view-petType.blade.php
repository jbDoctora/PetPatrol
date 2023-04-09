<x-admin-layout>
    <div class="bg-white rounded m-3 p-5">
        <div class="flex justify-between items-center p-3 border-b border-gray-300">
            <div>
                <h2 class="text-blue-700 text-xl">Manage Pet Type</h2>
            </div>
            <div>
                <label for="add-modal"
                    class="bg-blue-700 border border-gray-300 rounded text-white text-sm px-4 py-3 hover:bg-blue-800">
                    <i class="fa-solid fa-plus mr-2"></i>Add new pet type
                </label>
            </div>
        </div>

        <table id="myTable">
            <thead class="bg-blue-700 text-white text-xs">
                <tr>
                    <th>Id</th>
                    <th>Pet Type</th>
                    <th>isPosted?</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="text-xs text-gray-600 text-center">
                @foreach($petType as $pet)
                <tr>
                    <td>
                        <div class="my-2">{{$pet->id}}</div>
                    </td>
                    <td>{{$pet->admin_petType}}</td>
                    <td>{{$pet->isPosted == 0? 'unposted': 'posted'}}</td>
                    <td><label for="action-modal-{{$pet->id}}" class="text-white bg-blue-700 py-2 px-3 rounded"><i
                                class="fa-solid fa-pen-to-square fa-md"></i></label></td>
                </tr>
                <input type="checkbox" id="action-modal-{{$pet->id}}" class="modal-toggle" />
                <div class="modal">
                    <div class="modal-box relative rounded">
                        <label for="action-modal-{{$pet->id}}"
                            class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                        <h3 class="text-lg font-bold">Congratulations random Internet user!</h3>
                        <p class="py-4">You've been selected for a chance to get one year of subscription to use
                            Wikipedia for free!</p>
                    </div>
                </div>
                <input type="checkbox" id="action-modal-{{$pet->id}}" class="modal-toggle" />
                <div class="modal">
                    <div class="modal-box relative rounded">
                        <label for="action-modal-{{$pet->id}}"
                            class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                        <h3 class="text-lg font-bold">Congratulations random Internet user!</h3>
                        <p class="py-4">You've been selected for a chance to get one year of subscription to use
                            Wikipedia for free!</p>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
    <form method="POST" action="/admin/pet-type/add">
        @csrf
        <input type="checkbox" id="add-modal" class="modal-toggle" />
        <div class="modal">
            <div class="modal-box relative rounded">
                <label for="add-modal" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                <h3 class="text-sm font-bold border-b border-gray-300">Add pet type</h3>
                <div class="flex flex-col justify-start">
                    <div class="flex justify-between gap-4 m-3 items-center">
                        <label for="" class="text-sm">Pet Type Name</label>
                        <input type="text" name="admin_petType" class="border border-gray-300 py-2 px-3 rounded w-56"
                            x-data="{ value: '' }" x-model="value"
                            x-on:input="value = value.replace(/\b\w/g, l => l.toUpperCase())">
                    </div>
                    @error('admin_petType')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                    <div class="flex justify-between gap-4 m-3 items-center">
                        <label for="" class="text-sm">Status</label>
                        <select name="isPosted" id="" class="border broder-gray-300 py-2 px-3 rounded w-56">
                            <option value="0">unposted</option>
                            <option value="1">posted</option>
                        </select>
                    </div>
                    <div class="mx-auto mt-4">
                        <button type="submit" class="bg-blue-700 text-sm text-white px-3 py-2 rounded">Add</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-admin-layout>