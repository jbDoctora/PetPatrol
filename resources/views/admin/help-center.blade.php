<x-admin-layout>
    <div class=" m-5 p-5 h-full bg-white">
        <h3 class="text-blue-700 text-lg m-3 "><i class="fa-solid fa-life-ring mr-3 fa-lg"></i>Help Center</h3>


        <div class="mt-5 overflow-x-auto">
            <table id="myTable" class="w-full text-sm rounded">
                <thead class="text-sm bg-blue-500 text-white">
                    <tr>
                        <th>Ticket ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Help Type</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($report as $reports)
                    <tr class="text-center">
                        <th>
                            <div class="my-3">{{$reports->id}}</div>
                        </th>
                        <td>{{$reports->name}}</td>
                        <td>{{$reports->description}}</td>
                        <td>{{$reports->report_type}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>