<x-dash-layout>
    <div class="mx-auto mb-6 h-full max-w-screen-sm py-10 sm:px-6 lg:px-8"
        x-data="{ step: 1, percentComplete: 0, pet: '', vaccinated: '', course: [], info: '', sessions: '', date: '', location: '', date: '', time: '', pet_type: '' }">

        <div class="mx-auto mb-5 flex max-w-screen-xl items-center justify-center px-4">
            <progress class="progress progress-primary w-56" value="0" :value="percentComplete" max="100"></progress>
        </div>
        <div x-show="step === 1">
            <form class="mt-2 mb-0 space-y-4 rounded-lg p-8 shadow-2xl">
                <div class="mb-4 flex items-center">
                    <label for="" class="ml-2 block text-lg font-bold">
                        <p> Choose your pet that you want to train.</p>
                    </label>
                </div>

                @forelse($petinfo as $petinfos)
                @if (in_array($petinfos->name, $requestedPetNames))
                @continue
                @endif

                <div class="mb-4 flex items-center bg-slate-300 p-5">
                    <input type="radio" name="radio-1" class="radio radio-primary"
                        value="{{ $petinfos->name }},{{ $petinfos->type }}" x-model="pet" required />
                    <label for="" class="ml-2 text-sm font-medium">{{ $petinfos->name }}</label>
                </div>

                @empty

                <p>No Pet record</p>
                @endforelse

                <div class="flex items-center justify-center">
                    <button class="btn btn-primary mx-2 bg-yellow-400" @click.prevent="step++, percentComplete = 15"
                        x-bind:disabled="!pet">Next</button>
                </div>
            </form>
        </div>

        <div x-show="step === 2">
            <form class="mt-2 mb-0 space-y-4 rounded-lg p-8 shadow-2xl">
                <div class="mb-4 flex items-center">
                    <label for="" class="ml-2 block text-lg font-bold">
                        Is your pet vaccinated
                    </label>
                </div>

                <div class="mb-4 flex items-center bg-slate-300 p-5">
                    <input type="radio" name="radio-5" class="radio radio-primary" value="Yes" x-model="vaccinated"
                        required />
                    <label for="" class="ml-2 text-sm font-medium">Yes</label>
                </div>

                <div class="mb-4 flex items-center bg-slate-300 p-5">
                    <input type="radio" name="radio-5" class="radio radio-primary" value="No" x-model="vaccinated" />
                    <label for="" class="ml-2 text-sm font-medium">No</label>
                </div>

                <div class="flex items-center justify-center">
                    <button class="btn btn-secondary mx-2" @click.prevent="step--, percentComplete = 0">Back</button>
                    <button class="btn btn-primary mx-2" @click.prevent="step++, percentComplete = 30"
                        x-bind:disabled="!vaccinated">Next</button>
                </div>

            </form>
        </div>
        <div x-show="step === 3">
            <form class="mt-2 mb-0 space-y-4 rounded-lg p-3 shadow-2xl">
                <div class="mb-4 flex items-center">
                    <label for="" class="ml-2 block text-lg font-bold">
                        Which pet training course are you interested in?
                    </label>
                </div>

                <div class="mb-4 flex items-center bg-slate-300 p-5">
                    <input type="radio" class="radio radio-primary checkbox-md" value="Potty Training" x-model="course"
                        required />
                    <label for="" class="ml-2 text-sm font-medium">Potty Training</label>
                </div>

                <div class="mb-4 flex items-center bg-slate-300 p-5">
                    <input type="radio" class="radio radio-primary checkbox-md" value="Obedience Training"
                        x-model="course">
                    <label for="" class="ml-2 text-sm font-medium">Obedience Training</label>
                </div>

                <div class="mb-4 flex items-center bg-slate-300 p-5">
                    <input type="radio" class="radio radio-primary checkbox-md" value="Behavioral Training"
                        x-model="course" />
                    <label for="" class="ml-2 text-sm font-medium">Behavioral Training</label>
                </div>

                <div class="mb-4 flex items-center bg-slate-300 p-5">
                    <input type="radio" class="radio radio-primary checkbox-md" value="Agility Training"
                        x-model="course" />
                    <label for="" class="ml-2 text-sm font-medium">Agility Training</label>
                </div>

                <div class="mb-4 flex items-center bg-slate-300 p-5">
                    <input type="radio" class="radio radio-primary checkbox-md" value="Tricks Training"
                        x-model="course" />
                    <label for="" class="ml-2 text-sm font-medium">Tricks Training</label>
                </div>

                <div class="mb-4 flex items-center bg-slate-300 p-5">
                    <input type="radio" class="radio radio-primary checkbox-md" value="Theraphy" x-model="course" />
                    <label for="" class="ml-2 text-sm font-medium">Theraphy</label>
                </div>

                <div class="flex items-center justify-center">
                    <button class="btn btn-secondary mx-2" @click.prevent="step--, percentComplete = 15">Back</button>
                    <button class="btn btn-primary mx-2" @click.prevent="step++, percentComplete = 45"
                        x-bind:disabled="!course.length">Next</button>
                </div>

            </form>
        </div>
        <div x-show="step === 4">
            <form class="mt-2 mb-0 space-y-4 rounded-lg p-8 shadow-2xl">
                <div class="mb-4 flex items-center">
                    <label for="" class="ml-2 block text-lg font-bold">
                        Anything else the trainer will need to know?(optional)
                    </label>
                </div>

                <div class="mb-4 flex items-center justify-center bg-slate-300 p-5">
                    <textarea placeholder="(optional)" type="text" name="petInformation"
                        class="textarea textarea-bordered textarea-lg w-full max-w-xs bg-white"
                        x-model="info"></textarea>
                </div>

                <div class="flex items-center justify-center">
                    <button class="btn btn-secondary mx-2" @click.prevent="step--, percentComplete = 30">Back</button>
                    <button class="btn btn-primary mx-2" @click.prevent="step++, percentComplete = 60"
                        x-bind:disabled="!info">Next</button>
                </div>

            </form>
        </div>
        <div x-show="step === 5">
            <form class="mt-2 mb-0 space-y-4 rounded-lg p-8 shadow-2xl">
                <div class="mb-4 flex items-center">
                    <label for="" class="ml-2 block text-lg font-bold">
                        Which pet training course are you interested in?
                    </label>
                </div>

                <div class="mb-4 flex items-center bg-slate-300 p-5">
                    <input type="radio" name="radio-8" class="radio radio-primary" value="Weekdays mornings"
                        x-model="sessions" required />
                    <label for="" class="ml-2 text-sm font-medium">Weekdays mornings</label>
                </div>

                <div class="mb-4 flex items-center bg-slate-300 p-5">
                    <input type="radio" name="radio-8" class="radio radio-primary" value="Weekdays afternoon"
                        x-model="sessions" />
                    <label for="" class="ml-2 text-sm font-medium">Weekdays afternoon</label>
                </div>

                <div class="mb-4 flex items-center bg-slate-300 p-5">
                    <input type="radio" name="radio-8" class="radio radio-primary" value="Saturday/Sunday"
                        x-model="sessions" />
                    <label for="" class="ml-2 text-sm font-medium">Weekends</label>
                </div>

                <div class="flex items-center justify-center">
                    <button class="btn btn-secondary mx-2" @click.prevent="step--, percentComplete = 45">Back</button>
                    <button class="btn btn-primary mx-2" @click.prevent="step++, percentComplete = 75"
                        x-bind:disabled="!sessions">Next</button>
                </div>

            </form>
        </div>

        <div x-show="step === 6">
            <form class="mt-2 mb-0 space-y-4 rounded-lg p-8 shadow-2xl">
                <div class="mb-4 flex items-center">
                    <label for="" class="ml-2 block text-lg font-bold">
                        Pick a preferred month to start training.
                    </label>
                </div>

                <div class="flex justify-center">
                    <input type="date" class="form-input rounded p-3" x-model="date" required>
                    <input type="time" class="form-input rounded p-3" x-model="time" required>
                </div>

                <div class="flex items-center justify-center">
                    <button class="btn btn-secondary mx-2" @click.prevent="step--, percentComplete = 60">Back</button>
                    <button class="btn btn-primary mx-2" @click.prevent="step++, percentComplete = 90"
                        x-bind:disabled="!date || !time">Next</button>
                </div>

            </form>
        </div>

        <div x-show="step === 7">
            <form class="mt-2 mb-0 space-y-4 rounded-lg p-8 shadow-2xl">
                <div class="mb-4 flex items-center">
                    <label for="" class="ml-2 block text-lg font-bold">
                        Which location would you prefer to train?
                    </label>
                </div>

                <div class="mb-4 flex items-center bg-slate-300 p-5">
                    <input type="radio" name="radio-10" class="radio radio-primary" value="At home" x-model="location"
                        required />
                    <label for="" class="ml-2 text-sm font-medium">At home</label>
                </div>

                <div class="mb-4 flex items-center bg-slate-300 p-5">
                    <input type="radio" name="radio-10" class="radio radio-primary" value="Group Session"
                        x-model="location" />
                    <label for="" class="ml-2 text-sm font-medium">Group Session</label>
                </div>

                <div class="flex items-center justify-center">
                    <button class="btn btn-secondary mx-2" @click.prevent="step--, percentComplete = 75">Back</button>
                    <button class="btn btn-primary mx-2" @click.prevent="step++, percentComplete = 100"
                        x-bind:disabled="!location">Next</button>
                </div>

            </form>
        </div>

        <div x-show="step === 8">
            <form method="POST" action="/book-trainer/add" class="mb-18 mt-2 space-y-4 rounded-lg p-8 shadow-2xl">
                @csrf
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                <input type="hidden" name="pet_type" x-bind:value="pet.split(',')[1]" />
                <div class="flex items-center">
                    <label for="" class="ml-2 block text-center text-2xl font-bold">
                        Confirm Information
                    </label>
                </div>
                <div>
                    <label for="">1. Chosen pet to train.</label>
                    <p class="font-bold" x-text="pet.split(',')[0]"></p>
                    <input type="hidden" name="pet" id="pet" x-bind:value="pet.split(',')[0]" />
                </div>
                <div>
                    <label for="">2. Is your pet vaccinated?</label>
                    <p class="font-bold" x-text="vaccinated"></p>
                    <input type="hidden" name="vaccinated" id="vaccinated" x-model="vaccinated" />
                </div>
                <div>
                    <label for="">3. Which pet training course are you interested in?</label>
                    <p class="font-bold" x-text="course.join(', ')"></p>
                    <input type="hidden" name="course" id="course" x-model="course" />
                </div>
                <div>
                    <label for="">4. Anything else the trainer will need to know?(optional) </label>
                    <p class="font-bold" x-text="info"></p>
                    <input type="hidden" name="info" id="info" x-model="info" />
                </div>
                <div>
                    <label for="">5. Pick the sessions you are available for. </label>
                    <p class="font-bold" x-text="sessions"></p>
                    <input type="hidden" name="sessions" id="sessions" x-model="sessions" />
                </div>
                <div>
                    <label for="">6. Pick a preferred month to start training. </label>
                    <p class="font-bold" x-text="`${date} ${time}`"></p>
                    <input type="hidden" name="date" id="sessions" x-model="date" />
                </div>
                <div>
                    <label for="">7. Which location would you prefer to train? </label>
                    <p class="font-bold" x-text="location"></p>
                    <input type="hidden" name="location" id="location" x-model="location" />
                </div>
                <div class="flex items-center justify-center">
                    <button type="submit"
                        class="inline-block rounded border border-indigo-600 bg-indigo-600 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">Confirm</button>
                </div>

            </form>
        </div>
    </div>

</x-dash-layout>