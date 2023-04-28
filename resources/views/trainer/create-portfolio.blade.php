<x-trainer-layout>
    <div x-data="{ service: [], type: [] }" class="bg-white m-5 p-5 rounded">
        <p class="text-xs text-gray-800"><span class="text-red-500 text-sm mr-2">*</span>Indicates a required field</p>
        <form method="POST" action="/trainer/portfolio/add" enctype="multipart/form-data">
            @csrf
            <div class="m-3 rounded-xl bg-white">
                <input type="hidden" value="{{ auth()->id() }}" name="user_id">
                <h2 class="p-5 text-xl font-normal"><span class="text-red-500">*</span>About Me</h2>
                <textarea id="myeditorinstance" name="about_me" rows="5"></textarea>
                @error('about_me')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="m-3 rounded-xl bg-white">
                <h2 class="p-5 text-xl font-normal"><span class="text-red-500">*</span>Pet Training Experience</h2>
                <textarea id="myeditorinstance" class="h-64 w-64" name="experience" rows="5"></textarea>
                @error('experience')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-8">
                <div class="pr-5">
                    <div class="m-3 rounded-xl bg-white">
                        <h2 class="p-5 text-xl font-normal"><span class="text-red-500">*</span>Services</h2>
                        @foreach($admin_service as $service)
                        <div class="mb-4 flex items-center p-2 pl-4">
                            <input type="checkbox" class="" value="{{$service->admin_service}}" x-model="service" />
                            <label for="" class="ml-2 text-sm font-medium">{{$service->admin_service}}</label>
                        </div>
                        @endforeach

                        <p class="hidden" x-text="service.join(', ')"></p>
                        <input type="hidden" name="services" x-model="service">
                    </div>
                </div>

                <div class="px-9">
                    <div class="m-3 rounded-xl bg-white">
                        <h2 class="p-5 text-xl font-normal"><span class="text-red-500">*</span>Pet that I train</h2>
                        @foreach($admin_petType as $pet)
                        <div class="mb-4 flex items-center p-2 pl-4">
                            <input type="checkbox" class="" value="{{$pet->admin_petType}}" x-model="type" />
                            <label for="" class="ml-2 text-sm font-medium">{{$pet->admin_petType}}</label>
                        </div>
                        @endforeach

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
</x-trainer-layout>