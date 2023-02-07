<x-noNavFoot>
  @forelse($portfolio as $portfolios)
    <section class="container mx-auto py-10 p-2">
<div class="flex justify-center mb-3">
      <div class="avatar">
        <div class="w-24 rounded-full border-2 border-primary">
          <img src="{{$portfolios->profile_photo ? asset('storage/' .$portfolios->profile_photo) : asset('/images/no-image.png')}}" />
        </div>
      </div>
</div>

<div class="flex justify-center mb-6 p-2 font-bold">
<p>{{auth()->user()->name}}</p>
</div>

        <h2 class="text-2xl font-bold mb-6">About Me</h2>
        <p class="text-lg mb-6">
          {{$portfolios->about_me}}
        </p>

        <h2 class="text-2xl font-bold mb-6">Services</h2>
        <ul class="text-lg">
          <li class="mb-4">{{$portfolios->services}}</li>
        </ul>

        <h2 class="text-2xl font-bold mb-6">Certificates</h2>
      <div class="flex flex-row gap-2 mb-6">
        <div class="card bg-white">
          <div class="card-body">
        <img class="w-36 h-42" src="{{$portfolios->certificates ? asset('storage/' .$portfolios->certificates) : asset('/images/no-image.png')}}" alt="">
          </div>
        </div>
      </div>

      <h2 class="text-2xl font-bold mb-6">Pet Training Experience</h2>
      <p class="text-lg mb-6">{{$portfolios->experience}}</p>

      <h2 class="text-2xl font-bold mb-6">Journey Photos</h2>
      <div class="flex flex-row gap-2 mb-6">
        <div class="card bg-white">
          <div class="card-body">
        <img class="w-36 h-42" src="{{$portfolios->journey_photos ? asset('storage/' .$portfolios->journey_photos) : asset('/images/no-image.png')}}" alt="">
          </div>
        </div>
      </div>
@empty
<div class="flex flex-col m-2">
  <div class="flex justify-center mb-4 font-bold">
    No Portfolio yet!, Add now to for client to view
  </div>
  <div class="flex justify-center">
    <button class="btn btn-primary"><a href="/trainer/portfolio/create">Create a portfolio</a></button>
  </div>
  <div class="flex justify-center">
    <img class="w-3/5 h-4/5" src="{{asset('images/bored.png')}}"/>
  </div>
  
</div>
@endforelse
      </section>
</x-noNavFoot>