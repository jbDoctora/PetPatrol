<x-layout>

    <div class="hero min-h-screen mt-16"
        style="background-image: url('/images/wave.svg'); background-size: contain; background-position: center; background-repeat: no-repeat; background-position: top;">
        <div class="hero-content flex-col lg:flex-row-reverse">
            <img src="/images/test.png"
                style="background-position: right; background-size: contain; background-repeat: no-repeat; object-fit: fill; width: 500px; height:500px;" />
            {{-- <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_o1JRaPxx1E.json"
                background="transparent" speed="1" style="width: 600px; height: 600px; margin-bottom: 5px;" loop
                autoplay></lottie-player> --}}
            <div class="mr-8 ml-5 text-center ">
                <h1 class="mb-5 text-7xl font-bold tracking-widest xl:text-6xl md:text-3xl leading-relaxed text-black">
                    MAKE YOUR
                    APPOINTMENT<br><span style="font-family: 'Lora', serif;" class="text-yellow-500">PAWESOME!</span>
                </h1>
                <p class="py-6 text-xl tracking-wide text-black xl:text-base">Unlock Your Pet's Full Potential with Our
                    Expert
                    Training Services
                </p>
                <button class="bg-blue-700 px-4 py-3 text-white font-medium rounded-full text-sm hover:bg-blue-900"><a
                        href="/register-owner">Get
                        Started<i class="fa-solid fa-paper-plane ml-3"></i></a></button>
            </div>
        </div>
    </div>


    <div class="flex">
        <div class="h-26 w-26"><img src="{{asset('images/dog-index-1.jpg')}}" class="h-full w-full object-cover" alt="">
        </div>
        <div class="h-26 w-26"><img src="{{asset('images/dog-index-2.jpg')}}" class="h-full w-full object-cover" alt="">
        </div>
        <div class="h-26 w-26"><img src="{{asset('images/cat-index-1.webp')}}" class="h-full w-full object-cover"
                alt="">
        </div>
        <div class="h-26 w-26"><img src="{{asset('images/cat-index-3.jpg')}}" class="h-full w-full object-cover" alt="">
        </div>
        <div class="h-26 w-26"><img src="{{asset('images/cat-index-4.webp')}}" class="h-full w-full object-cover"
                alt="">
        </div>
    </div>

    <div class="mt-16 mx-16">
        <h3 class="text-2xl font-semibold mb-4 text-center">Our Pet Training Programs</h3>
        <div class="grid grid-cols-2 gap-5">
            <div class="bg-white rounded-lg p-4 shadow-lg">
                <h4 class="text-lg font-semibold mb-2">Obedience Training</h4>
                <p class="text-gray-700 text-justify text-sm">Our Obedience Training program is designed to help your
                    pet become a
                    well-behaved companion. Whether you have a new addition to your family or need to address behavior
                    issues, our
                    training techniques are tailored to suit all pets.</p>
            </div>
            <div class="bg-white rounded-lg p-4 shadow-lg">
                <h4 class="text-lg font-semibold mb-2">Agility Training</h4>
                <p class="text-gray-700 text-justify text-sm">Unleash your pet's athleticism with our Agility Training
                    program. Improve
                    coordination, speed, and agility through fun
                    exercises. Our experienced trainers guide pets through jumps, tunnels, and weave poles, fostering
                    confidence and
                    enhancing physical abilities. Suitable for all pets. Watch them shine!</p>
            </div>
            <div class="bg-white rounded-lg p-4 shadow-lg">
                <h4 class="text-lg font-semibold mb-2">Potty Training</h4>
                <p class="text-gray-700 text-justify text-sm">Say goodbye to accidents and embrace hassle-free living
                    with our Potty Training
                    program. We understand the importance of
                    a clean and comfortable environment for both you and your pet. Our expert trainers will provide
                    effective strategies and
                    guidance to help your pet learn proper potty habits. From crate training to establishing routines,
                    we'll equip you with
                    the tools and knowledge to successfully potty train your pet. Experience the freedom and peace of
                    mind that comes with a
                    well-trained pet. Enroll in our Potty Training program today!</p>
            </div>
            <div class="bg-white rounded-lg p-4 shadow-lg">
                <h4 class="text-lg font-semibold mb-2">Tricks Training</h4>
                <p class="text-gray-700 text-justify text-sm">Discover the joy of teaching your pet impressive tricks
                    and commands. Our
                    skilled trainers will guide you through
                    step-by-step training techniques to help your pet master various tricks, from basic commands to more
                    advanced feats.
                    Strengthen the bond with your furry friend while having a blast together. Join our Tricks Training
                    program and watch
                    your pet's skills and confidence soar!</p>
            </div>
        </div>
    </div>

    <h3 class="text-center text-2xl my-5">And more!!</h3>

    <!-- CTA -->
    <section class="body-font text-gray-600">
        <div class="container mx-auto px-5 py-24">
            <div class="mb-12 flex w-full flex-col text-center">
                <h1 class="title-font mb-4 text-xl font-medium text-gray-900 sm:text-2xl">Send us an inquiry for your
                    questions</h1>
                <p class="mx-auto text-base leading-relaxed lg:w-2/3">We will get back to you as soon as possible for
                    you to start booking.</p>
            </div>
            <form method="POST" action="help-center/add">
                @csrf
                <input type="hidden" value="inquiry" name="report_type">
                <div
                    class="mx-auto flex w-full flex-col items-end space-y-4 px-8 sm:flex-row sm:space-x-4 sm:space-y-0 sm:px-0 lg:w-2/3">
                    <div class="relative w-full flex-grow">
                        <label for="full-name" class="text-sm leading-7 text-gray-600">Full Name</label>
                        <input type="text" id="full-name" name="name"
                            class="w-full rounded border border-gray-300 bg-gray-100 bg-opacity-50 py-1 px-3 text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:bg-transparent focus:ring-2 focus:ring-indigo-200">
                    </div>
                    <div class="relative w-full flex-grow">
                        <label for="email" class="text-sm leading-7 text-gray-600">Short Description</label>
                        <input type="text" id="email" name="description"
                            class="w-full rounded border border-gray-300 bg-gray-100 bg-opacity-50 py-1 px-3 text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:bg-transparent focus:ring-2 focus:ring-indigo-200">
                    </div>
                    <button type="submit"
                        class="rounded-full px-5 py-3 bg-blue-700 text-sm text-white hover:bg-blue-800">Send</button>
                </div>
            </form>
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
                <p class="w-full font-bold leading-relaxed text-gray-600 lg:w-1/2 text-justify">Welcome to Pet
                    Patrol! Are you a
                    pet owner looking for a skilled and reliable trainer to help your furry friend reach their full
                    potential? Or are you a professional pet trainer seeking new clients in your area? Look no further,
                    because our system is here to connect you with the perfect match</p>
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

</x-layout>