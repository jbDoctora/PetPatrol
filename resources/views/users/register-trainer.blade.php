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

                    <h1 class="mt-6 text-2xl font-bold text-yellow-400 sm:text-3xl md:text-4xl">
                        Sign up
                    </h1>

                    <form method="POST" action="/users" class="grid-rows-7 mt-5 grid gap-4"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="col-span-6">
                            <label for="name" class="block text-sm font-medium text-gray-700">
                                Name
                            </label>
                            <input type="text" name="name" value="{{ old('name') }}"
                                class="input input-bordered w-full" />

                            @error('name')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror

                        </div>

                        <div class="col-span-3">
                            <label for="name" class="block text-sm font-medium text-gray-700">
                                Birthday
                            </label>

                            <input type="date" name="birthday" value="{{ old('birthday') ?? '' }}"
                                class="mt-1 h-10 w-full rounded-md border border-gray-400 bg-white text-sm text-gray-700 shadow-sm" />

                            @error('birthday')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror

                        </div>

                        <div class="col-span-3">
                            <label for="sex" class="block text-sm font-medium text-gray-700">
                                Sex
                            </label>
                            <select class="w-full rounded-lg border border-gray-400 py-3" id="sex" name="sex" required
                                value="{{ old('sex') }}">
                                <option value="">Select a gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>

                            @error('sex')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror

                        </div>

                        <div class="col-span-6">
                            <label for="address" class="block text-sm font-medium text-gray-700">
                                Address
                            </label>

                            <input type="text" name="address" value="{{ old('address') }}"
                                class="input input-bordered w-full" />
                            @error('address')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror

                        </div>

                        <div class="col-span-6">
                            <label for="phone_number" class="block text-sm font-medium text-gray-700">
                                Phone number
                            </label>

                            <input type="text" name="phone_number" value="{{ old('phone_number') }}"
                                class="input input-bordered w-full" />
                            @error('phone_number')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror

                        </div>

                        <div class="col-span-6">
                            <label for="id_verify" class="block text-sm font-medium text-gray-700">
                                Please upload ID for verification (back and front):
                            </label>

                            <input type="file" name="id_verify" value="{{ old('id_verify') }}"
                                class="file-input file-input-bordered w-full max-w-xs" />

                            @error('id_verify')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror

                        </div>

                        <div class="col-span-6">
                            <label for="email" class="block text-sm font-medium text-gray-700">
                                Email
                            </label>

                            <input type="email" name="email" value="{{ old('email') }}"
                                class="input input-bordered w-full" />

                            @error('email')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror

                        </div>

                        <div class="col-span-6">
                            <label for="password" class="block text-sm font-medium text-gray-700">
                                Password
                            </label>

                            <input type="password" name="password" value="{{ old('password') }}"
                                class="input input-bordered w-full" />

                            @error('password')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror

                        </div>

                        <div class="col-span-6">
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">
                                Password Confirmation
                            </label>

                            <input type="password" name="password_confirmation"
                                value="{{ old('password_confirmation') }}" class="input input-bordered w-full" />

                            @error('password_confirmation')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror

                        </div>

                        <input type="hidden" name="role" value="1" />

                        <div class="col-span-6 sm:flex sm:items-center sm:gap-4">
                            <button type="submit"
                                class="tracking-wide rounded-md px-5 py-4 bg-yellow-400 text-black text-sm font-bold border border-black hover:rounded-3xl transition-all duration-400">
                                Create an account
                            </button>

                            <p class="mt-4 text-sm text-gray-500 sm:mt-0">
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