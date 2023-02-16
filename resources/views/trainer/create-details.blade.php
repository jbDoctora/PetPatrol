<x-noNavFoot>
    <form method="POST" action="/trainer/service/{{$service->id}}/add-service/add">
      @csrf
      {{-- hidden for passing id data --}}
      <input type="hidden" name="service_id" value="{{$service->id}}">
    <h1 class="font-bold text-2xl my-5">Create Training Details</h1>
<div class="overflow-x-auto m-4">
  <table class="table w-full">
    <!-- head -->
    <thead>
      <tr>
        <th>Day</th>
        <th>Lesson</th>
        <th>Start Time</th>
        <th>End Time</th>
      </tr>
    </thead>
    @forelse($trainingDet as $trainings)
    <tbody>
      <tr>
        <th>{{$trainings->day}}</th>
        <td>{{$trainings->lesson}}</td>
        <td>{{$trainings->start_time}}</td>
        <td>{{$trainings->end_time}}</td>
      </tr>
    </tbody>
    @empty
    <tr>
        <th>empty</th>
        <td>empty</td>
        <td>empty</td>
        <td>empty</td>
      </tr>
    </tbody>
    @endforelse
  </table>
</div>
<div class="flex flex-row justify-center gap-3">
    <select class="select select-bordered w-full max-w-xs" name="day" required>
            <option disabled selected>Day</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
    </select>
    <input type="text" name="lesson" placeholder="Lesson Ex: fetch, sit" class="input input-bordered w-full max-w-xs" />
    <input type="time" name="start_time" class="border-2 border-base-300 rounded-xl"/>
    <input type="time" name="end_time" class="border-2 border-base-300 rounded-xl">
</div>

<div class="flex justify-center">
    <button class="btn btn-primary mx-auto mt-5" type="submit">Add</button>
</div>
</form>
</x-noNavFoot>