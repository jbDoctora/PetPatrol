<x-trainer-layout>
    <div x-data="{ service: [], type: [] }" class="bg-white m-5 p-5 rounded">
        <p class="text-xs text-red-500">fields marked * are required</p>

        <form method="POST" action="/trainer/portfolio/edit/update" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            {{-- @foreach($portfolio as $portfolios) --}}
            <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
            <div class="m-3 rounded-xl bg-white">
                <h2 class="p-5 text-xl font-normal"><span class="text-red-500">*</span>About Me</h2>
                <textarea id="myeditorinstance" name="about_me" rows="5">{{$portfolio->about_me}}</textarea>
                @error('about_me')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="m-3 rounded-xl bg-white">
                <h2 class="p-5 text-xl font-normal"><span class="text-red-500">*</span>Pet Training Experience</h2>
                <textarea id="myeditorinstance" class="h-64 w-64" name="experience"
                    rows="5">{{$portfolio->experience}}</textarea>
                @error('experience')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-8">
                <div class="pr-5">
                    <div class="m-3 rounded-xl bg-white">
                        <h2 class="p-5 text-xl font-normal"><span class="text-red-500">*</span>Services</h2>
                        <div class="mb-4 flex items-center p-2 pl-4">
                            <input type="checkbox" class="" value="Potty Training" x-model="service" />
                            <label for="" class="ml-2 text-sm font-medium">Potty Training</label>
                        </div>
                        <div class="mb-4 flex items-center p-2 pl-4">
                            <input type="checkbox" class="" value="Obedience Training" x-model="service" />
                            <label for="" class="ml-2 text-sm font-medium">Obedience Training</label>
                        </div>

                        <div class="mb-4 flex items-center p-2 pl-4">
                            <input type="checkbox" class="d" value="Behavioral Training" x-model="service" />
                            <label for="" class="ml-2 text-sm font-medium">Behavioral Training</label>
                        </div>

                        <div class="mb-4 flex items-center p-2 pl-4">
                            <input type="checkbox" class="" value="Agility Training" x-model="service" />
                            <label for="" class="ml-2 text-sm font-medium">Agility Training</label>
                        </div>

                        <div class="mb-4 flex items-center p-2 pl-4 pb-5">
                            <input type="checkbox" class="" value="Tricks Training" x-model="service" />
                            <label for="" class="ml-2 text-sm font-medium">Tricks Training</label>
                        </div>
                        <p class="hidden" x-text="service.join(', ')"></p>
                        <input type="hidden" name="services" x-model="service">
                    </div>
                </div>

                <div class="px-9">
                    <div class="m-3 rounded-xl bg-white">
                        <h2 class="p-5 text-xl font-normal"><span class="text-red-500">*</span>Pet that I train</h2>
                        <div class="mb-4 flex items-center p-2 pl-4">
                            <input type="checkbox" class="" value="Dog" x-model="type" />
                            <label for="" class="ml-2 text-sm font-medium">Dog</label>
                        </div>
                        <div class="mb-4 flex items-center p-2 pl-4">
                            <input type="checkbox" class="" value="Cat" x-model="type" />
                            <label for="" class="ml-2 text-sm font-medium">Cat</label>
                        </div>

                        <div class="mb-4 flex items-center p-2 pl-4">
                            <input type="checkbox" class="" value="Hamster" x-model="type" />
                            <label for="" class="ml-2 text-sm font-medium">Hamster</label>
                        </div>

                        <div class="mb-4 flex items-center p-2 pl-4 pb-5">
                            <input type="checkbox" class="" value="Parrot" x-model="type" />
                            <label for="" class="ml-2 text-sm font-medium">Parrot</label>
                        </div>
                        <p class="hidden" x-text="type.join(', ')"></p>
                        <input type="hidden" name="type" x-model="type">
                    </div>
                </div>
            </div>
            @error('type')
            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror
            @error('services')
            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror


            <div class="m-3 rounded-xl bg-white">
                <h2 class="p-5 text-xl font-normal"><span class="text-red-500">*</span>Certificates</h2>
                <input type="file" class="rounded p-3 py-2 border border-gray-200 text-sm" name="certificates[]"
                    x-on:change="showImagePreview($event, 'certificates-preview')" multiple>
                @error('certificates')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="m-3 rounded-xl bg-white">
                <h2 class="p-5 text-xl font-normal"><span class="text-red-500">*</span>Photos</h2>
                <input type="file" class="rounded p-3 py-2 border border-gray-200 text-sm" name="journey_photos[]"
                    multiple>
                @error('journey_photos')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="p-4 text-center">
                <button class="rounded px-3 py-2 bg-blue-700 text-white text-sm w-96">
                    Submit
                </button>
            </div>
            {{-- @endforeach --}}
        </form>

</x-trainer-layout>