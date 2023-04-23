<x-dash-layout>
    <div class="bg-white my-5 mx-14 shadow-lg rounded">
        <h3 class="text-blue-700 text-xl font-bold px-5 py-3 border-b border-slate-300">Trainer Portfolio</h3>
        <div class="px-5 py-3 border-b border-slate-300">
            <h4 class="text-lg font-medium">Personal Details</h4>
            @foreach ($showInfo as $showInfos)
            <div class="flex">
                <div class="flex items-center py-5 px-8">
                    <div class="flex my-auto w-32 h-32">
                        <img
                            src="{{ $showInfos->profile_photo ? asset('storage/' . $showInfos->profile_photo) : asset('/images/placeholder.png') }}">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 mt-4">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Name</p>
                        <p class="text-lg font-bold">{{ $showInfos->name }}</p>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600">Email</p>
                        <p class="text-lg font-bold">{{ $showInfos->email }}</p>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600">Address</p>
                        <p class="text-lg font-bold">{{ $showInfos->address }}</p>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600">Sex</p>
                        <p class="text-lg font-bold">{{ $showInfos->sex }}</p>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600">Phone Number</p>
                        <p class="text-lg font-bold">{{ $showInfos->phone_number }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="px-5 py-3 border-b border-slate-300 my-4">
            <h4 class="text-lg font-medium">Pet Experience</h4>
            @forelse ($portfolio as $portfolios)
            <div class="grid grid-cols-1 gap-4 mt-4">
                <div class="w-full">
                    <h5 class="text-lg font-medium text-gray-600 mb-2">About me</h5>
                    <div class="rounded-lg border border-slate-300 p-4 h-fit">
                        <p class="text-base leading-7">{!! html_entity_decode($portfolios->about_me) !!}</p>
                    </div>
                </div>
                <div>
                    <h5 class="text-lg font-medium text-gray-600 mb-2">Experience</h5>
                    <div class="rounded-lg border border-slate-300 p-4 h-fit">
                        <p class="text-base leading-7">{!! html_entity_decode($portfolios->experience) !!}</p>
                    </div>
                </div>
                <div x-data="{ types: '{{ $portfolios->services  }}'.split(',') }">
                    <h5 class="text-lg font-medium text-gray-600 mb-2">Pet Type that I trained</h5>
                    <div class="flex flex-wrap">
                        <template x-for="type in types" :key="type">
                            <span class="badge badge-primary mr-2 mb-2" x-text="type.trim()"></span>
                        </template>
                    </div>
                </div>
                <div x-data="{ types: '{{ $portfolios->type }}'.split(',') }">
                    <h5 class="text-lg font-medium text-gray-600 mb-2">Pet Type that I trained</h5>
                    <div class="flex flex-wrap">
                        <template x-for="type in types" :key="type">
                            <span class="badge badge-primary mr-2 mb-2" x-text="type.trim()"></span>
                        </template>
                    </div>
                </div>
                <div>
                    {{-- @if (is_array($item->certificates))
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
                    @endif --}}
                </div>
                <div>
                    <h5 class="text-lg font-medium text-gray-600 mb-2">Photos</h5>
                    {{-- <img class="w-full h-48 object-cover rounded-lg"
                        src="{{ $portfolios->journey_photos ? asset('storage/' . $portfolios->journey_photos) : asset('/images/placeholder.png') }}"
                        alt="Photos"> --}}
                </div>
            </div>
            @empty
            <div class="text-center my-3">Pet Trainer have not yet added a Portfolio</div>
            @endforelse
        </div>

        <div class="flex flex-col bg-blue-100 m-5">
            <div>
                <h3 class="px-5 pt-5 text-lg">Trainer Ratings</h3>
            </div>
            <div class="px-5 pt-3 pb-2">
                @foreach($showInfo as $informat)
                <template x-for="i in 5">
                    <i class="fa-solid fa-star fa-sm text-gray-400"
                        :class="{'text-yellow-500': (i <= {{$informat->avg_rating}})}"></i>
                </template>
                <p class="text-xl font-bold text-blue-500">{{$informat->avg_rating}} out of 5</p>
                @endforeach
            </div>
        </div>
        <div class="flex flex-col gap-1">
            @foreach($rating as $rate)

            <div class="p-3 m-3 border border-gray-300 rounded">
                <div class="flex items-center gap-5 my-2">
                    <div class="w-9 h-9 rounded-full">
                        <img
                            src="{{ $rate->profile_photo ? asset('storage/' . $rate->profile_photo) : asset('/images/placeholder.png') }}">
                    </div>
                    <p>{{$rate->name}}</p>
                </div>
                <template x-for="i in 5" class="my-2">
                    <i class="fa-solid fa-star fa-sm text-gray-400"
                        :class="{'text-yellow-500': (i <= {{$rate->stars}})}"></i>
                </template>
                <p class="text-justify text-sm">{{$rate->comment}}</p>
            </div>
            @endforeach
        </div>
    </div>
</x-dash-layout>