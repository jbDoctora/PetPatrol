<x-dash-layout>
    <div class="bg-white rounded m-5 p-5">
        <form method="POST" action="/pet/add-info/add" enctype="multipart/form-data" class="max-w-lg mx-auto">
            @csrf
            <input type="hidden" name="book_status" value="inactive">
            <div class="mb-4">
                <label class="block font-normal text-sm mb-2" for="pet-name">Pet Name</label>
                <input id="pet-name" class="rounded border border-gray-300 px-3 py-3 w-full text-xs" type="text"
                    name="pet_name">
                @error('pet_name')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block font-normal text-sm mb-2" for="pet-photo">Pet Photo</label>
                <input id="pet-photo" class="rounded border border-gray-300 px-3 py-3 w-full text-xs" type="file"
                    name="image">
                @error('image')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block font-normal text-sm mb-2" for="pet-type">Pet Type</label>
                <select id="pet-type" class="rounded border border-gray-300 px-3 py-3 w-full text-xs" name="type">
                    <option disabled selected>Select a pet type</option>
                    {{-- <option value="Dog">Dog</option>
                    <option value="Cat">Cat</option>
                    <option value="Hamster">Hamster</option>
                    <option value="Parrot">Parrot</option> --}}
                    @foreach($adminPetType as $pet_type)
                    <option value="{{$pet_type->admin_petType}}">{{$pet_type->admin_petType}}</option>
                    @endforeach
                </select>
                @error('type')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block font-normal text-sm mb-2" for="vaccine-status">Vaccination Status</label>
                <div class="flex flex-col items-center gap-5">
                    <select id="vaccine-status" class="rounded border border-gray-300 px-3 py-3 w-full text-xs"
                        name="vaccine">
                        <option disabled selected>Select vaccination status</option>
                        <option value="Vaccinated">Vaccinated</option>
                        <option value="Unvaccinated">Unvaccinated</option>
                    </select>
                    <textarea id="vaccine-list" class="rounded border border-gray-300 px-3 py-3 w-full text-xs h-20"
                        type="text" name="vaccine_list" placeholder="List all vaccines"></textarea>
                </div>
                @error('vaccine')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
                @error('vaccine_list')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block font-normal text-sm mb-2" for="pet-age">Pet Age</label>
                <div class="flex items-center">
                    <input id="pet-age-years" class="rounded border border-gray-300 px-3 py-3 w-full text-xs"
                        type="number" name="years" placeholder="0">
                    <span class="text-xs mx-2">years</span>
                    <input id="pet-age-months" class="rounded border border-gray-300 px-3 py-3 w-full text-xs"
                        type="number" name="months" placeholder="0">
                    <span class="text-xs mx-2">months</span>
                </div>
                @error('years')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
                @error('months')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block font-normal text-sm mb-2" for="pet-breed">Pet Breed</label>
                <input id="pet-breed" class="rounded border border-gray-300 px-3 py-3 w-full text-xs" type="text"
                    name="breed">
                @error('breed')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4"> <label class="block font-normal text-sm mb-2" for="pet-weight">Pet Weight</label>
                <select id="pet-weight" class="rounded border border-gray-300 px-3 py-3 w-full text-xs" name="weight">
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
                    class="rounded border border-gray-300 px-3 py-3 w-full text-xs h-36"></textarea> @error('info') <p
                    class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror </div>
            <div class="flex justify-center"> <button
                    class="rounded bg-blue-700 text-white py-2 px-3 hover:bg-blue-800 w-full text-sm"
                    type="submit">Submit</button>
            </div>
        </form>
    </div>
</x-dash-layout>