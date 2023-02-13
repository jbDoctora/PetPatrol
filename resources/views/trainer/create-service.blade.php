<x-NoNavFoot>
<div x-data="{ courses: '', types: '', customized: '', weeks: '', sessions: '', clientNote: '' }">
      <h1>Choose training service</h1>
        <div class="grid grid-rows-2 m-5 p-2 bg-base-200">
          <div>
          <input type="radio" name="courses" class="radio radio-primary" value="Potty Training" x-model="courses" />
          <label for="">Potty Training</label>
          </div>
          <div>
          <input type="radio" name="courses" class="radio radio-primary" value="Obedience Training" x-model="courses"/>
          <label for="">Obedience Training</label>
          </div>
          <div>
          <input type="radio" name="courses" class="radio radio-primary" value="Behavioral Training" x-model="courses"/>
          <label for="">Obedience Training</label>
          </div>
          <div>
          <input type="radio" name="courses" class="radio radio-primary" value="Agility Training" x-model="courses"/>
          <label for="">Agility Training</label>
          </div>
          <div>
          <input type="radio" name="courses" class="radio radio-primary" value="Tricks Training" x-model="courses"/>
          <label for="">Tricks Training</label>
          </div>
          <div>
          <input type="radio" name="courses" class="radio radio-primary" value="Theraphy" x-model="courses"/>
          <label for="">Theraphy</label>
          </div>
          <div>
          <input type="radio" name="courses" class="radio radio-primary" value="Customize" x-model="courses"/>
          <label for="">Customized</label>
          </div>
          <p name="course" x-text="courses"></p>
        </div>
        <h1>Choose pet type</h1>
        <div class="flex flex-col m-5 p-2 bg-base-200">
          <div>
            <input type="radio" name="type" class="radio radio-primary" value="Dog" x-model="types"/>
            <label for="">Dog</label>
          </div>
          <div>
            <input type="radio" name="type" class="radio radio-primary" value="Cat"  x-model="types"/>
            <label for="">Cat</label>
          </div>
          <div>
            <input type="radio" name="type" class="radio radio-primary" value="Hamster"  x-model="types"/>
            <label for="">Hamster</label>
          </div>
          <div>
            <input type="radio" name="type" class="radio radio-primary" value="Parrot"  x-model="types"/>
            <label for="">Parrot</label>
          </div>
          <p x-text="types"></p>
        </div>
        <h1>Do you accept if pet owner wants to customize the training?</h1>
        <div class="flex flex-col m-5 p-2 bg-base-200">
          <div>
            <input type="radio" name="custom" class="radio radio-primary" value="Yes" x-model="customized"/>
            <label for="">Yes</label>
          </div>
          <div>
            <input type="radio" name="custom" class="radio radio-primary" value="No"  x-model="customized"/>
            <label for="">No</label>
          </div>
          <p x-text="customized"></p>
        </div>
        <h1>How many weeks does it take?</h1>
        <div class="m-5 p-2 bg-base-200">
          <div>
            <input type="text" name="type" class="input input-primary" x-model="weeks"/>
          </div>
          <p x-text="weeks"></p>
        </div>
        <h1>How many sessions per week?</h1>
        <div class="m-5 p-2 bg-base-200">
          <div>
            <input type="text" name="type" class="input input-primary" x-model="sessions"/>
          </div>
          <p x-text="sessions"></p>
        </div>

        <h1>Note to clients:</h1>
        <div class="m-5 p-2 bg-base-200">
          <div id="here">
            <textarea name="type" class="textarea textarea-primary w-full" x-model="clientNote"></textarea>
          </div>
          <p x-text="clientNote"></p>
        </div>

        <div class="flex justify-center">
        <button type="submit" class="btn bg-indigo-500">Button</button>
        </div>


      <div class="overflow-x-auto m-3">
        <table class="table w-full">
          <thead>
            <tr>
              <th>Training Title</th>
              <th>Description</th>
              <th>Duration</th>
            </tr>
          </thead>
          @forelse ($service as $services)
          <tbody>
            <tr>
              <td>{{$services->title}}</td>
              <td>{{$services->description}}</td>
              <td>{{$services->duration}}</td>
            </tr>
          </tbody>
          @empty
          <tbody>
            <tr>
              <th></th>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          </tbody>
          @endforelse
        </table>
      </div>
      
      <form method="POST" action="/trainer/service/add-service">
        @csrf
        <h1>Add training details:</h1>
        <div class="flex flex-row m-5 p-2 bg-base-200 gap-3">
            <input type="text" name="title" class="input input-primary w-full" placeholder="Title - Ex: Fetch, Sit"/>
            <textarea name="description" class="textarea textarea-primary w-full h-56" placeholder="Training Description"></textarea>
            <input name="duration" type="text" class="input input-primary w-full" placeholder="Ex: 30 mins." />
        </div>
        <div class="flex justify-center">
        <button type="submit" class="btn bg-indigo-400">+ Add</button>
        </div>
      </form>
</div>
</x-NoNavFoot>