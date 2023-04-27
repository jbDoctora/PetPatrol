<x-noNav>
    <section class="bg-inherit">
        <div class="lg:grid lg:min-h-screen lg:grid-cols-12">
            <aside class="relative block h-16 lg:order-last lg:col-span-5 lg:h-full xl:col-span-6">
                <img alt="Pattern" src={{ asset('images/pet-trainer.jpg') }}
                    class="absolute inset-0 h-full w-full object-cover" />
            </aside>

            <main aria-label="Main"
                class="flex items-center justify-center px-8 py-8 sm:px-12 lg:col-span-7 lg:py-12 lg:px-16 xl:col-span-6">
                <div class="max-w-xl lg:max-w-3xl">

                    <h1 class="mt-1 text-2xl font-bold text-blue-700 sm:text-3xl md:text-4xl">
                        Sign Up
                    </h1>
                    <p class="text-xs my-3"><span class="text-red-400 text-sm">*</span> Indicates a required field.</p>

                    <form method="POST" action="/users" class="mt-5 flex flex-col gap-4" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="name" class="block text-xs font-medium text-gray-700">
                                <span class="text-red-400 text-sm">*</span>Full Name
                            </label>
                            <input type="text" name="name" value="{{ old('name') }}"
                                class="rounded border border-gray-300 py-2 px-3 w-96 text-sm" />

                            @error('name')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror

                        </div>

                        <input type="hidden" name="birthday" value="01/01/2023"
                            class="mt-1 h-10 w-full rounded-md border-solid border-slate-400 bg-white text-sm text-gray-700 shadow-sm" />
                        <input type="hidden" class="w-full rounded-lg border border-gray-400 p-2" id="sex" name="sex"
                            value="null" />
                        <input type="hidden" name="id_verify" value="null">

                        <div>
                            <label for="address" class="block text-xs font-medium text-gray-700">
                                <span class="text-red-400 text-sm">*</span>Address
                            </label>

                            <input type="text" name="address" value="{{ old('address') }}"
                                class="rounded border border-gray-300 py-2 px-3 w-96 text-sm" />
                            @error('address')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror

                        </div>

                        <div>
                            <label for="phone_number" class="block text-xs font-medium text-gray-700">
                                <span class="text-red-400 text-sm">*</span>Phone number
                            </label>

                            <input type="text" name="phone_number" value="{{ old('phone_number') }}"
                                class="rounded border border-gray-300 py-2 px-3 w-96 text-sm" />
                            @error('phone_number')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror

                        </div>

                        <div>
                            <label for="email" class="block text-xs font-medium text-gray-700">
                                <span class="text-red-400 text-sm">*</span>Email
                            </label>

                            <input type="email" name="email" value="{{ old('email') }}"
                                class="rounded border border-gray-300 py-2 px-3 w-96 text-sm" />

                            @error('email')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror

                        </div>

                        <div>
                            <label for="password" class="block text-xs font-medium text-gray-700">
                                <span class="text-red-400 text-sm">*</span>Password
                            </label>

                            <input type="password" name="password" value="{{ old('password') }}"
                                class="rounded border border-gray-300 py-2 px-3 w-96 text-sm" />

                            @error('password')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror

                        </div>

                        <div>
                            <label for="password_confirmation" class="block text-xs font-medium text-gray-700">
                                <span class="text-red-400 text-sm">*</span>Password Confirmation
                            </label>

                            <input type="password" name="password_confirmation"
                                value="{{ old('password_confirmation') }}"
                                class="rounded border border-gray-300 py-2 px-3 w-96 text-sm" />

                            @error('password_confirmation')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror

                        </div>

                        <input type="hidden" name="role" value="0" />

                        <div class="flex flex-col items-center justify-center">
                            <button type="submit"
                                class="bg-blue-700 px-4 py-2 text-white font-medium rounded-full text-sm hover:bg-blue-900">
                                Create account
                            </button>

                            <p class="mt-5 text-xs text-gray-500 sm:mt-3">
                                Already have an account?
                                <a href="#" class="text-gray-700 underline">Log in</a>.
                            </p>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </section>
    </div>
</x-noNav>