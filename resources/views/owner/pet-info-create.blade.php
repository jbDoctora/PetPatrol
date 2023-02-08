<x-NoNavFoot>
    <form method="POST" action="/pet/add-info/add" class="flex flex-col justify-center items-center mx-auto px-4 m-6" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-row p-6 border-2 border-black w-full">
            <div>
                <label class="font-bold text-md sm:text-sm">I am looking for a service for my:</label>
            </div>
            <div> 
                <input type="radio" value="Dog" name="type" class="radio radio-primary ml-5 " required/>
                <label for="">Dog</label>
            </div>
            <div>
                <input type="radio" value="Cat"  name="type" class="radio radio-primary ml-5" />
                <label for="">Cat</label>
            </div>
            <div>
                <input type="radio" value="Hamster" name="type" class="radio radio-primary ml-5" />
                <label for="">Hamster</label>
            </div>
            <div>
                <input type="radio"value="Parrot"  name="type" class="radio radio-primary ml-5" />
                <label for="">Parrot</label>
            </div>
        </div>
    
        <div class="flex flex-col p-2 border-2 border-black w-full m-9 p-4">
            <label for="" class="font-extrabold text-3xl">Add your favorite picture of your pet!</label>
            <input type="file" name="image" class="file-input w-full max-w-xs m-3" />
            <input type="text" name="name" placeholder="Pet name" name="petName" class="input input-bordered w-full max-w-xs m-3 bg-white" />
            @error('name')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>
    
        <div class="border-2 border-black w-full m-6 p-4">
            <div class="flex flex-row">
                <div><label class="font-extrabold text-3xl">Tell us few facts for starters.</label></div>
            </div>
            <div class="grid grid-cols-2">
                <div class="m-5">
                    <div class="m-2"><label for="" class="">Age</label></div>
                    <input type="text" name="years" class="input input-bordered w-12 max-w-xs bg-white ml-4" />
                    @error('years')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                    <label for="" class="ml-3">years</label>
                    <input type="text" name="months" class="input input-bordered w-12 max-w-xs bg-white ml-4" />
                    @error('months')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                    <label for="" class="ml-3">months</label>
                </div>
                <div class="m-5">
                    <div class="m-2"><label for="" class="">Name of the breed</label></div>
                    <div>
                        <input type="text" name="breed" class="input input-bordered w-full max-w-xs bg-white" />
                        @error('breed')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                </div>
            </div>
        <div class="m-5">
            <div><label for="" class="">Weight</label></div>
            <div class="grid grid-cols-1 sm:grid-cols-5 justify-center gap-3">
                <div class="">
                    <input type="radio"  value="1-5 kgs" name="weight" class="radio radio-primary ml-6" required/>
                    <label for="" class="ml-2">1-5 kgs</label>
                </div>
                <div>
                    <input type="radio" value="5-10 kgs" name="weight" class="radio radio-primary ml-6" />
                    <label for="" class="ml-2">5-10 kgs</label>
                </div>
                <div>
                    <input type="radio" value="10-20 kgs" name="weight"  class="radio radio-primary ml-6" />
                    <label for="" class="ml-2">10-20 kgs</label>
                </div>
                <div>
                    <input type="radio" value="2-35 kgs" name="weight"  class="radio radio-primary ml-6" />
                    <label for="" class="ml-2">20-35 kgs</label>
                </div>
                <div>
                    <input type="radio" value="30+ kgs" name="weight"  class="radio radio-primary ml-6" />
                    <label for="" class="ml-2">30+ kgs</label>
                </div>
             </div>
        </div>
    </div>
    <button class="inline-block rounded border border-indigo-600 bg-indigo-600 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500" type="submit">
        Submit
    </button>
</form>
</x-NoNavFoot>