<x-noNavBar>
    <section class="bg-inherit">
        <div class="lg:grid lg:min-h-screen lg:grid-cols-12">
          <aside
            class="relative block h-16 lg:order-last lg:col-span-5 lg:h-full xl:col-span-6"
          >
            <img
              alt="Pattern"
              src={{asset('images/pet-owner.jpg')}}
              class="absolute inset-0 h-full w-full object-cover"
            />
          </aside>
      
          <main
            aria-label="Main"
            class="flex items-center justify-center px-8 py-8 sm:px-12 lg:col-span-7 lg:py-12 lg:px-16 xl:col-span-6"
          >
            <div class="max-w-xl lg:max-w-3xl">
             
              <h1
                class="mt-6 text-2xl font-bold text-gray-900 sm:text-3xl md:text-4xl"
              >
                Welcome to Pet Patrol
              </h1>
      
              <p class="mt-4 leading-relaxed text-gray-500">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eligendi nam
                dolorum aliquam, quibusdam aperiam voluptatum.
              </p>
      
              <form method="POST" action="/users" class="mt-5 grid grid-rows-7 gap-6">
                @csrf
               <div class="col-span-6">
                  <label
                    for="name"
                    class="block text-sm font-medium text-gray-700"
                  >
                    Name
                  </label>
      
                  <input
                    type="text"
                    name="name"
                    value="{{old('name')}}"
                    class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
                  />

                  @error('name')
                  <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                  @enderror

                </div>
      
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
      
                <div class="col-span-6">
                  <label
                    for="password_confirmation"
                    class="block text-sm font-medium text-gray-700"
                  >
                    Password Confirmation
                  </label>
      
                  <input
                    type="password"
                    name="password_confirmation"
                    value="{{old('password_confirmation')}}"
                    class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
                  />

                  @error('password_confirmation')
                  <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                  @enderror

                </div>
      
                <div class="col-span-6">
                  <label for="MarketingAccept" class="flex gap-4">
                    <input
                      type="checkbox"
                      id="MarketingAccept"
                      name="marketing_accept"
                      class="h-5 w-5 rounded-md border-gray-200 bg-white shadow-sm"
                    />
      
                    <span class="text-sm text-gray-700">
                      I want to receive emails about events, product updates and
                      company announcements.
                    </span>
                  </label>
                </div>
      
                <div class="col-span-6">
                  <p class="text-sm text-gray-500">
                    By creating an account, you agree to our
                    <a href="#" class="text-gray-700 underline">
                      terms and conditions
                    </a>
                    and
                    <a href="#" class="text-gray-700 underline">privacy policy</a>.
                  </p>
                </div>

                <input 
                type="hidden"
                name="role"
                value="0"
                />
      
                <div class="col-span-6 sm:flex sm:items-center sm:gap-4">
                  <button
                    type="submit"

                    class="inline-block rounded border border-rose-400 bg-rose-400 px-12 py-3 text-sm font-medium text-black hover:bg-transparent hover:text-rose-400 focus:outline-none focus:ring active:text-rose-500"
                  >
                    Create an account
                  </button>
      
                  <p class="mt-4 text-sm text-gray-500 sm:mt-0">
                    Already have an account?
                    <a href="#" class="text-gray-700 underline">Log in</a>.
                  </p>
                </div>
              </form>
            </div>
          </main>
        </div>
      </section>
</x-noNavBar>