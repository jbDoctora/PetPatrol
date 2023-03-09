<x-dash-layout>
    <form method="POST" action="/pet/add-info/add" enctype="multipart/form-data" class="max-w-lg mx-auto my-5">
        @csrf
        <div class="mb-6">
            <label class="block font-medium mb-2" for="pet-name">Pet Name</label>
            <input id="pet-name" class="input input-bordered w-full py-2 px-3 rounded" type="text" name="name">
            @error('name')
            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label class="block font-medium mb-2" for="pet-photo">Pet Photo</label>
            <input id="pet-photo" class="file-input file-input-bordered w-full" type="file" name="image">
            @error('image')
            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label class="block font-medium mb-2" for="pet-type">Pet Type</label>
            <select id="pet-type" class="select select-bordered w-full py-2 px-3 rounded" name="type">
                <option disabled selected>Select a pet type</option>
                <option value="Dog">Dog</option>
                <option value="Cat">Cat</option>
                <option value="Hamster">Hamster</option>
                <option value="Parrot">Parrot</option>
            </select>
            @error('type')
            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label class="block font-medium mb-2" for="pet-age">Pet Age</label>
            <div class="flex items-center">
                <input id="pet-age-years" class="input input-bordered w-16 py-2 px-3 rounded-l" type="text" name="years"
                    placeholder="0">
                <span class="text-lg mx-2">years</span>
                <input id="pet-age-months" class="input input-bordered w-16 py-2 px-3 rounded-r" type="text"
                    name="months" placeholder="0">
                <span class="text-lg mx-2">months</span>
            </div>
            @error('years')
            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror
            @error('months')
            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label class="block font-medium mb-2" for="pet-breed">Pet Breed</label>
            <input id="pet-breed" class="input input-bordered w-full py-2 px-3 rounded" type="text" name="breed">
            @error('breed')
            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <p>Weight: </p>
            <select class="select select-bordered w-full" name="weight">
                <option disabled selected></option>
                <option value="1-5">1-5 kgs.</option>
                <option value="5-10">5-10 kgs.</option>
                <option value="10-20">10-20 kgs.</option>
                <option value="20-35">20-35 kgs.</option>
                <option value="30+">30+ kgs.</option>
            </select>
            @error('breed')
            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <p>Additional Information</p>
            <input type="text" class="textarea textarea-bordered w-full h-56">
            @error('breed')
            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6 my-5 flex justify-center">
            <button
                class="tracking-wide rounded-md px-5 py-4 bg-yellow-400 text-black text-sm font-bold border border-black hover:rounded-3xl transition-all duration-400"
                type="submit">
                Submit
            </button>
        </div>
    </form>
</x-dash-layout>