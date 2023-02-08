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
  
          <form method="POST" action="/users" class="mt-5 grid grid-rows-7 gap-4" enctype="multipart/form-data">
            @csrf
           <div class="col-span-5">
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

            <div class="col-span-1">
              <label
                for="name"
                class="block text-sm font-medium text-gray-700"
              >
                Birthday
              </label>
  
              <input
                type="date"
                name="birthday"
                value="{{old('birthday') ?? '' }}"
                class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
              />

              @error('birthday')
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror

            </div>

            <div class="col-span-3">
              <label
                for="age"
                class="block text-sm font-medium text-gray-700"
              >
                Age
              </label>
  
              <input
                type="number"
                name="age"
                value="{{old('age')}}"
                class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
              />

              @error('age')
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror

            </div>

            <div class="col-span-3">
              <label
                for="sex"
                class="block text-sm font-medium text-gray-700"
              >
                Sex
              </label>
              <select class="w-full border border-gray-400 p-2 rounded-lg" id="sex" name="sex" required>
                <option value="">Select a gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
              </select>

              @error('sex')
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror

            </div>

            <div class="col-span-6">
              <label
                for="address"
                class="block text-sm font-medium text-gray-700"
              >
                Address
              </label>
  
              <input
                type="text"
                name="address"
                value="{{old('address')}}"
                class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
              />
              @error('address')
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror

            </div>

            <div class="col-span-6">
              <label
                for="phone_number"
                class="block text-sm font-medium text-gray-700"
              >
                Phone number
              </label>
  
              <input
                type="text"
                name="phone_number"
                value="{{old('phone_number')}}"
                class="mt-1 w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
              />
              @error('phone_number')
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror

            </div>

            <div class="col-span-6">
              <label
                for="id_verify"
                class="block text-sm font-medium text-gray-700"
              >
                Please upload ID for verification (back and front):
              </label>
  
              <input
                type="file"
                name="id_verify"
                value="{{old('id_verify')}}"
                class="file-input file-input-bordered w-full max-w-xs"
              />

              @error('id_verify')
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
  
                <span class="text-sm text-gray-700 mt-2 mb-2">
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
            value="1"
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
</div>
</x-noNavBar>