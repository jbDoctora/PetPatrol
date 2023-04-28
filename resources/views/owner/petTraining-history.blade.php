<x-dash-layout>
    <div class="bg-white m-5 p-5">
        <h3 class="text-blue-700 text-lg">Pet Training History</h3>
        <div class="overflow-x-auto p-3">
            <table class="table w-full rounded">
                <thead class="text-center">
                    <tr>
                        <th class="bg-blue-700 text-xs text-white">Reference Code</th>
                        <th class="bg-blue-700 text-xs text-white">Trainer Name</th>
                        {{-- <th class="bg-blue-700 text-xs text-white">Training Class Availed</th> --}}
                        <th class="bg-blue-700 text-xs text-white">Status</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-center">
                    @foreach($pet as $pets)
                    <tr>
                        <td class="font-bold">{{$pets->code}}</td>
                        <td>{{$pets->trainer_name}}</td>
                        {{-- <td>{{$pets->course}}</td> --}}
                        <td>
                            @if($pets->status == 'declined')
                            <div class="badge bg-red-700 text-xs">{{$pets->status}}</div>
                            @elseif($pets->status == 'completed')
                            <div class="badge bg-green-700 text-xs">{{$pets->status}}</div>
                            @elseif($pets->status == 'cancelled')
                            <div class="badge bg-red-500 text-xs">{{$pets->status}}</div>
                            @elseif($pets->status == 'approved')
                            <div class="badge bg-green-500 text-xs">{{$pets->status}}</div>
                            @elseif($pets->status == 'in progress')
                            <div class="badge bg-blue-500 text-xs">{{$pets->status}}</div>
                            @elseif($pets->status == 'pending')
                            <div class="badge bg-yellow-500 text-xs">{{$pets->status}}</div>
                            @endif
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-dash-layout>