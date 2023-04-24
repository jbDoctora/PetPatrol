<x-noNav>
    <div class="bg-white m-5 p-3">
        <div class="m-3 bg-gray-200 rounded">
            <div class="flex justify-between">
                <h3 class="p-5 text-xl text-blue-700 font-bold"><i class="fa-solid fa-life-ring fa-lg pr-3"></i>Submit a
                    ticket</h3>
                <div class="m-5">

                    <a href="/" class="hover:text-blue-700 hover:underline"><i
                            class="fa-solid fa-house fa-md pr-2"></i>Home</a>

                </div>
            </div>

            <form method="POST" action="help-center/add">
                @csrf
                <div class="flex flex-col gap-7 mx-10">

                    <div class="flex flex-col justify-start">
                        <label for="" class="mb-2 text-sm">Name (optional)</label>
                        <input type="text" name="name" class="rounded px-3 py-2 border border-gray-300 w-64">
                    </div>

                    <div class="flex flex-col justify-start">
                        <label for="" class="mb-2 text-sm">Description</label>
                        <textarea name="description" id="" cols="30" rows="6"
                            class="rounded border border-gray-200 w-full p-2"
                            placeholder="description of your report"></textarea>
                        @error('description')
                        <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="flex flex-col justify-start">
                        <label for="" class="mb-2 text-sm">Help Type</label>
                        <select name="report_type" id="" class="rounded px-3 py-2 border border-gray-300 w-64 text-sm">
                            <option selected disabled>Select Help Type</option>
                            <option value="report">Report Someone</option>
                            <option value="inquire">Inquire</option>
                        </select>
                        @error('report_type')
                        <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="flex justify-center m-5">
                        <button type="submit" class="bg-blue-700 rounded text-sm text-white p-3">Submit</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</x-noNav>