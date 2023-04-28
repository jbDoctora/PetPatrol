<x-admin-layout>
    <div class="bg-white rounded m-3 p-2">
        <div class="flex justify-start items-center p-3 border-b border-gray-300">
            <div>
                <h2 class="text-blue-700 text-xl">Bookings</h2>
            </div>
        </div>

        <table id="myTable" class="table-auto">
            <thead class="bg-blue-700 text-slate-100 text-xs">
                <tr>
                    <th>Id</th>
                    <th>Client Name</th>
                    <th>Pet Name</th>
                    <th>Pet Type</th>
                    <th>Trainer Name</th>
                    <th>Course Availed</th>
                    <th>Description</th>
                    <th>Start Date</th>
                    <th>Status</th>
                    <th>Payment Status</th>
                </tr>
            </thead>
            <tbody class="text-xs text-gray-800 text-center">
                @foreach($bookings as $booking)
                <tr>
                    <td>
                        <div class="my-2">{{$booking->code}}</div>
                    </td>
                    <td>{{$booking->client_name}}</td>
                    <td>{{$booking->pet_name}}</td>
                    <td>{{$booking->type}}</td>
                    <td>{{$booking->trainer_name}}</td>
                    <td>{{$booking->course}}</td>
                    <td>{{$booking->desription}}</td>
                    <td>{{$booking->start_date}}</td>
                    <td>{{$booking->status}}</td>
                    <td>{{$booking->payment}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-admin-layout>