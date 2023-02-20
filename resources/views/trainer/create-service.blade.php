<x-NoNavFoot>
  <div class="flex flex-col gap-4">
    @forelse($training as $trainings)
    <div class="w-full max-w-screen-xl mx-auto px-4 py-6 bg-white rounded-lg shadow-md flex items-center">
  <div class="w-1/2 pr-8">
    <h2 class="text-3xl font-semibold text-gray-800">{{$trainings->course}}</h2>
    <p class="mt-2 text-gray-600">{{$trainings->pet_type}}</p>
    <p class="mt-2 text-gray-600">{{$trainings->availability}}</p>
    <p class="mt-2 text-gray-600">{{$trainings->weeks}}</p>
  </div>
  <div class="w-1/2 flex justify-end">
    <button class="px-4 py-2 text-white bg-blue-500 rounded-md mr-2"><a href="/trainer/service/add-service/{{$trainings->id}}">Create training plan</a></button>
    <button class="px-4 py-2 text-white bg-green-500 rounded-md mr-2">Button 2</button>
    <button class="px-4 py-2 text-white bg-red-500 rounded-md">Button 3</button>
  </div>
</div>
@empty
<p>Empty Service!</p>
@endforelse
</div>
<div class="flex flex justify-center">
    <label for="my-modal" class="btn btn-circle mt-4"><i class="fa-sharp fa-regular fa-plus fa-2xl"></i></label>
</div>

{{-- Modal that asks user input --}}
<form method="POST" action="/trainer/service/add-service/addService">
  @csrf
<input type="checkbox" id="my-modal" class="modal-toggle flex items-center justify-center" />
<div class="modal">
  <div class="modal-box">
    <h1 class="font-bold text-xl mb-3">Input course details:</h1>
    <div class="flex flex-col gap-4">
        <select class="select select-bordered w-full max-w-xs mx-auto" name="course" required>
            <option disabled selected>Choose training course</option>
            <option>Obedience Training</option>
            <option>Agility Training</option>
            <option>Theraphy</option>
        </select>
        <select class="select select-bordered w-full max-w-xs mx-auto" name="pet_type" required>
            <option disabled selected>Choose pet type</option>
            <option>Dog</option>
            <option>Cat</option>
            <option>Hamster</option>
            <option>Parrot</option>
        </select>
         <select class="select select-bordered w-full max-w-xs mx-auto" name="availability" required>
            <option disabled selected>Choose availability</option>
            <option>Weekdays</option>
            <option>Weekend</option>
        </select>
        <select class="select select-bordered w-full max-w-xs mx-auto" name="weeks" required>
            <option disabled selected>Weeks of training</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
        </select>
    </div>
    <div class="modal-action flex items-center justify-center">
      <button type="submit" class="btn btn-primary">Create</button>
      <label for="my-modal" class="btn mx-auto">Close</label>
    </div>
  </div>
</div>
</form>
</x-NoNavFoot>