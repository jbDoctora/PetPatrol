<x-dash-layout>
    <div class="mx-auto mb-6 h-full max-w-screen-sm py-10 sm:px-6 lg:px-8 border border-gray-300 my-5 bg-white"
        x-data="{ step: 1, percentComplete: 0, pet: '', course: '', info: '', sessions: '', date: '', location: '', pet_type: '' }">

        <div class="mx-auto mb-5 flex max-w-screen-xl items-center justify-center px-4">
            <progress class="progress progress-warning border border-yellow-500 w-56" value="0" :value="percentComplete"
                max="100"></progress>
        </div>
        <div x-show="step === 1" class="h-auto">
            <form class="mt-2 mb-0 space-y-4 rounded p-8 bg-white">
                <div class="mb-4 flex items-center">
                    <label for="" class="my-3 block text-left text-sm">
                        <p> Choose your pet that you want to train.</p>
                    </label>
                </div>

                <div class="grid grid-cols-2 items-center gap-5">
                    @forelse($petinfo as $petinfos)
                    <label class="inline-flex items-center rounded border border-gray-300 py-3 px-9 hover:bg-gray-100">
                        <input type="radio" name="radio-1" class="radio radio-sm checked:bg-blue-500"
                            value="{{ $petinfos->pet_name }},{{ $petinfos->type }},{{$petinfos->pet_id}}" x-model="pet"
                            required />
                        <span class="ml-2 text-xs font-medium">{{ $petinfos->pet_name }}</span>
                    </label>
                    @empty

                    <p class="col-span-2 text-justify text-sm">You have not registered a pet, or training requests have
                        already
                        been made
                        for your pets.</p>
                    <a href="/pet/add-info" class="underline text-blue-500 text-center">
                        Add pet
                    </a>
                    @endforelse
                </div>

                <div class="flex items-center justify-center">
                    <button class="rounded bg-blue-700 text-white py-2 px-3 hover:bg-blue-800 w-24 text-sm mt-5"
                        @click.prevent="step++, percentComplete = 25" x-bind:disabled="!pet"
                        x-bind:class="{ 'bg-gray-400 hover:bg-gray-400': !pet }">Next</button>
                </div>
            </form>
        </div>

        <div x-show="step === 2">
            <form class="mt-2 mb-0 space-y-4 rounded-lg p-8 bg-white">
                <div class="mb-4 flex items-center">
                    <label for="" class="my-3 block text-left text-sm">
                        Which pet training course are you interested in?
                    </label>
                </div>

                <div class="grid grid-cols-2 items-center gap-5">

                    @foreach($adminService as $newService)
                    <label class="inline-flex items-center rounded border border-gray-200 py-3 px-9 hover:bg-gray-100">
                        <input type="radio" name="radio-1" class="radio radio-sm checked:bg-blue-500" x-model="course"
                            value="{{$newService->admin_service}}" />
                        <span class="ml-2 text-xs font-medium">{{$newService->admin_service}}</span>
                    </label>
                    @endforeach
                </div>

                <div class="flex items-center justify-center gap-4">
                    <button class="rounded bg-neutral-900 text-white py-2 px-3 hover:bg-neutral-800 w-24 text-sm mt-5"
                        @click.prevent="step--, percentComplete = 0">Back</button>
                    <button class="rounded bg-blue-700 text-white py-2 px-3 hover:bg-blue-800 w-24 text-sm mt-5"
                        @click.prevent="step++, percentComplete = 50" x-bind:disabled="!course.length"
                        x-bind:class="{ 'bg-gray-400 hover:bg-gray-400': !course }">Next</button>
                </div>

            </form>
        </div>

        <div x-show="step === 3">
            <form class="mt-2 mb-0 space-y-4 rounded p-8 bg-white">
                <div class="mb-4 flex items-center">
                    <label for="" class="my-3 block text-left text-sm">
                        Which pet training course are you interested in?
                    </label>
                </div>

                <div class="grid grid-cols-1 items-center gap-5">
                    <label class="inline-flex items-center rounded border border-gray-200 py-3 px-9 hover:bg-gray-100">
                        <input type="radio" name="radio-8" class="radio radio-sm checked:bg-blue-500"
                            value="Weekdays mornings" x-model="sessions" required />
                        <span class="ml-2 text-xs font-medium">Weekdays mornings</span>
                    </label>
                    <label class="inline-flex items-center rounded border border-gray-200 py-3 px-9 hover:bg-gray-100">
                        <input type="radio" name="radio-8" class="radio radio-sm checked:bg-blue-500"
                            value="Weekdays afternoon" x-model="sessions" />
                        <span class="ml-2 text-xs font-medium">Weekdays afternoon</span>
                    </label>
                    <label class="inline-flex items-center rounded border border-gray-200 py-3 px-9 hover:bg-gray-100">
                        <input type="radio" name="radio-8" class="radio radio-sm checked:bg-blue-500"
                            value="Saturday/Sunday" x-model="sessions" />
                        <span class="ml-2 text-xs font-medium">Weekends</span>
                    </label>
                </div>

                <div class="flex items-center justify-center gap-4">
                    <button class="rounded bg-neutral-900 text-white py-2 px-3 hover:bg-neutral-800 w-24 text-sm mt-5"
                        @click.prevent="step--, percentComplete = 25">Back</button>
                    <button class="rounded bg-blue-700 text-white py-2 px-3 hover:bg-blue-800 w-24 text-sm mt-5"
                        @click.prevent="step++, percentComplete = 75" x-bind:disabled="!sessions"
                        x-bind:class="{ 'bg-gray-400 hover:bg-gray-400': !sessions }">Next</button>
                </div>

            </form>
        </div>

        <div x-show="step === 4">
            <form class="mt-2 mb-0 space-y-4 rounded p-8 bg-white">
                <div class="mb-4 flex items-center">
                    <label for="" class="my-3 block text-left text-sm">
                        Which location would you prefer to train?
                    </label>
                </div>

                <div class="grid grid-cols-1 items-center gap-5">
                    <label class="inline-flex items-center rounded border border-gray-200 py-3 px-9 hover:bg-gray-100">
                        <input type="radio" name="radio-8" class="radio radio-sm checked:bg-blue-500" value="private"
                            x-model="location" required />
                        <span class="ml-2 text-xs font-medium">Home Service(private)</span>
                    </label>
                    <label class="inline-flex items-center rounded border border-gray-200 py-3 px-9 hover:bg-gray-100">
                        <input type="radio" name="radio-8" class="radio radio-sm checked:bg-blue-500" value="public"
                            x-model="location" required />
                        <span class="ml-2 text-xs font-medium">Group Session(public)</span>
                    </label>
                </div>

                <div class="flex items-center justify-center gap-4">
                    <button class="rounded bg-neutral-900 text-white py-2 px-3 hover:bg-neutral-800 w-24 text-sm mt-5"
                        @click.prevent="step--, percentComplete = 50">Back</button>
                    <button class="rounded bg-blue-700 text-white py-2 px-3 hover:bg-blue-800 w-24 text-sm mt-5"
                        @click.prevent="step++, percentComplete = 100" x-bind:disabled="!location"
                        x-bind:class="{ 'bg-gray-400 hover:bg-gray-400': !location }">Next</button>
                </div>

            </form>
        </div>

        <div x-show="step === 5">
            <form method="POST" action="/book-trainer/add" class="mt-2 mb-0 space-y-4 rounded p-8 bg-white">
                @csrf
                <input type="hidden" name="request_status" value="active">
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                <input type="hidden" name="pet_type" x-bind:value="pet.split(',')[1]" />
                <input type="hidden" name="pet_id" x-bind:value="pet.split(',')[2]" />
                <div class="flex items-center">
                    <label for="" class="block text-left text-lg">
                        <i class="fa-solid fa-circle-check mr-3 text-green-500"></i>Confirm Information
                    </label>
                </div>
                <div>
                    <label for="" class="text-sm">1. Chosen pet to train.</label>
                    <p class="text-sm font-semibold" x-text="pet.split(',')[0]"></p>
                    <input type="hidden" name="pet_name" id="pet" x-bind:value="pet.split(',')[0]" />
                </div>
                <div>
                    <label for="" class="text-sm">2. Which pet training course are you interested in?</label>
                    <p class="text-sm font-semibold" x-text="course"></p>
                    <input type="hidden" name="course" id="course" x-model="course" />
                </div>
                <div>
                    <label for="" class="text-sm">3. Pick the sessions you are available for. </label>
                    <p class="text-sm font-semibold" x-text="sessions"></p>
                    <input type="hidden" name="sessions" id="sessions" x-model="sessions" />
                </div>
                <div>
                    <label for="" class="text-sm">4. Which location would you prefer to train? </label>
                    <p class="text-sm font-semibold" x-text="location"></p>
                    <input type="hidden" name="location" id="location" x-model="location" />
                </div>
                <div class="flex items-center justify-center gap-4">
                    <label
                        class="rounded bg-neutral-900 text-white py-2 px-3 hover:bg-neutral-800 w-24 text-center text-sm mt-5"
                        @click.prevent="step=1">Edit</label>
                    <button type="submit"
                        class="rounded bg-blue-700 text-white py-2 px-3 hover:bg-blue-800 w-24 text-sm mt-5">Confirm</button>
                </div>

            </form>
        </div>
    </div>

</x-dash-layout>