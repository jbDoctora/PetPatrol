<x-noNavFoot>
  <!-- Hero -->
  <div class="hero min-h-10 bg-base-200 mb-4" style="background-image: url(/images/walking-dog.png); background-position: right center; background-repeat: no-repeat; background-size: contain;">
    <div class="hero-content text-center">
      <div class="max-w-md">
        <h1 class="text-4xl font-bold">Hello there</h1>
        <p class="py-6">Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem quasi. In deleniti eaque aut repudiandae et a id nisi.</p>
        <a href="/pet/add-info"><button class="btn btn-primary">Add Pet<i class="fa-solid fa-circle-plus mx-2"></i></button></a>
      </div>
    </div>
  </div>
  <p class="text-lg font-bold ml-4 p-2">Your Pets</p>
  <div class="grid grid-rows-4 md:grid-cols-3 gap-2 px-5">
    @forelse($petinfo as $petinfos)
      <div class="card card-side bg-white shadow-xl drop-shadow-xl">
        <figure class="w-32 h-32"><img src="{{$petinfos->image ? asset('storage/' .$petinfos->image) : asset('/images/no-image.png')}}"/></figure>
        <div class="card-body">
          <h2 class="card-title font-normal text-base">Pet name: <span class="font-bold">{{$petinfos->name}}</span></h2>
          <p class="font-normal">Pet type: <span class="font-bold">{{$petinfos->type}}</span></p>
          <p class="font-normal">Pet breed: <span class="font-bold">{{$petinfos->breed}}</span></p>
          <div class="card-actions justify-end">
            <div class="flex flex-row gap-2">
            <button class="btn btn-primary btn-sm">Edit</button>
            <button class="btn btn-primary btn-sm">Delete</button>
            <button class="btn btn-primary btn-sm">View</button>
            </div>
          </div>
        </div>
      </div>
      @empty
      <div>No Pet Added!</div>
      @endforelse


</div>
<div class="pagination justify-center m-4 mb-9">
  {{ $petinfo->links() }}
</div>
</x-noNavFoot>