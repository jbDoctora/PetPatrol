<x-layout>

<div class="hero min-h-screen" style=" background-image: url(/images/woman-holding-a-dog.png); background-position: right; background-size: contain; background-repeat: no-repeat; object-fit: fill;">
    <div class="hero-overlay bg-opacity-20 bg-cover"></div>
    <div class="hero-content text-center text-black">
      <div class="max-w-md">
        <h1 class="mb-5 text-6xl font-bold"><span class="font-semibold text-md tracking-wide" style="font-family: 'Fredoka One', cursive;">Take good care of your pets</span></h1>
        <button class="btn btn-primary mt-4"><a href="/book-trainer">Book Appointment</a></button>
      </div>
    </div>
  </div>
  
<!-- CTA -->
<section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-col text-center w-full mb-12">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Send us an inquiry for your questions</h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base">We will get back to you as soon as possible for you to start booking.</p>
    </div>
    <div class="flex lg:w-2/3 w-full sm:flex-row flex-col mx-auto px-8 sm:space-x-4 sm:space-y-0 space-y-4 sm:px-0 items-end">
      <div class="relative flex-grow w-full">
        <label for="full-name" class="leading-7 text-sm text-gray-600">Full Name</label>
        <input type="text" id="full-name" name="full-name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-transparent focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div>
      <div class="relative flex-grow w-full">
        <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
        <input type="email" id="email" name="email" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-transparent focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div>
      <button class="btn btn-primary">Send</button>
    </div>
  </div>
</section>

<!-- SECTION -->
  <section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
      <div class="flex flex-wrap w-full mb-20">
        <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
          <h1 class="sm:text-3xl text-2xl font-bold title-font mb-2 text-gray-900">Get pet trainers easily.</h1>
          <div class="h-1 w-20 bg-indigo-500 rounded"></div>
        </div>
        <p class="lg:w-1/2 w-full leading-relaxed text-gray-600 font-medium">"Welcome to Pet Patrol! Are you a pet owner looking for a skilled and reliable trainer to help your furry friend reach their full potential? Or are you a professional pet trainer seeking new clients in your area? Look no further, because our system is here to connect you with the perfect match.</p>
      </div>
      <div class="flex flex-wrap -m-4">
        <div class="xl:w-1/4 md:w-1/2 p-4">
          <div class="bg-gray-100 p-6 rounded-lg">
            <img class="h-40 rounded w-full object-cover object-center mb-6" src="images/card images/shopping.png" alt="content">
            <h3 class="tracking-widest text-yellow-400 text-3xl font-medium title-font">1</h3>
            <h2 class="text-lg text-gray-900 font-medium title-font mb-4">Book a request</h2>
            <p class="leading-relaxed text-base">Answer a few quick questions about the pet service you want.</p>
          </div>
        </div>
        <div class="xl:w-1/4 md:w-1/2 p-4">
          <div class="bg-gray-100 p-6 rounded-lg">
            <img class="h-40 rounded w-full object-cover object-center mb-6" src="images/card images/searching.png" alt="content">
            <h3 class="tracking-widest text-yellow-400 text-3xl font-medium title-font">2</h3>
            <h2 class="text-lg text-gray-900 font-medium title-font mb-4">Match with Patroller.</h2>
            <p class="leading-relaxed text-base">Instanly matcher with registered pet trainers in your local area.</p>
          </div>
        </div>
        <div class="xl:w-1/4 md:w-1/2 p-4">
          <div class="bg-gray-100 p-6 rounded-lg">
            <img class="h-40 rounded w-full object-cover object-center mb-6" src="images/card images/no-yet.png" alt="content">
            <h3 class="tracking-widest text-yellow-400 text-3xl font-medium title-font">3</h3>
            <h2 class="text-lg text-gray-900 font-medium title-font mb-4">Book to meet</h2>
            <p class="leading-relaxed text-base"> Choose a Patroller and place a deposit to schedule a meet & greet.</p>
          </div>
        </div>
        <div class="xl:w-1/4 md:w-1/2 p-4">
          <div class="bg-gray-100 p-6 rounded-lg">
            <img class="h-40 rounded w-full object-cover object-center mb-6" src="images/card images/we-are-hiring.png" alt="content">
            <h3 class="tracking-widest text-yellow-400 text-3xl font-medium title-font">4</h3>
            <h2 class="text-lg text-gray-900 font-medium title-font mb-4">Confirm the Patroller.</h2>
            <p class="leading-relaxed text-base">Proceed with the Backer if suitable otherwise inform us to meet other</p>
          </div>
        </div>
      </div>
    </div>
  </section>

<!-- 2nd section -->

<section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto flex flex-col">
    <div class="lg:w-4/6 mx-auto">
      <div class="rounded-lg h-64 overflow-hidden">
        <img alt="content" class="object-cover object-center h-full w-full" src="{{asset('images/no-image.png')}}">
      </div>
      <div class="flex flex-col sm:flex-row mt-10">
        <div class="sm:w-1/3 text-center sm:pr-8 sm:py-8">
          <div class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-gray-200 text-gray-400">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10" viewBox="0 0 24 24">
              <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
              <circle cx="12" cy="7" r="4"></circle>
            </svg>
          </div>
          <div class="flex flex-col items-center text-center justify-center">
            <h2 class="font-medium title-font mt-4 text-gray-900 text-lg">Phoebe Caulfield</h2>
            <div class="w-12 h-1 bg-indigo-500 rounded mt-2 mb-4"></div>
            <p class="text-base">Raclette knausgaard hella meggs normcore williamsburg enamel pin sartorial venmo tbh hot chicken gentrify portland.</p>
          </div>
        </div>
        <div class="sm:w-2/3 sm:pl-8 sm:py-8 sm:border-l border-gray-200 sm:border-t-0 border-t mt-4 pt-4 sm:mt-0 text-center sm:text-left">
          <p class="leading-relaxed text-lg mb-4">Meggings portland fingerstache lyft, post-ironic fixie man bun banh mi umami everyday carry hexagon locavore direct trade art party. Locavore small batch listicle gastropub farm-to-table lumbersexual salvia messenger bag. Coloring book flannel truffaut craft beer drinking vinegar sartorial, disrupt fashion axe normcore meh butcher. Portland 90's scenester vexillologist forage post-ironic asymmetrical, chartreuse disrupt butcher paleo intelligentsia pabst before they sold out four loko. 3 wolf moon brooklyn.</p>
          <a class="text-indigo-500 inline-flex items-center">Learn More
            {{-- <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
              <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg> --}}
          </a>
        </div>
      </div>
    </div>
  </div>
</x-layout>