<x-noNavFoot>
    <header class="bg-white p-4 shadow-md">
        <div class="container mx-auto">
          <h1 class="text-xl font-bold">Pet Trainer Portfolio Form</h1>
        </div>
      </header>
      <section class="container mx-auto py-10">
        <form method="POST" action="/trainer/portfolio/add" enctype="multipart/form-data">
          @csrf
          <h2 class="text-2xl font-bold mb-6">About Me</h2>
          <textarea class="bg-white p-4 shadow-md rounded-lg w-full mb-6" name="about_me" rows="5"></textarea>
              @error('about_me')
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror
         
     <h2 class="text-2xl font-bold mb-6">Services</h2>
        <div class="flex items-center mb-4 p-5">
            <input type="checkbox"  class="checkbox checkbox-primary checkbox-md" value="Potty Training" name="services" />
            <label for="" class="ml-2 text-sm font-medium ">Potty Training</label>
        </div>
  
        <div class="flex items-center mb-4 p-5">
            <input type="checkbox" class="checkbox checkbox-primary checkbox-md" value="Obedience Training"  name="services" >
            <label for="" class="ml-2 text-sm font-medium ">Obedience Training</label>
        </div>
  
        <div class="flex items-center mb-4 p-5">
          <input type="checkbox" class="checkbox checkbox-primary checkbox-md" value="Behavioral Training" name="services" />
          <label for="" class="ml-2 text-sm font-medium ">Behavioral Training</label>
        </div>
  
      <div class="flex items-center mb-4 p-5">
        <input type="checkbox" class="checkbox checkbox-primary checkbox-md" value="Agility Training" name="services"/>
        <label for="" class="ml-2 text-sm font-medium ">Agility Training</label>
       </div>
  
       <div class="flex items-center mb-4 p-5">
        <input type="checkbox" class="checkbox checkbox-primary checkbox-md" value="Tricks Training" name="services"/>
        <label for="" class="ml-2 text-sm font-medium ">Tricks Training</label>
       </div>

       <h2 class="text-2xl font-bold mb-6">Pet that I train</h2>
       <div class="flex items-center mb-4 p-5">
        <input type="checkbox" class="checkbox checkbox-primary checkbox-md" value="Theraphy" name="type" />
        <label for="" class="ml-2 text-sm font-medium ">Dog</label>
       </div>
        <div class="flex items-center mb-4 p-5">
            <input type="checkbox"  class="checkbox checkbox-primary checkbox-md" value="Potty Training" name="type" />
            <label for="" class="ml-2 text-sm font-medium ">Cat</label>
        </div>
  
        <div class="flex items-center mb-4 p-5">
            <input type="checkbox" class="checkbox checkbox-primary checkbox-md" value="Obedience Training" name="type" />
            <label for="" class="ml-2 text-sm font-medium ">Hamster</label>
        </div>
  
        <div class="flex items-center mb-4 p-5">
          <input type="checkbox" class="checkbox checkbox-primary checkbox-md" value="Behavioral Training" name="type" required/>
          <label for="" class="ml-2 text-sm font-medium ">Parrot</label>
        </div>
  
          <h2 class="text-2xl font-bold mb-6">Certificates</h2>
          <input type="file" class="file-input w-full max-w-xs" name="certificates">
              @error('certificates')
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror
          <h2 class="text-2xl font-bold mb-6">Pet Training Experience</h2>
          <textarea class="bg-white p-4 shadow-md rounded-lg w-full mb-6" name="experience" rows="5"></textarea>
              @error('experience')
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror
          <h2 class="text-2xl font-bold mb-6">Journey Photos</h2>
          <input type="file" class="file-input w-full max-w-xs" name="journey_photos">
              @error('journey_photos')
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror
          <h2 class="text-2xl font-bold mb-6">Profile Photo</h2>
          <input type="file" class="file-input w-full max-w-xs" name="profile_photo">
              @error('profile_photo')
              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
              @enderror
          <div class="text-center mt-6">
            <button class="btn btn-primary">
              Submit
            </button>
          </div>
        </form>
      </section>
</x-noNavFoot>