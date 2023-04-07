<x-dash-layout>
    <div class="container mx-auto py-10">
        {{-- <h1 class="text-3xl font-bold mb-5">Pet Training Payment</h1> --}}
        <div class="flex flex-col md:flex-row gap-10">
            <div class="w-full md:w-2/3 bg-white rounded-lg shadow-lg p-5 text-xs">
                <h2 class="text-xl font-bold mb-5">Order Summary</h2>
                <div class="flex flex-col gap-2">
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
            <div class="w-full md:w-1/3 bg-white rounded-lg shadow-lg p-5 text-xs">
                <h2 class="text-xl font-bold mb-5">Payment Details</h2>
                {{-- <div class="border border-gray-300 rounded-lg p-5 mb-5">
                    <div class="flex justify-between mb-2">
                        <span class="font-bold">Course Package:</span>
                        <span class="text-gray-600">Basic Obedience Training</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span class="font-bold">Price:</span>
                        <span class="text-gray-600">$500</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span class="font-bold">Total:</span>
                        <span class="text-gray-600">$500</span>
                    </div>
                </div> --}}
                <div>
                    <label for="payment" class="font-bold mb-2">Payment Method</label>
                    <select id="payment" name="payment" class="border border-gray-300 rounded py-2 px-3 w-full mb-5"
                        required>
                        <option value="gcash">GCash</option>
                    </select>
                </div>
                <div>
                    <label for="gcash-ref" class="font-bold mb-2">GCash Reference Number</label>
                    <input type="text" id="gcash-ref" name="gcash-ref"
                        class="border border-gray-300 rounded py-2 px-3 w-full" required>
                </div>
            </div>
        </div>
        <div class="flex justify-end mt-5">
            <button type="submit" class="bg-blue-700 text-white rounded-lg px-5 py-2 font-bold hover:bg-blue-800">Pay
                Now</button>
        </div>
    </div>
</x-dash-layout>