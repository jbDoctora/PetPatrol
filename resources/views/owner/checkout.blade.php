<x-dash-layout>
    <div class="bg-white rounded m-5 h-full">
        <div class="container mx-auto py-10">
            <div class="flex flex-col md:flex-row gap-10">
                <div class="w-full md:w-2/3 bg-white rounded p-5 text-sm border border-gray-300">
                    <div class="flex gap-4 items-center justify-start">
                        <div>
                            <i class="fa-solid fa-cart-shopping fa-lg"></i>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold">Order Summary</h2>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2 mt-5">
                        <div class="flex justify-between">
                            <span class="font-bold">Course Package:</span>
                            <span class="text-gray-600">Basic Obedience Training</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="font-bold">Trainer:</span>
                            <span class="text-gray-600">John Doe</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="font-bold">Price:</span>
                            <span class="text-gray-600">$500</span>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/3 bg-white rounded p-5 text-xs border border-gray-300">
                    <h2 class="text-xl font-bold mb-5">Payment Details</h2>
                    <div class="my-2">
                        <div><img src="images/gcash-sample.jpg" alt="gcash-image"></div>
                    </div>
                    <div class="my-2">
                        <label for="gcash-ref" class="font-bold mb-3">GCash Number</label>
                        <input type="text" value="09164267410" class="border border-gray-300 rounded py-2 px-3 w-full"
                            disabled>
                    </div>
                    <div class="my-2">
                        <label for="gcash-ref" class="font-bold mb-3">GCash Reference Number <span
                                class="text-red-600 text-xs ml-2">*</span></label>
                        <input type="text" id="gcash-ref" name="gcash-ref"
                            class="border border-gray-300 rounded py-2 px-3 w-full" required>
                    </div>
                </div>
            </div>
            <div class="flex justify-end mt-5">
                <button type="submit"
                    class="bg-blue-700 text-white rounded px-5 py-2 font-medium hover:bg-blue-800 text-sm">Pay
                    Now</button>
            </div>
        </div>
    </div>
</x-dash-layout>