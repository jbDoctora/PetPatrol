<x-noNav>
    <div class="bg-white m-5 p-3">
        <div class="m-3 border border-gray-200 rounded">

            <form method="POST" action="help-center/add">
                @csrf
                <div class="flex flex-col gap-7 p-5 mx-10">

                    <div class="flex items-center">
                        <label for="">Name (optional)</label>
                        <input type="text" name="name" class="rounded px-3 py-2 border border-gray-300 w-64 mx-4">
                    </div>

                    <div class="flex items-center mx-4">
                        <textarea name="description" id="" cols="30" rows="6"
                            class="rounded border border-gray-200 p-3 w-full"
                            placeholder="description of your report"></textarea>
                    </div>

                    <div class="flex items-center">
                        <select name="report_type" id="" class="rounded px-3 py-2 border border-gray-300 w-64 mx-4">
                            <option selected disabled>Select Help Type</option>
                            <option value="report">Report Someone</option>
                            <option value="inquire">Inquire</option>
                        </select>
                    </div>

                    <div class="flex justify-center">
                        <button type="submit" class="bg-blue-700 rounded text-sm text-white px-3 py-2">Submit</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</x-noNav>