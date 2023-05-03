<x-noNav>
    <section class="bg-inherit">
        <div class="lg:grid lg:min-h-screen lg:grid-cols-12">
            <aside class="relative block h-16 lg:order-last lg:col-span-5 lg:h-full xl:col-span-6">
                <img alt="Pattern" src={{ asset('images/pet-owner.jpg') }}
                    class="absolute inset-0 h-full w-full object-cover" />
            </aside>

            <main aria-label="Main"
                class="flex items-center justify-center px-8 py-8 sm:px-12 lg:col-span-7 lg:py-12 lg:px-16 xl:col-span-6">
                <div class="max-w-xl lg:max-w-3xl">

                    <h1 class="mt-1 text-2xl font-bold text-blue-700 sm:text-3xl md:text-4xl">
                        Sign up
                    </h1>
                    {{-- <div class="bg-yellow-400 text-slate-600 my-2 p-3">
                        <i class="fa-solid fa-triangle-exclamation fa-lg mr-3"></i></i>This will serve as your trainer
                        application
                    </div> --}}
                    <p class="text-xs my-3"><span class="text-red-400 text-sm">*</span> Indicates a required field.</p>

                    <form method="POST" action="/users" class="grid-rows-7 mt-5 grid gap-4"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="flex items-center">
                            <div
                                class="rounded-full bg-blue-600 text-white text-xs text-center py-1 w-5 font-medium m-1">
                                1
                            </div>
                            <label for="" class="ml-2 text-gray-900 text-xs">Your Basic
                                Information</label>
                        </div>
                        {{-- <div class="col-span-6">
                            <label for="email" class="block text-xs font-medium text-gray-700">
                                <span class="text-red-400 text-sm">*</span>Email
                            </label>

                            <input type="email" name="email" value="{{ old('email') }}"
                                class="rounded border border-gray-300 py-2 px-3 w-96 text-sm" />

                            @error('email')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror

                        </div> --}}

                        <div class="col-span-6">
                            <label for="name" class="block text-xs font-medium text-gray-700">
                                <span class="text-red-400 text-sm">*</span>Name
                            </label>
                            <input type="text" name="name" value="{{ old('name') }}"
                                class="rounded border border-gray-300 py-2 px-3 w-96 text-sm" />

                            @error('name')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror

                        </div>

                        <div class="col-span-3">
                            <label for="name" class="block text-xs font-medium text-gray-700">
                                <span class="text-red-400 text-sm">*</span>Birthday
                            </label>

                            <input type="date" name="birthday" value="{{ old('birthday') ?? '' }}"
                                class="mt-1 h-10 w-full px-3 py-2 rounded border border-gray-400 bg-white text-xs text-gray-700 shadow-sm" />

                            @error('birthday')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror

                        </div>

                        <div class="col-span-3">
                            <label for="sex" class="block text-xs font-medium text-gray-700">
                                <span class="text-red-400 text-sm">*</span>Sex
                            </label>
                            <select
                                class="mt-1 h-10 w-full px-3 py-2 rounded border border-gray-400 bg-white text-xs text-gray-700 shadow-sm"
                                id="sex" name="sex" required value="{{ old('sex') }}">
                                <option value=""><span class="text-sm">Select a gender</span></option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>

                            @error('sex')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror

                        </div>

                        <div class="col-span-6">
                            <label for="address" class="block text-xs font-medium text-gray-700">
                                <span class="text-red-400 text-sm">*</span>Address
                            </label>

                            <input type="text" name="address" value="{{ old('address') }}"
                                class="rounded border border-gray-300 py-2 px-3 w-full text-sm" />
                            @error('address')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror

                        </div>

                        <div class="col-span-6">
                            <label for="phone_number" class="block text-xs font-medium text-gray-700">
                                <span class="text-red-400 text-sm">*</span>Phone number
                            </label>

                            <input type="text" name="phone_number" value="{{ old('phone_number') }}"
                                class="rounded border border-gray-300 py-2 px-3 w-full text-xs" />
                            @error('phone_number')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror

                        </div>

                        <div class="col-span-6">
                            <label for="id_verify" class="block text-xs font-medium text-gray-700">
                                <span class="text-red-400 text-sm">*</span>Please attach Valid ID
                            </label>

                            <div class="relative">
                                <input type="file" name="id_verify" value="{{ old('id_verify') }}"
                                    class="file rounded border border-gray-300 py-2 px-3 w-full text-xs">

                                @error('id_verify')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror

                            </div>

                        </div>
                        <div class="col-span-6">
                            <label for="trainer_document" class="block text-xs font-medium text-gray-700">
                                <span class="text-red-400 text-sm">*</span>Please attach proof that you are a certified
                                trainer
                            </label>

                            <div class="relative">
                                <input type="file" name="trainer_document" value="{{ old(' name') }}"
                                    class="rounded border border-gray-300 py-2 px-3 w-full text-xs">

                                @error('trainer_document')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror

                            </div>
                        </div>

                        <div class="flex items-center">
                            <div
                                class="rounded-full bg-blue-600 text-white text-xs text-center py-1 w-5 font-medium m-1">
                                2
                            </div>
                            <label for="" class="ml-2 text-gray-900 text-xs">Security
                                Information</label>
                        </div>

                        <div class="col-span-6">
                            <label for="email" class="block text-xs font-medium text-gray-700">
                                <span class="text-red-400 text-sm">*</span>Email
                            </label>

                            <input type="email" name="email" value="{{ old('email') }}"
                                class="rounded border border-gray-300 py-2 px-3 w-96 text-sm" />

                            @error('email')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror

                        </div>

                        <div class="col-span-6">
                            <label for="password" class="block text-xs font-medium text-gray-700">
                                <span class="text-red-400 text-sm">*</span>Password
                            </label>

                            <input type="password" name="password" value="{{ old('password') }}"
                                class="rounded border border-gray-300 py-2 px-3 w-full text-sm" />

                            @error('password')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror

                        </div>

                        <div class="col-span-6">
                            <label for="password_confirmation" class="block text-xs font-medium text-gray-700">
                                <span class="text-red-400 text-sm">*</span>Password Confirmation
                            </label>

                            <input type="password" name="password_confirmation"
                                value="{{ old('password_confirmation') }}"
                                class="rounded border border-gray-300 py-2 px-3 w-full text-sm" />

                            @error('password_confirmation')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror

                        </div>

                        <input type="hidden" name="role" value="1" />

                        <div class="col-span-6 flex flex-col justify-center items-center">
                            <button type="submit"
                                class="bg-blue-700 px-4 py-2 text-white font-medium rounded-full text-sm hover:bg-blue-900 w-60">
                                Create an account
                            </button>

                            <p class="mt-4 text-xs text-gray-500 sm:mt-3">
                                Already have an account?
                                <a href="/login" class="text-gray-700 underline">Log in</a>.
                            </p>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </section>
    </div>
</x-noNav>