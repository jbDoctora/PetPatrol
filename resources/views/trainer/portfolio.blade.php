<x-trainer-layout>
    @forelse($portfolio as $portfolios)
        <section class="container mx-auto mt-6 p-3">
            <div class="bg-base-200 container mb-9 flex justify-start rounded-md p-9"
                style="background-image: url('/images/banner.jpg'); background-size: cover; background-repeat: no-repeat; background-position: left ; width:100%; height: 280px;">
                <div class="border-primary mt-5 h-24 w-24 rounded-full border-2 bg-white">
                    <img
                        src="{{ $portfolios->profile_photo ? asset('storage/' . $portfolios->profile_photo) : asset('/images/no-image.png') }}" />
                </div>
                <div class="my-6 ml-9 flex flex-col text-white">
                    <p class="text-4xl font-bold">{{ auth()->user()->name }}</p>
                    <p class="link link-hover text-md"><a
                            href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to={{ auth()->user()->email }}"
                            target="_blank">{{ auth()->user()->email }}</a></p>
                </div>
            </div>

            <div class="bg-base-200 container mb-4 rounded-md p-6">
                <h2 class="mb-6 text-2xl font-bold">About Me</h2>
                <p class="class-name mb-6 text-lg">
                    {{ $portfolios->about_me }}
                </p>
            </div>

            <div class="bg-base-200 container my-4 rounded-md p-6">
                <h2 class="mb-6 text-2xl font-bold">Services</h2>
                <ul class="text-lg">
                    <li class="mb-4">{{ $portfolios->services }}</li>
                </ul>
            </div>

            <div class="bg-base-200 container my-4 rounded-md p-6">
                <h2 class="mb-6 text-2xl font-bold">Pet Trained</h2>
                <ul class="text-lg">
                    <li class="mb-4">{{ $portfolios->type }}</li>
                </ul>
            </div>

            <div class="bg-base-200 container my-4 rounded-md p-6">
                <h2 class="mb-6 text-2xl font-bold">Certificates</h2>
                <div class="mb-6 flex flex-row gap-2">
                    <div class="card bg-white">
                        <div class="card-body">
                            <img class="h-42 w-36"
                                src="{{ $portfolios->certificates ? asset('storage/' . $portfolios->certificates) : asset('/images/no-image.png') }}"
                                alt="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-base-200 container my-4 rounded-md p-6">
                <h2 class="mb-6 text-2xl font-bold">Pet Training Experience</h2>
                <p class="class-name mb-6 text-lg">{{ $portfolios->experience }}</p>
            </div>

            <div class="bg-base-200 container my-4 rounded-md p-6">
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
                <img class="h-72 w-96" src="{{ asset('images/bored.png') }}" />
            </div>
            <div class="m-2 flex flex-col">
                <div class="mb-4 flex justify-center font-bold">
                    No Portfolio yet!, Add now to for client to view
                </div>
                <div class="flex justify-center">
                    <button class="btn btn-primary"><a href="/trainer/portfolio/create">Create a
                            portfolio</a></button>
                </div>
            </div>
    @endforelse

    </section>
</x-trainer-layout>
