<x-trainer-layout>
    <div class="bg-white m-5 p-5 rounded">
        <div class="flex items-center justify-between">
            <div class="flex">
                <h3 class="text-blue-700 text-3xl">Portfolio</h3>
                <span class="text-gray-900 text-xl my-auto tooltip" data-tip="This is what the Pet Owner See"><i
                        class="fa-solid fa-circle-info ml-3"></i></span>
            </div>

            @if($count_portfolio == 1)
            <div class="text-sm">
                <a href="/trainer/portfolio/edit"><i class="fa-solid fa-pen-to-square fa-xl pr-3"></i>Edit Portfolio</a>
            </div>
            @else
            @endif
        </div>
        @forelse ($portfolio as $portfolios)
        <section class="container mx-auto mt-6 p-3">
            <div
                class="container mb-9 flex items-center rounded bg-gradient-to-r from-green-400 to-blue-500 bg-cover bg-center bg-no-repeat p-9">
                <div class="h-24 w-24 overflow-hidden rounded-full border-4 border-white">
                    <img src="{{ auth()->user()->profile_photo ? asset('storage/' . auih()->user()->profile_photo) : asset('/images/placeholder.png') }}"
                        alt="Profile Photo" class="h-full w-full object-cover">
                </div>
                <div class="ml-9 text-white">
                    <p class="text-4xl font-bold">{{ auth()->user()->name }}</p>
                    <p class="text-md mt-1"><a
                            href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to={{ auth()->user()->email }}"
                            target="_blank" class="underline">{{ auth()->user()->email }}</a></p>
                    <div class="mt-3 flex flex-wrap">
                        @foreach (explode(',', $portfolios->type) as $type)
                        <span class="mr-2 mb-2 rounded-full bg-blue-500 px-2 py-1 text-sm text-white">{{ trim($type)
                            }}</span>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="container my-4 rounded-sm bg-gray-100 p-6 border-l-4 border-blue-500">
                <h2 class="mb-6 text-2xl font-normal">About Me</h2>
                <p class="text-justify text-sm">{!! $portfolios->about_me !!}</p>
            </div>

            <div class="container my-4 rounded-sm bg-gray-100 p-6 border-l-4 border-blue-500">
                <h2 class="mb-6 text-2xl font-normal">Pet Training Experience</h2>
                <div class="list-disc">
                    <p class="text-justify text-sm">{!! $portfolios->experience !!}</p>
                </div>
            </div>

            <div class="container my-4 rounded-sm bg-gray-100 p-6 border-l-4 border-blue-500">
                <h2 class="mb-6 text-2xl font-normal">Services</h2>
                <ul class="text-lg">
                    <li class="mb-4 text-sm">{{ $portfolios->services }}</li>
                </ul>
            </div>

            @foreach ($portfolio as $item)
            <!-- Display certificates -->
            @if (is_array($item->certificates))
            <div class="container my-4 rounded-sm bg-gray-100 p-6 border-l-4 border-blue-500">
                <h2 class="mb-6 text-2xl font-normal">Certificates</h2>
                <div class="grid grid-cols-3 gap-4">
                    @foreach ($item->certificates as $certificate)
                    <div class="relative">
                        <img src="{{ asset('storage/' . $certificate) }}" alt="Certificate"
                            class="rounded-lg object-cover w-full h-48 sm:h-40 md:h-48 lg:h-56">
                        <div class="absolute inset-0 bg-black opacity-0 hover:opacity-50 transition-opacity">
                            <div class="flex items-center justify-center h-full">
                                <a href="{{ asset('storage/' . $certificate) }}" target="_blank" rel="noopener"
                                    class="text-white font-medium text-lg">View Certificate</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Display journey photos -->
            @if (is_array($item->journey_photos))
            <div class="container my-4 rounded-sm bg-gray-100 p-6 border-l-4 border-blue-500">
                <h2 class="mb-6 text-2xl font-normal">Journey Photos</h2>
                <div class="grid grid-cols-3 gap-4">
                    @foreach ($item->journey_photos as $photo)
                    <div class="relative">
                        <img src="{{ asset('storage/' . $photo) }}" alt="Journey Photo"
                            class="rounded-lg object-cover w-full h-48 sm:h-40 md:h-48 lg:h-56">
                        <div class="absolute inset-0 bg-black opacity-0 hover:opacity-50 transition-opacity">
                            <div class="flex items-center justify-center h-full">
                                <a href="{{ asset('storage/' . $photo) }}" target="_blank" rel="noopener"
                                    class="text-white font-medium text-lg">View Photo</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
            @endforeach
            @empty
            <div class="flex justify-center">
                {{-- <img class="h-72 w-96" src="{{ asset('images/bored.png') }}" /> --}}
                <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_BUWVPL.json" background="transparent"
                    speed="1" style="width: 400px; height: 350px;" loop autoplay></lottie-player>
            </div>
            <div class="m-2 flex flex-col">
                <div class="mb-4 flex justify-center font-medium">
                    No Portfolio yet!, Add yours now to increase connections with the Pet Owner
                </div>
                <div class="flex justify-center">
                    <button class="rounded px-3 py-2 bg-blue-700 text-white text-sm hover:bg-blue-800"><a
                            href="/trainer/portfolio/create">Create a
                            portfolio</a></button>
                </div>
            </div>
            @endforelse
    </div>

    </section>
</x-trainer-layout>