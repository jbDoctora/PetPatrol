<x-trainer-layout>
    @php
    $token = csrf_token();

    @endphp

    <form method="POST" action="/trainer/service/{{ $service->id }}/add-service/add">
        @csrf
        {{-- hidden for passing id data --}}
        <input type="hidden" name="service_id" value="{{ $service->id }}">
        <div class="bg-white my-5 mx-14 shadow-lg h-screen rounded">
            <h1 class="text-2xl font-extrabold p-4 border-b border-slate-300 text-blue-700">Create Training Details</h1>
            <div class="overflow-x-auto">
                <table class="rounded border border-gray-300 w-full">
                    <!-- head -->
                    <thead class="text-gray-800 bg-gray-300">
                        <tr class="text-xs">
                            <th class="font-normal">
                                <div class="my-3">
                                    Lesson
                            </th>
            </div>
            <th class="font-normal">Start Time</th>
            <th class="font-normal">End Time</th>
            </tr>
            </thead>
            <tbody>
                @forelse($trainingDet as $trainings)
                <tr class="font-normal text-xs text-center">
                    <td>
                        <div class="my-3">{{ $trainings->lesson }}</div>
                    </td>
                    <td>{{ $trainings->start_time }}</td>
                    <td>{{ $trainings->end_time }}</td>
                </tr>
                @empty
                <td colspan="4">
                    <div class="my-3 flex flex-col justify-center text-xs">
                        <div class="mx-auto">
                            <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_k76opbel.json"
                                background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay>
                            </lottie-player>
                        </div>
                        <div>
                            <p class="text-center text-sm">Empty training plan</p>
                        </div>
                    </div>
                </td>
                @endforelse
            </tbody>
            </table>
        </div>

        <div class="flex flex-row justify-center gap-3 m-5">
            {{-- <select class="rounded border border-gray-300 px-4 py-2 w-48 text-xs" name="day" required>
                <option disabled selected>Day</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
            </select> --}}
            <input type="text" name="lesson" placeholder="Lesson Ex: fetch, sit"
                class="rounded border border-gray-300 px-4 py-2 w-48 text-xs" />
            <input type="time" name="start_time" class="rounded border border-gray-300 p-2 w-28 text-xs" />
            <input type="time" name="end_time" class="rounded border border-gray-300 p-2 w-28 text-xs">
        </div>

        <div class="flex justify-center">
            <button
                class="bg-blue-700 text-white text-center text-sm px-4 py-3 font-normal w-24 rounded hover:bg-blue-800"
                type="submit">Add</button>
        </div>
        </div>
    </form>
</x-trainer-layout>