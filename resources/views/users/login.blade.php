<x-noNavBar>
  <section class="bg-inherit">
    <div class="lg:grid lg:min-h-screen lg:grid-cols-12">
      <aside
        class="relative block h-16 lg:order-last lg:col-span-5 lg:h-full xl:col-span-6"
      >
        <img
          alt="Pattern"
          src="/images/8271009_5503.jpg"
          class="absolute inset-0 h-full w-full object-cover"
        />
      </aside>

      <main
      aria-label="Main"
      class="flex items-center justify-center px-8 py-8 sm:px-12 lg:col-span-7 lg:py-12 lg:px-16 xl:col-span-6"
    >
      <div class="max-w-xl lg:max-w-3xl">

        <div class="flex justify-center mb-4">
        <a href="/"><img src="images/apple-touch-icon-76x76.png"></a>
        {{-- <div><span class="font-semibold text-md tracking-wide" style="font-family: 'Fredoka One', cursive;">PET PATROL</span></div> --}}
        </div>

        <h1
          class="mt-6 text-2xl font-bold text-gray-900 sm:text-3xl md:text-4xl"
        >
          Welcome to Pet Patrol
        </h1>

        <p class="mt-4 leading-relaxed text-gray-500">
          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eligendi nam
          dolorum aliquam, quibusdam aperiam voluptatum.
        </p>

        <form method="POST" action="/users/authenticate" class="mt-8 grid grid-cols-2 gap-6">
          @csrf
          <div class="col-span-6">
            <label for="email" class="block text-sm font-medium text-gray-700">
              Email
            </label>

            <input
              type="email"
              name="email"
              value="{{old('email')}}"
              class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
            />
            @error('email')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
          </div>

          <div class="col-span-6">
            <label
              for="password"
              class="block text-sm font-medium text-gray-700"
            >
              Password
            </label>

            <input
              type="password"
              name="password"
              value="{{old('password')}}"
              class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
            />
            @error('password')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
          </div>
          
          <div class="col-span-6 sm:flex sm:items-center sm:gap-4">
            <button
            type="submit"
            {{-- class="btn btn-primary" --}}
            class="inline-block rounded border border-indigo-600 bg-indigo-600 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500"
            >
              Login
            </button>

            <p class="mt-4 text-sm text-gray-500 sm:mt-0">
              Don't have an account?
              <a href="#" class="text-gray-700 underline">Register</a>.
            </p>
          </div>
        </form>
      </div>
    </main>
  </div>
</section>
</x-noNavBar>