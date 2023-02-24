<x-dash-layout>
    <form method="POST" action="/pet/add-info/add" class="m-6 mx-auto flex flex-col items-center justify-center px-4"
        enctype="multipart/form-data">
        @csrf
        <div class="flex w-full flex-row border-2 border-black p-6">
            <div>
                <label class="text-md font-bold sm:text-sm">I am looking for a service for my:</label>
            </div>
            <div>
                <input type="radio" value="Dog" name="type" class="radio radio-primary ml-5" required />
                <label for="">Dog</label>
            </div>
            <div>
                <input type="radio" value="Cat" name="type" class="radio radio-primary ml-5" />
                <label for="">Cat</label>
            </div>
            <div>
                <input type="radio" value="Hamster" name="type" class="radio radio-primary ml-5" />
                <label for="">Hamster</label>
            </div>
            <div>
                <input type="radio"value="Parrot" name="type" class="radio radio-primary ml-5" />
                <label for="">Parrot</label>
            </div>
        </div>

        <div class="m-9 flex w-full flex-col border-2 border-black p-2 p-4">
            <label for="" class="text-3xl font-extrabold">Add your favorite picture of your pet!</label>
            <input type="file" name="image" class="file-input m-3 w-full max-w-xs" />
            <input type="text" name="name" placeholder="Pet name" name="petName"
                class="input input-bordered m-3 w-full max-w-xs bg-white" />
            @error('name')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="m-6 w-full border-2 border-black p-4">
            <div class="flex flex-row">
                <div><label class="text-3xl font-extrabold">Tell us few facts for starters.</label></div>
            </div>
            <div class="grid grid-cols-2">
                <div class="m-5">
                    <div class="m-2"><label for="" class="">Age</label></div>
                    <input type="text" name="years" class="input input-bordered ml-4 w-12 max-w-xs bg-white" />
                    @error('years')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                    <label for="" class="ml-3">years</label>
                    <input type="text" name="months" class="input input-bordered ml-4 w-12 max-w-xs bg-white" />
                    @error('months')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                    <label for="" class="ml-3">months</label>
                </div>
                <div class="m-5">
                    <div class="m-2"><label for="" class="">Name of the breed</label></div>
                    <div>
                        <input type="text" name="breed" class="input input-bordered w-full max-w-xs bg-white" />
                        @error('breed')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="m-5">
                <div><label for="" class="">Weight</label></div>
                <div class="grid grid-cols-1 justify-center gap-3 sm:grid-cols-5">
                    <div class="">
                        <input type="radio" value="1-5 kgs" name="weight" class="radio radio-primary ml-6"
                            required />
                        <label for="" class="ml-2">1-5 kgs</label>
                    </div>
                    <div>
                        <input type="radio" value="5-10 kgs" name="weight" class="radio radio-primary ml-6" />
                        <label for="" class="ml-2">5-10 kgs</label>
                    </div>
                    <div>
                        <input type="radio" value="10-20 kgs" name="weight" class="radio radio-primary ml-6" />
                        <label for="" class="ml-2">10-20 kgs</label>
                    </div>
                    <div>
                        <input type="radio" value="2-35 kgs" name="weight" class="radio radio-primary ml-6" />
                        <label for="" class="ml-2">20-35 kgs</label>
                    </div>
                    <div>
                        <input type="radio" value="30+ kgs" name="weight" class="radio radio-primary ml-6" />
                        <label for="" class="ml-2">30+ kgs</label>
                    </div>
                </div>
            </div>
        </div>
        <button
            class="inline-block rounded border border-indigo-600 bg-indigo-600 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500"
            type="submit">
            Submit
        </button>
    </form>
</x-dash-layout>
