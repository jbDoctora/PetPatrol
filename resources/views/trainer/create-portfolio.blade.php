<x-trainer-layout>
    <header class="bg-white p-4 shadow-md">
        <div class="container mx-auto">
            <h1 class="text-xl font-bold">Pet Trainer Portfolio Form</h1>
        </div>
    </header>
    <section class="container mx-auto py-10">
        <form method="POST" action="/trainer/portfolio/add" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{ auth()->id() }}" name="user_id">
            <h2 class="mb-6 text-2xl font-bold">About Me</h2>
            <textarea class="mb-6 w-full rounded-lg bg-white p-4 shadow-md" name="about_me" rows="5"></textarea>
            @error('about_me')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror

            <h2 class="mb-6 text-2xl font-bold">Services</h2>
            <div class="mb-4 flex items-center p-5">
                <input type="checkbox" class="checkbox checkbox-primary checkbox-md" value="Potty Training"
                    name="services" />
                <label for="" class="ml-2 text-sm font-medium">Potty Training</label>
            </div>

            <div class="mb-4 flex items-center p-5">
                <input type="checkbox" class="checkbox checkbox-primary checkbox-md" value="Obedience Training"
                    name="services">
                <label for="" class="ml-2 text-sm font-medium">Obedience Training</label>
            </div>

            <div class="mb-4 flex items-center p-5">
                <input type="checkbox" class="checkbox checkbox-primary checkbox-md" value="Behavioral Training"
                    name="services" />
                <label for="" class="ml-2 text-sm font-medium">Behavioral Training</label>
            </div>

            <div class="mb-4 flex items-center p-5">
                <input type="checkbox" class="checkbox checkbox-primary checkbox-md" value="Agility Training"
                    name="services" />
                <label for="" class="ml-2 text-sm font-medium">Agility Training</label>
            </div>

            <div class="mb-4 flex items-center p-5">
                <input type="checkbox" class="checkbox checkbox-primary checkbox-md" value="Tricks Training"
                    name="services" />
                <label for="" class="ml-2 text-sm font-medium">Tricks Training</label>
            </div>

            <h2 class="mb-6 text-2xl font-bold">Pet that I train</h2>
            <div class="mb-4 flex items-center p-5">
                <input type="checkbox" class="checkbox checkbox-primary checkbox-md" value="Theraphy" name="type" />
                <label for="" class="ml-2 text-sm font-medium">Dog</label>
            </div>
            <div class="mb-4 flex items-center p-5">
                <input type="checkbox" class="checkbox checkbox-primary checkbox-md" value="Potty Training"
                    name="type" />
                <label for="" class="ml-2 text-sm font-medium">Cat</label>
            </div>

            <div class="mb-4 flex items-center p-5">
                <input type="checkbox" class="checkbox checkbox-primary checkbox-md" value="Obedience Training"
                    name="type" />
                <label for="" class="ml-2 text-sm font-medium">Hamster</label>
            </div>

            <div class="mb-4 flex items-center p-5">
                <input type="checkbox" class="checkbox checkbox-primary checkbox-md" value="Behavioral Training"
                    name="type" required />
                <label for="" class="ml-2 text-sm font-medium">Parrot</label>
            </div>

            <h2 class="mb-6 text-2xl font-bold">Certificates</h2>
            <input type="file" class="file-input w-full max-w-xs" name="certificates">
            @error('certificates')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror
            <h2 class="mb-6 text-2xl font-bold">Pet Training Experience</h2>
            <textarea class="mb-6 w-full rounded-lg bg-white p-4 shadow-md" name="experience" rows="5"></textarea>
            @error('experience')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror
            <h2 class="mb-6 text-2xl font-bold">Journey Photos</h2>
            <input type="file" class="file-input w-full max-w-xs" name="journey_photos">
            @error('journey_photos')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror
            <h2 class="mb-6 text-2xl font-bold">Profile Photo</h2>
            <input type="file" class="file-input w-full max-w-xs" name="profile_photo">
            @error('profile_photo')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
            @enderror
            <div class="mt-6 text-center">
                <button class="btn btn-primary">
                    Submit
                </button>
            </div>
        </form>
    </section>
</x-trainer-layout>
