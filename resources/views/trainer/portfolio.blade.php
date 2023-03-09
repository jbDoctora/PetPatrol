<x-trainer-layout>
    @forelse ($portfolio as $portfolios)
    <section class="container mx-auto mt-6 p-3">
        <div
            class="container mb-9 flex items-center rounded-md bg-gradient-to-r from-green-400 to-blue-500 bg-cover bg-center bg-no-repeat p-9">
            <div class="h-24 w-24 overflow-hidden rounded-full border-4 border-white">
                <img src="{{ $portfolios->profile_photo ? asset('storage/' . $portfolios->profile_photo) : asset('/images/no-image.png') }}"
                    alt="Profile Photo" class="h-full w-full object-cover">
            </div>
            <div class="ml-9 text-white">
                <p class="text-4xl font-bold">{{ auth()->user()->name }}</p>
                <p class="text-md mt-1"><a
                        href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to={{ auth()->user()->email }}"
                        target="_blank" class="underline">{{ auth()->user()->email }}</a></p>
                <div class="mt-3">
                    @foreach (explode(',', $portfolios->type) as $type)
                    <span class="mr-1 rounded-full bg-blue-500 px-2 py-1 text-sm text-white">{{ trim($type) }}</span>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="container my-4 rounded-md bg-white p-6">
            <h2 class="mb-6 text-2xl font-bold">About Me</h2>
            {!! $portfolios->about_me !!}
        </div>

        <div class="container my-4 rounded-md bg-white p-6">
            <h2 class="mb-6 text-2xl font-bold">Services</h2>
            <ul class="text-lg">
                <li class="mb-4">{{ $portfolios->services }}</li>
            </ul>
        </div>

        <div class="container my-4 rounded-md bg-white p-6">
            <h2 class="mb-6 text-2xl font-bold">Certificates</h2>
            <div class="mb-6 flex flex-row gap-4">
                <div class="overflow-hidden rounded-md shadow-md">
                    <img src="{{ $portfolios->certificates ? asset('storage/' . $portfolios->certificates) : asset('/images/no-image.png') }}"
                        alt="Certificate" class="h-42 w-36 object-cover">
                </div>
            </div>
        </div>

        <div class="container my-4 rounded-md bg-white p-6">
            <h2 class="mb-6 text-2xl font-bold">Pet Training Experience</h2>
            <div class="list-disc">
                {!! $portfolios->experience !!}
            </div>
        </div>

        <div class="container my-4 rounded-md bg-white p-6">
            <h2 class="mb-6 text-2xl font-bold">Journey Photos</h2>
            <div class="mb-6 flex flex-row gap-2">
                <div class="card bg-white">
                    <div class="card-body">
                        <img class="h-42 w-36"
                            src="{{ $portfolios->journey_photos ? asset('storage/' . $portfolios->journey_photos) : asset('/images/no-image.png') }}"
                            alt="">
                    </div>
                </div>
            </div>
        </div>
        @empty

        <div class="flex justify-center">
            {{-- <img class="h-72 w-96" src="{{ asset('images/bored.png') }}" /> --}}
            <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_eq1aIIplXI.json" background="transparent"
                speed="1" style="width: 400px; height: 400px;" loop autoplay>
            </lottie-player>
        </div>
        <div class="m-2 flex flex-col">
            <div class="mb-4 flex justify-center font-medium">
                No Portfolio yet!, Add now to for client to view
            </div>
            <div class="flex justify-center">
                <button
                    class="tracking-wide rounded-md px-5 py-4 bg-yellow-400 text-black text-sm font-bold border border-black hover:rounded-3xl transition-all duration-200"><a
                        href="/trainer/portfolio/create">Create a
                        portfolio</a></button>
            </div>
        </div>
        @endforelse

    </section>
</x-trainer-layout>