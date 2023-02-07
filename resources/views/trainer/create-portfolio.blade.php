<x-noNavFoot>
    <header class="bg-white p-4 shadow-md">
        <div class="container mx-auto">
          <h1 class="text-xl font-bold">Pet Trainer Portfolio Form</h1>
        </div>
      </header>
      <section class="container mx-auto py-10">
        <form action="#" method="post">
          <h2 class="text-2xl font-bold mb-6">About Me</h2>
          <textarea class="bg-white p-4 shadow-md rounded-lg w-full mb-6" name="about_me" rows="5"></textarea>
          <h2 class="text-2xl font-bold mb-6">Services</h2>
          <textarea class="bg-white p-4 shadow-md rounded-lg w-full mb-6" name="services" rows="5"></textarea>
          <h2 class="text-2xl font-bold mb-6">Certificates</h2>
          <input type="file" class="file-input w-full max-w-xs" name="certificates[]" multiple>
          <h2 class="text-2xl font-bold mb-6">Pet Training Experience</h2>
          <textarea class="bg-white p-4 shadow-md rounded-lg w-full mb-6" name="experience" rows="5"></textarea>
          <h2 class="text-2xl font-bold mb-6">Journey Photos</h2>
          <input type="file" class="file-input w-full max-w-xs" name="journey_photos[]" multiple>
          <h2 class="text-2xl font-bold mb-6">Profile Photo</h2>
          <input type="file" class="file-input w-full max-w-xs" name="profile_photo">
          <div class="text-center mt-6">
            <button class="btn btn-primary">
              Submit
            </button>
          </div>
        </form>
      </section>
</x-noNavFoot>