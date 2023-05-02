<x-dash-layout>
    <div class="bg-white rounded m-5 p-5">
        <h3 class="text-xl text-blue-700 p-3">Pet Profile Form</h3>
        <p><span class="text-red-500">*</span> Indicates a required field.</p>
        <form method="POST" action="/pet/add-info/add" enctype="multipart/form-data" class="max-w-lg mx-auto">
            @csrf
            <input type="hidden" name="book_status" value="inactive">

            <div class="mb-4">
                <label class="block font-normal text-sm mb-2" for="pet-name"><span class="text-red-500">*</span>Pet
                    Name</label>
                <input id="pet-name" class="rounded border border-gray-300 px-3 py-3 w-full text-xs" type="text"
                    name="pet_name" value="{{old('pet_name')}}">
                @error('pet_name')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-normal text-sm mb-2" for="pet-photo"><span class="text-red-500">*</span>Pet
                    Photo</label>
                <input id="pet-photo" class="rounded border border-gray-300 px-3 py-3 w-full text-xs" type="file"
                    name="image">
                @error('image')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-normal text-sm mb-2" for="pet-type"><span class="text-red-500">*</span>Pet
                    Type</label>
                <select id="pet-type" class="rounded border border-gray-300 px-3 py-3 w-full text-xs" name="type">
                    <option disabled selected>Select a pet type</option>
                    @foreach($adminPetType as $pet_type)
                    <option value="{{$pet_type->admin_petType}}">{{$pet_type->admin_petType}}</option>
                    @endforeach
                </select>
                @error('type')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-normal text-sm mb-2" for="vaccine-status"><span
                        class="text-red-500">*</span>Vaccination Status</label>
                <div class="flex flex-col gap-5">
                    <select id="vaccine-status" class="rounded border border-gray-300 px-3 py-3 w-full text-xs"
                        name="vaccine">
                        <option disabled selected>Select vaccination status</option>
                        <option value="Vaccinated">Vaccinated</option>
                        <option value="Unvaccinated">Unvaccinated</option>
                    </select>
                    @error('vaccine')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                    <div class="flex justify-start">
                        <label class="block font-normal text-sm"><span class="text-red-500">*</span>List of
                            Vaccines<span class="text-xs text-gray-600 ml-5">This is comma
                                separated
                                values(,)</span></label>
                    </div>
                    <textarea id="vaccine-list" class="rounded border border-gray-300 px-3 py-3 w-full text-xs h-20"
                        type="text" name="vaccine_list" placeholder="List all vaccines"
                        value="{{old('vaccine_list')}}"></textarea>
                    @error('vaccine_list')
                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mb-4">
                <label class="block font-normal text-sm mb-2" for="pet-age"><span class="text-red-500">*</span>Pet
                    Age</label>
                <div class="flex items-center">
                    <div class="flex flex-col">
                        <div class="flex items-center gap-4">
                            <input id="pet-age-years" class="rounded border border-gray-300 px-3 py-3 w-full text-xs"
                                type="number" name="years" placeholder="0" value="{{old('years')}}">
                            <span class="text-xs mx-2">years</span>
                        </div>
                        @error('years')
                        <p class="mt-3 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <div class="flex items-center gap-4">
                            <input id="pet-age-months" class="rounded border border-gray-300 px-3 py-3 w-full text-xs"
                                type="number" name="months" placeholder="0" value="{{old('months')}}">
                            <span class="text-xs mx-2">months</span>
                        </div>
                        @error('months')
                        <p class="mt-3 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

            </div>
            <div class="mb-4">
                <label class="block font-normal text-sm mb-2" for="pet-breed"><span class="text-red-500">*</span>Pet
                    Breed</label>
                <input id="pet-breed" class="rounded border border-gray-300 px-3 py-3 w-full text-xs" type="text"
                    name="breed" value="{{old('breed')}}">
                @error('breed')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4"> <label class="block font-normal text-sm mb-2" for="pet-weight"><span
                        class="text-red-500">*</span>Pet Weight</label>
                <select id="pet-weight" class="rounded border border-gray-300 px-3 py-3 w-full text-xs" name="weight"
                    @checked(old('weight'))>
                    <option disabled selected>Select pet weight</option>
                    <option value="1-5">1-5 kgs.</option>
                    <option value="5-10">5-10 kgs.</option>
                    <option value="10-20">10-20 kgs.</option>
                    <option value="20-35">20-35 kgs.</option>
                    <option value="30+">30+ kgs.</option>
                </select>
                @error('weight')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4"> <label class="block font-normal text-sm mb-2" for="additional-info">Additional
                    Information</label> <textarea id="additional-info" name="info"
                    class="rounded border border-gray-300 px-3 py-3 w-full text-xs h-36"
                    value="{{old('info')}}"></textarea>
            </div>

            <div class="flex justify-center"> <button
                    class="rounded bg-blue-700 text-white py-2 px-3 hover:bg-blue-800 w-full text-sm"
                    type="submit">Submit</button>
            </div>
        </form>
    </div>
</x-dash-layout>