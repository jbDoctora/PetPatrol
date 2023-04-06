<x-dash-layout>
    <div class="bg-white my-5 mx-14 shadow-lg rounded">
        <h3 class="text-blue-700 text-xl font-bold px-5 py-3 border-b border-slate-300">Trainer Portfolio</h3>
        <div class="px-5 py-3 border-b border-slate-300">
            <h4 class="text-lg font-medium">Personal Details</h4>
            @foreach ($showInfo as $showInfos)
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
            @endforeach
        </div>

        <div class="px-5 py-3 border-b border-slate-300 my-4">
            <h4 class="text-lg font-medium">Pet Experience</h4>
            @foreach ($portfolio as $portfolios)
            <div class="grid grid-cols-2 gap-4 mt-4">
                <div class="w-full">
                    <h5 class="text-lg font-medium text-gray-600 mb-2">About me</h5>
                    <div class="rounded-lg border border-slate-300 p-4 h-40">
                        <p class="text-base leading-7">{!! html_entity_decode($portfolios->about_me) !!}</p>
                    </div>
                </div>
                <div>
                    <h5 class="text-lg font-medium text-gray-600 mb-2">Experience</h5>
                    <div class="rounded-lg border border-slate-300 p-4 h-40">
                        <p class="text-base leading-7">{!! html_entity_decode($portfolios->experience) !!}</p>
                    </div>
                </div>
                <div>
                    <h5 class="text-lg font-medium text-gray-600 mb-2">Services</h5>
                    <p class="text-lg leading-7 font-bold">{{ $portfolios->services }}</p>
                </div>
                <div>
                    <h5 class="text-lg font-medium text-gray-600 mb-2">Pet Type that I trained</h5>
                    <p class="text-lg leading-7 font-bold">{{ $portfolios->type }}</p>
                </div>
                <div>
                    <h5 class="text-lg font-medium text-gray-600 mb-2">Certificates</h5>
                    <img class="w-full h-48 object-cover rounded-lg"
                        src="{{ $portfolios->certificates ? asset('storage/' . $portfolios->certificates) : asset('/images/placeholder.png') }}"
                        alt="Certificates">
                </div>
                <div>
                    <h5 class="text-lg font-medium text-gray-600 mb-2">Photos</h5>
                    <img class="w-full h-48 object-cover rounded-lg"
                        src="{{ $portfolios->journey_photos ? asset('storage/' . $portfolios->journey_photos) : asset('/images/placeholder.png') }}"
                        alt="Photos">
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-dash-layout>