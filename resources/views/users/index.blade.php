<x-layout>

    <div class="hero min-h-screen"
        style=" background-image: url(/images/woman-holding-a-dog.png); background-position: right; background-size: contain; background-repeat: no-repeat; object-fit: fill;">
        <div class="hero-overlay bg-opacity-20 bg-cover"></div>
        <div class="hero-content text-center text-black">
            <div class="max-w-md">
                <h1 class="mb-5 text-6xl font-bold"><span class="text-md font-semibold tracking-wide"
                        style="font-family: 'Baby Panda', cursive;">Take good care of your pets</span></h1>
                <button class="btn btn-primary mt-4"><a href="/book-trainer">Book Appointment</a></button>
            </div>
        </div>
    </div>

    <!-- CTA -->
    <section class="body-font text-gray-600">
        <div class="container mx-auto px-5 py-24">
            <div class="mb-12 flex w-full flex-col text-center">
                <h1 class="title-font mb-4 text-2xl font-medium text-gray-900 sm:text-3xl">Send us an inquiry for your
                    questions</h1>
                <p class="mx-auto text-base leading-relaxed lg:w-2/3">We will get back to you as soon as possible for
                    you to start booking.</p>
            </div>
            <div
                class="mx-auto flex w-full flex-col items-end space-y-4 px-8 sm:flex-row sm:space-x-4 sm:space-y-0 sm:px-0 lg:w-2/3">
                <div class="relative w-full flex-grow">
                    <label for="full-name" class="text-sm leading-7 text-gray-600">Full Name</label>
                    <input type="text" id="full-name" name="full-name"
                        class="w-full rounded border border-gray-300 bg-gray-100 bg-opacity-50 py-1 px-3 text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:bg-transparent focus:ring-2 focus:ring-indigo-200">
                </div>
                <div class="relative w-full flex-grow">
                    <label for="email" class="text-sm leading-7 text-gray-600">Email</label>
                    <input type="email" id="email" name="email"
                        class="w-full rounded border border-gray-300 bg-gray-100 bg-opacity-50 py-1 px-3 text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:bg-transparent focus:ring-2 focus:ring-indigo-200">
                </div>
                <button class="btn btn-primary">Send</button>
            </div>
        </div>
    </section>

    <!-- SECTION -->
    <section class="body-font text-gray-600">
        <div class="container mx-auto px-5 py-24">
            <div class="mb-20 flex w-full flex-wrap">
                <div class="mb-6 w-full lg:mb-0 lg:w-1/2">
                    <h1 class="title-font mb-2 text-2xl font-bold text-gray-900 sm:text-3xl">Get pet trainers easily.
                    </h1>
                    <div class="h-1 w-20 rounded bg-indigo-500"></div>
                </div>
                <p class="w-full font-medium leading-relaxed text-gray-600 lg:w-1/2">"Welcome to Pet Patrol! Are you a
                    pet owner looking for a skilled and reliable trainer to help your furry friend reach their full
                    potential? Or are you a professional pet trainer seeking new clients in your area? Look no further,
                    because our system is here to connect you with the perfect match.</p>
            </div>
            <div class="-m-4 flex flex-wrap">
                <div class="p-4 md:w-1/2 xl:w-1/4">
                    <div class="rounded-lg bg-gray-100 p-6">
                        <img class="mb-6 h-40 w-full rounded object-cover object-center"
                            src="images/card images/shopping.png" alt="content">
                        <h3 class="title-font text-3xl font-medium tracking-widest text-yellow-400">1</h3>
                        <h2 class="title-font mb-4 text-lg font-medium text-gray-900">Book a request</h2>
                        <p class="text-base leading-relaxed">Answer a few quick questions about the pet service you
                            want.</p>
                    </div>
                </div>
                <div class="p-4 md:w-1/2 xl:w-1/4">
                    <div class="rounded-lg bg-gray-100 p-6">
                        <img class="mb-6 h-40 w-full rounded object-cover object-center"
                            src="images/card images/searching.png" alt="content">
                        <h3 class="title-font text-3xl font-medium tracking-widest text-yellow-400">2</h3>
                        <h2 class="title-font mb-4 text-lg font-medium text-gray-900">Match with Patroller.</h2>
                        <p class="text-base leading-relaxed">Instanly matcher with registered pet trainers in your local
                            area.</p>
                    </div>
                </div>
                <div class="p-4 md:w-1/2 xl:w-1/4">
                    <div class="rounded-lg bg-gray-100 p-6">
                        <img class="mb-6 h-40 w-full rounded object-cover object-center"
                            src="images/card images/no-yet.png" alt="content">
                        <h3 class="title-font text-3xl font-medium tracking-widest text-yellow-400">3</h3>
                        <h2 class="title-font mb-4 text-lg font-medium text-gray-900">Book to meet</h2>
                        <p class="text-base leading-relaxed"> Choose a Patroller and place a deposit to schedule a meet
                            & greet.</p>
                    </div>
                </div>
                <div class="p-4 md:w-1/2 xl:w-1/4">
                    <div class="rounded-lg bg-gray-100 p-6">
                        <img class="mb-6 h-40 w-full rounded object-cover object-center"
                            src="images/card images/we-are-hiring.png" alt="content">
                        <h3 class="title-font text-3xl font-medium tracking-widest text-yellow-400">4</h3>
                        <h2 class="title-font mb-4 text-lg font-medium text-gray-900">Confirm the Patroller.</h2>
                        <p class="text-base leading-relaxed">Proceed with the Backer if suitable otherwise inform us to
                            meet other</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 2nd section -->

    <section class="body-font text-gray-600">
        <div class="container mx-auto flex flex-col px-5 py-24">
            <div class="mx-auto lg:w-4/6">
                <div class="h-64 overflow-hidden rounded-lg">
                    <img alt="content" class="h-full w-full object-cover object-center"
                        src="{{ asset('images/no-image.png') }}">
                </div>
                <div class="mt-10 flex flex-col sm:flex-row">
                    <div class="text-center sm:w-1/3 sm:py-8 sm:pr-8">
                        <div
                            class="inline-flex h-20 w-20 items-center justify-center rounded-full bg-gray-200 text-gray-400">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="h-10 w-10" viewBox="0 0 24 24">
                                <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                        <div class="flex flex-col items-center justify-center text-center">
                            <h2 class="title-font mt-4 text-lg font-medium text-gray-900">Phoebe Caulfield</h2>
                            <div class="mt-2 mb-4 h-1 w-12 rounded bg-indigo-500"></div>
                            <p class="text-base">Raclette knausgaard hella meggs normcore williamsburg enamel pin
                                sartorial venmo tbh hot chicken gentrify portland.</p>
                        </div>
                    </div>
                    <div
                        class="mt-4 border-t border-gray-200 pt-4 text-center sm:mt-0 sm:w-2/3 sm:border-l sm:border-t-0 sm:py-8 sm:pl-8 sm:text-left">
                        <p class="mb-4 text-lg leading-relaxed">Meggings portland fingerstache lyft, post-ironic fixie
                            man bun banh mi umami everyday carry hexagon locavore direct trade art party. Locavore small
                            batch listicle gastropub farm-to-table lumbersexual salvia messenger bag. Coloring book
                            flannel truffaut craft beer drinking vinegar sartorial, disrupt fashion axe normcore meh
                            butcher. Portland 90's scenester vexillologist forage post-ironic asymmetrical, chartreuse
                            disrupt butcher paleo intelligentsia pabst before they sold out four loko. 3 wolf moon
                            brooklyn.</p>
                        <a class="inline-flex items-center text-indigo-500">Learn More
                            {{-- <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
              <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg> --}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
</x-layout>
