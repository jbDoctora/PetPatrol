<x-noNavFoot>
  @forelse($portfolio as $portfolios)
    <section class="container mx-auto p-3">
<div class="container flex justify-start mb-9 p-9 bg-base-200 rounded-md" style="background-image: url('/images/banner.jpg'); background-size: cover; background-repeat: no-repeat; background-position: left ; width:100%; height: 280px;">
        <div class="w-24 h-24 mt-5 rounded-full border-2 border-primary bg-white">
          <img src="{{$portfolios->profile_photo ? asset('storage/' .$portfolios->profile_photo) : asset('/images/no-image.png')}}" />
        </div>
        <div class="flex flex-col ml-9 my-6 text-white">
          <p class="text-4xl font-bold">{{auth()->user()->name}}</p>
          <p class="link link-hover text-md"><a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to={{auth()->user()->email}}" target="_blank">{{auth()->user()->email}}</a></p>
        </div>
</div>
{{-- <div class="flex justify-center mb-6 p-2 font-bold">
<p>{{auth()->user()->name}}</p>
</div> --}}
<div class="container bg-base-200 p-6 mb-4 rounded-md">
        <h2 class="text-2xl font-bold mb-6">About Me</h2>
        <p class="text-lg mb-6">
          {{$portfolios->about_me}}
        </p>
</div>

        <div class="container bg-base-200 p-6 my-4 rounded-md">
        <h2 class="text-2xl font-bold mb-6">Services</h2>
        <ul class="text-lg">
          <li class="mb-4">{{$portfolios->services}}</li>
        </ul>
</div>

<div class="container bg-base-200 p-6 my-4 rounded-md">
        <h2 class="text-2xl font-bold mb-6">Pet Trained</h2>
        <ul class="text-lg">
          <li class="mb-4">{{$portfolios->type}}</li>
        </ul>
</div>

<div class="container bg-base-200 p-6 my-4 rounded-md">
        <h2 class="text-2xl font-bold mb-6">Certificates</h2>
      <div class="flex flex-row gap-2 mb-6">
        <div class="card bg-white">
          <div class="card-body">
        <img class="w-36 h-42" src="{{$portfolios->certificates ? asset('storage/' .$portfolios->certificates) : asset('/images/no-image.png')}}" alt="">
          </div>
        </div>
      </div>
</div>

<div class="container bg-base-200 p-6 my-4 rounded-md">
      <h2 class="text-2xl font-bold mb-6">Pet Training Experience</h2>
      <p class="text-lg mb-6">{{$portfolios->experience}}</p>
</div>

<div class="container bg-base-200 p-6 my-4 rounded-md">
      <h2 class="text-2xl font-bold mb-6">Journey Photos</h2>
      <div class="flex flex-row gap-2 mb-6">
        <div class="card bg-white">
          <div class="card-body">
        <img class="w-36 h-42" src="{{$portfolios->journey_photos ? asset('storage/' .$portfolios->journey_photos) : asset('/images/no-image.png')}}" alt="">
          </div>
        </div>
      </div>
</div>
@empty

  <div class="flex justify-center">
    <img class="w-96 h-72" src="{{asset('images/bored.png')}}"/>
  </div>
<div class="flex flex-col m-2">
  <div class="flex justify-center mb-4 font-bold">
    No Portfolio yet!, Add now to for client to view
  </div>
  <div class="flex justify-center">
    <button class="btn btn-primary"><a href="/trainer/portfolio/create">Create a portfolio</a></button>
  </div>
</div>
@endforelse

      </section>
</x-noNavFoot>
