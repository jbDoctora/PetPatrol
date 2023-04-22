<x-noNav>
    <section class="bg-white">
        <div class="lg:grid lg:min-h-screen lg:grid-cols-12">
            <aside class="relative block h-16 lg:order-last lg:col-span-5 lg:h-full xl:col-span-6">
                <img alt="Pattern" src="{{asset('images/8271009_5503.jpg')}}"
                    class="absolute inset-0 h-full w-full object-cover" />
            </aside>

            <main aria-label="Main"
                class="flex items-center justify-center px-8 py-8 sm:px-12 lg:col-span-7 lg:py-12 lg:px-16 xl:col-span-6">
                <div class="max-w-xl lg:max-w-3xl">

                    <h1 class="mt-6 text-2xl font-bold text-blue-700 sm:text-3xl md:text-4xl">
                        Welcome Back!
                    </h1>

                    <p class="mt-2 text-sm text-gray-500">Please sign in to continue.</p>

                    <form method="POST" action="/users/authenticate" class="mt-8 grid grid-cols-1 gap-6">
                        @csrf
                        <div class="col-span-6">
                            <label for="email" class="mb-2 block text-sm text-gray-700">
                                Email
                            </label>

                            <input type="email" name="email" value="{{ old('email') }}"
                                class="rounded border border-gray-300 py-2 px-3 w-full text-sm" />
                            @error('email')
                            <div>
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            </div>
                            @enderror
                        </div>

                        <div class="col-span-6">
                            <label for="password" class="mb-2 block text-sm text-gray-700">
                                Password
                            </label>

                            <input type="password" name="password" value="{{ old('password') }}"
                                class="rounded border border-gray-300 py-2 px-3 w-full text-sm" />
                            <div class="mt-2 text-sm text-blue-700 text-right mr-auto"><a
                                    href="{{ route('password.request') }}">Forgot
                                    Password?</a></div>
                            @error('password')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:flex sm:items-center sm:gap-4">
                            <button type="submit" {{-- class="btn btn-primary" --}}
                                class="rounded bg-blue-700 text-white py-2 px-3 hover:bg-blue-800 w-full sm:w-auto text-sm">
                                Login
                            </button>

                            <div class="mt-4 sm:mt-0">
                                <p class="text-sm text-gray-500">Don't have an account?
                                    <a href="/register-owner" class="text-blue-700 underline">Register</a>.
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </section>
</x-noNav>