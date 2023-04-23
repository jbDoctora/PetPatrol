<x-admin-layout>
    <div class="bg-white rounded m-3 p-5">
        <div class="flex justify-between items-center p-3 border-b border-gray-300">
            <div>
                <h2 class="text-blue-700 text-xl">Manage Pet Type</h2>
            </div>
            <div class="m-3">
                <label for="add-modal" class="bg-blue-700 rounded text-white text-xs px-3 py-2 hover:bg-blue-800">
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
                    <td>
                        {{-- MODAL FOR PET TYPE UPDATE --}}
                        <form method="POST" action="/admin/pet-type/update">
                            @csrf
                            @method('PUT')
                            <input type="checkbox" id="action-modal-{{$pet->id}}" class="modal-toggle" />
                            <div class="modal">
                                <div class="modal-box relative rounded">
                                    <label for="action-modal-{{$pet->id}}"
                                        class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                                    <h3 class="text-lg font-bold"><i
                                            class="fa-solid fa-pen-to-square fa-lg mr-3"></i>Edit
                                        Pet
                                        Type
                                    </h3>
                                    <input type="hidden" name="id" value="{{$pet->id}}">
                                    <div class="flex flex-col gap-5">
                                        <div class="flex justify-between items-center">
                                            <label for="" class="text-sm">Pet Type: </label>
                                            <input type="text" value="{{$pet->admin_petType}}" name="admin_petType"
                                                class="rounded border border-gray-300 px-3 py-2 text-xs w-40" />
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <label for="" class="text-sm">Action: </label>
                                            <select name="" id="" name="isPosted"
                                                class="rounded border border-gray-300 px-3 py-2 text-xs w-40">
                                                <option value="1">Post</option>
                                                <option value="0">Unpost</option>
                                            </select>
                                        </div>
                                        <div class="flex justify-end">
                                            <button type="submit"
                                                class="bg-blue-700 text-sm text-white px-3 py-2 hover:bg-blue-800">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <label for="action-modal-{{$pet->id}}" class="text-white bg-blue-700 py-2 px-3 rounded"><i
                                class="fa-solid fa-pen-to-square fa-md"></i></label>
                    </td>
                </tr>

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
                        <input type="text" name="admin_petType"
                            class="border border-gray-300 py-2 px-3 rounded w-56 text-sm" x-data="{ value: '' }"
                            x-model="value" x-on:input="value = value.replace(/\b\w/g, l => l.toUpperCase())">
                    </div>
                    @error('admin_petType')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                    <div class="flex justify-between gap-4 m-3 items-center">
                        <label for="" class="text-sm">Status</label>
                        <select name="isPosted" id="" class="border broder-gray-300 py-2 px-3 rounded w-56 text-sm">
                            <option value="1">posted</option>
                            <option value="0">unposted</option>
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