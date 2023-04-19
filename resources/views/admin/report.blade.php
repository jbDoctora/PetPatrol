<x-admin-layout>
    <div class="bg-white rounded m-3 p-5">
        <div class="flex justify-between items-center p-3 border-b border-gray-300">
            <div>
                <h2 class="text-blue-700 text-xl">Report</h2>
            </div>
            <div>
                <button class="text-sm bg-green-700 text-white rounded px-3 py-2"><i
                        class="fa-solid fa-print fa-md pr-3"></i>Print</button>
            </div>
        </div>
        {{-- <div class="flex gap-5 m-5">
            <div class="card w-96 bg-gray-200 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title">Card title!</h2>
                    <p>If a dog chews shoes whose shoes does he choose?</p>
                </div>
            </div>
        </div> --}}

        <div class="mt-2 overflow-hidden rounded-none mx-4">
            <table class="w-full border border-gray-300 mb-5" id="myTable">
                <thead class="table-auto">
                    <tr class="bg-blue-700 text-white text-xs font-normal">
                        <th>
                            <div class="my-1 mx-0 font-normal">
                                Reference Code
                            </div>
                        </th>
                        <th class="font-normal">Client Name</th>
                        <th class="font-normal">Gcash Reference Number</th>
                        <th class="font-normal">Date</th>
                        <th class="font-normal">Price</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($request as $req)
                    <tr class="text-xs text-center">
                        <td>
                            <div class="my-4 mx-0">{{$req->code}}</div>
                        </td>
                        <td>{{$req->client_name}}</td>
                        <td>
                            @if($req->gcash_refnum == 0)
                            payment not uploaded
                            @else
                            {{$req->gcash_refnum}}
                            @endif
                        </td>
                        <td>{{$req->start_date}} - {{$req->end_date}}</td>
                        <td>₱ {{$req->price}}</td>
                    </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>