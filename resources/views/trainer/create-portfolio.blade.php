<x-trainer-layout>
    <div x-data="{ service: [], type: [] }">
        <header class="bg-white p-4">
            <div class="container mx-auto">
                <h1 class="text-2xl font-bold">Pet Trainer Portfolio Form</h1>
            </div>
        </header>
        <form method="POST" action="/trainer/portfolio/add" enctype="multipart/form-data">
            @csrf
            {{-- <div class="m-3 rounded-xl bg-white">
                <h2 class="p-5 text-xl font-bold">Profile Photo</h2>
                <input type="file" class="file-input file-input-bordered name= m-5 w-96" name="profile_photo">
                @error('profile_photo')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div> --}}

            <div class="m-3 rounded-xl bg-white">
                <input type="hidden" value="{{ auth()->id() }}" name="user_id">
                <h2 class="p-5 text-xl font-bold">About Me</h2>
                <textarea id="myeditorinstance" name="about_me" rows="5"></textarea>
                @error('about_me')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="m-3 rounded-xl bg-white">
                <h2 class="p-5 text-xl font-bold">Services</h2>
                <div class="mb-4 flex items-center p-2 pl-4">
                    <input type="checkbox" class="checkbox checkbox-primary checkbox-md" value="Potty Training"
                        x-model="service" />
                    <label for="" class="ml-2 text-sm font-medium">Potty Training</label>
                </div>
                <div class="mb-4 flex items-center p-2 pl-4">
                    <input type="checkbox" class="checkbox checkbox-primary checkbox-md" value="Obedience Training"
                        x-model="service" />
                    <label for="" class="ml-2 text-sm font-medium">Obedience Training</label>
                </div>

                <div class="mb-4 flex items-center p-2 pl-4">
                    <input type="checkbox" class="checkbox checkbox-primary checkbox-md" value="Behavioral Training"
                        x-model="service" />
                    <label for="" class="ml-2 text-sm font-medium">Behavioral Training</label>
                </div>

                <div class="mb-4 flex items-center p-2 pl-4">
                    <input type="checkbox" class="checkbox checkbox-primary checkbox-md" value="Agility Training"
                        x-model="service" />
                    <label for="" class="ml-2 text-sm font-medium">Agility Training</label>
                </div>

                <div class="mb-4 flex items-center p-2 pl-4 pb-5">
                    <input type="checkbox" class="checkbox checkbox-primary checkbox-md" value="Tricks Training"
                        x-model="service" />
                    <label for="" class="ml-2 text-sm font-medium">Tricks Training</label>
                </div>
                <p class="hidden" x-text="service.join(', ')"></p>
                <input type="hidden" name="services" x-model="service">
            </div>

            <div class="m-3 rounded-xl bg-white">
                <h2 class="p-5 text-xl font-bold">Pet that I train</h2>
                <div class="mb-4 flex items-center p-2 pl-4">
                    <input type="checkbox" class="checkbox checkbox-primary checkbox-md" value="Dog" x-model="type" />
                    <label for="" class="ml-2 text-sm font-medium">Dog</label>
                </div>
                <div class="mb-4 flex items-center p-2 pl-4">
                    <input type="checkbox" class="checkbox checkbox-primary checkbox-md" value="Cat" x-model="type" />
                    <label for="" class="ml-2 text-sm font-medium">Cat</label>
                </div>

                <div class="mb-4 flex items-center p-2 pl-4">
                    <input type="checkbox" class="checkbox checkbox-primary checkbox-md" value="Hamster"
                        x-model="type" />
                    <label for="" class="ml-2 text-sm font-medium">Hamster</label>
                </div>

                <div class="mb-4 flex items-center p-2 pl-4 pb-5">
                    <input type="checkbox" class="checkbox checkbox-primary checkbox-md" value="Parrot"
                        x-model="type" />
                    <label for="" class="ml-2 text-sm font-medium">Parrot</label>
                </div>
                <p class="hidden" x-text="type.join(', ')"></p>
                <input type="hidden" name="type" x-model="type">
            </div>

            <div class="m-3 rounded-xl bg-white">
                <h2 class="p-5 text-xl font-bold">Certificates</h2>
                <input type="file" class="file-input file-input-bordered m-5 w-96" name="certificates">
                @error('certificates')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="m-3 rounded-xl bg-white">
                <h2 class="p-5 text-xl font-bold">Pet Training Experience</h2>
                <textarea id="myeditorinstance" class="h-64 w-64" name="experience" rows="5"></textarea>
                @error('experience')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="m-3 rounded-xl bg-white">
                <h2 class="p-5 text-xl font-bold">Journey Photos</h2>
                <input type="file" class="file-input file-input-bordered name= m-5 w-96" name="journey_photos">
                @error('journey_photos')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="p-4 text-center">
                <button class="btn btn-primary">
                    Submit
                </button>
            </div>
        </form>
    </div>
</x-trainer-layout>