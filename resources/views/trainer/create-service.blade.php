<x-NoNavFoot>
    <form class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-lg font-medium mb-4">Add Service</h2>
        <div class="mb-4">
          <label class="block font-medium mb-2" for="service-offered">
            Service Offered:
          </label>
          <input
            class="border border-gray-400 p-2 w-full"
            type="text"
            id="service-offered"
            name="service-offered"
            required
          />
        </div>
        <div class="mb-4">
          <label class="block font-medium mb-2" for="availability-date">
            Availability Date:
          </label>
          <input
            class="border border-gray-400 p-2 w-full"
            type="date"
            id="availability-date"
            name="availability-date"
            required
          />
        </div>
        <div class="mb-4">
          <label class="block font-medium mb-2" for="training-plan">
            Training Plan:
          </label>
          <textarea
            class="border border-gray-400 p-2 w-full"
            id="training-plan"
            name="training-plan"
            rows="5"
            required
          ></textarea>
        </div>
        <div class="mb-4">
          <label class="block font-medium mb-2" for="additional-info">
            Additional Information:
          </label>
          <textarea
            class="border border-gray-400 p-2 w-full"
            id="additional-info"
            name="additional-info"
            rows="5"
          ></textarea>
        </div>
        <div class="mb-4">
          <label class="block font-medium mb-2" for="location">
            Location:
          </label>
          <input
            class="border border-gray-400 p-2 w-full"
            type="text"
            id="location"
            name="location"
            required
          />
        </div>
        <div class="text-right">
          <button class="bg-blue-500 text-white py-2 px-4 rounded-full hover:bg-blue-600">
            Submit
          </button>
        </div>
      </form>
</x-NoNavFoot>